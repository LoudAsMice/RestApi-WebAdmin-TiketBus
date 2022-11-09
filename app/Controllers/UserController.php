<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

Class UserController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    public function login()
    {
        $db = \Config\Database::connect();
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $user = $db->table('user')->getWhere(['email' => $email])->getRowArray();

        if($user)
        {
            if($password == $user['password'])
            {
                $data = [
                    'code' => 200,
                    'status' => true,
                    'data' => [
                        'token' => $this->RandomString(),
                        'user' => [
                            'id' => intval($user["id"]),
                            'email' => $user['email']
                        ]
                    ]
                ];
                return $this->respond($data, 200);
            } else {
                $data = [
                    'code' => 400,
                    'status' => false,
                    'data' => 'password tidak valid'
                ];
                return $this->respond($data, 400);
            }
        } else {
            $data = [
                'code' => 400,
                'status' => false,
                'data' => 'email tidak ditemukan'
            ];
            return $this->respond($data, 400);
        }


    }

    public function register()
    {
        $model = new UserModel();
        // $nama = $this->request->getPost('nama');
        // $email = $this->request->getPost('email');
        // $password = $this->request->getPost('password');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password'))
        ];

        if(!$model->save($data)){
            return $this->fail($model->errors());
        } else {
            $data = [
                'code' => 200,
                'status' => true,
                'messages' => 'data berhasil ditambah'
            ];
            return $this->respond($data, 200);
        }
        
        
    }

    private function RandomString($length = 100)
    {
        $karakter = 
        '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakter);
        $str = '';
        for ($i = 0; $i < $length; $i++){
            $str .= $karakter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }
}