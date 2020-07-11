<?php

namespace App\Controllers;

use App\Models\Dja_model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Notifikasi extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->_page = 'notifikasi';
        $this->_menu = 'notifikasi';
        $this->_judul = 'Notifikasi';
        $this->dja_model = new Dja_model();
        $this->_relasi_anggota = $this->dja_model->relation('anggota', 'id_anggota', 'nama_anggota');
        $this->_col_table = [
            'lihat' => [
                'title' => 'Lihat',
                'type' => 'like'
            ],
            'dari_notifikasi' => [
                'title' => 'Dari',
                'type' => 'like'
            ],
            'pesan_notifikasi' => [
                'title' => 'Pesan',
                'type' => 'like'
            ],
            'create_notifikasi' => [
                'title' => 'Waktu',
                'type' => 'ike'
            ],
            'baca_notifikasi' => [
                'title' => 'Status',
                'type' => 'like'
            ]
        ];
    }
    public function index()
    {
        $data = [
            'page' => "$this->_page/table",
            'js' => "$this->_page/table_js",
            'judul' => $this->_judul,
            'menu' => $this->_menu,
            'data_lain' => [
                'table_notifikasi' => table_head($this->_col_table, 'class="table table-hover table-notif"')
            ]
        ];
        return $this->page_table($data);
    }
    public function table()
    {
        $notifikasi = $this->dja_model->get_where_result('notifikasi', ['user_notifikasi' => get_user_id()]);
        $data = [];
        foreach ($notifikasi as $nk => $nv) {
            $row = [];
            $row[] = '<a href="/notifikasi/show/' . base64_encode($nv->id_notifikasi) . '" class="badge badge-info">Lihat</a>';
            $row[] = $this->_relasi_anggota[$nv->dari_notifikasi];
            $row[] = $nv->pesan_notifikasi;
            $row[] = tgl_indo_second($nv->create_notifikasi);
            if ($nv->baca_notifikasi == 1) {
                $row[] = '<label class="badge badge-info">Sudah dibaca</label>';
            } else {
                $row[] = '<label class="badge badge-success">Belum dibaca</label>';
            }

            $data[] = $row;
        }
        $notifikasiAll = $this->dja_model->get_where_result('notifikasi', ['user_notifikasi' => 'all']);
        foreach ($notifikasiAll as $nka => $nva) {
            $row = [];
            $row[] = '<a href="/notifikasi/show/' . base64_encode($nv->id_notifikasi) . '" class="badge badge-info">Lihat</a>';
            $row[] = $this->_relasi_anggota[$nva->dari_notifikasi];
            $row[] = $nva->pesan_notifikasi;
            $row[] = tgl_indo_second($nva->create_notifikasi);
            if ($nva->baca_notifikasi == 1) {
                $row[] = '<label class="badge badge-info">Sudah dibaca</label>';
            } else {
                $row[] = '<label class="badge badge-success">Belum dibaca</label>';
            }
            $data[] = $row;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function show($id)
    {
        $id = base64_decode($id);
        $singledata = $this->dja_model->get_single('notifikasi', ['id_notifikasi' => $id]);
        if ($singledata) {
            $this->dja_model->updateData('notifikasi', ['baca_notifikasi' => 1], ['id_notifikasi' => $id]);
            $id_notifikasi = base64_encode($singledata->id_notifikasi);
            // dd($id_notifikasi);
            return redirect()->to(base_url($singledata->link_notifikasi) . "?not=$id_notifikasi");
        }
    }
    public function single_notif()
    {
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                $datauser['id_notifikasi'] = base64_decode($datauser['id_notifikasi']);
                $singledata = $this->dja_model->get_single('notifikasi', ['id_notifikasi' => $datauser['id_notifikasi']]);
                return $this->setResponseFormat('json')->respond($singledata->pesan_notifikasi);
            }
        }
    }

    //--------------------------------------------------------------------

}
