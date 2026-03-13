<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Edit Pembimbing Sekolah</h3>

<form action="/pembimbingsekolah/update/<?= $pembimbing['id_pembimbing_sekolah']; ?>" method="POST">

    <div class="mb-3">
        <label>Nama Pembimbing</label>
        <input type="text" name="nama" value="<?= $pembimbing['nama']; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Sekolah</label>
        <input type="text" name="sekolah" value="<?= $pembimbing['sekolah']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" value="<?= $pembimbing['kontak']; ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/pembimbingsekolah" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>