<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h3>Edit Penilaian PKL</h3>

<form action="/penilaian/update/<?= $penilaian['id_penilaian']; ?>" method="POST">

    <div class="mb-3">
        <label>Nama Siswa</label>
        <select name="id_siswa" class="form-control">
            <?php foreach ($siswa as $s): ?>
                <option value="<?= $s['id_siswa']; ?>"
                    <?= $s['id_siswa'] == $penilaian['id_siswa'] ? 'selected' : '' ?>>
                    <?= $s['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pembimbing Sekolah</label>
        <select name="id_pembimbing_sekolah" class="form-control">
            <?php foreach ($pembimbing_sekolah as $ps): ?>
                <option value="<?= $ps['id_pembimbing_sekolah']; ?>"
                    <?= $ps['id_pembimbing_sekolah'] == $penilaian['id_pembimbing_sekolah'] ? 'selected' : '' ?>>
                    <?= $ps['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pembimbing Universitas</label>
        <select name="id_pembimbing_univ" class="form-control">
            <?php foreach ($pembimbing_univ as $pu): ?>
                <option value="<?= $pu['id_pembimbing_univ']; ?>"
                    <?= $pu['id_pembimbing_univ'] == $penilaian['id_pembimbing_univ'] ? 'selected' : '' ?>>
                    <?= $pu['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Disiplin</label>
        <input type="number" name="disiplin" value="<?= $penilaian['disiplin']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kehadiran</label>
        <input type="number" name="kehadiran" value="<?= $penilaian['kehadiran']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterampilan</label>
        <input type="number" name="keterampilan" value="<?= $penilaian['keterampilan']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tugas</label>
        <input type="number" name="tugas" value="<?= $penilaian['tugas']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Komentar</label>
        <textarea name="komentar" class="form-control"><?= $penilaian['komentar']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/penilaian" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection(); ?>