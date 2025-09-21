<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

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
            ps.id AS pelanggaran_siswa_id,
            u.id AS siswa_id,
            u.nama AS nama_siswa,
            u.kelas,
            p.nama_pelanggaran,
            p.poin,
            ps.tanggal,
            p.id AS pelanggaran_id,
            ps.guru_piket,
            jabatan.status_kelas,
            jabatan.id AS jabatan_id,
            jabatan.nama_jabatan
        FROM pelanggaran_siswa ps
        JOIN users u ON ps.siswa_id = u.id
        JOIN pelanggaran p ON ps.pelanggaran_id = p.id
        JOIN jabatan ON u.jabatan_id = jabatan.id
        WHERE u.id = ?
        ORDER BY ps.tanggal ASC
    ";

$stmt = $db->prepare($query);
$stmt->execute([$siswa_id]);
$pelanggaranSiswa = $stmt->fetchAll();


// Jika tidak ada data pelanggaran untuk siswa ini
if (empty($pelanggaranSiswa)) {
    echo "<div class='alert alert-info'>Tidak ada pelanggaran untuk siswa ini.</div>";
    echo "<div class='text-center'><a href='index.php?page=rekap_pelanggaran' class='btn btn-primary'>Kembali</a></div>";
    exit;
}

// Ambil kelas siswa
$kelas_siswa = $pelanggaranSiswa[0]['kelas'];

// Ambil wali kelas berdasarkan kelas siswa
$waliKelasQuery = "
        SELECT u.nama AS nama_wali_kelas
        FROM users u 
        WHERE u.role_id = 2 AND u.kelas = ?
    ";

// Siapkan query untuk wali kelas
$waliKelasStmt = $db->prepare($waliKelasQuery);
$waliKelasStmt->execute([$kelas_siswa]);

// Ambil hasilnya
$waliKelas = $waliKelasStmt->fetch();

// Tampilkan nama wali kelas
// if ($waliKelas) {
//     echo "<h5>Wali Kelas: " . htmlspecialchars($waliKelas['nama_wali_kelas']) . "</h5>";
// } else {
//     echo "<h5>Wali Kelas tidak ditemukan.</h5>";
// }
?>

<style>
    @media screen and (max-width: 768px) {
        .title {
            font-size: 22px;
        }

        .card-header-text {
            font-size: 15px;
        }

        .table {
            font-size: 13px;
            align-items: center;
        }

        .btn-sm {
            display: flex;
            justify-content: between;
            gap: 2px;
        }

        .btn {
            padding: 3px;
            font-size: 12px;
        }

        .delete {
            display: none;
        }

        .text-tabel {
            font-size: 12px;
        }

        .tanggal {
            white-space: nowrap;
        }
    }
</style>

<div class="container mt-2">
    <h1 class="text-center title">Detail Pelanggaran Siswa</h1>

    <div class="card">
        <div class="card-header">
            <h4 class="card-header-text">Nama Siswa: <?= htmlspecialchars($pelanggaranSiswa[0]['nama_siswa']) ?></h4>
            <h5 class="card-header-text">Kelas: <?= htmlspecialchars($pelanggaranSiswa[0]['kelas']) ?></h5>
            <h5 class="card-header-text">Wali Kelas:
                <?= htmlspecialchars($waliKelas['nama_wali_kelas'] ?? '(Bukan Guru Kelas)') ?>
            </h5>
            <!-- <h5> <?= htmlspecialchars($pelanggaranSiswa[0]['siswa_id']) ?></h5> -->
        </div>
        <div class="container">
            <div class="table-responsive mt-1" style="max-height: 300px; overflow-y: auto;">
                <!-- <h5>Daftar Pelanggaran:</h5> -->

                <table class="table table-bordered table-hover">
                    <thead class="table-primary sticky-top">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Poin</th>
                            <th>Guru Piket</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($pelanggaranSiswa as $index => $pelanggaran): ?>
                            <tr class="text-tabel">
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($pelanggaran['nama_pelanggaran']) ?></td>
                                <td><?= $pelanggaran['poin'] ?></td>
                                <td><?= $pelanggaran['guru_piket'] ?></td>
                                <td class="tanggal"><?= date('d-F-Y', strtotime($pelanggaran['tanggal'])) ?></td>
                                <td class="btn-sm">
                                    <a href="index.php?page=edit_pelanggaran&id=<?= $pelanggaran['siswa_id'] ?>&pelanggaran_siswa_id=<?= $pelanggaran['pelanggaran_siswa_id'] ?>"
                                        class="btn btn-primary">
                                        Edit
                                    </a>
                                    <?php if ($_SESSION['role_id'] == 1): ?>
                                        <button type="button" class="btn btn-danger"
                                            onclick="konfirmasiHapus(<?= $pelanggaran['siswa_id'] ?>, <?= $pelanggaran['pelanggaran_siswa_id'] ?>)">
                                            Hapus
                                            <i class="fa fa-trash delete"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-between">
        <?php if ($_SESSION['role_id'] == 1): ?>
            <a href="index.php?page=rekap_pelanggaran" class="btn btn-secondary mt-3" onclick="window.close();">←
                Kembali</a>
        <?php endif; ?>

        <?php if ($_SESSION['role_id'] == 2): ?>
            <a href=" index.php?page=data_siswa_pelanggaran_siswa" class="btn btn-secondary mt-3"
                onclick="window.close();">← Kembali</a>
        <?php endif; ?>
    </div>
</div>

<!-- border spinner -->
<script>
    Swal.fire("SweetAlert2 is working!");
    Swal.fire({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success"
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function konfirmasiHapus(siswa_id, pelanggaran_siswa_id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pelanggaran ini akan dihapus dan tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak, Batal!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Terhapus!",
                    text: "Data pelanggaran berhasil dihapus.",
                    icon: "success",
                    timer: 6000,
                    timerProgressBar: true,
                    willClose: () => {
                        // Redirect ke file hapus jika user konfirmasi
                        window.location.href = `index.php?page=hapus_pelanggaran&id=${siswa_id}&pelanggaran_siswa_id=${pelanggaran_siswa_id}`
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Pelanggaran tidak jadi dihapus.',
                    'error'
                );
            }
        });
    }
</script>



<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>