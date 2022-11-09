<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if(!session('username')){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak, anda belum login!</div>');
            return redirect()->to('login/gagal');
        }
        
        $db = \Config\Database::connect();

        $data = [
            'judul' => 'Admin Panel',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('admin/index', $data);
        echo view('templates/footer');
    }
}