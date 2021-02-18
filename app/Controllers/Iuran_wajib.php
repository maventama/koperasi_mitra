<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Iuran_wajib extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        helper([
            'my_form_helper'
        ]);
        $this->_page = 'iuran_wajib';
        $this->jk = [
            'Tidak diketahui',
            'Laki-laki',
            'Perempuan'
        ];
        $this->dja_model = model('App\Models\Dja_model', false);
        $this->role = $this->dja_model->get_all_list('role', 'id_role', 'nama_role');
        $this->_anggota = $this->dja_model->get_all_list('anggota', 'id_anggota', 'nama_anggota');
        $this->_relasi_anggota = $this->dja_model->relation('anggota', 'id_anggota', 'nama_anggota');
        $this->_judul = 'Iuran Wajib';
        $this->_col_table_bulan = [
            'bulan_iuran' => [
                'title' => 'Bulan',
                'type' => 'like'
            ],
            'jumlah_anggota_bayar' => [
                'title' => 'Jumlah anggota sudah bayar',
                'type' => 'like'
            ],
            'total_iuran_terkumpul' => [
                'title' => 'Total Iuran',
                'type' => 'like'
            ],
            'aksi' => [
                'title' => 'Aksi',
                'type' => 'like'
            ]
        ];
        $this->_col_table = [
            'tahun_iuran' => [
                'title' => 'Tahun',
                'type' => 'like'
            ],
            'aksi' => [
                'title' => 'Aksi',
                'type' => 'like'
            ]
        ];
        $this->_col_form = [
            'tahun_iuran' => [
                'title' => 'Tahun',
                'type' => 'like'
            ],
        ];
        $this->_col_table_iuran_wajib = [
            'anggota_id' => [
                'title' => 'Nama Anggota',
                'type' => 'like'
            ],
            'aksi' => [
                'title' => 'Status',
                'type' => 'like'
            ]
        ];
        $this->_col_table_riwayat_iuran_wajib = [
            'nominal_iuran_wajib' => [
                'title' => 'Nominal',
                'type' => 'like'
            ],
            'bulan_id' => [
                'title' => 'Bulan',
                'type' => 'like'
            ],
            'create_at' => [
                'title' => 'Ditambahkan pada',
                'type' => 'like'
            ],
            'add_by' => [
                'title' => 'Ditambahkan oleh',
                'type' => 'like'
            ],
        ];
    }
    public function index()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $data = [
            'page' => $this->_page . '/table',
            'js' => $this->_page . '/table_js',
            'menu' => 'iuran_wajib',
            'judul' => $this->_judul,
            'data_lain' => [
                'iuran_wajib' => $this->db->table('iuran_wajib')->get()->getResult(),
                'table' => table_head($this->_col_table, 'class="table table-hover dataTable"')
            ]
        ];
        return $this->page_table($data);
    }
    public function table_tahun()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $tahun_iuran = $this->db->table('tahun_iuran')->get()->getResult();
        $data = [];
        foreach ($tahun_iuran as $ak => $av) {
            $row = [];
            $row[] = $av->tahun_iuran;
            $btn = '';
            if (has_permission('iuran_wajib', 'view')) {
                $btn .= '<a href="./iuran/' . base64_encode($av->id_tahun_iuran) . '" class="btn btn-info">
                                                <i class="mdi mdi-information-variant"></i>
                                            </a>';
            }
            if (has_permission('iuran_wajib', 'del')) {
                $btn .= '<button class="btn btn-danger btn-del" data-id="' . base64_encode($av->id_tahun_iuran) . '">
                                                <i class="mdi mdi-delete"></i>
                                            </button>';
            }
            if (has_permission('iuran_wajib', 'edit')) {
                $btn .= '<button class="btn btn-warning btn-edit" data-id="' . base64_encode($av->id_tahun_iuran) . '">
                                                <i class="mdi mdi-tooltip-edit"></i>
                                            </button>';
            }
            $row[] = $btn;
            $data[] = $row;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function render_form($id = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'add') || !has_permission('iuran_wajib', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                if (array_key_exists('id_tahun_iuran', $datauser)) {
                    $datauser['id_tahun_iuran'] = base64_decode($datauser['id_tahun_iuran']);
                    $singledata = $this->dja_model->get_single('tahun_iuran', ['id_tahun_iuran' => $datauser['id_tahun_iuran']]);
                    $output = render_input('tahun_iuran', 'Tahun Iuran', $singledata->tahun_iuran, 'text', '', '');
                    $output .= render_input('id_tahun_iuran', '', base64_encode($singledata->id_tahun_iuran), 'hidden', '', '');
                }
            } else {
                $output = render_input('tahun_iuran', 'Tahun Iuran', '', 'text', '', '');
            }
            return $this->setResponseFormat('json')->respond($output);
        } else {
            if ($id) {
                if ($id) {
                    $singledata = $this->dja_model->get_single('tahun_iuran', ['id_tahun_iuran' => $id]);
                    $output = dja_form($this->_col_form, $singledata);
                    return $this->setResponseFormat('json')->respond($output);
                }
            } else {
                $output = dja_form($this->_col_form, null);
                return $this->setResponseFormat('json')->respond($output);
            }
        }
    }
    public function form()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'add') || !has_permission('iuran_wajib', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            $res = $this->dja_model->addData('tahun_iuran', $datauser, true);
            for ($i = 1; $i <= 12; $i++) {
                $this->dja_model->addData('bulan_iuran', ['bulan_iuran' => $i, 'tahun_id' => $res]);
            }
            return $this->setResponseFormat('json')->respond($res);
        } else {
            return $this->setResponseFormat('json')->respond(false);
        }
    }
    public function form_edit()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            $res = $this->dja_model->updateData('tahun_iuran', ['tahun_iuran' => $datauser['tahun_iuran']], ['id_tahun_iuran' => base64_decode($datauser['id_tahun_iuran'])]);
            return $this->setResponseFormat('json')->respond($res);
        } else {
            return $this->setResponseFormat('json')->respond(false);
        }
    }
    public function detail($id = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $id = base64_decode($id);

        // get tahun
        $singledata = $this->dja_model->get_single('tahun_iuran', ['id_tahun_iuran' => $id]);
        // // get bulan koperasi
        // $bulan = $this->dja_model->get_where_result('bulan_iuran', ['tahun_id' => $id]);
        // $detailBulan = '';
        // foreach ($bulan as $bk => $bv) {
        //     $bv->bulan_iuran = bulan_iuran($bv->bulan_iuran);
        //     $detailBulan .= dja_detail($this->_col_detail_bulan, $bv);
        // }
        $data = [
            'page' => $this->_page . '/detail',
            'js' => $this->_page . '/detail_js',
            'menu' => 'iuran_wajib',
            'judul' => 'Detail ' . $this->_judul,
            'data_lain' => [
                'singledata' => $singledata,
                // 'detail' => $detailBulan,
                'table_bulan' => table_head($this->_col_table_bulan, 'class="table table-hover" id="dataTable"')
            ]
        ];
        return $this->page_table($data);
    }
    public function delete()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'del')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            $id_tahun = base64_decode($datauser['id_tahun_iuran']);
            $tahun = $this->dja_model->get_single('tahun_iuran', ['id_tahun_iuran' => $id_tahun]);
            $res = $this->dja_model->deleteData('tahun_iuran', ['id_tahun_iuran' => $id_tahun]);
            if ($res) {
                $backup_tahun_iuran = [
                    $tahun->id_tahun_iuran => [
                        "id_tahun_iuran" => $tahun->id_tahun_iuran,
                        "tahun_iuran" => $tahun->tahun_iuran,
                    ]
                ];
                $this->dja_model->backup_delete('tahun_iuran', $backup_tahun_iuran);
                // get bulan
                $bulan = $this->dja_model->get_where_result('bulan_iuran', ['tahun_id' => $id_tahun]);
                // delete bulan
                $res_bulan = $this->dja_model->deleteData('bulan_iuran', ['tahun_id' => $id_tahun]);
                if ($res_bulan) {
                    $backup_bulan_iuran = [];
                    foreach ($bulan as $bk => $bv) {
                        $backup_bulan_iuran[$bv->id_bulan_iuran] = [
                            "id_bulan_iuran" => $bv->id_bulan_iuran,
                            "bulan_iuran" => $bv->bulan_iuran,
                            "anggota_bulan_iuran" => $bv->anggota_bulan_iuran,
                            "total_bulan_iuran" => $bv->total_bulan_iuran,
                            "tahun_id" => $bv->tahun_id,
                        ];
                        // get iuran wajib
                        $iuran_wajib = $this->dja_model->get_where_result('iuran_wajib', ['bulan_id' => $bv->id_bulan_iuran]);
                        if ($iuran_wajib) {
                            // delete iuran wajib
                            $res_iuran_wajib = $this->dja_model->deleteData('iuran_wajib', ['bulan_id' => $bv->id_bulan_iuran]);
                            if ($res_iuran_wajib) {
                                $backup_iuran_wajib = [];
                                foreach ($iuran_wajib as $iwk => $iwv) {
                                    $backup_iuran_wajib[$iwv->id_iuran_wajib] = [
                                        "id_iuran_wajib" => $iwv->id_iuran_wajib,
                                        "anggota_id" => $iwv->anggota_id,
                                        "nominal_iuran_wajib" => $iwv->nominal_iuran_wajib,
                                        "bulan_id" => $iwv->bulan_id,
                                        "tahun_id" => $iwv->tahun_id,
                                        "create_at" => $iwv->create_at,
                                        "add_by" => $iwv->add_by,
                                        "update_at" => $iwv->update_at,
                                        "update_by" => $iwv->update_by,
                                    ];
                                }
                                $this->dja_model->backup_delete('bulan_iuran', $backup_iuran_wajib);
                            }
                        }
                    }
                    $this->dja_model->backup_delete('bulan_iuran', $backup_bulan_iuran);
                    return $this->setResponseFormat('json')->respond($res);
                }
            }
        }
    }
    public function table_bulan($id = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $id = base64_decode($id);
        $bulan_iuran = $this->dja_model->get_where_result('bulan_iuran', ['tahun_id' => $id]);

        $data = [];
        foreach ($bulan_iuran as $ak => $av) {
            $row = [];
            $row[] = bulan_iuran($av->bulan_iuran);
            if ($av->total_bulan_iuran != NULL) {
                $row[] = 'Belum ada';
            } else {
                $row[] = count(get_anggota_iuran_wajib($av->id_bulan_iuran));
            }

            $row[] = 'Rp. ' . $av->total_bulan_iuran;
            $row[] = '<a href="./detail_iuran/' . base64_encode($id) . '/' . base64_encode($av->id_bulan_iuran) . '" class="btn btn-info">
                                                <i class="mdi mdi-information-variant"></i>
                                            </a>';
            $data[] = $row;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function detail_bulan($id_tahun = '', $id_bulan = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $id_tahun = base64_decode($id_tahun);
        $id_bulan = base64_decode($id_bulan);
        // get tahun
        $tahun_iuran = $this->dja_model->get_single('tahun_iuran', ['id_tahun_iuran' => $id_tahun]);
        // get bulan
        $bulan_iuran = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $id_bulan, 'tahun_id' => $id_tahun]);
        $data = [
            'page' => 'iuran_wajib/detail_bulan',
            'js' => 'iuran_wajib/detail_bulan_js',
            'menu' => 'iuran_wajib',
            'judul' => 'Detail Bulan ',
            'data_lain' => [
                'singledata' => $bulan_iuran,
                'tahun_iuran' => $tahun_iuran,
                'relasi_role' => $this->role,
                'relasi_jk' => $this->jk,
                'table_anggota_iuran_wajib' => table_head($this->_col_table_iuran_wajib, 'class="table table-hover table-responsive table-anggota-belum-bayar"'),
                'table_anggota_iuran_wajib2' => table_head($this->_col_table_iuran_wajib, 'class="table table-hover table-responsive table-anggota-sudah-bayar"'),
            ]
        ];
        return $this->page_table($data);
    }
    public function table_anggota_iuran($id_bulan = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $id = base64_decode($id_bulan);
        // d($id);
        $bulan_iuran = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $id]);
        $anggotaSudahBayar  = get_anggota_iuran_wajib($bulan_iuran->id_bulan_iuran);
        // get anggota
        $anggota = $this->dja_model->get_all('anggota');
        foreach ($anggota as $ak => $av) {
            if (!in_array($av->id_anggota, $anggotaSudahBayar)) {
                $row = [];
                $row[] = $this->_anggota[$av->id_anggota];
                $class = '';
                if (has_permission('iuran_wajib', 'edit')) {
                    $class = 'btn-belum-bayar';
                }
                if (date('m') == $bulan_iuran->bulan_iuran) {
                    $row[] = "<label style='cursor:pointer;' class='badge badge-gradient-warning $class' data-anggota='$av->id_anggota' data-iuran='$id'>BELUM BAYAR</label>";
                } elseif (date('m') > $bulan_iuran->bulan_iuran) {
                    $row[] = "<label style='cursor:pointer;' class='badge badge-gradient-danger $class' data-anggota='$av->id_anggota' data-iuran='$id'>BELUM BAYAR</label>";
                } else {
                    $row[] = "<label style='cursor:pointer;' class='badge badge-gradient-info $class' data-anggota='$av->id_anggota' data-iuran='$id'>BELUM WAKTUNYA</label>";
                }
                $data[] = $row;
            }
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function table_anggota_sudah_bayar_iuran($id_bulan = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        $id = base64_decode($id_bulan);
        // d($id);
        $bulan_iuran = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $id]);
        $anggotaSudahBayar  = get_anggota_iuran_wajib($bulan_iuran->id_bulan_iuran);
        // get anggota
        $anggota = $this->dja_model->get_all('anggota');
        $data = [];
        foreach ($anggota as $ak => $av) {
            if (in_array($av->id_anggota, $anggotaSudahBayar)) {
                // get data iuran wajibnya
                $iuranWajib = $this->dja_model->get_single('iuran_wajib', ['anggota_id' => $av->id_anggota, 'bulan_id' => $id]);
                $row = [];
                $row[] = $this->_anggota[$av->id_anggota];
                $class = '';
                if (has_permission('iuran_wajib', 'edit')) {
                    $class = 'btn-sudah-bayar';
                }
                $row[] = "<label style='cursor:pointer;' class='badge badge-gradient-success $class' data-anggota='$av->id_anggota' data-iuran='$id' data-iuranwajib='$iuranWajib->id_iuran_wajib'>SUDAH BAYAR</label>";
                $data[] = $row;
            }
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function update_status_iuran_wajib()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                // dd($datauser);
                if (array_key_exists('nominal_iuran', $datauser)) {
                    // get iuran dulu
                    $dataIuranLama = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $datauser['id_iuran']]);
                    if ($dataIuranLama->anggota_bulan_iuran != '') {
                        $anggotaSudahBayar = $dataIuranLama->anggota_bulan_iuran . '|' . $datauser['id_anggota'];
                    } else {
                        $anggotaSudahBayar = $datauser['id_anggota'];
                    }
                    $totalBulanIuran = intval($dataIuranLama->total_bulan_iuran) + intval($datauser['nominal_iuran']);
                    // update data di iuran wajib
                    $res = $this->dja_model->updateData('bulan_iuran', ['anggota_bulan_iuran' => $anggotaSudahBayar, 'total_bulan_iuran' => $totalBulanIuran], ['id_bulan_iuran' => $datauser['id_iuran']]);
                    if ($res) {
                        // save riwayat bayar iuran wajib di tabel iuran wajib
                        $saveIuranWajib = [];
                        $saveIuranWajib['anggota_id'] = $datauser['id_anggota'];
                        $saveIuranWajib['nominal_iuran_wajib'] = $datauser['nominal_iuran'];
                        $saveIuranWajib['bulan_id'] = $datauser['id_iuran'];
                        $saveIuranWajib['add_by'] = get_user_id();
                        $this->dja_model->addData('iuran_wajib', $saveIuranWajib);
                    }
                } else {
                    // ambil data di bulan iuran
                    $dataIuranLama = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $datauser['id_iuran']]);
                    // get riwayat iuran wajib
                    $riwayatIuranWajibLama = $this->dja_model->get_single('iuran_wajib', ['anggota_id' => $datauser['id_anggota'], 'bulan_id' => $dataIuranLama->id_bulan_iuran]);
                    // ambil anggota2 nya
                    $anggotaSudahBayar = get_anggota_iuran_wajib($dataIuranLama->id_bulan_iuran);
                    $anggotaSudahBayarBaru = [];
                    for ($i = 0; $i < count($anggotaSudahBayar); $i++) {
                        if ($anggotaSudahBayar[$i] != $datauser['id_anggota']) {
                            // jika anggota tidak sama dengan anggota yang batal bayar
                            $anggotaSudahBayarBaru[] = $anggotaSudahBayar[$i];
                        }
                    }
                    $anggotaSudahBayarBaru = implode('|', $anggotaSudahBayarBaru);
                    $res = $this->dja_model->updateData('bulan_iuran', ['anggota_bulan_iuran' => $anggotaSudahBayarBaru, 'total_bulan_iuran' => ($dataIuranLama->total_bulan_iuran - $riwayatIuranWajibLama->nominal_iuran_wajib)], ['id_bulan_iuran' => $datauser['id_iuran']]);
                    if ($res) {
                        $this->dja_model->deleteData('iuran_wajib', ['id_iuran_wajib' => $datauser['id_iuran_wajib']]);
                    }
                }
                return $this->setResponseFormat('json')->respond($res);
            }
        }
    }
    public function json_single_iuran_wajib()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('iuran_wajib', 'view')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                $bulan_iuran = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => base64_decode($datauser['id_bulan_iuran'])]);
                if ($bulan_iuran->anggota_bulan_iuran != '') {
                    $bulan_iuran->anggota_bulan_iuran = count(get_anggota_iuran_wajib($bulan_iuran->anggota_bulan_iuran));
                } else {
                    $bulan_iuran->anggota_bulan_iuran = 0;
                }
                $bulan_iuran->total_bulan_iuran = nominal_rupiah($bulan_iuran->total_bulan_iuran);

                return $this->setResponseFormat('json')->respond($bulan_iuran);
            }
        }
    }
    public function riwayat_iuran_wajib()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        // if (!has_permission('iuran_wajib', 'view')) {
        //     return view('errors/html/error_404');
        // }
        $data = [
            'page' => $this->_page . '/anggota/table',
            'js' => $this->_page . '/anggota/table_js',
            'menu' => 'iuran_wajib',
            'judul' => 'Riwayat ' . $this->_judul . ' Ku',
            'data_lain' => [
                'iuran_wajib' => $this->db->table('iuran_wajib')->get()->getResult(),
                'table' => table_head($this->_col_table_riwayat_iuran_wajib, 'class="table table-hover dataTable"')
            ]
        ];
        return $this->page_table($data);
    }
    public function table_riwayat_iuran_wajib()
    {
        $riwayatIuranWajib = $this->dja_model->get_where_result('iuran_wajib', ['anggota_id' => get_user_id()]);
        $data = [];
        foreach ($riwayatIuranWajib as $riwk => $riwv) {
            $row = [];
            $row[] = nominal_rupiah($riwv->nominal_iuran_wajib);
            $bulan = $this->dja_model->get_single('bulan_iuran', ['id_bulan_iuran' => $riwv->bulan_id]);
            $tahun = $this->dja_model->get_single('tahun_iuran', ['id_tahun_iuran' => $bulan->tahun_id]);
            $row[] = bulan_iuran($bulan->bulan_iuran) . '(' . $tahun->tahun_iuran . ')';
            $row[] = $riwv->create_at;
            $row[] = $this->_relasi_anggota[$riwv->add_by];
            $data[] = $row;
        }
        $output = [
            'data' => $data
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    //--------------------------------------------------------------------

}
