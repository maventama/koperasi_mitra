<?php

namespace App\Controllers;

class Pengaturan extends BaseController
{
    protected $_judul = 'Pengaturan';
    function __construct()
    {
    }
    public function index()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('pengaturan', 'view')) {
            return view('errors/html/error_404');
        }
        $pengaturanLama = json_decode(file_get_contents('backup_db/pengaturan.json'), true);
        $data = [
            'page' => 'pengaturan/page',
            // 'js' => 'pengaturan/table_js',
            'menu' => 'pengaturan',
            'judul' => $this->_judul,
            'data_lain' => [
                'pengaturan' => $pengaturanLama
            ]
        ];
        if ($dataUser = $this->request->getPost()) {
            $pengaturan = [
                'nama' => $dataUser['nama'],
                'alamat' => $dataUser['alamat']
            ];
            if ($file = $this->request->getFile('logo')) {
                if ($file->isValid()) {
                    $arrayValidate = [];
                    $arrayValidate['logo'] = 'uploaded[' . 'logo' . ']|ext_in[' . 'logo' . ',' . 'jpg,png,jpe,JPG,JPEG,gif' . ']|max_size[' . 'logo' . ',' . '9999999' . ']';
                    $validated = $this->validate($arrayValidate);
                    if ($validated) {
                        $file->move(FCPATH . '/uploads/pengaturan/');
                        $nama_file = $file->getName();
                    } else {
                        alertBootstrap([
                            'name' => 'error-file',
                            'message' => $file->getErrorString(),
                            'type' => 'danger'
                        ]);
                        return redirect()->back()->withInput();
                    }
                }
            }
            if (isset($nama_file)) {
                $pengaturan['logo'] = $nama_file;
            } else {
                $pengaturan['logo'] = $pengaturanLama['logo'];
            }
            $res = write_file('backup_db/pengaturan.json', json_encode($pengaturan));
            if ($res) {
                redirect()->route('pengaturan');
            }
        }
        return $this->page_table($data);
    }

    //--------------------------------------------------------------------

}
