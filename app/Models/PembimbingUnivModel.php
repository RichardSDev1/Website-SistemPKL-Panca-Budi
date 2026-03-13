<?php

namespace App\Models;

use CodeIgniter\Model;

class PembimbingUnivModel extends Model
{
    protected $table = 'pembimbing_univ';
    protected $primaryKey = 'id_pembimbing_univ';
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'jabatan', 'kontak'];
}
