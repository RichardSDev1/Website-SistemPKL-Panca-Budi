<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Penilaian PKL</h3>
    <?php if (session()->has('isLoggedIn')): ?>
        <a href="/penilaian/create" class="btn btn-primary">
            Tambah Data
        </a>
    <?php endif; ?>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Nama Kelompok</th>
            <th>Pembimbing Sekolah</th>
            <th>Pembimbing Universitas</th>
            <th>Disiplin</th>
            <th>Kehadiran</th>
            <th>Keterampilan</th>
            <th>Tugas</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($penilaian as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_siswa']; ?></td>
                <td><?= $row['nama_kelompok']; ?></td>
                <td><?= $row['nama_pembimbing_sekolah']; ?></td>
                <td><?= $row['nama_pembimbing_univ']; ?></td>
                <td><?= $row['disiplin']; ?></td>
                <td><?= $row['kehadiran']; ?></td>
                <td><?= $row['keterampilan']; ?></td>
                <td><?= $row['tugas']; ?></td>
                <td><?= $row['komentar']; ?></td>

                <td>
                    <?php if (session()->has('isLoggedIn')): ?>
                        <a href="/penilaian/edit/<?= $row['id_penilaian']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/penilaian/delete/<?= $row['id_penilaian']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection(); ?>