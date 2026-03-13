<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Pembimbing Sekolah</h3>
    <?php if (session()->has('isLoggedIn')): ?>
        <a href="/pembimbingsekolah/create" class="btn btn-primary">
            Tambah Data
        </a>
    <?php endif; ?>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($pembimbing as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['sekolah']; ?></td>
                <td><?= $row['kontak']; ?></td>
                <td>
                    <?php if (session()->has('isLoggedIn')): ?>
                        <a href="/pembimbingsekolah/edit/<?= $row['id_pembimbing_sekolah']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/pembimbingsekolah/delete/<?= $row['id_pembimbing_sekolah']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>