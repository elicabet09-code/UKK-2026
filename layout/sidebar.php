
<?php
// ==========================================
// SIDEBAR DAN IDENTIFIKASI ROLE
// ==========================================

$current_page = basename($_SERVER['PHP_SELF']);

$role = strtolower(trim($_SESSION['role'] ?? ''));

$id_user = (int) (
    $_SESSION['id_user'] ??
    $_SESSION['id'] ??
    0
);

// Normalisasi role
if (in_array($role, ['wali kelas', 'walikelas'], true)) {
    $role = 'wali_kelas';
}

$is_wali_kelas = ($role === 'wali_kelas');
$id_guru_sidebar = 0;

// Cek guru yang memiliki penugasan wali kelas aktif
if (
    $role === 'guru' &&
    $id_user > 0 &&
    isset($koneksi)
) {
    $sql_wali = "
        SELECT g.id
        FROM t_guru g
        INNER JOIN t_wali_kelas w
            ON w.guru_id = g.id
        WHERE g.user_id = ?
          AND w.status_aktif = 1
        LIMIT 1
    ";

    $stmt_wali = mysqli_prepare($koneksi, $sql_wali);

    if ($stmt_wali) {
        mysqli_stmt_bind_param($stmt_wali, "i", $id_user);
        mysqli_stmt_execute($stmt_wali);
        mysqli_stmt_bind_result($stmt_wali, $id_guru_sidebar);

        if (mysqli_stmt_fetch($stmt_wali)) {
            $is_wali_kelas = true;
        }

        mysqli_stmt_close($stmt_wali);
    }
}
?>

<?php if ($role === 'admin') { ?>

<!-- ======================================
     SIDEBAR ADMIN
====================================== -->

<div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3 sidebar">

    <h4 class="text-white mb-4">Pelanggaran Siswa</h4>

    <ul class="nav nav-pills flex-column">

        <li class="nav-item mb-2">
            <a href="dashboard.php"
               class="nav-link <?= $current_page === 'dashboard.php' ? 'active' : 'text-white' ?>">
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_siswa.php"
               class="nav-link <?= $current_page === 'kelola_siswa.php' ? 'active' : 'text-white' ?>">
                Data Siswa
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_guru.php"
               class="nav-link <?= $current_page === 'kelola_guru.php' ? 'active' : 'text-white' ?>">
                Data Guru
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_kelas.php"
               class="nav-link <?= $current_page === 'kelola_kelas.php' ? 'active' : 'text-white' ?>">
                Data Kelas
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_tahun_ajaran.php"
               class="nav-link <?= $current_page === 'kelola_tahun_ajaran.php' ? 'active' : 'text-white' ?>">
                Data Tahun Ajaran
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_wali_kelas.php"
               class="nav-link <?= $current_page === 'kelola_wali_kelas.php' ? 'active' : 'text-white' ?>">
                Data Wali Kelas
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="penempatan_siswa.php"
               class="nav-link <?= $current_page === 'penempatan_siswa.php' ? 'active' : 'text-white' ?>">
                Penempatan Siswa
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_pelanggaran_kategori.php"
               class="nav-link <?= $current_page === 'kelola_pelanggaran_kategori.php' ? 'active' : 'text-white' ?>">
                Kategori Pelanggaran
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="kelola_jenis_pelanggaran.php"
               class="nav-link <?= $current_page === 'kelola_jenis_pelanggaran.php' ? 'active' : 'text-white' ?>">
                Jenis Pelanggaran
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="laporan.php"
               class="nav-link <?= $current_page === 'laporan.php' ? 'active' : 'text-white' ?>">
                Laporan
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="aboutme.php"
               class="nav-link <?= $current_page === 'aboutme.php' ? 'active' : 'text-white' ?>">
                About Me
            </a>
        </li>

        <hr class="text-secondary">

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
                Logout
            </a>
        </li>

    </ul>
</div>

<?php } elseif ($is_wali_kelas) { ?>

<!-- ======================================
     SIDEBAR WALI KELAS
====================================== -->

<div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3 sidebar">

    <h4 class="text-white mb-4">Pelanggaran Siswa</h4>

    <ul class="nav nav-pills flex-column">

        <li class="nav-item mb-2">
            <a href="dashboard.php"
               class="nav-link <?= $current_page === 'dashboard.php' ? 'active' : 'text-white' ?>">
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="catat_pelanggaran.php"
               class="nav-link <?= $current_page === 'catat_pelanggaran.php' ? 'active' : 'text-white' ?>">
                Catat Pelanggaran
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="tindakan.php"
               class="nav-link <?= $current_page === 'tindakan.php' ? 'active' : 'text-white' ?>">
                Tindakan
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="riwayat.php"
               class="nav-link <?= $current_page === 'riwayat.php' ? 'active' : 'text-white' ?>">
                Riwayat
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="rekap_poin.php"
               class="nav-link <?= $current_page === 'rekap_poin.php' ? 'active' : 'text-white' ?>">
                Rekap Poin
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="laporan.php"
               class="nav-link <?= $current_page === 'laporan.php' ? 'active' : 'text-white' ?>">
                Laporan
            </a>
        </li>

        <hr class="text-secondary">

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
                Logout
            </a>
        </li>

    </ul>
</div>

<?php } elseif ($role === 'guru') { ?>

<!-- ======================================
     SIDEBAR GURU BIASA
====================================== -->

<div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3 sidebar">

    <h4 class="text-white mb-4">Pelanggaran Siswa</h4>

    <ul class="nav nav-pills flex-column">

        <li class="nav-item mb-2">
            <a href="dashboard.php"
               class="nav-link <?= $current_page === 'dashboard.php' ? 'active' : 'text-white' ?>">
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="catat_pelanggaran.php"
               class="nav-link <?= $current_page === 'catat_pelanggaran.php' ? 'active' : 'text-white' ?>">
                Catat Pelanggaran
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="tindakan.php"
               class="nav-link <?= $current_page === 'tindakan.php' ? 'active' : 'text-white' ?>">
                Tindakan
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="riwayat.php"
               class="nav-link <?= $current_page === 'riwayat.php' ? 'active' : 'text-white' ?>">
                Riwayat
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="rekap_poin.php"
               class="nav-link <?= $current_page === 'rekap_poin.php' ? 'active' : 'text-white' ?>">
                Rekap Poin
            </a>
        </li>

        <hr class="text-secondary">

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
                Logout
            </a>
        </li>

    </ul>
</div>

<?php } ?>
