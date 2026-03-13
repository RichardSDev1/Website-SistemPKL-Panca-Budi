<?php

namespace App\Controllers;

use App\Models\PembimbingUnivModel;

class PembimbingUniv extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PembimbingUnivModel();
    }

    public function index()
    {
        return view('pembimbinguniv/index', ['pembimbing' => $this->model->findAll()]);
    }

    public function create()
    {
        return view('pembimbinguniv/create');
    }

    public function store()
    {
        $this->model->save($this->request->getPost());
        return redirect()->to('/pembimbinguniv')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data pembimbing universitas ID $id tidak ditemukan!");
        }

        return view('pembimbinguniv/edit', [
            'pembimbing' => $data
        ]);
    }


    public function update($id)
    {
        $this->model->update($id, $this->request->getPost());
        return redirect()->to('/pembimbinguniv')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/pembimbinguniv')->with('success', 'Data berhasil dihapus');
    }
}
