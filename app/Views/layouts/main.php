<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem PKL' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #0d6efd;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #0b5ed7;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4 class="text-center mb-4">SISTEM PKL</h4>

        <a href="<?= base_url('/') ?>">Dashboard</a>
        <a href="<?= base_url('/siswa') ?>">Data Siswa</a>
        <a href="<?= base_url('/kelompok') ?>">Kelompok PKL</a>
        <a href="<?= base_url('/pembimbingsekolah') ?>">Pembimbing Sekolah</a>
        <a href="<?= base_url('/pembimbinguniv') ?>">Pembimbing Universitas</a>
        <a href="<?= base_url('/penilaian') ?>">Penilaian PKL</a>

        <?php if (session()->has('isLoggedIn')): ?>
            <!-- JIKA SUDAH LOGIN -->
            <hr>
            <a href="<?= base_url('/logout') ?>">Logout</a>
        <?php else: ?>
            <!-- JIKA BELUM LOGIN -->
            <hr>
            <a href="<?= base_url('/login') ?>">Login Admin</a>
        <?php endif; ?>
    </div>


    <!-- Main Content -->
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

</body>

</html>