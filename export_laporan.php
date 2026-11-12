<?php
// export_laporan.php

require_once __DIR__ . '/laporan_data.php';

// NAMA FILE
$nama_file = 'Laporan_Pelanggaran_' . date('Ymd_His') . '.csv';

// HEADER DOWNLOAD
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $nama_file . '"');
header('Pragma: no-cache');
header('Expires: 0');

// OUTPUT
$output = fopen('php://output', 'w');

// BOM EXCEL
fwrite($output, "\xEF\xBB\xBF");

// HEADER TABEL
fputcsv($output, [
    'No',
    'Nama Siswa',
    'Kelas',
    'Nama Pelanggaran',
    'Guru Pencatat',
    'Tanggal',
    'Poin',
    'Tindakan',
    'Status'
], ';');

// ISI DATA
$no = 1;

while ($row = mysqli_fetch_assoc($hasil)) {

    fputcsv($output, [
        $no++,
        $row['nama_siswa'] ?? '-',
        $row['nama_kelas'] ?? '-',
        $row['nama_pelanggaran'] ?? '-',
        $row['nama_guru'] ?? '-',
        $row['tanggal'] ?? '-',
        (int) ($row['poin'] ?? 0),
        $row['tindakan'] ?? '-',
        $row['status'] ?? '-'
    ], ';');

}

fclose($output);

mysqli_stmt_close($stmt);

exit;
?>