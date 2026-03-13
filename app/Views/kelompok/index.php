<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Kelompok</h3>
    <?php if (session()->has('isLoggedIn')): ?>
        <a href="/kelompok/create" class="btn btn-primary">
            Tambah Data
        </a>
    <?php endif; ?>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelompok</th>
            <th>Pembimbing Sekolah</th>
            <th>Pembimbing Universitas</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($kelompok as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_kelompok']; ?></td>
                <td><?= $row['ps'] ?? '-'; ?></td>
                <td><?= $row['pu'] ?? '-'; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td>
                    <?php if (session()->has('isLoggedIn')): ?>
                        <a href="/kelompok/edit/<?= $row['id_kelompok']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/kelompok/delete/<?= $row['id_kelompok']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>