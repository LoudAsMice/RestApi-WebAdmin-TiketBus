<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelRestful;
use App\Models\UserModel;

class Restful extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        echo 'ok';
    }

    public function register()
    {
        // $data = [
        //     'email' => $this->request->getVar('email'),
        //     'password' => $this->request->getVar('password')
        // ];
        // $this->model->save($data);

        $data = $this->request->getPost();

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil'
            ]
        ];

        return $this->respond($response);
        
    }

}