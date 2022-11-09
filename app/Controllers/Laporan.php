<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data = [
            'judul' => 'Laporan Data',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation()
        ];

        if(!$this->request->getGet()) {
            $data['cari'] = $db->table('tiket')->join('user', 'user.id = tiket.id_user')->getWhere(['status' => 'Sudah Bayar'])->getResultArray();
            $data['text'] = '';

            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('laporan', $data);
            echo view('templates/footer');
        } else {
            $data['cari'] = $db->table('tiket')->join('user', 'user.id = tiket.id_user')->getWhere(['status' => 'Sudah Bayar', 'tanggal >=' => $this->request->getGet('awal'), 'tanggal <=' => $this->request->getGet('akhir')])->getResultArray();
            $data['text'] = 'Laporan Periode ' . $this->request->getGet('awal') . ' s/d ' . $this->request->getGet('akhir');

            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('laporan', $data);
            echo view('templates/footer');
        }
    }
}