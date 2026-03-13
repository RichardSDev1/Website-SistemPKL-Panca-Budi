<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Pembimbing Sekolah</h3>

<form action="/pembimbingsekolah/store" method="POST">

    <div class="mb-3">
        <label>Nama Pembimbing</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Sekolah</label>
        <input type="text" name="sekolah" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/pembimbingsekolah" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>