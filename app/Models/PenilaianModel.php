<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian_pkl';
    protected $primaryKey = 'id_penilaian';
    protected $returnType = 'array';
    protected $allowedFields = ['id_siswa', 'id_pembimbing_univ', 'id_pembimbing_sekolah', 'disiplin', 'kehadiran', 'keterampilan', 'tugas', 'komentar'];
}
