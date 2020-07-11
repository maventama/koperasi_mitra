<?php

use App\Models\Dja_model;

function is_login()
{
    $session = session();
    return $session->has('logged_in');
}
function get_user_id()
{
    $session = session();
    return $session->get('id_anggota');
}
function get_data_user()
{
    $db = \Config\Database::connect();
    $builder = $db->table('anggota');
    return $builder->where(['id_anggota' => get_user_id()])->get()->getRow();
}
function is_admin($id)
{
    return get_data_user()->is_admin_anggota;
}
function has_permission($permission, $tipe = '')
{
    $db = \Config\Database::connect();
    $builder = $db->table('role_permission');
    $akses = false;

    $_userid = get_user_id();
    $us = get_data_user();

    if (is_admin($_userid)) {
        $akses = true;
    } else {
        $role = $builder->where(['role_id' => $us->role_anggota, 'menu_rolep' => $permission, $tipe . '_rolep' => 1])->get()->getRow();
        if ($role) {
            $akses = true;
        } else {
            if (file_exists('backup_db/role_permission.json')) {
                $role_file = file_get_contents('backup_db/role_permission.json');
                if ($role_file) {
                    $konten_role_file = json_decode($role_file, true);
                    foreach ($konten_role_file as $key => $value) {
                        if ($value['role_id'] == $us->role_anggota && $value['menu_rolep'] == $tipe) {
                            return $value[$tipe . '_rolep'];
                        }
                    }
                }
            }
        }
    }


    return $akses;
}
function alertBootstrap($arrayAlert)
{
    // type, message, name
    // flashdata
    $session = session();
    if (array_key_exists('type', $arrayAlert)) {
        $type = $arrayAlert['type'];
    } else {
        $type = 'info';
    }
    if (array_key_exists('message', $arrayAlert)) {
        $message = $arrayAlert['message'];
    } else {
        $message = 'Hello, alert bootstrap';
    }
    if (array_key_exists('name', $arrayAlert)) {
        $name = $arrayAlert['name'];
    } else {
        $name = 'name';
    }
    $alert = "<div class='alert alert-$type'>$message</div>";
    if (array_key_exists('flashdata', $arrayAlert)) {
        if ($arrayAlert['flashdata'] == true) {
            return $session->getFlashdata($name);
        }
    } else {
        $session->setFlashdata($name, $alert);
    }
}
function get_judul($data)
{
    $df = explode('_', $data);
    $dg = array_pop($df);
    return implode(' ', $df);
}
function mego_bulan($gt, $pj = 0)
{
    if ($pj == 0) {
        $bln = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Ags', '09' => 'Sept', '10' => 'Okt', '11' => 'Nov', '12' => 'Des');
    } else {
        $bln = array('01' => 'Januari', '02' => 'Febuari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
    }


    return $bln[$gt];
}
function bulan_iuran($bulan)
{
    $bln = array(1 => 'Januari', 2 => 'Febuari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
    return $bln[$bulan];
}
function tgl_indo($tgl, $bln = 'angka', $pj = 0)
{
    $cv = ['', ' ', '0000-00-00', '1970-01-01'];
    if (!in_array($tgl, $cv)) {
        if ($bln == 'angka') {
            $kirim = date("d-m-Y", strtotime($tgl));
        } else {
            $kirim = date("d ", strtotime($tgl));
            $kirim .= mego_bulan(date("m", strtotime($tgl)), $pj);
            $kirim .= date(" Y", strtotime($tgl));
        }
        return $kirim;
    } else {
        return "";
    }
}
function tgl_indo_second($datetime)
{
    $waktu = explode(' ', $datetime);
    $tgl = $waktu[0];
    $jam = $waktu[1];
    $tglBaru = tgl_indo($tgl);
    $waktuIndo = $tglBaru . ' ' . $jam;
    return $waktuIndo;
}
function dja_detail(array $col, object $data)
{
    $output = '';
    foreach ($col as $key => $value) {
        if (!in_array('detail_no', $value)) {
            if (array_key_exists('title', $value)) {
                $title = $value['title'];
            } else {
                $title = get_judul($key);
            }

            $_unit = '';
            if ($data->$key) {
                if (array_key_exists('unit', $value)) {
                    $_unit = $value['unit'];
                }
            }


            $_align_value = '';
            if (array_key_exists('align_value', $value)) {
                $_align_value = $value['align_value'];
            }

            $_extra = '';
            if (array_key_exists('extra', $value)) {
                foreach ($value['extra'] as $ke => $kv) {

                    $_v_extra = '';
                    $_t_extra = '';

                    if (array_key_exists('value', $value['extra'])) {
                        $_v_extra = $data->$value['extra']['value'];

                        if ($data->$value['extra']['value'] != '') {
                            if (array_key_exists('title', $value['extra'])) {
                                $_t_extra = " | " . $value['extra']['title'] . " : ";
                            }
                        }
                    }

                    $_u_extra = '';
                    if (array_key_exists('unit', $value['extra'])) {
                        $_u_extra = $value['extra']['unit'];
                    }

                    $_extra = "$_t_extra $_v_extra $_u_extra";

                    if (array_key_exists('link', $value['extra'])) {
                        $_src = $value['extra']['link']['src'] . $data->$value['extra']['link']['id'];
                        $_extra = "<a href='$_src' target='_blank'>$_t_extra $_v_extra $_u_extra</a>";
                    }
                }
            }

            if ($value['type'] == 'like') {
                if ($data != '') {
                    $data_value = htmlspecialchars($data->$key);
                } else {
                    $data_value = '';
                }

                $output .= "<tr><td>$title</td><td class='$_align_value'> $data_value $_unit $_extra</td></tr>";
            } elseif ($value['type'] == 'date') {
                if (!in_array('no-format', $value)) {
                    if ($data->$key != '') {
                        $data_value = tgl_indo($data->$key, 'xx');
                    } else {
                        $data_value = '';
                    }
                } else {
                    if ($data->$key != '') {
                        $data_value = $data->$key;
                    } else {
                        $data_value = '';
                    }
                }


                $output .= "<tr><td>$title</td><td class='$_align_value'>$data_value $_unit $_extra</td></tr>";
            }
            elseif ($value['type'] == 'link_date') {
                if (!in_array('no-format', $value)) {
                    if ($data->$key != '') {
                        $data_value = tgl_indo($data->$key, 'xx');
                    } else {
                        $data_value = '';
                    }
                } else {
                    if ($data->$key != '') {
                        $data_value = $data->$key;
                    } else {
                        $data_value = '';
                    }
                }

                $_src = '';
                if (array_key_exists('link', $value)) {
                    $_src = $value['link']['src'] . $data->$value['link']['id'];
                }

                $output .= "<tr><td>$title</td><td class='$_align_value'><a href='$_src' target='_blank'>$data_value</a></td></tr>";
            }
            elseif ($value['type'] == 'from') {
                if ($data != '') {
                    if (array_key_exists('sub-type', $value)) {
                        if ($value['sub-type'] == 'date') {
                            $data_value = tgl_indo($data->$key, 'angka');
                        } else {
                            $data_value = $data->$key;
                        }
                    } else {
                        $data_value = $data->$key;
                    }
                } else {
                    $data_value = '';
                }

                $output .= "<tr><td>$title</td><td class='$_align_value'>$data_value $_unit $_extra</td></tr>";
            }
            elseif ($value['type'] == 'option') {
                if ($data->$key != 0) {
                    $data_value = $value['data'][$data->$key];
                } else {
                    $data_value = '';
                }

                $output .= "<tr><td>$title</td><td class='$_align_value'>$data_value $_unit $_extra</td></tr>";
            }
        }
    }
    return $output;
}
function dja_form($col, object $data = NULL)
{
    $output = '';
    foreach ($col as $key => $value) {
        $class = '';
        $group_class = 'form-group-default ';
        // untuk menambahkan required di inputnya
        if (in_array('required', $value)) {
            $class .= "$key required ";
            $group_class .= ' required';
        }
        // 
        // CHECK IF FORM SHOW
        if (!in_array('form_no', $value)) {

            // TITLE PARAMETER
            if (array_key_exists('title', $value)) {
                $title = $value['title'];
            } else {
                $title = get_judul($key);
            }


            // CUSTOM FORM
            if (array_key_exists('form', $value)) {
                if ($data != '') {
                    $data_value = htmlspecialchars($data->$key);
                } else {
                    $data_value = '';
                }

                if ($value['form']['type'] == 'text') {
                    $output .= render_input($key, $title, $data_value, 'text', $group_class, $class);
                } elseif ($value['form']['type'] == 'option') {
                    $list = $value['form']['data'];
                    $output .= render_select($key, $list, $title, $data_value, $group_class, $class);
                }
            } else {
                // LIKE TEXT
                if ($value['type'] == 'like') {
                    if ($data != '') {
                        $data_value = htmlspecialchars($data->$key);
                    } else {
                        $data_value = '';
                    }

                    $output .= render_input($key, $title, $data_value, 'text', $group_class, $class);

                    // FROM DATE AND NUMBER
                } elseif ($value['type'] == 'from') {

                    if ($data != '') {
                        if (array_key_exists('sub-type', $value)) {
                            if ($value['sub-type'] == 'date') {
                                $data_value = tgl_indo($data->$key, 'angka');
                            } else {
                                $data_value = $data->$key;
                            }
                        } else {
                            $data_value = $data->$key;
                        }
                    } else {
                        $data_value = '';
                    }


                    if (array_key_exists('sub-type', $value)) {
                        if ($value['sub-type'] == 'date') $class .= ' datep';
                        else $class .= ' angka';
                    } else {
                        $class .= ' angka';
                    }

                    $output .= render_input($key, $title, $data_value, 'text', $group_class, $class);

                    // OPTION DROPDOWN
                }
                elseif ($value['type'] == 'option') {
                    if ($data != '') {
                        $data_value = $data->$key;
                    } else {
                        $data_value = '';
                    }


                    if (in_array('required', $value)) {
                        $list = $value['data'];
                    } else {
                        $new[''] = '-';
                        $new = $value['data'];
                        $list = $new;
                    }

                    if (in_array('select2', $value)) {
                        $output .= render_select($key, $list, $title, $data_value, $group_class, $class);
                    } else {
                        $output .= dja_form_select($title, $key, $list, $data_value, '', $class, $group_class);
                    }
                }
            }
        }
        if (in_array('form_hidden', $value)) {
            $output .= render_input($key, '', $data->$key, 'hidden');
        }
    }
    return $output;
}
function nominal_rupiah($nominalRupiah)
{
    $nominalRupiah = number_format($nominalRupiah, 0, ',', '.');
    $nominalRupiah = "Rp. $nominalRupiah";
    return $nominalRupiah;
}
function dja_form_select($label, $name, $options, $selected = '', $first = '', $select_class = '', $div_class = '', $attr = '')
{

    $output = "<div class='form-group form-group-default $div_class'>";

    $output .= "<label class='control-label'>$label</label>";
    $output .= "<select name='$name' class='form-control $select_class' $attr>";

    if ($first) {
        foreach ($first as $key => $val) {
            $_selected = '';
            if ($selected != '') {
                if ($selected == $key) {
                    $_selected = ' selected';
                }
            }

            $output .= '<option value="' . $key . '"' . $_selected . '>' . $val . '</option>';
        }
    }

    foreach ($options as $key => $val) {
        $_selected = '';
        if ($selected != '') {
            if ($selected == $key) {
                $_selected = ' selected';
            }
        }

        $output .= '<option value="' . $key . '"' . $_selected . '>' . $val . '</option>';
    }

    $output .= "</select>";
    $output .= '</div>';

    return $output;
}
function get_anggota_iuran_wajib($id_bulan_iuran_wajib)
{
    $db = \Config\Database::connect();
    $singledata = $db->table('bulan_iuran')->where(['id_bulan_iuran' => $id_bulan_iuran_wajib])->get()->getRow();
    $anggota = explode('|', $singledata->anggota_bulan_iuran);
    if (count($anggota) == 1) {
        $anggotaBaru = [];
        $anggotaBaru[] = $singledata->anggota_bulan_iuran;
        return $anggotaBaru;
    }
    return $anggota;
}
function hitung_sisa_angsuran($id_peminjaman)
{
    $db = \Config\Database::connect();
    $angsuranBelumDibayar = $db->table('angsuran')->where(['status_angsuran !=' => 3, 'peminjaman_id' => $id_peminjaman])->get()->getResult();
    return count($angsuranBelumDibayar);
}
function riwayat_angsuran_id($angsuran_id)
{
    $angsuran_id = explode('|', $angsuran_id);
    $dja_model = new Dja_model();
    $relasi_angsuran_bulan = $dja_model->relation('angsuran', 'id_angsuran', 'bulan_angsuran');
    $output = '';
    for ($i = 0; $i < count($angsuran_id); $i++) {
        $output .= '<label class="badge badge-gradient-success">' . tgl_indo($relasi_angsuran_bulan[$angsuran_id[$i]]) . '</label>';
    }
    return $output;
}
function total_angsuran_perbulan($angsuran)
{
    $totalAngsuran = 0;
    foreach ($angsuran as $ak => $av) {
        $totalAngsuran += $av->nominal_angsuran;
    }
    return $totalAngsuran;
}
function add_notification($values)
{
    $db = \Config\Database::connect();
    foreach ($values as $key => $value) {
        $data[$key] = $value;
    }
    $builder = $db->table('notifikasi');
    $builder->insert($data);

    if ($values['user_notifikasi'] == 'all') {
        $builder = $db->table('anggota');
        $builder->replace(['anggota_notifikasi' => 1]);
    } else {
        $builder = $db->table('anggota');
        $builder->where(['id_anggota' => $values['user_notifikasi']])->replace(['anggota_notifikasi' => 1]);
    }
}
function get_data_koperasi()
{
    $data = file_get_contents('backup_db/pengaturan.json');
    return json_decode($data, true);
}
