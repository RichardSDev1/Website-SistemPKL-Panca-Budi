<?php

namespace App\Controllers;

use App\Models\KelompokModel;
use App\Models\PembimbingSekolahModel;
use App\Models\PembimbingUnivModel;

class Kelompok extends BaseController
{
    protected $kelompokModel;
    protected $psModel;
    protected $puModel;

    public function __construct()
    {
        $this->kelompokModel = new KelompokModel();
        $this->psModel = new PembimbingSekolahModel();
        $this->puModel = new PembimbingUnivModel();
    }

    public function index()
    {
        $data['kelompok'] = $this->kelompokModel
            ->select('kelompok_pkl.*, pembimbing_sekolah.nama as ps, pembimbing_univ.nama as pu')
            ->join('pembimbing_sekolah', 'pembimbing_sekolah.id_pembimbing_sekolah = kelompok_pkl.id_pembimbing_sekolah', 'left')
            ->join('pembimbing_univ', 'pembimbing_univ.id_pembimbing_univ = kelompok_pkl.id_pembimbing_univ', 'left')
            ->findAll();

        return view('kelompok/index', $data);
    }

    public function create()
    {
        return view('kelompok/create', [
            'pembimbing_sekolah' => $this->psModel->findAll(),
            'pembimbing_univ' => $this->puModel->findAll()
        ]);
    }

    public function store()
    {
        $this->kelompokModel->save($this->request->getPost());
        return redirect()->to('/kelompok')->with('success', 'Data kelompok berhasil ditambahkan!');
    }

    public function edit($id)
    {
        return view('kelompok/edit', [
            'kelompok' => $this->kelompokModel->find($id),
            'pembimbing_sekolah' => $this->psModel->findAll(),
            'pembimbing_univ' => $this->puModel->findAll()
        ]);
    }

    public function update($id)
    {
        $data = [
            'nama_kelompok' => $this->request->getPost('nama_kelompok'),
            'id_pembimbing_sekolah' => $this->request->getPost('id_pembimbing_sekolah') ?: null,
            'id_pembimbing_univ' => $this->request->getPost('id_pembimbing_univ') ?: null,
            'keterangan' => $this->request->getPost('keterangan')
        ];

        // CEK apakah ID pembimbing sekolah valid
        if ($data['id_pembimbing_sekolah']) {
            $cekPS = $this->psModel->find($data['id_pembimbing_sekolah']);
            if (!$cekPS) {
                return redirect()->back()->with('error', 'ID Pembimbing Sekolah tidak valid!');
            }
        }

        // CEK ID pembimbing universitas
        if ($data['id_pembimbing_univ']) {
            $cekPU = $this->puModel->find($data['id_pembimbing_univ']);
            if (!$cekPU) {
                return redirect()->back()->with('error', 'ID Pembimbing Universitas tidak valid!');
            }
        }

        $this->kelompokModel->update($id, $data);
        return redirect()->to('/kelompok')->with('success', 'Data kelompok berhasil diperbarui!');
    }


    public function delete($id)
    {
        $this->kelompokModel->delete($id);
        return redirect()->to('/kelompok')->with('success', 'Data kelompok berhasil dihapus!');
    }
}
