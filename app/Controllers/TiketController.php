<?php

namespace App\Controllers;

use App\Models\TiketbusModel;
use App\Models\TiketModel;
use CodeIgniter\API\ResponseTrait;

class TiketController extends BaseController
{
    use ResponseTrait;

    public function cek()
    {
        $model = new TiketbusModel();
        $asal = $this->request->getPost('asal');
        $tujuan = $this->request->getPost('tujuan');
        $tanggal = $this->request->getPost('tanggal');

        $tiket = $model->cekTiket(['asal' => $asal, 'tujuan' => $tujuan, 'tanggal' => $tanggal])->getResultArray();
    
        $data = [
            'code' => 200,
            'status' => true,
            'data' => $tiket
        ];

        return $this->respond($data);
    }

    public function pesan()
    {
        $model = new TiketModel();
        $data = $this->request->getPost();
        $db = \Config\Database::connect();

        if(!$model->save($data)){
            return $this->fail($model->errors());
        }else{
            $id = $db->table('tiket')->getWhere($data)->getRowArray();
            $data = [
                'code' => 200,
                'status' => true,
                'id' => $id['id'],
                'data' => $data
            ];

            $idtiket = intval($this->request->getPost('id_tiketbus'));
            $jumlah = intval($this->request->getPost('jumlah'));
            $tiket = $db->table('tiketbus')->getWhere(['id' => $idtiket])->getRowArray();
            $tiketbus = $tiket['tersedia'];
            $total = $tiketbus - $jumlah;
            $db->table('tiketbus')->set('tersedia', $total)->where(['id' => $idtiket])->update();

            return $this->respond($data, 200);
        }
    }

    public function tiketku()
    {
        $data = $this->request->getPost();
        $db = \Config\Database::connect();
        $get = $db->table('tiket')->orderBy('status', 'ASC')->getWhere($data)->getResultArray();

        $send = [
            'code' => 200,
            'status' => true,
            'data' => $get
        ];

        return $this->respond($send, 200);
    }

    public function cetak()
    {
        $db = \Config\Database::connect();
        $iduser = $this->request->getPost();
        $get = $db->table('tiket')->getWhere(['id_user' => $iduser, 'status' => 'Sudah Bayar'])->getResultArray();

        $data = [
            'code' => 200,
            'status' => true,
            'data' => $get
        ];

        return $this->respond($data, 200);
    }

    public function cektiket()
    {
        $db = \Config\Database::connect();
        $cek = $this->request->getPost();
        $get = $db->table('tiket')->getWhere($cek)->getRowArray();
        $data = [
            'code' => 200,
            'status' => true,
            'data' => $get
        ];
        return $this->respond($data, 200);
    }

    public function batal()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $cek = $db->table('tiket')->getWhere(['id' => $id, 'nama' => $nama])->getRowArray();
        $tiketbus = $db->table('tiketbus')->getWhere(['id' => $cek['id_tiketbus']])->getRowArray();
        $total = intval($tiketbus['tersedia']) + intval($cek['jumlah']);
        if($cek == null){
            $data1 = [
                'code' => 400,
                'status' => false,
                'messages' => 'Gagal dibatalkan'
            ];
            return $this->respond($data1, 400);
        } else {
            $db->table('tiket')->where(['id' => $id, 'nama' => $nama])->delete();
            $db->table('tiketbus')->set('tersedia', $total)->where(['id' => $cek['id_tiketbus']])->update();
            $data = [
                'code' => 200,
                'status' => true,
                'messages' => 'Berhasil dibatalkan'
            ];

            return $this->respond($data, 200);
        }
    }
}