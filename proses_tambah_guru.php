<?php
include 'includes/cek_session.php';
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: tambah_guru.php");
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$nip = trim($_POST['nip'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$konfirmasi = $_POST['konfirmasi_password'] ?? '';
$status = $_POST['status_aktif'] ?? '';

if ($nama === '' || $nip === '' || $email === '' ||
    $password === '' || $konfirmasi === '') {
    die("Semua data wajib diisi!");
}

if ($password !== $konfirmasi) {
    die("Password dan konfirmasi password tidak sama!");
}

if (!in_array($status, ['0', '1'], true)) {
    die("Status aktif tidak valid!");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

mysqli_begin_transaction($koneksi);

try {
    // Periksa email
    $cek = mysqli_prepare(
        $koneksi,
        "SELECT id FROM t_users WHERE email = ?"
    );

    if (!$cek) {
        throw new Exception(mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($cek, "s", $email);
    mysqli_stmt_execute($cek);

    $hasil = mysqli_stmt_get_result($cek);

    if (mysqli_num_rows($hasil) > 0) {
        throw new Exception("Email sudah digunakan!");
    }

    mysqli_stmt_close($cek);

    // Simpan akun pengguna
    $user = mysqli_prepare(
        $koneksi,
        "INSERT INTO t_users (name, email, password, role)
         VALUES (?, ?, ?, 'guru')"
    );

    if (!$user) {
        throw new Exception(mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param(
        $user,
        "sss",
        $nama,
        $email,
        $password_hash
    );

    mysqli_stmt_execute($user);
    $user_id = mysqli_insert_id($koneksi);
    mysqli_stmt_close($user);

    // Simpan data guru
    $guru = mysqli_prepare(
        $koneksi,
        "INSERT INTO t_guru
        (user_id, nip, nama, email, status_aktif)
        VALUES (?, ?, ?, ?, ?)"
    );

    if (!$guru) {
        throw new Exception(mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param(
        $guru,
        "isssi",
        $user_id,
        $nip,
        $nama,
        $email,
        $status
    );

    mysqli_stmt_execute($guru);
    mysqli_stmt_close($guru);

    mysqli_commit($koneksi);

    header("Location: kelola_guru.php?pesan=tambah_berhasil");
    exit;

} catch (Throwable $e) {
    mysqli_rollback($koneksi);
    die("Gagal menambahkan data guru: " . $e->getMessage());
}
?>