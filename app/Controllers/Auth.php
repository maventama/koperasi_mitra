<?php

namespace App\Controllers;

use App\Models\Dja_model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Email\Email;

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
    public function password_reset()
    {
        return view('auth/password_reset');
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
    public function check_gmail()
    {
        if ($datauser = $this->request->getPost()) {
            // $datauser = service('request')->getPost();
            $singleAnggota = $this->dja_model->get_single('anggota', ['gmail_anggota' => $datauser['gmail_anggota']]);
            if ($singleAnggota) {
                // update data anggota

                $token = base64_encode(random_bytes(32));
                $endtoken = date('Y-m-d H:i:s');
                $res = $this->dja_model->updateData('anggota', ['token_password_anggota' => $token, 'end_token_password_anggota' => $endtoken], ['id_anggota' => $singleAnggota->id_anggota]);
                // send gmail
                $email = \Config\Services::email([
                    'fromEmail'
                ]);
                // $email = new Email();
                // echo '<pre>';
                // var_dump($email);
                // die;
                $email->setFrom('fourgrammer@gmail.com', 'Fourgrammer');
                // $email->recipients = 'yogabagas69@gmail.com';
                // echo '<pre>';
                // var_dump($email);
                // die;
                // $email->setHeader('Header1', 'Value1');
                $email->setTo($singleAnggota->gmail_anggota);
                $email->setCC('sandinyasamakok123@gmail.com');
                $email->setBCC('sandinyasamakok123@gmail.com');
                $email->setSubject('Reset Your Password');
                $str_reset = 'Reset password anda <a href="/new_password?email=' . $singleAnggota->gmail_anggota . '?token=' . urlencode($token) . '">disini</a> <br> Berlaku sampai ' . tgl_indo_second($endtoken);
                $email->setMessage($str_reset);
                $config['protocol'] = 'sendmail';
                $config['mailPath'] = '/usr/sbin/sendmail';
                $config['charset']  = 'iso-8859-1';
                $config['wordWrap'] = true;

                $email->initialize($config);
                $email->send();
                echo '<pre>';
                var_dump($email->printDebugger());
                die;
                alertBootstrap([
                    'type' => 'success',
                    'name' => 'alert-set-password',
                    'message' => 'Cek E-mail anda, kami telah mengirim url untuk mengganti password'
                ]);
            } else {
                alertBootstrap([
                    'type' => 'danger',
                    'message' => 'E-mail anda tidak terdafar didalam sistem',
                    'name' => 'alert-set-password'
                ]);
            }
            redirect()->route('password_reset');
        }
    }
    //--------------------------------------------------------------------

}
