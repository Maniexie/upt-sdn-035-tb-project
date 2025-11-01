<?php

require_once __DIR__ . '/../../../layouts/header.php';

require_once __DIR__ . '/../../../../koneksi.php';


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo 'Session user_id tidak ditemukan.';
    exit;
}

$getAllPeriodeStmt = $db->prepare('SELECT * FROM periode_supervisi');
$getAllPeriodeStmt->execute();

if (!$getAllPeriodeStmt) {
    echo "<div class='alert alert-danger'>Data periode supervisi tidak ditemukan di database.</div>";
    require_once __DIR__ . '/../../layouts/footer.php';
    exit;
}

$getAllPeriodeStmt = $getAllPeriodeStmt->fetchAll();

?>
<style>
    .text-und:hover {
        text-decoration: underline;
    }
</style>


<div class="container">
    <h1 class="text-center me-5 title">Daftar Periode Supervisi</h1>
    <div class="container mb-2">
        <a href="index.php?page=input_periode_supervisi" class="btn btn-primary">Tambah Periode Supervisi</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Daftar Periode Supervisi
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Periode</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($getAllPeriodeStmt as $data) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td class=" text-und"> <a href="detail_periode_supervisi.php?id=<?= $data['id'] ?>"
                                    style="color: black; cursor: pointer; font-weight: bold;">
                                    <?= $data['nama_periode'] ?>
                            </td>
                            <td><?= $data['tanggal_mulai'] ?></td>
                            <td><?= $data['tanggal_selesai'] ?></td>
                            <td><?= $data['keterangan'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td>
                                <a href="edit_periode_supervisi.php?id=<?= $data['id'] ?>"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="hapus_periode_supervisi.php?id=<?= $data['id'] ?>"
                                    class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once __DIR__ . '/../../../layouts/footer.php'; ?>