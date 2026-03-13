<?php

namespace App\Models;

use CodeIgniter\Model;

class PembimbingSekolahModel extends Model
{
    protected $table = 'pembimbing_sekolah';
    protected $primaryKey = 'id_pembimbing_sekolah';
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'sekolah', 'kontak'];
}
