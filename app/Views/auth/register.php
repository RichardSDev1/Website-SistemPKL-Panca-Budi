<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Registrasi Akun</h4>
                        <small>Hanya Admin (Pembimbing Universitas)</small>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('register-process') ?>" method="post">
                            <?= csrf_field() ?>

                            <!-- USERNAME -->
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <!-- ROLE -->
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin">Admin (Pembimbing Universitas)</option>
                                    <option value="user">User (Pembimbing Sekolah)</option>
                                </select>
                            </div>

                            <!-- RELASI PEMBIMBING -->
                            <div class="mb-3">
                                <label>ID Pembimbing Universitas</label>
                                <input type="number" name="id_pembimbing_univ" class="form-control">
                                <small class="text-muted">Isi jika role Admin</small>
                            </div>

                            <div class="mb-3">
                                <label>ID Pembimbing Sekolah</label>
                                <input type="number" name="id_pembimbing_sekolah" class="form-control">
                                <small class="text-muted">Isi jika role User</small>
                            </div>

                            <button class="btn btn-primary w-100">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>