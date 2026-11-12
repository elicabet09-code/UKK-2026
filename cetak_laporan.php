<?php
// cetak_laporan.php

require_once __DIR__ . '/laporan_data.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Pelanggaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            @page {
                size: landscape;
                margin: 10mm;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between mb-4 no-print">

        <h4>Pratinjau Laporan</h4>

        <button onclick="window.print()" class="btn btn-primary">
            Cetak Sekarang
        </button>

    </div>

    <div class="text-center mb-4">
        <h3>LAPORAN PELANGGARAN SISWA</h3>

        <p>
            Periode:
            <?= htmlspecialchars($tanggal_mulai ?: 'Semua tanggal'); ?>
            -
            <?= htmlspecialchars($tanggal_selesai ?: 'Semua tanggal'); ?>
        </p>
    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Nama Pelanggaran</th>
                <th>Guru Pencatat</th>
                <th>Tanggal</th>
                <th>Poin</th>
                <th>Tindakan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $no = 1;

            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama_siswa'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($row['nama_kelas'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($row['nama_pelanggaran'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($row['nama_guru'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($row['tanggal'] ?? '-'); ?></td>
                    <td><?= (int) ($row['poin'] ?? 0); ?></td>
                    <td><?= htmlspecialchars($row['tindakan'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($row['status'] ?? '-'); ?></td>
                </tr>

            <?php } ?>

            <?php if ($no === 1) { ?>
                <tr>
                    <td colspan="9" class="text-center">
                        Belum ada data laporan.
                    </td>
                </tr>
            <?php } ?>

        </tbody>

    </table>

    <div class="mt-4 text-end">
        Dicetak pada: <?= date('d-m-Y H:i:s'); ?>
    </div>

</div>

</body>
</html>

<?php
mysqli_stmt_close($stmt);
?>