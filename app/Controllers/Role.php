<?php

namespace App\Controllers;

use App\Models\Dja_model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Role extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        helper([
            'general_helper'
        ]);

        $this->_page = 'role';
        $this->_menu = 'role';
        $this->_judul = 'Role';
        $this->dja_model = new Dja_model();
        $this->_col_table = [
            'nama_role' => [
                'title' => 'Nama Role',
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
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('role', 'view')) {
            return view('errors/html/error_404');
        }
        $data = [
            'page' => "$this->_page/table",
            'js' => "$this->_page/table_js",
            'judul' => $this->_judul,
            'menu' => $this->_menu,
            'data_lain' => [
                'table_role' => table_head($this->_col_table, 'class="table table-hover table-role"'),
            ]
        ];
        return $this->page_table($data);
    }
    public function table_role()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('role', 'view')) {
            return view('errors/html/error_404');
        }
        $role = $this->db->table('role')->get()->getResult();
        $data = [];
        foreach ($role as $rk => $rv) {
            $row = [];
            $row[] = $rv->nama_role;
            $btn = '';
            if (has_permission('role', 'del')) {
                $btn .= '<button class="btn btn-danger btn-del mr-2" data-id="' . base64_encode($rv->id_role) . '">
                                                <i class="mdi mdi-delete"></i>
                                            </button>';
            }
            if (has_permission('role', 'edit')) {
                $btn .= '<a href="/role/form/' . base64_encode($rv->id_role) . '" class="btn btn-warning btn-edit" data-id="' . base64_encode($rv->id_role) . '">
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
    public function form($id_role = '')
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('role', 'add')) {
            return view('errors/html/error_404');
        }
        $array = [
            'page' => "role/form",
            'menu' => "role",
            'judul' => 'Form ' . $this->_judul,
            'field' => 'id_role',
            'load' => 'layout',
            'table' => 'role',
            'redirect_true' => 'role',
            'redirect_false' => 'role',
            'data_lain' => [
                'modul' => [
                    'dashboard' => 'Dashboard',
                    'me' => 'Akun',
                    'anggota' => 'Anggota',
                    'iuran_wajib' => 'Iuran Wajib',
                    'peminjaman' => 'Peminjaman',
                    'role' => 'Role',
                    'pengaturan' => 'Pengaturan',
                ]
            ]
        ];
        if ($id_role) {
            $array['id'] = base64_decode($id_role);
            $id_role = base64_decode($id_role);
            $singleRole = $this->dja_model->get_single('role', ['id_role' => $id_role]);
            if ($singleRole) {
                // get rolep
                $rolep = $this->dja_model->get_where_result('role_permission', ['role_id' => $id_role]);
                $dataRole = [];
                foreach ($rolep as $rk => $rv) {
                    $dataRole[$rv->menu_rolep] = [];
                    if ($rv->view_rolep) {
                        $dataRole[$rv->menu_rolep][] = 'view';
                    }
                    if ($rv->add_rolep) {
                        $dataRole[$rv->menu_rolep][] = 'add';
                    }
                    if ($rv->edit_rolep) {
                        $dataRole[$rv->menu_rolep][] = 'edit';
                    }
                    if ($rv->del_rolep) {
                        $dataRole[$rv->menu_rolep][] = 'del';
                    }
                }
                $array['data_lain']['data_role'] = $dataRole;
            }
        }
        if ($dataUser = $this->request->getVar()) {

            $saveRole = [
                'nama_role' => $dataUser['nama_role']
            ];
            $rolePermission = $dataUser['permission'];
            if ($id_role) {
                $this->dja_model->updateData('role', $saveRole, ['id_role' => $id_role]);
                $singleRole = $this->dja_model->get_single('role', ['id_role' => $id_role]);
                $rolePermissionLama = $this->dja_model->get_where_result('role_permission', ['role_id' => $singleRole->id_role]);
                $rolepLama = [];
                foreach ($rolePermissionLama as $rplk => $rplv) {
                    $rolepLama[] = $rplv->menu_rolep;
                }
                $rolepTerbaru = [];
                foreach ($rolePermission as $rpk => $rpv) {
                    $rolepTerbaru[] = $rpk;
                }
                for ($i = 0; $i < count($rolepLama); $i++) {
                    if (!in_array($rolepLama[$i], $rolepTerbaru)) {
                        $rolepDelete = $this->dja_model->get_single('role_permission', ['role_id' => $id_role, 'menu_rolep' => $rolepLama[$i]]);
                        $res_del = $this->dja_model->deleteData('role_permission', ['role_id' => $id_role, 'menu_rolep' => $rolepLama[$i]]);
                        if ($res_del) {
                            $backup_rolep = [
                                $rolepDelete->id_rolep => [
                                    "id_rolep" => $rolepDelete->id_rolep,
                                    "role_id" => $rolepDelete->role_id,
                                    "menu_rolep" => $rolepDelete->menu_rolep,
                                    "view_rolep" => $rolepDelete->view_rolep,
                                    "add_rolep" => $rolepDelete->add_rolep,
                                    "edit_rolep	" => $rolepDelete->edit_rolep,
                                    "del_rolep" => $rolepDelete->del_rolep,
                                ]
                            ];
                            $this->dja_model->backup_delete('role_permission', $backup_rolep);
                        }
                    }
                }
                foreach ($rolePermission as $rpk => $rpv) {
                    if (!in_array($rpk, $rolepLama)) {
                        // jika ada role baru
                        $saveRolePermission = [];
                        $saveRolePermission['role_id'] = $singleRole->id_role;
                        $saveRolePermission['menu_rolep'] = $rpk;
                        if (array_key_exists('view', $rpv)) {
                            $saveRolePermission['view_rolep'] = 1;
                        }
                        if (array_key_exists('add', $rpv)) {
                            $saveRolePermission['add_rolep'] = 1;
                        }
                        if (array_key_exists('edit', $rpv)) {
                            $saveRolePermission['edit_rolep'] = 1;
                        }
                        if (array_key_exists('del', $rpv)) {
                            $saveRolePermission['del_rolep'] = 1;
                        }
                        $res = $this->dja_model->addData('role_permission', $saveRolePermission);
                        if ($res) {
                            alertBootstrap([
                                'name' => 'crud-flashdata',
                                'type' => 'success',
                                'message' => 'Role berhasil diubah'
                            ]);
                        }
                    } else {
                        // cek di role lama, ada perubahan atau tidak
                        // jika ada role lama
                        $singleRoleLama = $this->dja_model->get_single('role_permission', ['role_id' => $id_role, 'menu_rolep' => $rpk]);
                        $updateRolePermission = [];
                        $updateRolePermission['role_id'] = $singleRole->id_role;
                        $updateRolePermission['menu_rolep'] = $rpk;
                        if (array_key_exists('view', $rpv)) {
                            $updateRolePermission['view_rolep'] = 1;
                        } else {
                            $updateRolePermission['view_rolep'] = 0;
                        }
                        if (array_key_exists('add', $rpv)) {
                            $updateRolePermission['add_rolep'] = 1;
                        } else {
                            $updateRolePermission['add_rolep'] = 0;
                        }
                        if (array_key_exists('edit', $rpv)) {
                            $updateRolePermission['edit_rolep'] = 1;
                        } else {
                            $updateRolePermission['edit_rolep'] = 0;
                        }
                        if (array_key_exists('del', $rpv)) {
                            $updateRolePermission['del_rolep'] = 1;
                        } else {
                            $updateRolePermission['del_rolep'] = 0;
                        }
                        $res = $this->dja_model->updateData('role_permission', $updateRolePermission, ['id_rolep' => $singleRoleLama->id_rolep]);
                        if ($res) {
                            alertBootstrap([
                                'name' => 'crud-flashdata',
                                'type' => 'success',
                                'message' => 'Role berhasil diubah'
                            ]);
                        }
                    }
                }
                $rolepbaru = $this->dja_model->get_where_result('role_permission', ['role_id' => $singleRole->id_role]);
                return redirect()->to('/role');
            } else {
                $nidRole = $this->dja_model->addData('role', $saveRole, true);
                foreach ($rolePermission as $rpk => $rpv) {
                    $saveRolePermission = [];
                    $saveRolePermission['role_id'] = $nidRole;
                    $saveRolePermission['menu_rolep'] = $rpk;
                    if (array_key_exists('view', $rpv)) {
                        $saveRolePermission['view_rolep'] = 1;
                    }
                    if (array_key_exists('add', $rpv)) {
                        $saveRolePermission['add_rolep'] = 1;
                    }
                    if (array_key_exists('edit', $rpv)) {
                        $saveRolePermission['edit_rolep'] = 1;
                    }
                    if (array_key_exists('del', $rpv)) {
                        $saveRolePermission['del_rolep'] = 1;
                    }
                    $res = $this->dja_model->addData('role_permission', $saveRolePermission);
                    if ($res) {
                        alertBootstrap([
                            'name' => 'crud-flashdata',
                            'type' => 'success',
                            'message' => 'Role berhasil ditambahkan'
                        ]);
                    }
                }
                return redirect()->to('/role');
            }
        }
        return $this->form_all($array);
    }
    public function delete()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        if (!has_permission('role', 'del')) {
            return view('errors/html/error_404');
        }
        if ($this->request->isAJAX()) {
            $datauser = service('request')->getPost();
            $id_role = base64_decode($datauser['id_role']);
            $role = $this->dja_model->get_single('role', ['id_role' => $id_role]);
            $res = $this->dja_model->deleteData('role', ['id_role' => $id_role]);
            if ($res) {
                $backup_role = [
                    $role->id_role => [
                        "id_role" => $role->id_role,
                        "nama_role" => $role->nama_role,
                    ]
                ];
                $this->dja_model->backup_delete('role', $backup_role);
                $rolep = $this->dja_model->get_where_result('role_permission', ['role_id' => $role->id_role]);
                $res_rolep = $this->dja_model->deleteData('role_permission', ['role_id' => $role->id_role]);
                if ($res_rolep) {
                    foreach ($rolep as $rk => $rv) {
                        $backup_rolep = [
                            $rv->id_rolep => [
                                'id_rolep' => $rv->id_rolep,
                                'role_id' => $rv->role_id,
                                'menu_rolep' => $rv->menu_rolep,
                                'view_rolep' => $rv->view_rolep,
                                'add_rolep' => $rv->add_rolep,
                                'edit_rolep' => $rv->edit_rolep,
                                'del_rolep' => $rv->del_rolep,
                            ]
                        ];
                        $this->dja_model->backup_delete('role_permission', $backup_rolep);
                    }
                }
                return $this->setResponseFormat('json')->respond($res_rolep);
            }
        }
    }
    public function tes()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        $role_file = file_get_contents('backup_db/role_permission.json');
        if ($role_file) {
            echo '<pre>';
            $konten_role_file = json_decode($role_file, true);
            foreach ($konten_role_file as $key => $value) {
                if ($value['role_id'] == '1' && $value['menu_rolep'] == 'dashboard') {
                    var_dump($value['']);
                }
            }
        }
        // }
    }
}
