<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';

$stmt = $db->prepare('SELECT users.* , roles.role_name , jabatan.nama_jabatan ,jadwal_piket.hari_piket 
FROM users 
JOIN roles ON roles.id = users.role_id 
JOIN jabatan ON jabatan.id = users.jabatan_id 
JOIN jadwal_piket ON jadwal_piket.id = users.jadwal_piket_id 
WHERE users.id =:id'
);
$stmt->execute(['id' => $_GET['id']]);
$result = $stmt->fetchAll();


?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <a href="index.php?page=daftar_user" class="btn btn-secondary mb-2">
                <= Kembali</a>
                    <div class="card">
                        <?php foreach ($result as $row): ?>

                            <div class="card-header" style="background-color: blueviolet; color: #fff;">
                                <h4 class="card-title">Halaman <span class="fw-semibold">Detail</span> User :
                                    <?= $row['nama']; ?> -
                                    <?= $row['username']; ?>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nisn" value="<?= $row['nisn'] ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nip" value="<?= $row['nip'] ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nik" value="<?= $row['nik'] ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="staticEmail"
                                            value="<?= $row['email']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" value="<?= $row['nama'] ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kelas" value="<?= $row['kelas'] ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="hari_piket" class="col-sm-2 col-form-label">Jadwal Piket</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="hari_piket" value="<?= $row['hari_piket'] ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="role_name" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="role_name"
                                            value="<?= $row['role_name'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_jabatan"
                                            value="<?= $row['nama_jabatan'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomor_hp"
                                            value="<?= $row['nomor_hp'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat" value="<?= $row['alamat'] ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="ttl" class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ttl"
                                            value="<?= $row['tempat_lahir'] ?>,<?= date('d-m-Y', strtotime($row['tanggal_lahir'])) ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="container mb-3 d-flex justify-content-end">
                                    <a href="index.php?page=edit_user&id=<?= $row['id'] ?>" disabled
                                        class="btn btn-primary">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/header.php'; ?>