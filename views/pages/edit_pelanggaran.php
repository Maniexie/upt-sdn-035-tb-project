<?php
ob_start();
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../../koneksi.php';

// Ambil ID siswa dan ID pelanggaran dari URL (data lama)
$siswa_id = isset($_GET['id']) ? $_GET['id'] : 0;
$pelanggaran_siswa_id = isset($_GET['pelanggaran_siswa_id']) ? $_GET['pelanggaran_siswa_id'] : 0;
// $pelanggaran_lama = isset($_GET['pelanggaran_id']) ? $_GET['pelanggaran_id'] : 0;

// Pastikan ID valid
if ($siswa_id == 0 || $pelanggaran_siswa_id == 0) {
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
        ps.tanggal,
        ps.id AS pelanggaran_siswa_id
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE ps.id = ?
");
$stmt->execute([$pelanggaran_siswa_id]);
$pelanggaran = $stmt->fetch();

// Jika data pelanggaran tidak ditemukan
if (!$pelanggaran) {
    echo "<div class='alert alert-danger'>Data pelanggaran tidak ditemukan.</div>";
    exit;
}

// Proses update jika form disubmit
if (isset($_POST["submit"])) {
    $pelanggaran_baru = $_POST["pelanggaran_id"];
    $pelanggaran_lama = $pelanggaran["nama_pelanggaran"];
    $nama_siswa = $pelanggaran["nama_siswa"];


    $stmt = $db->prepare("
        SELECT 
            p.nama_pelanggaran AS nama_pelanggaran,
            u.nama AS nama_siswa
        FROM pelanggaran p 
        JOIN users u ON p.id = ?
    ");
    $stmt->execute([$pelanggaran_baru]);
    $nama_pelanggaran_baru = $stmt->fetchColumn();

    $updateQuery = "
        UPDATE pelanggaran_siswa 
        SET pelanggaran_id = ? 
        WHERE id = ?
    ";
    $stmt = $db->prepare($updateQuery);
    $stmt->execute([$pelanggaran_baru, $pelanggaran_siswa_id]);

    // Sweetalert

    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Merubah Pelanggaran!',
                    html: 'Nama : <b>$nama_siswa</b> <br>Pelanggaran <b>$pelanggaran_lama</b>  berhasil diubah menjadi <b>$nama_pelanggaran_baru</b>.',
                    confirmButtonColor: '#3085d6',
                    timer: 600000,
                    timerProgressBar: true,
                        willClose: () => {
                        window.location.href = 'index.php?page=detail_pelanggaran&id=' + '$siswa_id'; 
                    }
                });
            });
        </script>
        ";



    exit();
}
;
?>


<div class="container-md">
    <h1 class="text-center">Halaman Merubah Pelanggaran </h1>
    <form action="" method="POST" class="border rounded p-3">

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
<div class="container d-flex justify-content-between">
    <a href="detail_pelanggaran.php?id=<?= $pelanggaran['siswa_id'] ?>&pelanggaran_id=<?= $pelanggaran['pelanggaran_id'] ?>"
        class="btn btn-secondary mt-3">← Kembali</a>
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

<!-- border spinner -->
<script>

    Swal.fire("SweetAlert2 is working!");

    // Hilangkan alert sukses setelah 3 detik
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.remove();
        }
    }, 3000); // 3000ms = 3 detik
    setTimeout(() => {
        myModal.hide();
    }, 3000);

</script>

<?php
ob_end_flush();
?>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>