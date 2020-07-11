<?php

namespace App\Models;

use CodeIgniter\Model;

class Dja_model extends Model
{
    function __construct()
    {
        helper([
            'filesystem'
        ]);
        $this->db = \Config\Database::connect();
        $this->activitylog = model('App\Models\Activitylog_model', false);
    }
    public function get_all($table)
    {
        return $this->db->table($table)->get()->getResult();
    }

    public function get_all_list($table, $key, $val)
    {
        $data = $this->get_all($table);

        $output = [];
        foreach ($data as $d) {
            $output[$d->$key] = $d->$val;
        }

        return $output;
    }
    public function get_single($table, $where, $order = '', $type_order = 'ASC')
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        if ($order) {
            $builder->orderBy($order, $type_order);
        }
        return $builder->get()
            ->getRow();
    }
    public function get_where_result($table, $where, $order = '', $type_order = 'ASC', $limit = NULL)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        if ($builder) {
            $builder->limit($limit);
        }
        if ($order) {
            $builder->orderBy($order, $type_order);
        }
        return $builder->get()
            ->getResult();
    }
    public function updateData($table, $save, $where)
    {
        $builder = $this->db->table($table);
        $res = $builder->where($where)->update($save);
        $save_activitylog = [
            'description' => 'Memperbarui data di tabel ' . $table,
            'userid' => get_user_id()
        ];
        if ($res) {
            $this->activitylog->save($save_activitylog);
        }
        return $res;
    }
    public function deleteData($table, $where)
    {
        $builder = $this->db->table($table);
        $res = $builder->where($where)->delete();
        $save_activitylog = [
            'description' => 'Menghapus data di tabel ' . $table,
            'userid' => get_user_id()
        ];
        if ($res) {
            alertBootstrap([
                'name' => 'crud-flashdata',
                'message' => 'Data berhasil dihapus',
                'type' => 'danger'
            ]);
            $this->activitylog->save($save_activitylog);
        } else {
            alertBootstrap([
                'name' => 'crud-flashdata',
                'message' => 'Data gagal dihapus',
                'type' => 'danger'
            ]);
        }
        return $res;
    }
    public function backup_delete($table, $data)
    {
        if (file_exists('backup_db/' . $table . '.json')) {
            $content = file_get_contents('backup_db/' . $table . '.json');
            $content = json_decode($content, true);
            foreach ($data as $ck => $cv) {
                $content[$ck] = $cv;
            }
            $res = write_file('backup_db/' . $table . '.json', json_encode($content));
            return $res;
        } else {
            $content = [];
            foreach ($data as $ck => $cv) {
                $content[$ck] = $cv;
            }
            $res = write_file('backup_db/' . $table . '.json', json_encode($content));
            return $res;
        }
    }
    public function relation($table, $key, $val)
    {
        $data = $this->get_all($table);

        $output = [];
        foreach ($data as $d) {
            $output[$d->$key] = $d->$val;
        }
        if (file_exists('backup_db/' . $table . '.json')) {
            $content = file_get_contents('backup_db/' . $table . '.json');
            $content = json_decode($content, true);
            foreach ($content as $ck => $cv) {
                $output[$ck] = $cv[$val] . ' (deleted)';
            }
        }

        return $output;
    }
    public function addData($table, $save, $nid = false)
    {
        $builder = $this->db->table($table);
        $res = $builder->insert($save);
        $save_activitylog = [
            'description' => 'Menambahkan data di tabel ' . $table,
            'userid' => get_user_id()
        ];
        if ($nid) {
            $nid = $this->db->connID->insert_id;
            $this->activitylog->save($save_activitylog);
            return $nid;
        } else {
            return $res;
        }
    }
    public function get_where_like($table, $like, $order = '', $type_order = 'ASC')
    {
        $builder = $this->db->table($table);
        $builder->like($like);
        if ($order) {
            $builder->orderBy($order, $type_order);
        }
        return $builder->get()
            ->getResult();
    }
    public function sinkron()
    {
        // update iuran wajib

        // cek di iuran wajib bulan ini sudah bayar atau belum
        // get iuran wajib bulan ini
        $tahunIni = $this->get_single('tahun_iuran', ['tahun_iuran' => date('Y')]);
        $iuranWajibBulanIni = $this->get_single('bulan_iuran', ['bulan_iuran' => intval(date('m')), 'tahun_id' => $tahunIni->id_tahun_iuran]);
        $anggotaSudahBayar = get_anggota_iuran_wajib($iuranWajibBulanIni->id_bulan_iuran);
        // get anggota
        $anggota = $this->get_all('anggota');
        foreach ($anggota as $ak => $av) {
            if (!in_array($av->id_anggota, $anggotaSudahBayar)) {
                // kirim notif suruh bayar
                add_notification([
                    'pesan_notifikasi' => 'Hai, ' . $av->nama_anggota . ' anda belum membayarkan iuran wajib bulan ini',
                    'link_notifikasi' => 'dashboard',
                    'dari_notifikasi' => 1,
                    'user_notifikasi' => $av->id_anggota,
                ]);
            }
            // cek per anggota dia punya pinjaman apa engga
            $pinjamanAnggota = $this->get_single('peminjaman', ['anggota_id' => $av->id_anggota, 'status_peminjaman' => 1]);
            if ($pinjamanAnggota) {
                // kalo punya, cek angsurannya ada yang kelewat atau enggas
                $angsuranPinjaman = $this->get_where_result('angsuran', ['peminjaman_id' => $pinjamanAnggota->id_peminjaman]);
                foreach ($angsuranPinjaman as $apk => $apv) {
                    if (date('Y-m-d') > $apv->bulan_angsuran && $apv->status_angsuran != 3) {
                        // jika sudah lebih, update status jadi belum dibayarkan
                        $this->updateData('angsuran', ['status_angsuran' => 2], ['id_angsuran' => $apv->id_angsuran]);
                        // kirim notif suruh bayar
                        $bulan = explode('-', $apv->bulan_angsuran);
                        $bulan = $bulan[1];
                        add_notification([
                            'pesan_notifikasi' => 'Hai, ' . $av->nama_anggota . ' anda belum membayarkan angsuran bulan ' . $bulan . ' pada pinjaman ' . $pinjamanAnggota->hutang_pokok_peminjaman,
                            'link_notifikasi' => 'dashboard',
                            'dari_notifikasi' => 1,
                            'user_notifikasi' => $av->id_anggota,
                        ]);
                    } elseif (date('Y-m-d') == $apv->bulan_angsuran && $apv->status_angsuran != 3) {
                        // jika hari ini, update status jadi jatuh tempo
                        $this->updateData('angsuran', ['status_angsuran' => 5], ['id_angsuran' => $apv->id_angsuran]);
                        $bulan = explode('-', $apv->bulan_angsuran);
                        $bulan = $bulan[1];
                        add_notification([
                            'pesan_notifikasi' => 'Hai, ' . $av->nama_anggota . ' angsuran anda pada bulan ' . $bulan . ' dengan pinjaman ' . $pinjamanAnggota->hutang_pokok_peminjaman . ' telah jatuh tempo ',
                            'link_notifikasi' => 'dashboard',
                            'dari_notifikasi' => 1,
                            'user_notifikasi' => $av->id_anggota,
                        ]);
                    }
                }
            }
        }
    }
}
