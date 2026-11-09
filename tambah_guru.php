<?php
session_start();
include 'config/koneksi.php';

// Cek login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'layout/sidebar.php'; ?>

        <main class="col-md-9 col-lg-10 p-4">

            <h1 class="mb-4">Tambah Guru</h1>

            <!-- NOTIFIKASI ERROR -->
            <?php if (isset($_SESSION['pesan_error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= htmlspecialchars($_SESSION['pesan_error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['pesan_error']); ?>
            <?php endif; ?>

            <!-- NOTIFIKASI SUKSES -->
            <?php if (isset($_SESSION['pesan_sukses'])): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= htmlspecialchars($_SESSION['pesan_sukses']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['pesan_sukses']); ?>
            <?php endif; ?>

            <!-- TOMBOL KEMBALI -->
            <div class="mb-3">
                <a href="kelola_guru.php" class="btn btn-secondary">
                    Kembali ke Data Guru
                </a>
            </div>

            <!-- FORM TAMBAH GURU -->
            <div class="card shadow-sm mb-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Tambah Guru</h5>
                </div>

                <div class="card-body p-4">

                    <form action="proses_tambah_guru.php" method="POST">

                        <div class="row g-3">

                            <!-- NIP -->
                            <div class="col-md-6">
                                <label class="form-label">NIP</label>

                                <input
                                    type="text"
                                    name="nip"
                                    id="nip"
                                    class="form-control"
                                    placeholder="Masukkan NIP"
                                    maxlength="15"
                                    pattern="[0-9]{1,15}"
                                    inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15)"
                                    title="NIP hanya boleh angka dan maksimal 15 digit."
                                    required
                                >

                                <small class="text-muted">
                                    NIP hanya boleh angka maksimal 15 digit.
                                </small>
                            </div>

                            <!-- NAMA GURU -->
                            <div class="col-md-6">
                                <label class="form-label">Nama Guru</label>

                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    placeholder="Masukkan Nama Guru"
                                    required
                                >
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-6">
                                <label class="form-label">Email Login</label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan Email"
                                    required
                                >
                            </div>

                            <!-- PASSWORD -->
                            <div class="col-md-6">
                                <label class="form-label">Password</label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan Password"
                                    minlength="6"
                                    required
                                >
                            </div>

                            <!-- KONFIRMASI PASSWORD -->
                            <div class="col-md-6">
                                <label class="form-label">Konfirmasi Password</label>

                                <input
                                    type="password"
                                    name="konfirmasi_password"
                                    class="form-control"
                                    placeholder="Ulangi Password"
                                    minlength="6"
                                    required
                                >
                            </div>

                            <!-- STATUS GURU -->
                            <div class="col-md-6">
                                <label class="form-label">Status Guru</label>

                                <select name="status" class="form-select" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>

                        </div>

                        <!-- TOMBOL -->
                        <div class="mt-4">

                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-save me-1"></i>
                                Simpan Guru
                            </button>

                            <button type="reset" class="btn btn-outline-secondary px-4 ms-1">
                                <i class="bi bi-arrow-counterclockwise me-1"></i>
                                Reset
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>