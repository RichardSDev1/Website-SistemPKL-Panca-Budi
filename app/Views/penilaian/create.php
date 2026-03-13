<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Penilaian PKL</h3>

<form action="/penilaian/store" method="POST">

    <div class="mb-3">
        <label>Nama Siswa</label>
        <select name="id_siswa" class="form-control" required>
            <option value="">-- Pilih Siswa --</option>
            <?php foreach ($siswa as $s): ?>
                <option value="<?= $s['id_siswa']; ?>"><?= $s['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pembimbing Sekolah</label>
        <select name="id_pembimbing_sekolah" class="form-control" required>
            <option value="">-- Pilih Pembimbing Sekolah --</option>
            <?php foreach ($pembimbing_sekolah as $ps): ?>
                <option value="<?= $ps['id_pembimbing_sekolah']; ?>"><?= $ps['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pembimbing Universitas</label>
        <select name="id_pembimbing_univ" class="form-control" required>
            <option value="">-- Pilih Pembimbing Universitas --</option>
            <?php foreach ($pembimbing_univ as $pu): ?>
                <option value="<?= $pu['id_pembimbing_univ']; ?>"><?= $pu['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Disiplin</label>
        <input type="number" name="disiplin" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kehadiran</label>
        <input type="number" name="kehadiran" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Keterampilan</label>
        <input type="number" name="keterampilan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tugas</label>
        <input type="number" name="tugas" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Komentar</label>
        <textarea name="komentar" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/penilaian" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>