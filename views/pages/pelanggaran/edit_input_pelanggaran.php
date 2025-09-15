<?php
require_once __DIR__ . '/../../../koneksi.php';
require_once __DIR__ . '/../../layouts/header.php';

$id = (int) $_GET['id'];

// Ambil data pelanggaran siswa (termasuk pelanggaran_id saat ini)
$stmt = $db->prepare("SELECT ps.pelanggaran_id, ps.siswa_id, u.nama AS nama_siswa FROM pelanggaran_siswa ps JOIN users u ON ps.siswa_id = u.id WHERE ps.id = :id");
$stmt->execute([':id' => $id]);
$currentData = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika data tidak ditemukan
if (!$currentData) {
    echo "Data tidak ditemukan.";
    exit;
}

$currentPelanggaranId = $currentData['pelanggaran_id'];

// Proses update jika ada POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pelanggaran_id'])) {
    $pelanggaran_id = $_POST['pelanggaran_id'];

    $updateQuery = "UPDATE pelanggaran_siswa SET pelanggaran_id = :pelanggaran_id  WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->execute([
        ':id' => $id,
        ':pelanggaran_id' => $pelanggaran_id,
    ]);

    // $nama_pelanggaran = htmlspecialchars($_POST['nama_pelanggaran']);
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Pelanggaran dari siswa berhasil diubah',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = `index.php?page=input_pelanggaran`;
                }
            });
        });
    </script>
    ";
    exit();
}

// Ambil semua pelanggaran untuk dropdown
$query = "SELECT * FROM pelanggaran";
$stmt = $db->prepare($query);
$stmt->execute();
$allPelanggaran = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Pelanggaran Hari Ini</h2>
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <label for="siswa">Nama Siswa:</label>
                    <input type="text" class="form-control" id="siswa" name="siswa" readonly
                        value="<?php echo htmlspecialchars($currentData['nama_siswa']) ?>">
                </div>


                <div class="form-group mb-3">
                    <label for="pelanggaran">Jenis Pelanggaran:</label>
                    <select name="pelanggaran_id" class="form-select" required>
                        <?php foreach ($allPelanggaran as $pelanggaran): ?>
                            <option value="<?= $pelanggaran['id'] ?>" <?= $pelanggaran['id'] == $currentPelanggaranId ? 'selected' : '' ?>>
                                <?= htmlspecialchars($pelanggaran['nama_pelanggaran']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=input_pelanggaran" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>