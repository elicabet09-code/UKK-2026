<?php
// data_siswa.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

// Mengurutkan data siswa berdasarkan nama
$sql = "SELECT * FROM t_siswa ORDER BY nama ASC";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - Sistem Pelanggaran Siswa</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- DataTables Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <?php include 'layout/sidebar.php'; ?>

        <!-- KONTEN -->
        <main class="col-md-9 col-lg-10 p-4">

            <h1>Data Siswa</h1>
            <p>Selamat datang di halaman Siswa.</p>

            <p>
                <a href="dashboard.php" class="btn btn-primary">
                    Kembali ke Dashboard
                </a>

                <a href="tambah_siswa.php" class="btn btn-success">
                    Tambah Siswa
                </a>
            </p>

            <!-- TABEL SISWA -->
            <div class="table-responsive">
                <table id="tabelSiswa"
                       class="table table-bordered table-striped table-hover">

                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Status Aktif</th>
                            <th>Dibuat</th>
                            <th>Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($hasil)) {
                        ?>
                        <tr>
                            <!-- NOMOR URUT OTOMATIS -->
                            <td><?php echo $no++; ?></td>

                            <td>
                                <?php echo htmlspecialchars($row['nis'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['nisn'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['nama'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['jenis_kelamin'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['tanggal_lahir'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['alamat'] ?? ''); ?>
                            </td>

                            <td>
                                <?php
                                echo ($row['status_aktif'] == 1)
                                    ? 'Aktif'
                                    : 'Tidak Aktif';
                                ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['created_at'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['updated_at'] ?? ''); ?>
                            </td>

                            <td>
                                <a href="edit_siswa.php?id=<?php
                                    echo urlencode($row['id']);
                                ?>" class="btn btn-primary btn-sm mb-1">
                                    Edit
                                </a>

                                <a href="hapus_siswa.php?id=<?php
                                    echo urlencode($row['id']);
                                ?>"
                                   class="btn btn-danger btn-sm mb-1"
                                   onclick="return confirm('Yakin ingin menghapus data siswa ini?');">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </main>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function () {
    $('#tabelSiswa').DataTable({
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],

        // Kolom nomor tidak diurutkan seperti kolom data biasa
        ordering: true,
        order: [[3, 'asc']],

        searching: true,
        paging: true,

        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data siswa tidak ditemukan",
            emptyTable: "Belum ada data siswa",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(difilter dari _MAX_ total data)",
            search: "Cari siswa:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        },

        // Nomor akan diperbarui sesuai urutan tampilan DataTables
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                searchable: false
            },
            {
                targets: 10,
                orderable: false,
                searchable: false
            }
        ],

        // Memperbarui nomor saat halaman, pencarian,
        // atau pengurutan data berubah
        drawCallback: function () {
            var api = this.api();

            var info = api.page.info();

            api.column(0, {
                page: 'current'
            }).nodes().each(function (cell, i) {
                cell.innerHTML = info.start + i + 1;
            });
        }
    });
});
</script>

</body>
</html>