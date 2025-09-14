<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelanggaran = $_POST['nama_pelanggaran'];
    $poin = $_POST['poin'];

    $stmt = $db->prepare("INSERT INTO pelanggaran (nama_pelanggaran, poin) VALUES (:nama_pelanggaran, :poin)");
    $stmt->execute(['nama_pelanggaran' => $nama_pelanggaran, 'poin' => $poin]);

    echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data pelanggaran berhasil disimpan.',
                    confirmButtonColor: '#3085d6',
                    timer: 6000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'index.php?page=input_jenis_pelanggaran';
                    }
                });
            });
        </script>
    ";
}

?>
<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_pelanggaran" class="form-label">Nama Pelanggaran</label>
            <input type="text" class="form-control" id="nama_pelanggaran" name="nama_pelanggaran" required autofocus>
        </div>
        <div class="mb-3">
            <label for="poin" class="form-label">Poin</label>
            <input type="number" class="form-control" id="poin" name="poin" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>