<?php
// aboutme.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$nama = "Alisa Ramadhani";
$kelas = "XII RPL";
$sekolah = "SMK Muhammadiyah Tasikmalaya";
$jurusan = "Rekayasa Perangkat Lunak";
$hobi = "Memasak";
$cita_cita = "Sesuai Jalan Yang Allah Kasih Aja";

$data = [
    ["Nama", $nama, "fa-user"],
    ["Kelas", $kelas, "fa-graduation-cap"],
    ["Sekolah", $sekolah, "fa-school"],
    ["Jurusan", $jurusan, "fa-laptop"],
    ["Hobi", $hobi, "fa-heart"],
    ["Cita-cita", $cita_cita, "fa-bullseye"]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>About Me</title>

<!-- Bootstrap 5 sama seperti Dashboard -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: var(--bs-body-font-family);
    background: #f4f9ff;
    color: #23466f;
}

/* HEADER */
.header {
    padding: 30px 5%;
    background: linear-gradient(120deg, #cde8ff, #edf7ff, #d9efff);
    border: 1px solid #d4eaff;
    border-radius: 16px;
    margin-bottom: 24px;
}

.header h1 {
    font-size: 30px;
    font-weight: 700;
    color: #174d83;
}

.header p {
    color: #5882ae;
    margin-bottom: 0;
}

/* CONTENT */
.content {
    padding: 0;
}

.panel {
    background: #ffffff;
    border: 1px solid #d5eaff;
    border-radius: 18px;
    padding: 22px;
    height: 100%;
    box-shadow: 0 5px 20px rgba(46,116,181,0.06);
}

.section-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 22px;
    color: #24598e;
}

.section-title i {
    display: inline-flex;
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
    border-radius: 50%;
    background: #d9edff;
    color: #2784d8;
}

/* TABLE */
.table {
    color: #284d75;
    margin-bottom: 0;
    width: 100%;
}

.table thead th {
    background: #398bd1;
    color: white;
    border-color: #b9dcfa;
    padding: 14px 12px;
    font-weight: 600;
    vertical-align: middle;
}

.table td {
    padding: 14px 12px;
    border-color: #dcecff;
    vertical-align: middle;
    font-size: 14px;
}

.table tbody tr:nth-child(even) {
    background: #f0f8ff;
}

.table tbody tr:hover {
    background: #e0f1ff;
}

.field-name {
    font-weight: 500;
    white-space: nowrap;
}

.field-name i {
    color: #398bd1;
    width: 25px;
    margin-right: 5px;
}

/* PROFILE */
.profile-card {
    background: linear-gradient(135deg, #e1f2ff, #f5faff);
    border-radius: 16px;
    padding: 22px;
    text-align: center;
    margin-bottom: 22px;
}

.profile-photo {
    width: 145px;
    height: 165px;
    object-fit: cover;
    border-radius: 18px;
    border: 5px solid white;
    box-shadow: 0 5px 15px rgba(44,119,184,0.18);
    background: #dceeff;
}

.profile-name {
    font-size: 21px;
    font-weight: 600;
    margin-top: 15px;
    color: #174d83;
}

.profile-class {
    color: #3984c9;
    margin-top: 5px;
}

/* DESCRIPTION */
.description {
    background: linear-gradient(135deg, #e6f4ff, #f3f9ff);
    border: 1px solid #d9ecff;
    padding: 20px;
    border-radius: 15px;
    font-size: 14px;
    line-height: 1.9;
}

.quote {
    text-align: center;
    color: #398bd1;
    font-style: italic;
    margin-top: 20px;
}

/* ICON */
.icon-footer {
    color: #398bd1;
    font-size: 25px;
}

@media (max-width: 768px) {
    .header h1 {
        font-size: 24px;
    }

    .panel {
        padding: 16px;
        margin-bottom: 20px;
    }
}
</style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR SAMA DENGAN DASHBOARD -->
        <?php include "layout/sidebar.php"; ?>

        <!-- KONTEN ABOUT ME -->
        <main class="col-md-9 col-lg-10 p-4">

            <!-- HEADER -->
            <header class="header">
                <h1>
                    <i class="fa-solid fa-user-circle"></i>
                    Tentang Saya ♡
                </h1>

                <p>Kenali lebih dekat tentang saya ✨</p>
            </header>

            <div class="content">
                <div class="row">

                    <!-- DATA DIRI -->
                    <div class="col-lg-8 mb-4">
                        <div class="panel">

                            <h3 class="section-title">
                                <i class="fa-solid fa-address-card"></i>
                                Data Diri
                            </h3>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($data as $index => $item) { ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>

                                            <td class="field-name">
                                                <i class="fa-solid <?= htmlspecialchars($item[2]) ?>"></i>
                                                <?= htmlspecialchars($item[0]) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($item[1]) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                            </div>

                            <p class="quote">
                                "Langkah kecil hari ini, untuk masa depan yang besar." 💙
                            </p>

                        </div>
                    </div>

                    <!-- PROFIL DAN DESKRIPSI -->
                    <div class="col-lg-4 mb-4">
                        <div class="panel">

                            <div class="profile-card">

                                <img
                                    src="img/alisa.jpg"
                                    alt="Foto profil"
                                    class="profile-photo"
                                    onerror="this.style.display='none'; document.getElementById('fotoFallback').style.display='flex';">

                                <div id="fotoFallback"
                                     class="profile-photo mx-auto"
                                     style="display:none;align-items:center;justify-content:center;color:#398bd1;">
                                    <i class="fa-solid fa-user" style="font-size:55px;"></i>
                                </div>

                                <div class="profile-name">
                                    <?= htmlspecialchars($nama) ?>
                                </div>

                                <div class="profile-class">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <?= htmlspecialchars($kelas) ?>
                                </div>

                                <p class="mt-3 mb-0">
                                    <i class="fa-solid fa-school"></i>
                                    <?= htmlspecialchars($sekolah) ?>
                                </p>

                            </div>

                            <h3 class="section-title">
                                <i class="fa-solid fa-feather-pointed"></i>
                                Deskripsi Diri
                            </h3>

                            <div class="description">
                                Saya adalah seorang pelajar yang sedang belajar
                                di Jurusan Rekayasa Perangkat Lunak. Saya senang
                                mempelajari teknologi dan membuat website.

                                <br><br>

                                Saya ingin terus belajar agar bisa menjadi
                                <strong>Web Developer</strong>. Aamiin. 💙
                            </div>

                            <div class="text-center mt-4 icon-footer">
                                <i class="fa-solid fa-laptop"></i>
                                <i class="fa-solid fa-heart mx-3"></i>
                                <i class="fa-solid fa-book-open"></i>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>