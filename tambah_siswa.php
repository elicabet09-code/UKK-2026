<?php
session_start();
include 'config/koneksi.php';

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

    <title>Tambah Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'layout/sidebar.php'; ?>

        <main class="col-md-9 col-lg-10 p-4">

            <h1 class="mb-4">Tambah Siswa</h1>

            <!-- Notifikasi -->
            <?php if (isset($_SESSION['pesan_error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= htmlspecialchars($_SESSION['pesan_error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['pesan_error']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['pesan_sukses'])): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= htmlspecialchars($_SESSION['pesan_sukses']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['pesan_sukses']); ?>
            <?php endif; ?>

            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="kelola_siswa.php" class="btn btn-secondary">
                    Kembali ke Data Siswa
                </a>
            </div>

            <!-- Form Tambah Siswa -->
            <div class="card shadow-sm mb-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Tambah Siswa</h5>
                </div>

                <div class="card-body p-4">

                    <form action="proses_tambah_siswa.php" method="POST">

                        <div class="row g-3">

                            <!-- NIS -->
                            <div class="col-md-6">
                                <label for="nis" class="form-label">NIS</label>

                                <input
                                    type="text"
                                    name="nis"
                                    id="nis"
                                    class="form-control"
                                    placeholder="Masukkan NIS"
                                    maxlength="10"
                                    pattern="[0-9]{1,10}"
                                    inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                                    title="NIS harus berupa angka maksimal 10 digit"
                                    required
                                >

                                <small class="text-muted">
                                    NIS maksimal 10 digit.
                                </small>
                            </div>

                            <!-- NISN -->
                            <div class="col-md-6">
                                <label for="nisn" class="form-label">NISN</label>

                                <input
                                    type="text"
                                    name="nisn"
                                    id="nisn"
                                    class="form-control"
                                    placeholder="Masukkan NISN"
                                    maxlength="10"
                                    pattern="[0-9]{1,10}"
                                    inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                                    title="NISN harus berupa angka maksimal 10 digit"
                                    required
                                >

                                <small class="text-muted">
                                    NISN maksimal 10 digit.
                                </small>
                            </div>

                            <!-- Nama Siswa -->
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Siswa</label>

                                <input
                                    type="text"
                                    name="nama"
                                    id="nama"
                                    class="form-control"
                                    placeholder="Masukkan Nama Siswa"
                                    required
                                >
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label">
                                    Jenis Kelamin
                                </label>

                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-select" required>

                                    <option value="">-- Pilih --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>

                                </select>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label">
                                    Tanggal Lahir
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    id="tanggal_lahir"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>

                                <textarea
                                    name="alamat"
                                    id="alamat"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Masukkan Alamat"
                                    required
                                ></textarea>
                            </div>

                            <!-- Status Aktif -->
                            <div class="col-md-6">
                                <label for="status_aktif" class="form-label">
                                    Status Aktif
                                </label>

                                <select name="status_aktif" id="status_aktif"
                                    class="form-select" required>

                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>

                                </select>
                            </div>

                        </div>

                        <!-- Tombol -->
                        <div class="mt-4">

                            <button type="submit" name="simpan" value="1"
                                class="btn btn-primary px-4">
                                Simpan Siswa
                            </button>

                            <button type="reset"
                                class="btn btn-outline-secondary px-4 ms-1">
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