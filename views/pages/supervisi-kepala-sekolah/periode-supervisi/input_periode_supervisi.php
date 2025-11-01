<?php

require_once __DIR__ . '/../../../layouts/header.php';
require_once __DIR__ . '/../../../../koneksi.php';


if (isset($_POST['periode'])) {
    $periode = $_POST['periode'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $stmt = $db->prepare('INSERT INTO periode_supervisi (nama_periode, tanggal_mulai, tanggal_selesai , keterangan , status , created_at , updated_at) 
VALUES (:periode, :tanggal_mulai, :tanggal_selesai, :keterangan, :status , NOW(), NOW())');

    $stmt->execute([
        ':periode' => $periode,
        ':tanggal_mulai' => $tanggal_mulai,
        ':tanggal_selesai' => $tanggal_selesai,
        ':keterangan' => $keterangan,
        ':status' => $status
    ]);


    echo "
     <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Periode Supervisi berhasil disimpan.',
                        confirmButtonColor: '#3085d6',
                        timer: 60000,
                        timerProgressBar: true,
                        willClose: () => {
                            window.location.href = 'index.php?page=periode_supervisi';
                        }
                    });
                });
            </script>
    ";
}



?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Input Periode Supervisi</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Input Periode Supervisi
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="periode" class="form-label">Nama Periode</label>
                    <input type="text" name="periode" class="form-control" id="periode" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" required>
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" value="periode">Simpan</button>
            </form>
        </div>
    </div>

</div>

<?php require_once __DIR__ . '/../../../layouts/footer.php'; ?>