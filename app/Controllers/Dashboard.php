<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelompokModel;


class Dashboard extends BaseController
{
    public function index()
    {

        $siswa = new SiswaModel();
        $kelompok = new KelompokModel();

        $data = [
            'title' => 'Dashboard',
            'totalSiswa' => $siswa->countAll(),
            'totalKelompok' => $kelompok->countAll(),
        ];

        $data['dashboard'] = $siswa->getDashboardData();

        return view('dashboard/index', $data);
    }
}
