<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';
?>

<div class="container w-auto">
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="card-title text-capitalize">
                Profile <?= htmlspecialchars($_SESSION['role_name']); ?>
            </h2>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="email"
                    value="<?= htmlspecialchars($_SESSION['user_email']); ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="nama"
                    value="<?= htmlspecialchars($_SESSION['user_name']); ?>">
            </div>
        </div>
    </div>
</div>


<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>