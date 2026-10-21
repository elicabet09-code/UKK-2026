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
    echo "ID kelas tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM t_
        WHERE id='$id'";

if (mysqli_query($koneksi, $sql)) {

    header("Location: kelola_kelas.php");
    exit;

} else {

    echo "Gagal menghapus kelas: "
         . mysqli_error($koneksi);
}

?>