
<?php
session_start();
include "config/koneksi.php";

$nama = "Alisa Ramadhani";
$kelas = "XII RPL";
$sekolah = "SMK Muhammadiyah Tasikmalaya";
$jurusan = "Rekayasa Perangkat Lunak";
$hobi = "Memasak";
$cita_cita = "Sesuai Jalan Yang Allah Kasih Aja";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Saya</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eaf5ff;
            color: #23466b;
            padding: 30px 15px;
        }

        .card-profil {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 80, 150, 0.1);
        }

        h2 {
            color: #287bc1;
            text-align: center;
            margin-bottom: 20px;
        }

        .foto {
            display: block;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #c8e5ff;
            margin: 0 auto 15px;
        }

        .info {
            background: #f1f8ff;
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .info strong {
            color: #287bc1;
        }

        .deskripsi {
            background: #e4f2ff;
            padding: 15px;
            border-radius: 10px;
            line-height: 1.7;
        }

        .btn-dashboard {
            display: inline-block;
            background: #287bc1;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 15px;
        }

        .btn-dashboard:hover {
            background: #195d96;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="card-profil">

    <h2>Tentang Saya 💙</h2>

    <img src="assets/foto-profil.jpg"
         alt="Foto profil"
         class="foto"
         onerror="this.style.display='none';">

    <div class="info">
        <strong>Nama:</strong>
        <?= htmlspecialchars($nama) ?>
    </div>

    <div class="info">
        <strong>Kelas:</strong>
        <?= htmlspecialchars($kelas) ?>
    </div>

    <div class="info">
        <strong>Sekolah:</strong>
        <?= htmlspecialchars($sekolah) ?>
    </div>

    <div class="info">
        <strong>Jurusan:</strong>
        <?= htmlspecialchars($jurusan) ?>
    </div>

    <div class="info">
        <strong>Hobi:</strong>
        <?= htmlspecialchars($hobi) ?>
    </div>

    <div class="info">
        <strong>Cita-cita:</strong>
        <?= htmlspecialchars($cita_cita) ?>
    </div>

    <h4 class="mt-4 mb-3">Deskripsi Diri</h4>

    <div class="deskripsi">
        Saya adalah seorang pelajar jurusan Rekayasa Perangkat Lunak.
        Saya senang mempelajari teknologi dan membuat website.
        Saya ingin terus belajar agar bisa menjadi Web Developer.
        Aamiin.
    </div>

    <a href="dashboard.php" class="btn-dashboard">
        &larr; Kembali ke Dashboard
    </a>

</div>

</body>
</html>