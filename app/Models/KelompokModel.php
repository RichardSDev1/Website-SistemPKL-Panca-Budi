<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokModel extends Model
{
    protected $table = 'kelompok_pkl';
    protected $primaryKey = 'id_kelompok';
    protected $returnType = 'array';
    protected $allowedFields = ['nama_kelompok', 'id_pembimbing_sekolah', 'id_pembimbing_univ', 'keterangan'];
}
