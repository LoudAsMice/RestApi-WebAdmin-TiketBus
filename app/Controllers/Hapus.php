<?php

namespace App\Controllers;

class Hapus extends BaseController
{
    public function index()
    {
        return redirect()->to('admin');
    }

    public function asal()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('asal')->where(['id' => $uri->getSegment(3)])->delete();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil dihapus</div>');
        return redirect()->back();
    }

    public function tujuan()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('tujuan')->where(['id' => $uri->getSegment(3)])->delete();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil dihapus</div>');
        return redirect()->back();
    }

    public function member()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('user')->where(['id' => $uri->getSegment(3)])->delete();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil dihapus</div>');
        return redirect()->back();
    }

    public function jadwal()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('tiketbus')->where(['id' => $uri->getSegment(3)])->delete();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil dihapus</div>');
        return redirect()->back();
    }

    public function pemesanan()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('tiket')->where(['id' => $uri->getSegment(3)])->delete();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil dihapus</div>');
        return redirect()->back();
    }
}