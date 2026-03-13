<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nama',
        'nisn',
        'sekolah_asal',
        'jurusan',
        'no_telp',
        'id_kelompok',
        'status'
    ];

    public function getDashboardData()
    {
        return $this->select('
                siswa.nama AS nama_siswa,
                kelompok_pkl.nama_kelompok,
                pembimbing_univ.nama AS pembimbing_univ,
                pembimbing_sekolah.nama AS pembimbing_sekolah
            ')
            ->join('kelompok_pkl', 'kelompok_pkl.id_kelompok = siswa.id_kelompok', 'left')
            ->join('pembimbing_univ', 'pembimbing_univ.id_pembimbing_univ = kelompok_pkl.id_pembimbing_univ', 'left')
            ->join('pembimbing_sekolah', 'pembimbing_sekolah.id_pembimbing_sekolah = kelompok_pkl.id_pembimbing_sekolah', 'left')
            ->findAll();
    }
}
