<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Anggota extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->_jk = [
            // NULL => 'Tidak diketahui',
            0 => 'Tidak diketahui',
            1 => 'Laki-laki',
            2 => 'Perempuan'
        ];
        $this->dja_model = model('App\Models\Dja_model', false);
        $this->_role = $this->dja_model->get_all_list('role', 'id_role', 'nama_role');
        $this->_relasi_role = $this->dja_model->relation('role', 'id_role', 'nama_role');
        $this->_relasi_anggota = $this->dja_model->relation('anggota', 'id_anggota', 'nama_anggota');
        $this->_relasi_tahun_iuran = $this->dja_model->relation('tahun_iuran', 'id_tahun_iuran', 'tahun_iuran');
        $this->_judul = 'Anggota';
        $this->_status_peminjaman = [
            1 => 'Sedang Berlangsung',
            2 => 'Selesai'
        ];
        $this->_col_table = [
            'nama_anggota' => [
                'title' => 'Nama',
                'type' => 'like'
            ],
            'gmail_anggota' => [
                'title' => 'E-mail',
                'type' => 'like'
            ],
            'jk_anggota' => [
                'title' => 'Jenis Kelamin',
                'type' => 'option',
                'data' => $this->_jk
            ],
            'role_anggota' => [
                'title' => 'Role',
                'type' => 'option',
                'data' => $this->_jk
            ],
            'aksi' => [
                'title' => 'Aksi',
                'type' => 'like'
            ]
        ];
        $this->_col_detail = [
            'nama_anggota' => [
                'title' => 'Nama',
                'type' => 'like'
            ],
            'gmail_anggota' => [
                'title' => 'Email',
                'type' => 'like'
            ],
            'jk_anggota' => [
                'title' => 'Jenis Kelamin',
                'type' => 'option',
                'data' => $this->_jk
            ],
            'role_anggota' => [
                'title' => 'Role',
                'type' => 'option',
                'data' => $this->_role,
            ],
            'ip_address_anggota' => [
                'title' => 'IP Terakhir',
                'type' => 'like'
            ],
        ];
        $this->_col_table_iuran_wajib = [
            'nominal_iuran_wajib' => [
                'title' => 'Nominal',
                'type' => 'like'
            ],
            'bulan_id' => [
                'title' => 'Bulan Iuran',
                'type' => 'like'
            ],
            'create_at' => [
                'title' => 'Dibuat pada',
                'type' => 'like'
            ],
            'add_by' => [
                'title' => 'Dibuat oleh',
                'type' => 'like'
            ],
        ];
        $this->_col_table_peminjaman = [
            'anggota_id' => [
                'title' => 'Nama',
                'type' => 'like'
            ],
            'status_peminjaman' => [
                'title' => 'Status',
                'type' => 'like',
            ],
            'jml_bulan_angsuran_peminjaman' => [
                'title' => 'Jumlah bulan',
                'type' => 'like'
            ],
            'hutang_pokok_peminjaman' => [
                'title' => 'Hutang Pokok',
                'type' => 'like'
            ],
            'sisa_angsuran' => [
                'title' => 'Sisa Angsuran',
                'type' => 'like'
            ],
            'aksi' => [
                'title' => 'Aksi',
                'type' => 'like'
            ]
        ];
    }
    public function index()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'view')) {
            return view('errors/html/error_404');
        }
        $data = [
            'page' => 'anggota/table',
            'js' => 'anggota/table_js',
            'menu' => 'anggota',
            'judul' => $this->_judul,
            'data_lain' => [
                'anggota' => $this->db->table('anggota')->get()->getResult(),
                'relasi_role' => $this->_role,
                'relasi_jk' => $this->_jk,
                'table_anggota' =>  table_head($this->_col_table, 'class="table table-hover table-anggota"')
            ]
        ];
        return $this->page_table($data);
    }
    public function table_anggota()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'view')) {
            return view('errors/html/error_404');
        }
        $anggota = $this->db->table('anggota')->get()->getResult();
        $data = [];
        foreach ($anggota as $ak => $av) {
            $row = [];
            $row[] = $av->nama_anggota;
            $row[] = $av->gmail_anggota;
            $row[] = $this->_jk[$av->jk_anggota];
            $row[] = $this->_relasi_role[$av->role_anggota];
            $btn = '';
            if (has_permission('anggota', 'view')) {
                $btn .= '<a href="/detail_anggota/' . base64_encode($av->id_anggota) . '" class="btn btn-info">
            <i class="mdi mdi-information-variant"></i>
        </a>';
            }
            if (has_permission('anggota', 'del')) {
                $btn .= '
        <button class="btn btn-danger btn-del" data-id="' . base64_encode($av->id_anggota) . '">
            <i class="mdi mdi-delete"></i>
        </button>';
            }
            if (has_permission('anggota', 'edit')) {
                $btn .= '
        <a href="/anggota/form/' . base64_encode($av->id_anggota) . '" class="btn btn-warning">
            <i class="mdi mdi-tooltip-edit"></i>
        </a>';
            }
            $row[] = $btn;
            $data[] = $row;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function form($idanggota = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'add') || !has_permission('anggota', 'edit')) {
            return view('errors/html/error_404');
        }
        $array = [
            'page' => "anggota/form",
            'menu' => "anggota",
            'judul' => 'Form ' . $this->_judul,
            'field' => 'id_anggota',
            'load' => 'layout',
            'table' => 'anggota',
            'data_lain' => [
                'jk' => $this->_jk,
                'role' => $this->_role
            ],
            'redirect_true' => 'anggota',
            'redirect_false' => 'anggota'
        ];
        if ($idanggota) {
            $array['id'] = base64_decode($idanggota);
        }
        if ($dataUser = $this->request->getPost()) {
            $dataUser['password_anggota'] = password_hash($dataUser['password_anggota'], PASSWORD_DEFAULT);
            $array['modified_save'] = $dataUser;
            if ($file = $this->request->getFile('foto_anggota')) {
                if ($file->isValid()) {
                    $array['name_file'] = 'foto_anggota';
                    $array['type_file'] = 'jpg,png,jpe,JPG,JPEG,gif';
                    $array['path'] = '/uploads/anggota/';
                    $array['size'] = '999999999';
                    // $array['modified_save']['foto_anggota'] = $array['name_file'];
                }
            }
        }
        return $this->form_all($array);
    }
    public function delete()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'del')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                $datauser['id_anggota'] = base64_decode($datauser['id_anggota']);
                $anggota = $this->dja_model->get_single('anggota', ['id_anggota' => $datauser['id_anggota']]);
                if ($anggota) {
                    $res = $this->dja_model->deleteData('anggota', ['id_anggota' => $anggota->id_anggota]);
                    if ($res) {
                        $backup_anggota = [
                            $anggota->id_anggota => [
                                "id_anggota" => $anggota->id_anggota,
                                "nama_anggota" => $anggota->nama_anggota,
                                "foto_anggota" => $anggota->foto_anggota,
                                "gmail_anggota" => $anggota->gmail_anggota,
                                "password_anggota" => $anggota->password_anggota,
                                "jk_anggota" => $anggota->jk_anggota,
                                "role_anggota" => $anggota->role_anggota,
                                "ip_address_anggota" => $anggota->ip_address_anggota,
                                "ts_add_anggota" => $anggota->ts_add_anggota,
                                "add_by_anggota" => $anggota->add_by_anggota,
                                "created_at" => $anggota->created_at,
                                "updated_at" => $anggota->updated_at,
                                "deleted_at" => $anggota->deleted_at,
                            ]
                        ];
                        $this->dja_model->backup_delete('anggota', $backup_anggota);
                    }
                    return $this->setResponseFormat('json')->respond($res);
                } else {
                    return $this->setResponseFormat('json')->respond(false);
                }
            }
        }
    }
    public function detail($idanggota = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'view')) {
            return view('errors/html/error_404');
        }
        $anggota = $this->dja_model->get_single('anggota', ['id_anggota' => base64_decode($idanggota)]);
        $data = [
            'page' => 'anggota/detail',
            'js' => 'anggota/detail_js',
            'menu' => 'anggota',
            'judul' => 'Detail ' . $this->_judul,
            'data_lain' => [
                'singledata' => $anggota,
                'relasi_role' => $this->_role,
                'relasi_jk' => $this->_jk,
                'table_detail' => dja_detail($this->_col_detail, $anggota),
                'table_iuran_wajib' => table_head($this->_col_table_iuran_wajib, 'class="table table-hover table-iuran-wajib"'),
                'table_peminjaman' => table_head($this->_col_table_peminjaman, 'class="table table-hover table-peminjaman"')
            ]
        ];
        return $this->page_table($data);
    }
    public function table_iuran_wajib($idanggota = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'view')) {
            return view('errors/html/error_404');
        }
        $idanggota = base64_decode($idanggota);
        $iuran_wajib = $this->dja_model->get_where_result('iuran_wajib', ['anggota_id' => $idanggota]);
        $data = [];
        foreach ($iuran_wajib as $iwk => $iwv) {
            $row = [];
            $row[] = $iwv->nominal_iuran_wajib;
            // get tahun si bulan
            $singleBulanIuran = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $iwv->bulan_id]);
            if (strlen($singleBulanIuran->bulan_iuran) == 1) {
                $bulanIuran = '0' . $singleBulanIuran->bulan_iuran;
                $bulanIuran = mego_bulan($bulanIuran) . "(" . $this->_relasi_tahun_iuran[$singleBulanIuran->tahun_id] . ")";
            } else {
                $bulanIuran = mego_bulan($singleBulanIuran->bulan_iuran) . "(" . $this->_relasi_tahun_iuran[$singleBulanIuran->tahun_id] . ")";
            }
            $row[] = $bulanIuran;
            $row[] = tgl_indo_second($iwv->create_at);
            $row[] = $this->_relasi_anggota[$iwv->add_by];
            $data[] = $row;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function table_peminjaman($idanggota = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('anggota', 'view')) {
            return view('errors/html/error_404');
        }
        $idanggota = base64_decode($idanggota);
        $peminjaman = $this->dja_model->get_where_result('peminjaman', ['anggota_id' => $idanggota]);
        $data = [];
        foreach ($peminjaman as $pk => $pv) {
            $row = [];
            $row[] = $this->_relasi_anggota[$pv->anggota_id];
            $row[] = $this->_status_peminjaman[$pv->status_peminjaman];
            $row[] = $pv->jml_bulan_angsuran_peminjaman;
            $row[] = nominal_rupiah($pv->hutang_pokok_peminjaman);
            $row[] = hitung_sisa_angsuran($pv->id_peminjaman);
            $row[] = '<a href="/detail_peminjaman/' . base64_encode($pv->id_peminjaman) . '" class="btn btn-info">
                                                <i class="mdi mdi-information-variant"></i>
                                            </a>';
            $data[] = $row;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }

    //--------------------------------------------------------------------

}
