<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Siswa</h3>
    <?php if (session()->has('isLoggedIn')): ?>
        <a href="/siswa/create" class="btn btn-primary">
            Tambah Data
        </a>
    <?php endif; ?>
</div>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Kelompok</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1;
    foreach ($siswa as $row): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nisn']; ?></td>
            <td><?= $row['nama_kelompok']; ?></td>
            <td>
                <?php if (session()->has('isLoggedIn')): ?>
                    <a href="/siswa/edit/<?= $row['id_siswa']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/siswa/delete/<?= $row['id_siswa']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?= $this->endSection(); ?>