<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Edit Data Siswa</h3>

<form action="/siswa/update/<?= $siswa['id_siswa']; ?>" method="POST">

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $siswa['nama']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kelompok</label>
        <input type="text" name="id_kelompok" value="<?= $siswa['id_kelompok']; ?>" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="/siswa" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>