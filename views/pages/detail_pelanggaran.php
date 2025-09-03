<?php
require_once '../layouts/header.php';
require_once '../../koneksi.php';

// Ambil ID siswa dari URL
$siswa_id = isset($_GET['id']) ? $_GET['id'] : 0;  // Cek apakah ID ada di URL, jika tidak, set ID ke 0

// Pastikan ID valid
if ($siswa_id == 0) {
    echo "<div class='alert alert-danger'>ID siswa tidak valid.</div>";
    exit;
}

// Ambil data pelanggaran siswa berdasarkan ID
$query = "
    SELECT 
        u.id AS siswa_id,
        u.nama AS nama_siswa,
        u.kelas,
        p.nama_pelanggaran,
        p.poin,
        ps.tanggal,
        p.id AS pelanggaran_id
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE u.id = ?
    ORDER BY ps.tanggal ASC
";

$stmt = $db->prepare($query);
$stmt->execute([$siswa_id]);
$pelanggaranSiswa = $stmt->fetchAll();

// Jika tidak ada data pelanggaran untuk siswa ini
if (empty($pelanggaranSiswa)) {
    echo "<div class='alert alert-info'>Tidak ada pelanggaran untuk siswa ini.</div>";
    exit;
}
?>

<div class="container mt-2">
    <h1 class="text-center">Detail Pelanggaran Siswa</h1>

    <div class="card">
        <div class="card-header">
            <h4>Nama Siswa: <?= htmlspecialchars($pelanggaranSiswa[0]['nama_siswa']) ?></h4>
            <h5>Kelas: <?= htmlspecialchars($pelanggaranSiswa[0]['kelas']) ?></h5>
            <h5> <?= htmlspecialchars($pelanggaranSiswa[0]['siswa_id']) ?></h5>
        </div>
        <div class="card-body" style="height: 600px; overflow-y: auto;">
            <!-- <h5>Daftar Pelanggaran:</h5> -->
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Poin</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($pelanggaranSiswa as $index => $pelanggaran): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($pelanggaran['nama_pelanggaran']) ?></td>
                            <td><?= $pelanggaran['poin'] ?></td>
                            <td><?= date('d-F-Y', strtotime($pelanggaran['tanggal'])) ?></td>
                            <td>
                                <a href="edit_pelanggaran.php?id=<?= $pelanggaran['siswa_id'] ?>&pelanggaran_id=<?= $pelanggaran['pelanggaran_id'] ?>"
                                    class="btn btn-primary">
                                    Edit
                                </a>


                                <a href="hapus_pelanggaran.php?id=<?= $pelanggaran['siswa_id'] ?>&pelanggaran_id=<?= $pelanggaran['pelanggaran_id'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus pelanggaran ini?');">
                                    Hapus
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container d-flex justify-content-between">
        <a href="rekap_pelanggaran.php" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
</div>

<?php require_once '../layouts/footer.php'; ?>