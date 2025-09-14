<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . '/../../../koneksi.php';

$id = (int) $_GET['id'];

$stmt = $db->prepare('SELECT * FROM pelanggaran WHERE id = :id');
$stmt->execute(['id' => $id]);
$result = $stmt->fetch();

if (isset($_POST['submit'])) {
    $stmt = $db->prepare('UPDATE pelanggaran SET nama_pelanggaran = :nama_pelanggaran, poin = :poin WHERE id = :id');
    $stmt->execute(['nama_pelanggaran' => $_POST['nama_pelanggaran'], 'poin' => $_POST['poin'], 'id' => $id]);

    $nama_pelanggaran = htmlspecialchars($_POST['nama_pelanggaran']);
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Profil <strong>{$nama_pelanggaran}</strong> berhasil diubah',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = `index.php?page=jenis_pelanggaran`;
                }
            });
        });
    </script>
    ";
    exit();

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Jenis Pelanggaran</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <div class="mb-3">
                            <label for="nama_pelanggaran" class="form-label">Nama Pelanggaran</label>
                            <input type="text" class="form-control" id="nama_pelanggaran" name="nama_pelanggaran"
                                value="<?= $result['nama_pelanggaran'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="poin" class="form-label">Poin</label>
                            <input type="number" class="form-control" id="poin" name="poin"
                                value="<?= $result['poin'] ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>