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
    echo "ID guru tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM t_guru
        WHERE id='$id'";

if (mysqli_query($koneksi, $sql)) {

    header("Location: kelola_guru.php");
    exit;

} else {

    echo "Gagal menghapus guru: "
         . mysqli_error($koneksi);
}

?>