<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;

class Auth extends ResourceController
{

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        helper(['form']);
        session();

        $data = [
            'title' => 'Registration',
            'validation' => \Config\Services::validation()
        ];
        return view('registration', $data);
    }

    public function save()
    {

        $validation = \Config\Services::validation();
        if (!$this->validate([
            'fullname' => 'min_length[3]',
            'phone' => 'numeric|min_length[11]',
            'email' => 'is_unique[users.email]valid_email',
            'password' => 'min_length[6]'
        ])) {
            return redirect()->to('/')->withInput()->with('validation', $validation);
        } else {
            $user = new UserModel();
            $register = [
                'fullname' => $this->request->getVar('fullname'),
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ];
            $user->save($register);
            session()->setFlashdata('pesan','<div class="alert alert-success" id="flashdata">Successful Registration. Please Login!</div>');
            return redirect()->to('/login');
        }
    }
    public function login()
    {
        helper(['form']);
        $session = session();
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('login', $data);
    }
    public function cekLogin()
    {
        $session = session();
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            return redirect()->to('/login')->withInput()->with('validation', $validation);
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = new UserModel();
            $cek_user = $user->where('email', $email)->first();

            if ($cek_user) {
                if (password_verify($password, $cek_user['password'])) {
                    $time = time();
                    $exp = 360;
                    $exptime = $time+$exp;
                    $secretKey = getenv('KEY');
                    $payload = [
                        'iat' => $time,
                        'exp' => $exptime,
                        'uid' => $cek_user['id'],
                        'email' => $cek_user['email']
                    ];

                    $token = JWT::encode($payload, $secretKey, 'HS256');
                    $data = [
                        'email' => $cek_user['email'],
                        'token' => $token
                    ];
                    $session->set($data);
                    return redirect()->to('posting');
                } else {
                    session()->setFlashdata('pesan','<div class="alert alert-danger" id="flashdata">Password Salah</div>');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('pesan','<div class="alert alert-danger" id="flashdata">Email tidak terdaftar</div>');
                return redirect()->to('/login');
            }
            
        }
    }
    public function logout(){
        $session = \Config\Services::session();
        $session->destroy('email');
        session()->setFlashdata('pesan','<div class="alert alert-success" id="flashdata">Berhasil Logout</div>');
        return redirect()->to('/login');
    }
}
