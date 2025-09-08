<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';


// Ambil ID siswa dari URL
if (!isset($_GET['id'])) {
    echo '<div class="alert alert-danger">ID siswa tidak ditemukan.</div>';
    require_once '../layouts/footer.php';
    exit;
}

$siswa_id = (int) $_GET['id'];

// Ambil info siswa
$siswa = $db->query("
    SELECT nama, kelas FROM users WHERE id = $siswa_id
")->fetch();

if (!$siswa) {
    echo '<div class="alert alert-warning">Data siswa tidak ditemukan.</div>';
    require_once '../layouts/footer.php';
    exit;
}

// Ambil semua pelanggaran siswa ini
$dataPelanggaran = $db->query("
    SELECT 
        p.nama_pelanggaran,
        p.poin,
        ps.tanggal
    FROM pelanggaran_siswa ps
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE ps.siswa_id = $siswa_id
    ORDER BY ps.tanggal DESC
")->fetchAll();

// Hitung total poin
$totalPoin = array_sum(array_column($dataPelanggaran, 'poin'));
?>

<div class="container mt-4">
    <h3>Rekap Pelanggaran Siswa</h3>
    <p><strong>Nama:</strong> <?= htmlspecialchars($siswa['nama']) ?></p>
    <p><strong>Kelas:</strong> <?= htmlspecialchars($siswa['kelas']) ?></p>
    <p><strong>Total Poin:</strong> <?= $totalPoin ?></p>

    <div class="table-responsive mt-3">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Poin</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dataPelanggaran)): ?>
                    <tr>
                        <td colspan="4">Belum ada data pelanggaran.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($dataPelanggaran as $i => $pelanggaran): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($pelanggaran['nama_pelanggaran']) ?></td>
                            <td><?= $pelanggaran['poin'] ?></td>
                            <td><?= $pelanggaran['tanggal'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-end"><strong>Total Poin:</strong></td>
                        <td><?= $totalPoin ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="container d-flex justify-content-between">
        <a href="index.php?page=rekap_pelanggaran" class="btn btn-secondary mt-3">← Kembali</a>

        <a href="index.php?page=cetak_rekap_siswa&id=<?= $siswa_id ?>" class="btn btn-danger mt-3" target="_blank">
            Cetak PDF
            <i class="fa fa-file-pdf"></i>
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>