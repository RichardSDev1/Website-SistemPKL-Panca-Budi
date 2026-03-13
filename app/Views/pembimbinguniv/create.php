<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Pembimbing Universitas</h3>

<form action="/pembimbinguniv/store" method="POST">

    <div class="mb-3">
        <label>Nama Pembimbing</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jabatan
        </label>
        <input type="text" name="jabatan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/pembimbinguniv" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>