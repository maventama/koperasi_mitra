<?php

namespace App\Controllers;

class Me extends BaseController
{
    protected $_judul = 'Akun saya';
    protected $_menu = 'me';

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
    }

    public function index()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('me', 'view')) {
            return view('errors/html/error_404');
        }
        $array = [
            'page' => "anggota/form",
            'menu' => $this->_menu,
            'judul' => $this->_judul,
            'field' => 'id_anggota',
            'load' => 'layout',
            'table' => 'anggota',
            'id' => get_user_id(),
            'data_lain' => [
                'jk' => $this->_jk,
                'role' => $this->_role
            ],
            'redirect_true' => 'me',
            'redirect_false' => 'me'
        ];
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

    //--------------------------------------------------------------------

}
