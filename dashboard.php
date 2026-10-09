<?php
//dashboard.php
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
     <head>
        <title>dashboard - Pelanggaran Siswa</title>
     </head>
<body>
    <h1>selamat datang, <?php echo $_SESSION['name']; ?></h1>
    <p>anda login sebagai: <?php echo $_SESSION['role']; ?></p>

<ul>
<?php if ($_SESSION['role'] == 'admin' ) { ?>
     <li><a href="kelola_Guru.php">Kelola Guru </a></li>
     <li><a href="kelola_Siswa.php">Kelola Siswa </a></li>
     <li><a href="Kelola_Kelas.php">Kelola Kelas </a></li>
     <li><a href="Kelola_Tahun_Ajaran.php">Kelola Tahun Ajaran </a></li>
     <li><a href="Kelola_Wali_Kelas.php">Kelola Wali Kelas </a></li>
     <li><a href="Kelola_Pelanggaran_Kategori.php">Kelola Pelanggaran Kategori </a></li>
     <li><a href="Penempatan_Siswa.php">Penempatan Siswa </a></li>
     
<?php } ?>

<?php if ($_SESSION['role'] == 'guru' ) { ?>
     <li><a href="menu3.php">menu 3 </a></li>
     <li><a href="menu4.php">menu 4 </a></li>
<?php } ?>
</ul>     
    <a href="logout.php">logout</a>
</body>
</html>