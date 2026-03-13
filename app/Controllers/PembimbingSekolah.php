<?php

namespace App\Controllers;

use App\Models\PembimbingSekolahModel;

class PembimbingSekolah extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PembimbingSekolahModel();
    }

    public function index()
    {
        return view('pembimbingsekolah/index', ['pembimbing' => $this->model->findAll()]);
    }

    public function create()
    {
        return view('pembimbingsekolah/create');
    }

    public function store()
    {
        $this->model->save($this->request->getPost());
        return redirect()->to('/pembimbingsekolah')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('pembimbingsekolah/edit', [
            'pembimbing' => $this->model->find($id)
        ]);
    }

    public function update($id)
    {
        $this->model->update($id, $this->request->getPost());
        return redirect()->to('/pembimbingsekolah')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/pembimbingsekolah')->with('success', 'Data berhasil dihapus');
    }
}
