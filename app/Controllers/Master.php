<?php

namespace App\Controllers;

class Master extends BaseController
{
    public function index()
    {
        return redirect()->to('master/asal');
    }

    public function asal()
    {
        if(!session('username')){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak, anda belum login!</div>');
            return redirect()->to('login/gagal');
        }

        $db = \Config\Database::connect();

        $data = [
            'judul' => 'Kota Asal',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'asal' => $db->table('asal')->get()->getResultArray()
        ];
        
        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('master/asal', $data);
            echo view('templates/footer');
        } else {
            return $this->_asal();
        }
    }

    private function _asal()
    {
        $db = \Config\Database::connect();
        $rules = [
            'asal' => 'required'
        ];

        $messages = [
            'asal' => [
                'required' => 'Harus Diisi'
            ]
        ];
        
        if(!$this->validate($rules, $messages)) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menambah!</div>');
            return redirect()->back()->withInput();
        } else {
            $db->table('asal')->set($this->request->getPost())->insert();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil ditambah</div>');
            return redirect()->back();
        }
    }

    public function tujuan()
    {
        if(!session('username')){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak, anda belum login!</div>');
            return redirect()->to('login/gagal');
        }

        $db = \Config\Database::connect();

        $data = [
            'judul' => 'Kota Tujuan',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'tujuan' => $db->table('tujuan')->get()->getResultArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('master/tujuan', $data);
            echo view('templates/footer');
        } else {
            return $this->_tujuan();
        }
    }

    private function _tujuan()
    {
        $db = \Config\Database::connect();
        $rules = [
            'tujuan' => 'required'
        ];

        $messages = [
            'tujuan' => [
                'required' => 'Harus Diisi'
            ]
        ];
        
        if(!$this->validate($rules, $messages)) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menambah!</div>');
            return redirect()->back()->withInput();
        } else {
            $db->table('tujuan')->set($this->request->getPost())->insert();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil ditambah</div>');
            return redirect()->back();
        }
    }

    public function member()
    {
        if(!session('username')){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak, anda belum login!</div>');
            return redirect()->to('login/gagal');
        }

        $db = \Config\Database::connect();

        $data = [
            'judul' => 'Data Member',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('user')->get()->getResultArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('master/member', $data);
            echo view('templates/footer');
        } else {
            return $this->_tujuan();
        }
    }
}