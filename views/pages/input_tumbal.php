<?php
require_once '../layouts/header.php';
require_once '../../koneksi.php'; // file koneksi DB



// Ambil data kelas unik
$kelasList = $db->query("SELECT DISTINCT kelas FROM users")->fetchAll();

// Jika kelas dipilih, ambil siswa berdasarkan kelas
$selectedKelas = $_GET['kelas'] ?? '';
$siswaList = [];
if ($selectedKelas) {
    $stmt = $db->prepare("SELECT * FROM users WHERE kelas = ?");
    $stmt->execute([$selectedKelas]);
    $siswaList = $stmt->fetchAll();
}

// Ambil semua jenis pelanggaran
$pelanggaranList = $db->query("SELECT * FROM pelanggaran")->fetchAll();

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $siswaId = $_POST['siswa_id'];
    $pelanggaranId = $_POST['pelanggaran_id'];

    $stmt = $db->prepare("INSERT INTO pelanggaran_siswa (siswa_id, pelanggaran_id) VALUES (?, ?)");
    $stmt->execute([$siswaId, $pelanggaranId]);
    echo "<div class='alert alert-success'>Data pelanggaran berhasil disimpan.</div>";
}
?>

<div class="container mt-4">
    <h2 class="mb-3">Input Pelanggaran Siswa</h2>

    <!-- Form Pilih Kelas -->
    <form method="GET" class="mb-3">
        <label for="kelas">Pilih Kelas:</label>
        <select name="kelas" id="kelas" class="form-select w-auto d-inline" onchange="this.form.submit()">
            <option value="">-- Pilih Kelas --</option>
            <?php foreach ($kelasList as $kelas): ?>
                <option value="<?= $kelas['kelas'] ?>" <?= $selectedKelas == $kelas['kelas'] ? 'selected' : '' ?>>
                    <?= $kelas['kelas'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Form Input Pelanggaran -->
    <?php if ($selectedKelas): ?>
        <form method="POST">
            <div class="mb-3">
                <label for="siswa_id">Nama Siswa:</label>
                <select name="siswa_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    <?php foreach ($siswaList as $siswa): ?>
                        <option value="<?= $siswa['id'] ?>"><?= $siswa['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="pelanggaran_id">Jenis Pelanggaran:</label>
                <select name="pelanggaran_id" class="form-select" required>
                    <option value="">-- Pilih Pelanggaran --</option>
                    <?php foreach ($pelanggaranList as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['nama_pelanggaran'] ?> (<?= $p['poin'] ?> poin)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endif; ?>
</div>

<?php require_once '../layouts/footer.php'; ?>