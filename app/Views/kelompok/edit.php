<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Edit Data Kelompok</h3>

<form action="/kelompok/update/<?= $kelompok['id_kelompok']; ?>" method="POST">

    <div class="mb-3">
        <label>Nama Kelompok</label>
        <input type="text" name="nama_kelompok"
            value="<?= $kelompok['nama_kelompok']; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Pembimbing Sekolah</label>
        <select name="id_pembimbing_sekolah" class="form-control">
            <option value="">-- Pilih Pembimbing Sekolah --</option>
            <?php foreach ($pembimbing_sekolah as $ps): ?>
                <option value="<?= $ps['id_pembimbing_sekolah']; ?>"
                    <?= ($ps['id_pembimbing_sekolah'] == $kelompok['id_pembimbing_sekolah']) ? 'selected' : ''; ?>>
                    <?= $ps['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pembimbing Universitas</label>
        <select name="id_pembimbing_univ" class="form-control">
            <option value="">-- Pilih Pembimbing Universitas --</option>
            <?php foreach ($pembimbing_univ as $pu): ?>
                <option value="<?= $pu['id_pembimbing_univ']; ?>"
                    <?= ($pu['id_pembimbing_univ'] == $kelompok['id_pembimbing_univ']) ? 'selected' : ''; ?>>
                    <?= $pu['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"><?= $kelompok['keterangan']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/kelompok" class="btn btn-secondary">Kembali</a>

</form>


<?= $this->endSection(); ?>