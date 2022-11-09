<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ['nama', 'email', 'password'];

    protected $validationRules = [
        'nama' => 'required',
        'email' => 'required|valid_email',
        'password' => 'required'
    ];
    protected $validationMessages = [
        'nama' => [
            'required' => 'Silahkan masukkan nama'
        ],
        'email' => [
            'required' => 'Silahkan masukkan email',
            'valid_email' => 'Email yang dimasukkan tidak valid'
        ],
        'password' => [
            'required' => 'Silahkan masukkan password'
        ]
    ];

    public function cekData($where = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        return $builder->getWhere($where);
    }

    public function simpanData($data = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        return $builder->insert($data);
    }
}