<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Edit Pembimbing Universitas</h3>

<form action="/pembimbinguniv/update/<?= $pembimbing['id_pembimbing_univ']; ?>" method="POST">

    <div class="mb-3">
        <label>Nama Pembimbing</label>
        <input type="text" name="nama" value="<?= $pembimbing['nama']; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" value="<?= $pembimbing['jabatan']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" value="<?= $pembimbing['kontak']; ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/pembimbinguniv" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>