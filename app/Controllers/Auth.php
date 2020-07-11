<?php

namespace App\Controllers;

use App\Models\Dja_model;
use CodeIgniter\API\ResponseTrait;


class Auth extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->dja_model = new Dja_model();
    }
    public function index()
    {
        if (is_login()) {
            return redirect()->route('dashboard');
        }
        helper('cookie');

        return view('auth/login');
    }
    public function login()
    {
        // Create a new class with the model function
        $Auth_model = model('App\Models\Auth_model', false);
        // load session library
        if ($dataRequest = $this->request->getVar()) {
            $user = $Auth_model->where(['gmail_anggota' => $dataRequest['gmail_anggota']])->first();
            if ($user) {
                if (password_verify($dataRequest['password_anggota'], $user['password_anggota'])) {
                    $sessionUser = [
                        'id_anggota' => $user['id_anggota'],
                        'logged_in' => 1
                    ];
                    // set session
                    $this->session->set($sessionUser);
                    $output = 'true';
                    return $this->setResponseFormat('json')->respond($output);
                } else {
                    $output = 'wrong-pass';
                    return $this->setResponseFormat('json')->respond($output);
                }
            } else {
                $output = 'no-gmail';
                return $this->setResponseFormat('json')->respond($output);
            }
        }
    }
    public function logout()
    {
        if (!is_login()) {
            return redirect()->route('login');
        }
        // delete session
        $session = session();
        $session->remove(['id_anggota', 'logged_in']);
        return redirect()->route('login');
    }

    //--------------------------------------------------------------------

}
