<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Selamat Datang di Sistem PKL</h2>
<p class="text-muted">Universitas Panca Budi</p>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h4> Total Siswa</h4>
            <h3><?= $totalSiswa ?? 0 ?></h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h4>Total Kelompok</h4>
            <h3><?= $totalKelompok ?? 0 ?></h3>
        </div>
    </div>

    <div class="container mt-4 card shadow-sm p-3">
        <table class="table table-bordered table-striped">
            <thead class="table">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelompok PKL</th>
                    <th>Pembimbing Universitas</th>
                    <th>Pembimbing Sekolah</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dashboard)) : ?>
                    <?php $no = 1;
                    foreach ($dashboard as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nama_siswa']) ?></td>
                            <td><?= esc($row['nama_kelompok'] ?? '-') ?></td>
                            <td><?= esc($row['pembimbing_univ'] ?? '-') ?></td>
                            <td><?= esc($row['pembimbing_sekolah'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Data belum tersedia</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>