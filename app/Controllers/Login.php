<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Halaman Login',
            'validation' => \Config\Services::validation()
        ];
        if(!$this->request->getPost()) {
            echo view('templates/aute_header', $data);
            echo view('autentifikasi/login', $data);
            echo view('templates/aute_footer');
        } else {
            return $this->_login();
        }
    }
    
    private function _login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        $admin = $model->cekData(['username' => $username])->getRowArray();
        $rules=[
            'username' => 'required|trim|',
            'password' => 'required|trim|' 
        ]; 
        
        $messages=[
            'username' => [
                'required' => 'Username Harus diisi!',
            ], 
            'password' =>[
                'required' => 'Password Harus diisi',
            ]
        ];
        if($this->validate($rules, $messages)){
            if($admin){
                if($password == $admin['password']){
                    $data = [
                        'id' => $admin['id'],
                        'username' => $admin['username']
                    ];
                    session()->set($data);
                    return redirect()->to('admin');
                } else {
                    session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email/Password salah!</div>');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak ditemukan</div>');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function gagal()
    {
        return view('autentifikasi/gagal');
    }

    public function blok()
    {
        return view('autentifikasi/blok');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}