<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";

// Ambil kelas wali kelas dari session
$kelasWali = $_SESSION['user_kelas'];

// Query untuk mengambil data siswa di kelas wali saja
$query = $db->prepare("SELECT 
    u.id, 
    u.nama, 
    u.nisn,
    u.kelas, 
    COALESCE(SUM(p.poin), 0) as total_poin 
    FROM users u 
    LEFT JOIN pelanggaran_siswa ps ON u.id = ps.siswa_id
    LEFT JOIN pelanggaran p ON ps.pelanggaran_id = p.id 
    WHERE u.kelas = :kelas AND u.role_id = 3
    GROUP BY u.id 
    ORDER BY u.nama ASC");

$query->execute(['kelas' => $kelasWali]);
$dataSiswa = $query->fetchAll();

?>

<style>
    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .title {
            font-size: 22px;
        }

        .table {
            font-size: 12px;
        }

        .btn {
            font-size: 12px;
            padding: 4px;
        }
    }
</style>

<section class="container">
    <h1 class="text-center me-5 title">Daftar Siswa kelas <?= htmlspecialchars($kelasWali) ?></h1>
    <div class="table-responsive overflow-y-auto" style="max-height: 500px;">
        <table class="table table-hover">
            <thead class="table-primary sticky-top bg-primary text-white" style="z-index: auto;">
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dataSiswa as $siswa) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($siswa['nisn']) ?></td>
                        <td><?= htmlspecialchars($siswa['nama']) ?></td>
                        <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                        <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->
                            <a href="index.php?page=detail_siswa_for_guru&id=<?= $siswa['id'] ?>"
                                class="btn btn-primary btn-sm">Detail</a>
                            <!-- <a href="index.php?page=rekap_pelanggaran_siswa&id=<?= $siswa['id'] ?>"
                            class="btn btn-success btn-sm">
                            Rekap <i class="fa-solid fa-file-pdf"></i>
                        </a> -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>


<?php
require_once __DIR__ . "/../../layouts/footer.php";
?>