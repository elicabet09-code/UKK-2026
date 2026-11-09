<?php
session_start();
include 'config/koneksi.php';

// Cek login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

// Pastikan form dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: tambah_siswa.php");
    exit;
}

// Mengambil data dari form
$nis           = trim($_POST['nis'] ?? '');
$nisn          = trim($_POST['nisn'] ?? '');
$nama          = trim($_POST['nama'] ?? '');
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
$alamat        = trim($_POST['alamat'] ?? '');
$status_aktif  = $_POST['status_aktif'] ?? '';

// Validasi NIS
if (!preg_match('/^[0-9]{1,10}$/', $nis)) {
    $_SESSION['pesan_error'] = "NIS harus berupa angka maksimal 10 digit.";
    header("Location: tambah_siswa.php");
    exit;
}

// Validasi NISN
if (!preg_match('/^[0-9]{1,10}$/', $nisn)) {
    $_SESSION['pesan_error'] = "NISN harus berupa angka maksimal 10 digit.";
    header("Location: tambah_siswa.php");
    exit;
}

// Validasi data wajib
if (
    $nama === '' ||
    !in_array($jenis_kelamin, ['L', 'P'], true) ||
    $tanggal_lahir === '' ||
    $alamat === '' ||
    !in_array((string)$status_aktif, ['0', '1'], true)
) {
    $_SESSION['pesan_error'] = "Semua data harus diisi dengan benar.";
    header("Location: tambah_siswa.php");
    exit;
}

// =====================================
// CEK NIS DAN NISN SUDAH TERDAFTAR
// =====================================

$query_cek = mysqli_prepare(
    $koneksi,
    "SELECT nis, nisn
     FROM t_siswa
     WHERE nis = ? OR nisn = ?
     LIMIT 1"
);

if (!$query_cek) {
    $_SESSION['pesan_error'] = "Gagal memeriksa data siswa.";
    header("Location: tambah_siswa.php");
    exit;
}

mysqli_stmt_bind_param($query_cek, "ss", $nis, $nisn);
mysqli_stmt_execute($query_cek);

mysqli_stmt_bind_result(
    $query_cek,
    $nis_terdaftar,
    $nisn_terdaftar
);

$nis_dipakai = false;
$nisn_dipakai = false;

while (mysqli_stmt_fetch($query_cek)) {

    if ($nis_terdaftar === $nis) {
        $nis_dipakai = true;
    }

    if ($nisn_terdaftar === $nisn) {
        $nisn_dipakai = true;
    }
}

mysqli_stmt_close($query_cek);

// Jika NIS dan NISN sudah digunakan
if ($nis_dipakai && $nisn_dipakai) {

    $_SESSION['pesan_error'] =
        "NIS dan NISN sudah terdaftar. Silakan gunakan nomor lain.";

} elseif ($nis_dipakai) {

    $_SESSION['pesan_error'] =
        "NIS sudah terdaftar atau sudah digunakan siswa lain.";

} elseif ($nisn_dipakai) {

    $_SESSION['pesan_error'] =
        "NISN sudah terdaftar atau sudah digunakan siswa lain.";

}

// Jika ditemukan data duplikat, kembali ke form
if ($nis_dipakai || $nisn_dipakai) {
    header("Location: tambah_siswa.php");
    exit;
}

// =====================================
// SIMPAN DATA SISWA
// =====================================

$query_simpan = mysqli_prepare(
    $koneksi,
    "INSERT INTO t_siswa
    (nis, nisn, nama, jenis_kelamin, tanggal_lahir, alamat, status_aktif)
    VALUES (?, ?, ?, ?, ?, ?, ?)"
);

if (!$query_simpan) {
    $_SESSION['pesan_error'] = "Gagal menyiapkan penyimpanan data.";
    header("Location: tambah_siswa.php");
    exit;
}

$status_aktif = (int) $status_aktif;

mysqli_stmt_bind_param(
    $query_simpan,
    "ssssssi",
    $nis,
    $nisn,
    $nama,
    $jenis_kelamin,
    $tanggal_lahir,
    $alamat,
    $status_aktif
);

if (mysqli_stmt_execute($query_simpan)) {

    $_SESSION['pesan_sukses'] = "Data siswa berhasil ditambahkan.";

} else {

    $_SESSION['pesan_error'] = "Data siswa gagal disimpan. Silakan coba lagi.";

}

mysqli_stmt_close($query_simpan);

header("Location: tambah_siswa.php");
exit;
?>