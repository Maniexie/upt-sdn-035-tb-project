<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";

// Ambil kelas wali kelas dari session
$kelasWali = $_SESSION['user_kelas'];

// Query untuk mengambil data siswa di kelas wali saja
$query = $db->prepare("SELECT 
    u.id, 
    u.nama, 
    u.kelas, 
    SUM(p.poin) as total_poin 
    FROM users u 
    JOIN pelanggaran_siswa ps ON u.id = ps.siswa_id 
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id 
    WHERE u.kelas = :kelas 
    GROUP BY u.id 
    ORDER BY u.nama ASC");

$query->execute(['kelas' => $kelasWali]);
$dataSiswa = $query->fetchAll();

?>
<div class="container">
    <table class="table border border-dark border-2 mt-2" style="text-align: center; max-height: 400px;">
        <h3 style="text-align: center;">Data Pelanggaran Siswa kelas <?= $kelasWali ?></h3>
        <thead class="table-info">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataSiswa as $siswa) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($siswa['nama']) ?></td>
                    <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                    <td><?= $siswa['total_poin'] ?></td>
                    <td>
                        <a href="index.php?page=detail_pelanggaran&id=<?= $siswa['id'] ?>"
                            class="btn btn-primary btn-sm">Detail</a>
                        <a href="index.php?page=rekap_pelanggaran_siswa&id=<?= $siswa['id'] ?>"
                            class="btn btn-success btn-sm">
                            Rekap <i class="fa-solid fa-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . "/../../layouts/footer.php";
?>