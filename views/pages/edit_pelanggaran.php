<?php
require_once '../layouts/header.php';
require_once '../../koneksi.php';

// Ambil ID siswa dan ID pelanggaran dari URL
$siswa_id = isset($_GET['id']) ? $_GET['id'] : 0;
$pelanggaran_id = isset($_GET['pelanggaran_id']) ? $_GET['pelanggaran_id'] : 0;

// Pastikan ID valid
if ($siswa_id == 0 || $pelanggaran_id == 0) {
    echo "<div class='alert alert-danger'>ID tidak valid.</div>";
    exit;
}

// Ambil data pelanggaran berdasarkan pelanggaran_id
$query = "
    SELECT 
        u.id AS siswa_id,
        u.nama AS nama_siswa,
        u.kelas,
        p.id AS pelanggaran_id,
        p.nama_pelanggaran,
        p.poin,
        ps.tanggal
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE u.id = ? AND p.id = ?
";

$stmt = $db->prepare($query);
$stmt->execute([$siswa_id, $pelanggaran_id]);
$pelanggaran = $stmt->fetch();

// Pastikan pelanggaran ada
if (!$pelanggaran || !isset($pelanggaran['poin']) || !isset($pelanggaran['tanggal'])) {
    echo "<div class='alert alert-danger'>Data pelanggaran tidak ditemukan atau tidak lengkap.</div>";
    exit;
}

// Jika data pelanggaran tidak ditemukan
if (!$pelanggaran) {
    echo "<div class='alert alert-danger'>Data pelanggaran tidak ditemukan.</div>";
    exit;
}

// Ambil semua jenis pelanggaran
$pelanggaranList = $db->query("SELECT * FROM pelanggaran")->fetchAll();

//Proses form ketika di-submit 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form 
    $nama_pelanggaran = $_POST['nama_pelanggaran'];
    $poin = $_POST['poin'];
    $tanggal = $_POST['tanggal'];
    $pelanggaran_id = $_POST['pelanggaran_id'];
    // Update data pelanggaran 
    $updateQuery = "
    UPDATE pelanggaran_siswa 
    SET pelanggaran_id = ?, tanggal = ? 
    WHERE siswa_id = ? AND pelanggaran_id = ?
";
    $stmt = $db->prepare($updateQuery);
    $stmt->execute([$nama_pelanggaran, $tanggal, $siswa_id, $pelanggaran_id]);
    // Redirect ke halaman detail setelah update
    header("Location: detail_pelanggaran.php?id=$siswa_id");
    exit();
}
?>


<div class="container mt-4">
    <h1 class="text-center">Edit Pelanggaran Siswa</h1>

    <form method="POST">
        <div class="form-group">
            <label for="nama_pelanggaran">Jenis Pelanggaran</label>
            <select name="nama_pelanggaran" id="nama_pelanggaran" class="form-control" onchange="updatePoin()">
                <?php foreach ($pelanggaranList as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= $p['id'] == $pelanggaran['pelanggaran_id'] ? 'selected' : '' ?>>
                        <?= $p['nama_pelanggaran'] ?> (<?= $p['poin'] ?> poin)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="poin">Poin</label>
            <input type="number" class="form-control" id="poin" name="poin" value="<?= $pelanggaran['poin'] ?>" required
                disabled>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal"
                value="<?= date('d-F-Y', strtotime($pelanggaran['tanggal'])) ?>" required disabled>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="detail_pelanggaran.php?id=<?= $siswa_id ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- Tambahkan JavaScript untuk update poin berdasarkan pelanggaran -->
<script>
    function updatePoin() {
        var pelanggaranId = document.getElementById('nama_pelanggaran').value;

        // Cari data pelanggaran berdasarkan ID yang dipilih
        <?php foreach ($pelanggaranList as $p): ?>
            if (pelanggaranId == <?= $p['id'] ?>) {
                // Update nilai poin pada input field
                document.getElementById('poin').value = <?= $p['poin'] ?>;
            }
        <?php endforeach; ?>
    }
</script>

<?php require_once '../layouts/footer.php'; ?>