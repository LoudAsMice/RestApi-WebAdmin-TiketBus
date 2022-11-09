<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = "tiket";
    protected $primaryKey = "id";
    protected $allowedFields = ['id_user', 'id_tiketbus', 'nama', 'hp', 'jumlah', 'asal', 'tujuan', 'tanggal', 'jam', 'satuan', 'total'];

    protected $validationRules = [
        'id_user' => 'required',
        'id_tiketbus' => 'required',
        'nama' => 'required',
        'hp' => 'required|numeric',
        'jumlah' => 'required',
        'asal' => 'required',
        'tujuan' => 'required',
        'tanggal' => 'required',
        'jam' => 'required',
        'satuan' => 'required',
        'total' => 'required'
    ];
    protected $validationMessages = [
        'id_user' => [
            'required' => 'id_user harus diisi'
        ],
        'id_tiketbus' => [
            'required' => 'id_tiket harus diisi'
        ],
        'nama' => [
            'required' => 'nama harus diisi'
        ],
        'hp' => [
            'required' => 'hp harus diisi',
            'numeric' => 'harus angka'
        ],
        'jumlah' => [
            'required' => 'jumlah harus diisi'
        ],
        'asal' => [
            'required' => 'asal harus diisi'
        ],
        'tujuan' => [
            'required' => 'tujuan harus diisi'
        ],
        'tanggal' => [
            'required' => 'tanggal harus diisi'
        ],
        'jam' => [
            'required' => 'jam harus diisi'
        ],
        'satuan' => [
            'required' => 'harga satuan harus diisi'
        ],
        'total' => [
            'required' => 'harga total harus diisi'
        ]
        
    ];

    public function pesanTiket($data = null)
    {
        return $this->db->table('tiket')->insert($data);
    }
}