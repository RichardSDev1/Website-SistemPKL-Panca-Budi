<?php

namespace App\Controllers;

use App\Models\PenilaianModel;
use App\Models\SiswaModel;
use App\Models\PembimbingSekolahModel;
use App\Models\PembimbingUnivModel;

class Penilaian extends BaseController
{
    protected $model, $siswa, $ps, $pu;

    public function __construct()
    {
        $this->model = new PenilaianModel();
        $this->siswa = new SiswaModel();
        $this->ps = new PembimbingSekolahModel();
        $this->pu = new PembimbingUnivModel();
    }


    public function index()
    {
        $data['penilaian'] = $this->model
            ->select('penilaian_pkl.*, 
         siswa.nama AS nama_siswa,
         pembimbing_univ.nama AS nama_pembimbing_univ,
         pembimbing_sekolah.nama AS nama_pembimbing_sekolah,
         kelompok_pkl.nama_kelompok AS nama_kelompok')
            ->join('siswa', 'siswa.id_siswa = penilaian_pkl.id_siswa')
            ->join('kelompok_pkl', 'kelompok_pkl.id_kelompok = siswa.id_kelompok', 'left')
            ->join('pembimbing_univ', 'pembimbing_univ.id_pembimbing_univ = penilaian_pkl.id_pembimbing_univ', 'left')
            ->join('pembimbing_sekolah', 'pembimbing_sekolah.id_pembimbing_sekolah = penilaian_pkl.id_pembimbing_sekolah', 'left')
        
            ->findAll();

        $data['fields'] = $this->model->allowedFields;

        return view('penilaian/index', $data);
    }



    public function create()
    {
        return view('penilaian/create', [
            'siswa' => $this->siswa->findAll(),
            'pembimbing_sekolah' => $this->ps->findAll(),
            'pembimbing_univ' => $this->pu->findAll()
        ]);
    }

    public function store()
    {
        $this->model->save($this->request->getPost());
        return redirect()->to('/penilaian')->with('success', 'Penilaian berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('penilaian/edit', [
            'penilaian' => $this->model->find($id),
            'siswa' => $this->siswa->findAll(),
            'pembimbing_sekolah' => $this->ps->findAll(),
            'pembimbing_univ' => $this->pu->findAll()
        ]);
    }

    public function update($id)
    {
        $this->model->update($id, $this->request->getPost());
        return redirect()->to('/penilaian')->with('success', 'Data penilaian berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/penilaian')->with('success', 'Data berhasil dihapus');
    }
}
