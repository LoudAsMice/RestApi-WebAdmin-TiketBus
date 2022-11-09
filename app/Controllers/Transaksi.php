<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index()
    {
        return redirect()->to('admin');
    }

    public function penjadwalan()
    {
        if(!session('username')){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak, anda belum login!</div>');
            return redirect()->to('login/gagal');
        }

        $db = \Config\Database::connect();

        $data = [
            'judul' => 'Jadwal',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'jadwal' => $db->table('tiketbus')->get()->getResultArray(),
            'asal' => $db->table('asal')->get()->getResultArray(),
            'tujuan' => $db->table('tujuan')->get()->getResultArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('transaksi/penjadwalan', $data);
            echo view('templates/footer');
        } else {
            return $this->_jadwal();
        }
    }

    private function _jadwal()
    {
        $db = \Config\Database::connect();

        $rules = [
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'harga' => 'required',
            'tersedia' => 'required'
        ];

        $messages = [
            'asal' => [
                'required' => 'Kota asal harus diisi'
            ],
            'tujuan' => [
                'required' => 'Kota tujuan harus diisi'
            ],
            'tanggal' => [
                'required' => 'Tanggal harus diisi'
            ],
            'jam' => [
                'required' => 'Jam harus diisi'
            ],
            'harga' => [
                'required' => 'Harga harus diisi'
            ],
            'tersedia' => [
                'required' => 'Maximum seat harus diisi'
            ]
        ];

        if(!$this->validate($rules, $messages)) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menambah!</div>');
            redirect()->to('login');
            return redirect()->back()->withInput();
        } else {
            $db->table('tiketbus')->set($this->request->getPost())->insert();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil menambah!</div>');
            return redirect()->back();
        }
    }

    public function pemesanan()
    {
        if(!session('username')){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak, anda belum login!</div>');
            return redirect()->to('login/gagal');
        }

        $db = \Config\Database::connect();

        $data = [
            'judul' => 'Jadwal',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('tiket ')->get()->getResultArray(),
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('transaksi/pemesanan', $data);
            echo view('templates/footer');
        } else {
            return $this->_jadwal();
        }
    }
}
