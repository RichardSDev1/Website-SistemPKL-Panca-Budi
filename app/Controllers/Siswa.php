<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelompokModel;

class Siswa extends BaseController
{
    protected $siswaModel, $kelompokModel;
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelompokModel = new KelompokModel();
    }

    public function index()
    {
        $data['siswa'] = $this->siswaModel->select('siswa.*, kelompok_pkl.nama_kelompok')
            ->join('kelompok_pkl', 'kelompok_pkl.id_kelompok = siswa.id_kelompok', 'left')
            ->findAll();

        return view('siswa/index', $data);
    }

    public function create()
    {
        $data['kelompok'] = $this->kelompokModel->findAll();
        return view('siswa/create', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Jika id_kelompok kosong → jadikan NULL agar aman
        if (empty($data['id_kelompok'])) {
            $data['id_kelompok'] = null;
        }

        $this->siswaModel->save($data);

        return redirect()->to('/siswa')->with('success', 'Siswa ditambahkan');
    }


    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);
        if (!$data['siswa']) return redirect()->to('/siswa')->with('error', 'Data tidak ditemukan');
        $data['kelompok'] = $this->kelompokModel->findAll();
        return view('siswa/edit', $data);
    }

    public function update($id)
    {
        $this->siswaModel->update($id, $this->request->getPost());
        return redirect()->to('/siswa')->with('success', 'Data diperbarui');
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        return redirect()->to('/siswa')->with('success', 'Data dihapus');
    }
}
