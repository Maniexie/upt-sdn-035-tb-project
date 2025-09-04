<?php
ob_start();
require_once '../layouts/header.php';
require_once '../../koneksi.php';

// Ambil ID siswa dan ID pelanggaran dari URL (data lama)
$siswa_id = isset($_GET['id']) ? $_GET['id'] : 0;
$pelanggaran_lama = isset($_GET['pelanggaran_id']) ? $_GET['pelanggaran_id'] : 0;

// Pastikan ID valid
if ($siswa_id == 0 || $pelanggaran_lama == 0) {
    echo "<div class='alert alert-danger'>ID tidak valid.</div>";
    exit;
}

// Ambil data pelanggaran berdasarkan pelanggaran_id
$stmt = $db->prepare("
    SELECT 
        u.id AS siswa_id,
        u.nama AS nama_siswa,
        u.kelas,
        p.id AS pelanggaran_id,
        p.nama_pelanggaran AS nama_pelanggaran,
        p.poin,
        ps.tanggal
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE u.id = ? AND p.id = ?
");
$stmt->execute([$siswa_id, $pelanggaran_lama]);
$pelanggaran = $stmt->fetch();

// Jika data pelanggaran tidak ditemukan
if (!$pelanggaran) {
    echo "<div class='alert alert-danger'>Data pelanggaran tidak ditemukan.</div>";
    exit;
}

// Proses update jika form disubmit
if (isset($_POST["submit"])) {
    $pelanggaran_baru = $_POST["pelanggaran_id"];
    // $tanggal = $_POST["tanggal"];

    // Update query (gunakan pelanggaran lama di WHERE)
    $updateQuery = "
        UPDATE pelanggaran_siswa 
        SET pelanggaran_id = ? 
        WHERE siswa_id = ? AND pelanggaran_id = ?
    ";
    $stmt = $db->prepare($updateQuery);
    $stmt->execute([$pelanggaran_baru, $siswa_id, $pelanggaran_lama]);

    // Redirect ke halaman detail setelah update
    header("Location: detail_pelanggaran.php?id=$siswa_id&pelanggaran_id=$pelanggaran_baru");
    exit();
}
;
?>


<div class="container-md">
    <h1>Halaman Merubah Pelanggaran </h1>
    <form action="" method="POST">

        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                value="<?php echo $pelanggaran["nama_siswa"]; ?>" readonly disabled>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $pelanggaran["kelas"]; ?>"
                readonly disabled>
        </div>

        <div class="form-group">
            <label for="pelanggaran_id">Pelanggaran</label>
            <select class="form-select" name="pelanggaran_id" id="pelanggaran_id" onchange="updatePoin()">
                <option value="<?php echo $pelanggaran['pelanggaran_id']; ?>" selected>
                    <?php echo $pelanggaran['nama_pelanggaran'] . " (" . $pelanggaran['poin'] . " poin)" ?>
                </option>
                <!-- Pastikan menampilkan daftar pelanggaran lainnya jika ada -->
                <?php
                // Query untuk mengambil semua pelanggaran
                $stmt_pelanggaran = $db->query("SELECT * FROM pelanggaran");
                while ($p = $stmt_pelanggaran->fetch()) {
                    echo "<option value='" . $p['id'] . "'>" . $p['nama_pelanggaran'] . " (" . $p['poin'] . " poin)" . "</option>";
                }
                ?>
            </select>
        </div>
        <h6 class="text-center">Melakukan pelanggaran pada tanggal
            <span class="fw-bold fs-6 "><?php echo date('d-F-Y', strtotime($pelanggaran['tanggal'])); ?></span>
        </h6>

        <div class="form-group">
            <!-- <label for="poin">Poin</label> -->
            <input type="hidden" class="form-control" id="poin" name="poin" value="<?= $pelanggaran['poin'] ?>" required
                readonly>
        </div>

        <!-- <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="hidden" class="form-control" id="tanggal" name="tanggal"
                value="<?php echo $pelanggaran['tanggal']; ?>" required readonly>
        </div> -->

        <button type="submit" class="btn btn-primary mt-2" name="submit">Simpan</button>
    </form>
</div>

<script>
    // Fungsi untuk memperbarui poin berdasarkan pelanggaran yang dipilih
    function updatePoin() {
        var pelanggaranId = document.getElementById('pelanggaran_id').value;

        // Ambil data pelanggaran berdasarkan ID
        <?php
        // Ambil semua pelanggaran
        $stmt_pelanggaran = $db->query("SELECT * FROM pelanggaran");
        $pelanggaranList = $stmt_pelanggaran->fetchAll();
        foreach ($pelanggaranList as $p):
            ?>
            if (pelanggaranId == <?= $p['id'] ?>) {
                // Update nilai poin pada input field
                document.getElementById('poin').value = <?= $p['poin'] ?>;
            }
        <?php endforeach; ?>
    }
</script>

<?php
ob_end_flush();
?>
<?php require_once '../layouts/footer.php'; ?>