<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

    


<form action="/siswa/store" method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nisn" class="form-control">
    </div>
    <div class="mb-3">
        <label>Kelompok</label>
        <select name="id_kelompok" class="form-control">
            <option value="">-- Pilih Kelompok --</option>
            <?php foreach ($kelompok as $k) : ?>
                <option value="<?= $k['id_kelompok']; ?>">
                    <?= $k['nama_kelompok']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="/siswa" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>