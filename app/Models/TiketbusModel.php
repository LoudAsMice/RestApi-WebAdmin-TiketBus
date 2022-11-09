<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketbusModel extends Model
{
    public function cekTiket($where) {
        return $this->db->table('tiketbus')->orderBy('jam', 'ASC')->getWhere($where);
    }
}