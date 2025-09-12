<?php
ob_start();
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

// Ambil data user dari database berdasarkan session
$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$result = $stmt->fetch();


// ambil data guru wali kelas
$stmt = $db->prepare('SELECT nama, nip FROM users WHERE role_id = 2 AND kelas = :kelas');
$stmt->execute(['kelas' => $result['kelas']]);
$dataGuru = $stmt->fetch();
?>

<div class="container w-auto">
    <section>
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="card-title text-capitalize">
                    Profile : <?= htmlspecialchars($result['nama']); ?>
                </h2>
            </div>
            <div class="container">

                <div class="mb-3 row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nik"
                            value=": <?= htmlspecialchars($result['nik']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nip"
                            value=": <?= htmlspecialchars($result['nip']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="email"
                            value=": <?= htmlspecialchars($result['email']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="username"
                            value=": <?= htmlspecialchars($result['username']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nama"
                            value=": <?= htmlspecialchars($result['nama']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="kelas"
                            value=": <?= htmlspecialchars($result['kelas']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ttl" class="col-sm-2 col-form-label">Tempat / Tanggal Lahir </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="ttl"
                            value=": <?= htmlspecialchars($result['tempat_lahir']) ?>, <?= htmlspecialchars(date('d-m-Y', strtotime($result['tanggal_lahir']))) ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nomor_hp"
                            value=": <?= htmlspecialchars($result['nomor_hp']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="alamat"
                            value=": <?= htmlspecialchars($result['alamat']); ?>">
                    </div>
                </div>
                <?php if ($result['role_id'] === 3): ?>
                    <div class="mb-3 row">
                        <label for="wali_kelas" class="col-sm-2 col-form-label">Wali Kelas </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="wali_kelas"
                                value=": <?= htmlspecialchars($dataGuru['nama']); ?> (  <?= htmlspecialchars($dataGuru['nip']); ?> )">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="container d-flex justify-content-end">
            <a href="index.php?page=edit_profile" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </section>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>