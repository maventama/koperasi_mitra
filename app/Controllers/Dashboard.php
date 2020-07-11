<?php

namespace App\Controllers;

use App\Models\Dja_model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Dashboard extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        helper([
            'general_helper'
        ]);

        $this->_page = 'dashboard';
        $this->_menu = 'dashboard';
        $this->_judul = 'Dashboard';
        $this->dja_model = new Dja_model();
    }
    public function index()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('dashboard', 'view')) {
            return view('errors/html/error_404');
        }
        $data = [
            'page' => "$this->_page/dashboard",
            'js' => "$this->_page/dashboard_js",
            'judul' => $this->_judul,
            'menu' => $this->_menu
        ];
        return $this->page_table($data);
    }
    public function data_card()
    {
        if (!has_permission('dashboard', 'view')) {
            return view('errors/html/error_404');
        }
        // get tahun ini
        $tahun_iuran = $this->dja_model->get_single('tahun_iuran', ['tahun_iuran' => intval(date('Y'))]);
        // get bulan iuran
        $bulan_iuran = $this->dja_model->get_single('bulan_iuran', ['tahun_id' => $tahun_iuran->id_tahun_iuran, 'bulan_iuran' => strval(intval(date('m')))]);
        // get iuran wajib
        $iuran_wajib = $this->dja_model->get_where_result('iuran_wajib', ['bulan_id' => $bulan_iuran->bulan_iuran]);
        // total iuran wajib bulan ini
        $totalIuranWajibBulanIni = 0;
        // get peminjaman
        $peminjamanBerlangsung = $this->dja_model->get_where_result('peminjaman', ['status_peminjaman' => 1]);
        $output = [
            nominal_rupiah($totalIuranWajibBulanIni),
            count($peminjamanBerlangsung)
        ];
        return $this->setResponseFormat('json')->respond($output);
    }
    public function data_grafik_batang()
    {
        if (!has_permission('dashboard', 'view')) {
            return view('errors/html/error_404');
        }
        // bikin array 12 bulan 
        $bulanNomor = [
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07',
            '08',
            '09',
            '10',
            '11',
            '12'
        ];
        $bulan = [
            'JAN',
            'FEB',
            'MAR',
            'APR',
            'MEI',
            'JUN',
            'JUL',
            'AGU',
            'SEP',
            'OKT',
            'NOV',
            'DES'
        ];
        $output = [
            "labels" => $bulan,
            "datasets" => []
        ];
        // objek label : nama, data :[]
        $angsuranLunas = $this->dja_model->get_where_result('angsuran', ['status_angsuran' => 3], 'id_angsuran', 'ASC');
        $bulanContain = [
            'label' => 'Angsuran sudah bayar',
            'data' => []
        ];
        // echo '<pre>';
        for ($i = 0; $i < count($bulanNomor); $i++) {
            $angsuranBulanNomor = $this->dja_model->get_where_like('angsuran', ['bulan_angsuran' => date('Y') . '-' . $bulanNomor[$i]]);
            $bulanContain['data'][] = total_angsuran_perbulan($angsuranBulanNomor);
        }
        $output['datasets'][] = $bulanContain;
        return $this->setResponseFormat('json')->respond($output);
    }
    public function data_grafik_pie()
    {
        if (!has_permission('dashboard', 'view')) {
            return view('errors/html/error_404');
        }
        // untuk grafik orang yang sudah dan belum dayar iuran wajib bulan ini
        $tahunIuran = $this->dja_model->get_single('tahun_iuran', ['tahun_iuran' => date('Y')]);
        $bulanIuran = $this->dja_model->get_single('bulan_iuran', ['bulan_iuran' => 8, 'tahun_id' => $tahunIuran->id_tahun_iuran]);
        $anggotaSudahBayar = get_anggota_iuran_wajib($bulanIuran->id_bulan_iuran);
        $anggota = $this->dja_model->get_all('anggota');
        $anggotaBelumBayar = [];
        foreach ($anggota as $ak => $av) {
            if (!in_array($av->id_anggota, $anggotaSudahBayar)) {
                $anggotaBelumBayar[] = $av->id_anggota;
            }
        }
        $output = [
            count($anggotaSudahBayar),
            count($anggotaBelumBayar)
        ];
        return $this->setResponseFormat('json')->respond($output);
    }

    //--------------------------------------------------------------------

}
