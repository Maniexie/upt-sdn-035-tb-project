<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";


$dataSiswa = $db->prepare("SELECT * FROM users  WHERE users.id = :id");
$dataSiswa->execute(['id' => $_GET['id']]);
$dataSiswa = $dataSiswa->fetch();


// Ambil data guru wali kelas
$guru = $db->query("
    SELECT nama,nip 
    FROM users 
    WHERE role_id = 2 
      AND kelas = '" . $dataSiswa['kelas'] . "'
    LIMIT 1
")->fetch();

$namaGuru = $guru ? $guru['nama'] : 'Nama Wali Kelas';
$nipGuru = $guru ? $guru['nip'] : 'NIP Wali Kelas';

?>
<div class="container w-auto">
    <div class="card mt-4 p-4">
        <div class="card-header">
            <h2 class="card-title text-capitalize">
                Detail Siswa <?= htmlspecialchars($dataSiswa['nama']) ?>
            </h2>
        </div>
        <div class="mb-3 row">
            <label for="nisn" class="col-sm-2 col-form-label">NISN </label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="nisn"
                    value=": <?= htmlspecialchars($dataSiswa['nisn']) ?>">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="nama"
                    value=": <?= htmlspecialchars($dataSiswa['nama']) ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kelas"
                    value=": <?= htmlspecialchars($dataSiswa['kelas']) ?>">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="ttl" class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="ttl"
                    value=": <?= htmlspecialchars($dataSiswa['tempat_lahir']) ?>, <?= htmlspecialchars($dataSiswa['tanggal_lahir']) ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ttl" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="ttl"
                    value=": <?= htmlspecialchars($dataSiswa['alamat']) ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Wali Kelas</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kelas"
                    value=": <?= htmlspecialchars($namaGuru) ?> (<?= htmlspecialchars($nipGuru) ?> )">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="aksi" class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <a href="index.php?page=edit_data_siswa&id=<?= $dataSiswa['id'] ?>" class="btn btn-primary btn-sm">
                    Edit
                </a>
                <a href="index.php?page=hapus_siswa&id=<?= $dataSiswa['id'] ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Anda yakin ingin menghapus siswa ini?')">
                    Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>