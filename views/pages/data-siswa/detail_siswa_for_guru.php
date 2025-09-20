<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";

$id = (int) $_GET["id"];

// Ambil data siswa + total poin pelanggaran
$query = $db->prepare("
    SELECT 
        u.id,
        u.nama,
        u.nisn,
        u.kelas,
        u.role_id,
        COALESCE(SUM(p.poin), 0) AS total_poin
    FROM users u
    LEFT JOIN pelanggaran_siswa ps ON u.id = ps.siswa_id
    LEFT JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE u.id = :id AND u.role_id = 3
    GROUP BY u.id
");
$query->execute(['id' => $id]);
$siswa = $query->fetch();

// Jika data siswa tidak ditemukan, redirect
if (!$siswa) {
    echo "<script>alert('Data siswa tidak ditemukan'); window.location.href = 'index.php?page=daftar_siswa';</script>";
    exit();
}

// Ambil data wali kelas berdasarkan kelas siswa
$getWali = $db->prepare("SELECT nama, nip FROM users WHERE role_id = 2 AND kelas = :kelas");
$getWali->execute(['kelas' => $siswa['kelas']]);
$wali = $getWali->fetch();

$namaWali = $wali['nama'] ?? 'Tidak ditemukan';
$nipWali = $wali['nip'] ?? '-';
?>

<div class="container mt-4">
    <div class="container w-auto">
        <section>
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="card-title text-capitalize text-nowrap text-truncate">Detail Siswa :
                        <?= htmlspecialchars($siswa['nama']); ?>
                    </h2>
                </div>

                <div class="container">
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NISN </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nik"
                                value=": <?= htmlspecialchars($siswa['nisn']) ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nik"
                                value=": <?= htmlspecialchars($siswa['nama']) ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">Kelas </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nik"
                                value=": <?= htmlspecialchars($siswa['kelas']) ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">Total Poin </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nik"
                                value=": <?= htmlspecialchars($siswa['total_poin']) ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">Wali Kelas </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nik"
                                value=": <?= htmlspecialchars($namaWali) ?> (<?= htmlspecialchars($nipWali) ?>)">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container d-flex justify-content-between ">
            <a href="index.php?page=daftar_siswa" class="btn btn-sm btn-secondary mt-3">← Kembali</a>
            <button type="button" class="btn btn-primary btn-sm mt-3 px-4"
                onclick="infoEdit(<?= $siswa['id'] ?>)">Edit</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function infoEdit(id) {
        Swal.fire({
            icon: 'error',
            title: "Oops...",
            text: "Silahkan Lapor Admin / Operator!",
            confirmButtonColor: '#3085d6',
            timer: 6000,
            timerProgressBar: true
        })
    }
</script>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>