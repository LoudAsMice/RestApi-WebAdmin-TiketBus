<?php

namespace App\Controllers;

class Ubah extends BaseController
{
    public function index()
    {
        return redirect()->to('admin');
    }

    public function asal()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $data = [
            'judul' => 'Ubah Kota Asal',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('asal')->getWhere(['id' => $uri->getSegment(3)])->getRowArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('master/ubahasal', $data);
            echo view('templates/footer');
        } else {
            return $this->_asal();
        }
    }

    private function _asal()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $rules = [
            'asal' => 'required'
        ];

        $messages = [
            'asal' => [
                'required' => 'Harus Diisi'
            ]
        ];

        if(!$this->validate($rules, $messages)){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal!</div>');
            return redirect()->back()->withInput();
        } else {
            $db->table('asal')->set($this->request->getPost())->where(['id' => $uri->getSegment(3)])->update();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil diubah</div>');
            return redirect()->to('master/asal');
        }
    }

    public function tujuan()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $data = [
            'judul' => 'Ubah Kota Tujuan',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('tujuan')->getWhere(['id' => $uri->getSegment(3)])->getRowArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('master/ubahtujuan', $data);
            echo view('templates/footer');
        } else {
            return $this->_tujuan();
        }
    }

    private function _tujuan()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $rules = [
            'tujuan' => 'required'
        ];

        $messages = [
            'tujuan' => [
                'required' => 'Harus Diisi'
            ]
        ];

        if(!$this->validate($rules, $messages)){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal!</div>');
            return redirect()->back()->withInput();
        } else {
            $db->table('tujuan')->set($this->request->getPost())->where(['id' => $uri->getSegment(3)])->update();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil diubah</div>');
            return redirect()->to('master/tujuan');
        }
    }

    public function member()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $data = [
            'judul' => 'Ubah Kota Tujuan',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('user')->getWhere(['id' => $uri->getSegment(3)])->getRowArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('master/ubahmember', $data);
            echo view('templates/footer');
        } else {
            return $this->_member();
        }
    }

    private function _member()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email'
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama Harus Diisi'
            ],
            'email' => [
                'required' => 'Email Harus Diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ];

        if(!$this->validate($rules, $messages)){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal!</div>');
            return redirect()->back()->withInput();
        } else {
            $db->table('user')->set($this->request->getPost())->where(['id' => $uri->getSegment(3)])->update();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil diubah</div>');
            return redirect()->to('master/member');
        }
    }

    public function jadwal()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $data = [
            'judul' => 'Ubah Kota Tujuan',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('tiketbus')->getWhere(['id' => $uri->getSegment(3)])->getRowArray(),
            'asal' => $db->table('asal')->get()->getResultArray(),
            'tujuan' => $db->table('tujuan')->get()->getResultArray()
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('transaksi/ubahjadwal', $data);
            echo view('templates/footer');
        } else {
            return $this->_jadwal();
        }
    }

    private function _jadwal()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
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

        if(!$this->validate($rules, $messages)){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal!</div>');
            return redirect()->back()->withInput();
        } else {
            $db->table('tiketbus')->set($this->request->getPost())->where(['id' => $uri->getSegment(3)])->update();
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil diubah</div>');
            return redirect()->to('transaksi/penjadwalan');
        }
    }

    public function sudah()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('tiket')->where(['id' => $uri->getSegment(3)])->set(['status' => 'Sudah Bayar'])->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Status berhasil diubah</div>');
        return redirect()->back();
    }

    public function belum()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $db ->table('tiket')->where(['id' => $uri->getSegment(3)])->set(['status' => 'Belum Bayar'])->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Status berhasil diubah!</div>');
        return redirect()->back();
    }

    public function password()
    {
        $db = \Config\Database::connect();
        $uri = service('uri');
        $data = [
            'judul' => 'Ubah Password',
            'user' => $db->table('admin')->getWhere(['username' => session('username')])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'data' => $db->table('admin')->getWhere(['id' => session('id')])->getRowArray(),
        ];

        if(!$this->request->getPost()){
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('admin/ubahpassword', $data);
            echo view('templates/footer');
        } else {
            return $this->_password();
        }
    }

    private function _password()
    {
        $db = \Config\Database::connect();
        $data = $db->table('admin')->getWhere(['id' => session('id')])->getRowArray();

        $rules = [
            'lama' => 'required',
            'baru' => 'required',
            'konfirmasi' => 'required|matches[baru]'
        ];

        $messages = [
            'lama' => [
                'required' => 'Password lama harus diisi'
            ],
            'baru' => [
                'required' => 'Password baru harus diisi'
            ],
            'konfirmasi' => [
                'required' => 'Konfirmasi password harus diisi',
                'matches' => 'Password tidak sama'
            ]
        ];

        if(!$this->validate($rules, $messages)){
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal!</div>');
            return redirect()->back()->withInput();
        } else {
            $lama = md5($this->request->getPost('lama'));
            $baru = md5($this->request->getPost('baru'));

            if($lama == $data['password']){
                $db->table('admin')->set(['password' => $baru])->update();
                session()->setFlashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password berhasil diubah</div>');
                return redirect()->to('admin');
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal, Password lama tidak valid!</div>');
                return redirect()->back();
            }
        }
    }
}