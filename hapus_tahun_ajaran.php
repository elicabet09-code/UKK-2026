<?php

session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    echo "Akses ditolak!";
    exit;
}

if (!isset($_GET['id'])) {
    echo "ID tahun ajaran tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM t_tahun_ajaran
        WHERE id='$id'";

if (mysqli_query($koneksi, $sql)) {

    header("Location: hapus_tahun_ajaran.php");
    exit;

} else {

    echo "Gagal menghapus tahun ajaran: "
         . mysqli_error($koneksi);
}

?>