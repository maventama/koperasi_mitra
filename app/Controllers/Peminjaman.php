<?php

namespace App\Controllers;

use App\Models\RiwayatAngsuran_model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Peminjaman extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->riwayatangsuran_model = new RiwayatAngsuran_model();
        $this->dja_model = model('App\Models\Dja_model', false);
        $this->_page = 'peminjaman';
        $this->_judul = 'Peminjaman';
        $this->_menu = 'peminjaman';
        $this->_tabel = 'peminjaman';
        $this->_relasi_anggota = $this->dja_model->relation('anggota', 'id_anggota', 'nama_anggota');
        $this->_relasi_angsuran = $this->dja_model->relation('angsuran', 'id_angsuran', 'bulan_angsuran');
        $this->_anggota = $this->dja_model->get_all_list('anggota', 'id_anggota', 'nama_anggota');
        $this->_status_peminjaman = [
            1 => 'Sedang Berlangsung',
            2 => 'Selesai'
        ];
        $this->_status_angsuran = [
            1 => 'Belum waktunya',
            2 => 'Belum dibayarkan',
            3 => 'Sudah dibayarkan',
            4 => 'Telat dibayarkan',
            5 => 'Jatuh Tempo'
        ];
        $this->_tipe_riwayat_angsuran = [
            1 => 'Sukses',
            2 => 'Dibatalkan'
        ];
        $this->_col_table = [
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
        $this->_col_detail = [
            'anggota_id' => [
                'title' => 'Nama',
                'type' => 'option',
                'data' => $this->_relasi_anggota,
            ],
            'persen_jasa_peminjaman' => [
                'title' => 'Persen Jasa',
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
            'desc_peminjaman' => [
                'title' => 'Deskripsi',
                'type' => 'like'
            ],
            'created_at' => [
                'title' => 'Dibuat Pada',
                'type' => 'like'
            ],
            'created_by' => [
                'title' => 'Dibuat Oleh',
                'type' => 'option',
                'data' => $this->_relasi_anggota
            ],
            'updated_at' => [
                'title' => 'Diperbarui Pada',
                'type' => 'like'
            ],
            'updated_by' => [
                'title' => 'Diperbarui Oleh',
                'type' => 'option',
                'data' => $this->_relasi_anggota
            ],
        ];
        $this->_col_table_angsuran = [
            'no_angsuran' => [
                'type' => 'like',
                'title' => 'No'
            ],
            'bulan_angsuran' => [
                'type' => 'like',
                'title' => 'Bulan'
            ],
            'nominal_angsuran' => [
                'type' => 'like',
                'title' => 'Nominal'
            ],
            'sisa_hutang_pokok' => [
                'type' => 'like',
                'title' => 'Sisa Hutang'
            ],
            'updated_at' => [
                'type' => 'like',
                'title' => 'Update Terakhir'
            ],
            'updated_by' => [
                'type' => 'like',
                'title' => 'Update Terakhir Oleh'
            ],
            'status_angsuran' => [
                'type' => 'like',
                'title' => 'Status'
            ],
            'aksi' => [
                'type' => 'like',
                'title' => 'Aksi'
            ]
        ];
        $this->_col_detail_angsuran = [
            'bulan_angsuran' => [
                'type' => 'like',
                'title' => 'Bulan'
            ],
            'nominal_angsuran' => [
                'type' => 'like',
                'title' => 'Nominal'
            ],
            'deskripsi_angsuran' => [
                'type' => 'like',
                'title' => 'Deskripsi'
            ],
            'created_at' => [
                'type' => 'like',
                'title' => 'Dibuat Pada'
            ],
            'created_by' => [
                'type' => 'option',
                'data' => $this->_relasi_anggota,
                'title' => 'Dibuat Oleh'
            ],
            'updated_at' => [
                'type' => 'like',
                'title' => 'Update Terakhir'
            ],
            'updated_by' => [
                'type' => 'option',
                'data' => $this->_relasi_anggota,
                'title' => 'Update Terakhir Oleh'
            ],
            'status_angsuran' => [
                'type' => 'option',
                'data' => $this->_status_angsuran,
                'title' => 'Status'
            ],
        ];
        $this->_col_table_riwayat_angsuran = [
            'no' => [
                'title' => 'No',
                'type' => 'like'
            ],
            'angsuran_id' => [
                'type' => 'option',
                'data' => $this->_relasi_angsuran,
                'title' => 'Angsuran'
            ],
            'tipe_riwayat_angsuran' => [
                'type' => 'option',
                'data' => $this->_tipe_riwayat_angsuran,
                'title' => 'Tipe Riwayat'
            ],
            'nominal_angsuran' => [
                'type' => 'like',
                'title' => 'Nominal'
            ],
            'created_by' => [
                'type' => 'option',
                'data' => $this->_relasi_anggota,
                'title' => 'Dibuat oleh'
            ],
            'created_by' => [
                'type' => 'like',
                'title' => 'Dibuat pada'
            ]
        ];
    }
    public function index()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        $data = [
            'page' => "$this->_page/table",
            'js' => "$this->_page/table_js",
            'menu' => $this->_menu,
            'judul' => $this->_judul,
            'data_lain' => [
                'peminjaman' => $this->db->table('peminjaman')->get()->getResult(),
                'relasi_role' => $this->role,
                'table_peminjaman' => table_head($this->_col_table, 'class="table table-hover" id="dataTable"')
                // 'relasi_jk' => $this->jk
            ]
        ];
        return $this->page_table($data);
    }
    public function table()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        $peminjaman = $this->db->table('peminjaman')->get()->getResult();
        if (get_data_user()->role_anggota == 3) {
            $peminjaman = $this->dja_model->get_where_result('peminjaman', ['anggota_id' => get_user_id()]);
        }
        $data = [];
        foreach ($peminjaman as $pk => $pv) {
            $row = [];
            $row[] = $this->_relasi_anggota[$pv->anggota_id];
            $row[] = $this->_status_peminjaman[$pv->status_peminjaman];
            $row[] = $pv->jml_bulan_angsuran_peminjaman;
            $row[] = nominal_rupiah($pv->hutang_pokok_peminjaman);
            $row[] = hitung_sisa_angsuran($pv->id_peminjaman);
            $btn = '';
            if (has_permission('peminjaman', 'view')) {
                $btn .= '<a href="/detail_peminjaman/' . base64_encode($pv->id_peminjaman) . '" class="btn btn-info">
                                                <i class="mdi mdi-information-variant"></i>
                                            </a>';
            }
            if (has_permission('peminjaman', 'del')) {
                $btn .= '<button class="btn btn-danger btn-del" data-id="' . base64_encode($pv->id_peminjaman) . '">
                                                <i class="mdi mdi-delete"></i>
                                            </button>';
            }
            if (has_permission('peminjaman', 'edit')) {
                $btn .= '<button class="btn btn-warning btn-edit" data-id="' . base64_encode($pv->id_peminjaman) . '">
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
    public function render_form()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'add') || !has_permission('peminjaman', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                if (array_key_exists('id_peminjaman', $datauser)) {
                    // get single data
                    $datauser['id_peminjaman'] = base64_decode($datauser['id_peminjaman']);
                    $singledata = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $datauser['id_peminjaman']]);
                    // jika ada key id peminjaman berarti dia lagii edit
                    // cek apakah dia render form atau save ubah data
                    if (count($datauser) == 1) {
                        // user lagi render form
                        $all_output = [];
                        $output = "<div class='row'><div class='col-md-12'>";
                        $output .= render_select('anggota_id', $this->_anggota, 'Anggota', $singledata->anggota_id, '', '');
                        // function render_input($name, $label = '', $value = '', $type = 'text', $form_group_class = '', $input_class = '', $input_attrs = [], $form_group_attr = [])
                        $output .= render_input('hutang_pokok_peminjaman', 'Hutang Pokok', $singledata->hutang_pokok_peminjaman, 'number', '', 'input-hutang-pokok', [], []);
                        $output .= render_input('jml_bulan_angsuran_peminjaman', 'Jumlah Bulan', $singledata->jml_bulan_angsuran_peminjaman, 'number', '', 'input-bulan', [], []);
                        $output .= "</div></div>";
                        $output .= "<div class='row'><div class='col-md-6'>";
                        $output .= render_input('persen_jasa_peminjaman', 'Besar Persen Jasa', $singledata->persen_jasa_peminjaman, 'number', '', 'input-persen-jasa', [], []) . "</div><div class='col-md-6'>";
                        $jasaPeminjaman = intval($singledata->hutang_pokok_peminjaman) / intval($singledata->persen_jasa_peminjaman);
                        $output .= render_input('jasa_peminjaman', 'Jasa Peminjaman', $jasaPeminjaman, 'number', '', 'input-jasa', [], []) . "</div></div>";
                        $output .= render_textarea('desc_peminjaman', 'Deskripsi Peminjaman', $singledata->desc_peminjaman);
                        $all_output = [$output];
                        $output2 = [];
                        $angsuranPerbulan = (intval($singledata->hutang_pokok_peminjaman) + $jasaPeminjaman) / intval($singledata->jml_bulan_angsuran_peminjaman);
                        for ($i = 1; $i <= intval($singledata->jml_bulan_angsuran_peminjaman); $i++) {
                            $output2[] = nominal_rupiah($angsuranPerbulan);
                        }
                        $all_output[] = $output2;
                        return $this->setResponseFormat('json')->respond($all_output);
                    } else {
                        // sebelum update data peminjaman di cek dulu, ada angsuran yang statusnya sudah 2/ sudah dibayarkan atau belum
                        $angsuran = $this->dja_model->get_where_result('angsuran', ['peminjaman_id' => $datauser['id_peminjaman']]);
                        foreach ($angsuran as $ak => $av) {
                            if ($av->status_angsuran == 3) {
                                return $this->setResponseFormat('json')->respond('ongoing');
                            }
                        }
                        // save edit user
                        // update data peminjaman
                        $updatePeminjaman = [];
                        foreach ($datauser as $dk => $dv) {
                            if ($dk != 'jasa_peminjaman') {
                                $updatePeminjaman[$dk] = $dv;
                            }
                        }
                        $updatePeminjaman['updated_at'] = date('Y-m-d H:i:s');
                        $updatePeminjaman['updated_by'] = get_user_id();
                        $res = $this->dja_model->updateData('peminjaman', $updatePeminjaman, ['id_peminjaman' => $datauser['id_peminjaman']]);
                        if ($res) {
                            // jika sudah diupdate, maka update juga angsurannya
                            // masukkan data angsuran perbulan
                            // hitung jasa nya
                            $jasaAngsuran = intval($datauser['hutang_pokok_peminjaman']) / intval($datauser['persen_jasa_peminjaman']);
                            $hutangPokokPerbulan = intval($datauser['hutang_pokok_peminjaman']) / intval($datauser['jml_bulan_angsuran_peminjaman']);
                            $jasaAngsuranPerbulan = $jasaAngsuran / intval($datauser['jml_bulan_angsuran_peminjaman']);
                            $nominalAngsuran = $hutangPokokPerbulan + $jasaAngsuranPerbulan;
                            $tanggalAngsuran = date('d');
                            $tambahTahun = false;
                            $bulan = intval(date('m'));
                            $tahun = intval(date('Y'));
                            foreach ($angsuran as $ak2 => $av2) {
                                $saveAngsuran = [];
                                $saveAngsuran['peminjaman_id'] = $datauser['id_peminjaman'];
                                // $saveAngsuran['bulan_angsuran'] = (date('Y') + $i) . '-' .  (date('m') + $i) . '-' .  (date('d') + $i);
                                if ($bulan == 12 && !$tambahTahun) {
                                    $saveAngsuran['bulan_angsuran'] = $tahun . '-' . $bulan . '-' . $tanggalAngsuran;
                                    $tambahTahun = true;
                                } elseif ($tambahTahun) {
                                    $bulan = 1;
                                    $tahun = $tahun + 1;
                                    $saveAngsuran['bulan_angsuran'] = $tahun . '-0' . $bulan . '-' . $tanggalAngsuran;
                                    $tambahTahun = false;
                                    $bulan = $bulan + 1;
                                } else {
                                    if ($bulan == intval(date('m'))) {
                                        if (strlen($bulan) == 1) {
                                            $saveAngsuran['bulan_angsuran'] = $tahun . '-0' . $bulan . '-' . $tanggalAngsuran;
                                        } else {
                                            $saveAngsuran['bulan_angsuran'] = $tahun  . '-' . $bulan . '-' . $tanggalAngsuran;
                                        }
                                        $bulan = $bulan + 1;
                                    } else {
                                        if (strlen($bulan) == 1) {
                                            $saveAngsuran['bulan_angsuran'] = $tahun . '-0' . $bulan . '-' . $tanggalAngsuran;
                                        } else {
                                            $saveAngsuran['bulan_angsuran'] = $tahun  . '-' . $bulan . '-' . $tanggalAngsuran;
                                        }
                                        $bulan = $bulan + 1;
                                    }
                                }
                                $saveAngsuran['nominal_angsuran'] = $nominalAngsuran;
                                $saveAngsuran['status_angsuran'] = 1;
                                $saveAngsuran['created_by'] = get_user_id();
                                $saveAngsuran['updated_at'] = date('Y-m-d H:i:s');
                                $saveAngsuran['updated_by'] = get_user_id();
                                $this->dja_model->updateData('angsuran', $saveAngsuran, ['id_angsuran' => $av2->id_angsuran]);
                            }
                        }
                        return $this->setResponseFormat('json')->respond($res);
                    }
                } else {
                    $savePeminjaman = [];
                    foreach ($datauser as $dk => $dv) {
                        if ($dk != 'jasa_peminjaman') {
                            $savePeminjaman[$dk] = $dv;
                        }
                    }
                    // jika tidak ada maka langsung add data
                    $savePeminjaman['status_peminjaman'] = 1;
                    $savePeminjaman['created_by'] = get_user_id();
                    $res = $this->dja_model->addData('peminjaman', $savePeminjaman, true);
                    if ($res) {
                        // masukkan data angsuran perbulan
                        // hitung jasa nya
                        $jasaAngsuran = intval($datauser['hutang_pokok_peminjaman']) / intval($datauser['persen_jasa_peminjaman']);
                        $hutangPokokPerbulan = intval($datauser['hutang_pokok_peminjaman']) / intval($datauser['jml_bulan_angsuran_peminjaman']);
                        $jasaAngsuranPerbulan = $jasaAngsuran / intval($datauser['jml_bulan_angsuran_peminjaman']);
                        $nominalAngsuran = $hutangPokokPerbulan + $jasaAngsuranPerbulan;
                        $tanggalAngsuran = date('d');
                        $tambahTahun = false;
                        $bulan = intval(date('m'));
                        $tahun = intval(date('Y'));
                        for ($i = 1; $i <= intval($datauser['jml_bulan_angsuran_peminjaman']); $i++) {
                            $saveAngsuran = [];
                            $saveAngsuran['peminjaman_id'] = $res;
                            // $saveAngsuran['bulan_angsuran'] = (date('Y') + $i) . '-' .  (date('m') + $i) . '-' .  (date('d') + $i);
                            if ($bulan == 12 && !$tambahTahun) {
                                $saveAngsuran['bulan_angsuran'] = $tahun . '-' . $bulan . '-' . $tanggalAngsuran;
                                $tambahTahun = true;
                            } elseif ($tambahTahun) {
                                $bulan = 1;
                                $tahun = $tahun + 1;
                                $saveAngsuran['bulan_angsuran'] = $tahun . '-0' . $bulan . '-' . $tanggalAngsuran;
                                $tambahTahun = false;
                                $bulan = $bulan + 1;
                            } else {
                                if ($bulan == intval(date('m'))) {
                                    if (strlen($bulan) == 1) {
                                        $saveAngsuran['bulan_angsuran'] = $tahun . '-0' . $bulan . '-' . $tanggalAngsuran;
                                    } else {
                                        $saveAngsuran['bulan_angsuran'] = $tahun  . '-' . $bulan . '-' . $tanggalAngsuran;
                                    }
                                    $bulan = $bulan + 1;
                                } else {
                                    if (strlen($bulan) == 1) {
                                        $saveAngsuran['bulan_angsuran'] = $tahun . '-0' . $bulan . '-' . $tanggalAngsuran;
                                    } else {
                                        $saveAngsuran['bulan_angsuran'] = $tahun  . '-' . $bulan . '-' . $tanggalAngsuran;
                                    }
                                    $bulan = $bulan + 1;
                                }
                            }
                            $saveAngsuran['nominal_angsuran'] = $nominalAngsuran;
                            $saveAngsuran['status_angsuran'] = 1;
                            $saveAngsuran['created_by'] = get_user_id();
                            $this->dja_model->addData('angsuran', $saveAngsuran);
                        }
                    }
                    return $this->setResponseFormat('json')->respond($res);
                }
            } else {
                // function render_select($name, $options, $label = '', $selected = '', $form_group_class = '', $select_class = '')
                $output = "<div class='row'><div class='col-md-12'>";
                $output .= render_select('anggota_id', $this->_anggota, 'Anggota', '', '', '');
                // function render_input($name, $label = '', $value = '', $type = 'text', $form_group_class = '', $input_class = '', $input_attrs = [], $form_group_attr = [])
                $output .= render_input('hutang_pokok_peminjaman', 'Hutang Pokok', '', 'number', '', 'input-hutang-pokok', [], []);
                $output .= render_input('jml_bulan_angsuran_peminjaman', 'Jumlah Bulan', '', 'number', '', 'input-bulan', [], []);
                $output .= "</div></div>";
                $output .= "<div class='row'><div class='col-md-6'>";
                $output .= render_input('persen_jasa_peminjaman', 'Besar Persen Jasa', '10', 'number', '', 'input-persen-jasa', [], []) . "</div><div class='col-md-6'>";
                $output .= render_input('jasa_peminjaman', 'Jasa Peminjaman', '', 'number', '', 'input-jasa', [], []) . "</div></div>";
                $output .= render_textarea('desc_peminjaman', 'Deskripsi Peminjaman', '');
                return $this->setResponseFormat('json')->respond($output);
            }
        }
    }
    public function delete()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'del')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            $id_peminjaman = base64_decode($datauser['id_peminjaman']);
            $peminjaman = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $id_peminjaman]);
            $res = $this->dja_model->deleteData('peminjaman', ['id_peminjaman' => $id_peminjaman]);
            if ($res) {
                $backup_peminjaman = [
                    $peminjaman->id_peminjaman => [
                        "id_peminjaman" => $peminjaman->id_peminjaman,
                        "anggota_id" => $peminjaman->anggota_id,
                        "hutang_pokok_peminjaman" => $peminjaman->hutang_pokok_peminjaman,
                        "persen_jasa_peminjaman" => $peminjaman->persen_jasa_peminjaman,
                        "jml_bulan_angsuran_peminjaman" => $peminjaman->jml_bulan_angsuran_peminjaman,
                        "status_peminjaman" => $peminjaman->status_peminjaman,
                        "desc_peminjaman" => $peminjaman->desc_peminjaman,
                        "created_at" => $peminjaman->created_at,
                        "created_by" => $peminjaman->created_by,
                        "updated_at" => $peminjaman->updated_at,
                        "updated_by" => $peminjaman->updated_by,
                    ]
                ];
                $this->dja_model->backup_delete('peminjaman', $backup_peminjaman);
                // get bulan
                $angsuran = $this->dja_model->get_where_result('angsuran', ['peminjaman_id' => $id_peminjaman]);
                // delete bulan
                $res_angsuran = $this->dja_model->deleteData('angsuran', ['peminjaman_id' => $id_peminjaman]);
                if ($res_angsuran) {
                    $backup_angsuran = [];
                    foreach ($angsuran as $ak => $av) {
                        $backup_angsuran[$av->id_angsuran] = [
                            "id_angsuran" => $av->id_angsuran,
                            "peminjaman_id" => $av->peminjaman_id,
                            "bulan_angsuran" => $av->bulan_angsuran,
                            "nominal_angsuran" => $av->nominal_angsuran,
                            "status_angsuran" => $av->status_angsuran,
                            "deskripsi_angsuran" => $av->deskripsi_angsuran,
                            "created_at" => $av->created_at,
                            "created_by" => $av->created_by,
                            "updated_at" => $av->updated_at,
                            "updated_by	" => $av->updated_by,
                        ];
                    }
                    $this->dja_model->backup_delete('angsuran', $backup_angsuran);
                    return $this->setResponseFormat('json')->respond($res_angsuran);
                }
            }
        }
    }
    public function detail($id)
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        $id = base64_decode($id);
        $singledata = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $id]);
        $data = [
            'page' => $this->_page . '/detail',
            'js' => $this->_page . '/detail_js',
            'menu' => 'peminjaman',
            'judul' => 'Detail ' . $this->_judul,
            'data_lain' => [
                'singledata' => $singledata,
                // 'detail' => $detailBulan,
                'table_detail_peminjaman' => dja_detail($this->_col_detail, $singledata),
                'table_angsuran' => table_head($this->_col_table_angsuran, 'class="table table-hover" id="dataTable"'),
                'table_riwayat_angsuran' => table_head($this->_col_table_riwayat_angsuran, 'class="table table-hover table-riwayat-angsuran"'),
            ]
        ];
        return $this->page_table($data);
    }
    public function table_angsuran($id_peminjaman = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        // $id_peminjaman = base64_decode($id_peminjaman);
        $angsuran = $this->dja_model->get_where_result('angsuran', ['peminjaman_id' => $id_peminjaman], 'id_angsuran', 'ASC');
        $peminjaman = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $id_peminjaman]);
        $data = [];
        $i = 1;
        $jasaAngsuranPerbulan = intval($peminjaman->hutang_pokok_peminjaman) * intval($peminjaman->persen_jasa_peminjaman) / 100;
        $totalhutang = intval($peminjaman->hutang_pokok_peminjaman) + intval($jasaAngsuranPerbulan);
        foreach ($angsuran as $ak => $av) {
            $totalhutang = $totalhutang - intval($av->nominal_angsuran);
            $row = [];
            $row[] = $i;
            $row[] = tgl_indo($av->bulan_angsuran);
            $row[] = nominal_rupiah($av->nominal_angsuran);
            $row[] = nominal_rupiah($totalhutang);
            if ($av->updated_at) {
                $row[] = tgl_indo_second($av->updated_at);
            } else {
                $row[] = '';
            }
            if ($av->updated_by) {
                $row[] = $this->_relasi_anggota[$av->updated_by];
            } else {
                $row[] = '';
            }
            $class = '';
            if (has_permission('peminjaman', 'edit')) {
                $class = 'label-angsuran';
            }
            if ($av->status_angsuran == 3) {
                $row[] = '<label class="badge badge-gradient-success ' . $class . '" style="cursor:pointer;" data-id="' . $av->id_angsuran . '" data-status="' . $av->status_angsuran . '">SUDAH DIBAYAR</label>';
            } else {
                if (date('Y-m-d') > $av->bulan_angsuran) {
                    $row[] = '<label class="badge badge-gradient-danger ' . $class . '" style="cursor:pointer;" data-id="' . $av->id_angsuran . '" data-status="' . $av->status_angsuran . '">BELUM DIBAYAR</label>';
                } elseif (date('Y-m-d') == $av->bulan_angsuran) {
                    $row[] = '<label class="badge badge-gradient-warning ' . $class . '" style="cursor:pointer;" data-id="' . $av->id_angsuran . '" data-status="' . $av->status_angsuran . '">JATUH TEMPO</label>';
                } else {
                    $row[] = '<label class="badge badge-gradient-info ' . $class . '" style="cursor:pointer;" data-id="' . $av->id_angsuran . '" data-status="' . $av->status_angsuran . '">BELUM WAKTUNYA</label>';
                }
            }
            $row[] = "<a href='/detail_angsuran/" . base64_encode($av->id_angsuran) . "' class='btn btn-info'><i class='mdi mdi-information-variant'></i></a>";
            $data[] = $row;
            $i++;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function table_riwayat_angsuran($id_peminjaman)
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        // $id_peminjaman = base64_decode($id_peminjaman);
        $riwayat_angsuran = $this->dja_model->get_where_result('riwayat_angsuran', ['peminjaman_id' => $id_peminjaman], 'id_riwayat_angsuran', 'DESC');
        $peminjaman = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $id_peminjaman]);
        $data = [];
        $i = 1;
        foreach ($riwayat_angsuran as $rak => $rav) {
            $row = [];
            $row[] = $i;
            $row[] = riwayat_angsuran_id($rav->angsuran_id);
            $row[] = $this->_tipe_riwayat_angsuran[$rav->tipe_riwayat_angsuran];
            $row[] = nominal_rupiah($rav->nominal_angsuran);
            $row[] = tgl_indo_second($rav->created_at);
            $row[] = $this->_relasi_anggota[$rav->created_by];
            $data[] = $row;
            $i++;
        }
        $output = [
            "data" => $data,
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function update_status_angsuran()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                $angsuran = $this->dja_model->get_single('angsuran', ['id_angsuran' => $datauser['id_angsuran']]);
                $angsuranTerakhir = $this->dja_model->get_single('angsuran', ['peminjaman_id' => $angsuran->peminjaman_id], 'id_angsuran', 'DESC');
                $singlePinjaman = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $angsuran->peminjaman_id]);
                $allAngsuran = $this->dja_model->get_where_result('angsuran', ['peminjaman_id' => $angsuran->peminjaman_id]);
                if ($angsuranTerakhir->id_angsuran == $angsuran->id_angsuran) {
                    // cek apakah angsuran lainnya statusnya sudah 3
                    foreach ($allAngsuran as $aak => $aav) {
                        if ($aav->id_angsuran != $angsuranTerakhir->id_angsuran) {
                            if ($aav->status_angsuran != 3) {
                                // kalo masih ada status angsuran yang belum 3 return
                                return $this->setResponseFormat('json')->respond('not_finish');
                            }
                        }
                    }
                }
                if ($angsuran->status_angsuran != 3) {
                    $res_angsuran = $this->dja_model->updateData('angsuran', ['status_angsuran' => 3, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => get_user_id()], ['id_angsuran' => $datauser['id_angsuran']]);
                    if ($res_angsuran) {
                        if ($angsuranTerakhir->id_angsuran == $angsuran->id_angsuran) {
                            $this->dja_model->updateData('peminjaman', ['status_peminjaman' => 2], ['id_peminjaman' => $angsuranTerakhir->peminjaman_id]);
                        }
                        $saveRiwayatAngsuran = [
                            'angsuran_id' => $datauser['id_angsuran'],
                            'peminjaman_id' => $angsuran->peminjaman_id,
                            'tipe_riwayat_angsuran' => 1,
                            'nominal_angsuran' => $angsuran->nominal_angsuran,
                            'created_by' => get_user_id()
                        ];
                        $nid_riwayat = $this->dja_model->addData('riwayat_angsuran', $saveRiwayatAngsuran, true);
                        $this->dja_model->updateData('angsuran', ['riwayat_angsuran_id' => $nid_riwayat], ['id_angsuran' => $datauser['id_angsuran']]);
                    }
                } else {
                    $res_angsuran = $this->dja_model->updateData('angsuran', ['status_angsuran' => 1, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => get_user_id()], ['id_angsuran' => $datauser['id_angsuran']]);
                    if ($res_angsuran) {
                        if ($singlePinjaman->status_peminjaman == 2) {
                            $this->dja_model->updateData('peminjaman', ['status_peminjaman' => 1], ['id_peminjaman' => $angsuranTerakhir->peminjaman_id]);
                        }
                        $saveRiwayatAngsuran = [
                            'angsuran_id' => $datauser['id_angsuran'],
                            'peminjaman_id' => $angsuran->peminjaman_id,
                            // tipe 2 dibatalkan
                            'tipe_riwayat_angsuran' => 2,
                            'nominal_angsuran' => $angsuran->nominal_angsuran,
                            'created_by' => get_user_id()
                        ];
                        $nid_riwayat = $this->dja_model->addData('riwayat_angsuran', $saveRiwayatAngsuran, true);
                        $this->dja_model->updateData('angsuran', ['riwayat_angsuran_id' => $nid_riwayat], ['id_angsuran' => $datauser['id_angsuran']]);
                    }
                }
                return $this->setResponseFormat('json')->respond($res_angsuran);
            }
        }
    }
    public function data_total_angsuran($id_peminjaman = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        $angsuran = $this->dja_model->get_where_result('angsuran', ['peminjaman_id' => $id_peminjaman]);
        $peminjaman = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $id_peminjaman]);
        $totalSisaHutang = 0;
        $totalSudahBayar = 0;
        foreach ($angsuran as $ak => $av) {
            if ($av->status_angsuran == 1) {
                $totalSisaHutang += intval($av->nominal_angsuran);
            } else {
                $totalSudahBayar += intval($av->nominal_angsuran);
            }
        }
        $output = [
            nominal_rupiah($totalSisaHutang),
            nominal_rupiah($totalSudahBayar),
            $this->_status_peminjaman[$peminjaman->status_peminjaman]
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function detail_angsuran($id)
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        $id = base64_decode($id);
        $singledata = $this->dja_model->get_single('angsuran', ['id_angsuran' => $id]);
        $data = [
            'page' => $this->_page . '/detail_angsuran',
            // 'js' => $this->_page . '/detail_js',
            'menu' => 'peminjaman',
            'judul' => 'Detail ' . $this->_judul,
            'data_lain' => [
                'singledata' => $singledata,
                'id_peminjaman' => base64_encode($singledata->peminjaman_id),
                // 'detail' => $detailBulan,
                'table_detail_angsuran' => dja_detail($this->_col_detail_angsuran, $singledata),
                // 'table_angsuran' => table_head($this->_col_table_angsuran, 'class="table table-hover table-responsive" id="dataTable"')
            ]
        ];
        return $this->page_table($data);
    }
    public function edit_multiple_angsuran($id_peminjaman = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'edit')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            if ($datauser) {
                // jika ada user
                $angsuran_id = '';
                // get salah satu angsuran buat dapet nominal perbulannya
                $singleAngsuran = $this->dja_model->get_single('angsuran', ['id_angsuran' => $datauser['angsuran'][0]]);
                $angsuranTerakhir = $this->dja_model->get_single('angsuran', ['peminjaman_id' => $singleAngsuran->peminjaman_id], 'id_angsuran', 'DESC');
                for ($i = 0; $i < count($datauser['angsuran']); $i++) {
                    // masukkan ke dalam riwayat angsuran
                    if (strlen($angsuran_id) == 0) {
                        $angsuran_id .= $datauser['angsuran'][$i];
                    } else {
                        $angsuran_id .= '|' . $datauser['angsuran'][$i];
                    }
                    // update status_angsuran jadi 2
                    $this->dja_model->updateData('angsuran', ['status_angsuran' => 3, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => get_user_id()], ['id_angsuran' => $datauser['angsuran'][$i]]);
                }
                $saveRiwayatAngsuran = [
                    'angsuran_id' => $angsuran_id,
                    'peminjaman_id' => $singleAngsuran->peminjaman_id,
                    'tipe_riwayat_angsuran' => 1,
                    'nominal_angsuran' => (($singleAngsuran->nominal_angsuran - intval($datauser['jasa'])) * intval(count($datauser['angsuran']))) + intval($datauser['jasa']),
                    'created_by' => get_user_id()
                ];
                $res = $this->dja_model->addData('riwayat_angsuran', $saveRiwayatAngsuran, true);
                if ($res) {
                    if (in_array($angsuranTerakhir->id_angsuran, $datauser['angsuran'])) {
                        $this->dja_model->updateData('peminjaman', ['status_peminjaman' => 2], ['id_peminjaman' => $singleAngsuran->peminjaman_id]);
                    }
                    for ($i = 0; $i < count($datauser['angsuran']); $i++) {
                        $this->dja_model->updateData('angsuran', ['riwayat_angsuran_id' => $res], ['id_angsuran' => $datauser['angsuran'][$i]]);
                    }
                }
                return $this->setResponseFormat('json')->respond($res);
            } else {
                // render form
                $output = '';
                $output .= "<table class='table table-striped'><thead><tr><th>Checkbox</th><th>Bulan</th><th>Status</th></tr></thead><tbody>";
                // for angsuran which status sama dengan 1
                $angsuran = $this->dja_model->get_where_result('angsuran', ['peminjaman_id' => $id_peminjaman, 'status_angsuran !=' => 3]);
                foreach ($angsuran as $ak => $av) {
                    $peminjaman = $this->dja_model->get_single('peminjaman', ['id_peminjaman' => $av->peminjaman_id]);
                    $hutangPokokPerbulan = $peminjaman->hutang_pokok_peminjaman / $peminjaman->jml_bulan_angsuran_peminjaman;
                    $jasaAngsuranPerbulan = ($peminjaman->hutang_pokok_peminjaman * $peminjaman->persen_jasa_peminjaman / 100) / $peminjaman->jml_bulan_angsuran_peminjaman;
                    $output .= '<tr>';
                    $output .= '<td><center><div class="form-check"><input type="checkbox" class="form-check-input check-angsuran" value="' . $av->id_angsuran . '" data-pokok="' . $hutangPokokPerbulan . '" data-jasa="' . $jasaAngsuranPerbulan . '"></div></center></td>';
                    $output .= "<td>$av->bulan_angsuran</td>";
                    $output .= "<td>" . $this->_status_angsuran[$av->status_angsuran] . "</td>";
                    $output .= '</tr>';
                }
                $output .= '</tbody></table>';
                return $this->setResponseFormat('json')->respond($output);
            }
        }
    }
    public function peminjamanku()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('peminjaman', 'view')) {
            return view('errors/html/error_404');
        }
        $data = [
            'page' => "$this->_page/table",
            'js' => "$this->_page/table_js",
            'menu' => $this->_menu,
            'judul' => $this->_judul,
            'data_lain' => [
                'peminjaman' => $this->db->table('peminjaman')->get()->getResult(),
                'relasi_role' => $this->role,
                'table_peminjaman' => table_head($this->_col_table, 'class="table table-hover" id="dataTable"')
                // 'relasi_jk' => $this->jk
            ]
        ];
        return $this->page_table($data);
    }
    //--------------------------------------------------------------------

}
