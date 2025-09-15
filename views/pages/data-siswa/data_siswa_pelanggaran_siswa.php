<?php
// require_once '../layouts/header.php';
require_once(__DIR__ . '/../../layouts/header.php');
require_once(__DIR__ . '/../../../koneksi.php');
// echo __DIR__;
// Debugging untuk melihat direktori saat ini


$kelasWali = $_SESSION['user_kelas'];

$dataPelanggaran = $db->prepare("
    SELECT 
        u.id AS siswa_id,
        u.nama AS nama_siswa,
        u.kelas,
        SUM(p.poin) AS total_poin
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE u.kelas = :kelasWali AND u.role_id = 3
    GROUP BY u.id
    HAVING total_poin > 0
    ORDER BY nama_siswa ASC
");

$dataPelanggaran->execute(['kelasWali' => $kelasWali]);
$data = $dataPelanggaran->fetchAll();


?>

<div class="container mt-2">
    <h2 class="text-center">Daftar Pelanggaran Siswa di Kelas <?= htmlspecialchars($kelasWali) ?></h2>
    <table class="table table-bordered table-hover text-center">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data)): ?>
                <tr>
                    <td colspan="5">Tidak ada pelanggaran di kelas ini.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($data as $i => $siswa): ?>
                    <tr
                        class="<?= $siswa['total_poin'] >= 100 ? 'table-danger' : ($siswa['total_poin'] >= 70 ? 'table-warning' : '') ?>">
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($siswa['nama_siswa']) ?></td>
                        <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                        <td><?= $siswa['total_poin'] ?></td>
                        <td>
                            <a href="index.php?page=detail_pelanggaran&id=<?= $siswa['siswa_id'] ?>"
                                class="btn btn-primary btn-sm">
                                Detail
                                <!-- <i class="fa-solid fa-file-pdf"></i> -->
                            </a>

                            <a href="index.php?page=rekap_pelanggaran_siswa&id=<?= $siswa['siswa_id'] ?>"
                                class="btn btn-success btn-sm">
                                Rekap
                                <i class="fa-solid fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<?php
// require_once '/../layouts/footer.php';
require_once(__DIR__ . '/../../layouts/footer.php');
?>