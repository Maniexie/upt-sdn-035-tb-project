<?php

if (isset($_SESSION['user_id'])) {
    header('Location: index.php?page=dashboard');
    exit;
}


require_once __DIR__ . '/header.php';

?>

<form action="index.php?page=check_register" method="POST">

    <div class="d-flex align-items-center mb-3 pb-1">
        <i class="fas fa-cubes fa-2x " style="color: #ffF;"></i>
        <span class="h1 fw-bold mb-0 text-capitalize"> <?= isset($page) ? $page : 'Default Title'; ?></span>
    </div>

    <div class="form-outline mb-4">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="name@example.com" required>
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="email">Email address</label>
        <input id="email" type="email" name="email" class="form-control" required>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control" required />
    </div>

    <input type="hidden" name="role_id" value="3">

    <!-- <div class="form-outline mb-4">
        <label class="form-label" for="password">Role</label>
        <select name="role_id" class="form-select" aria-label="Default select example" required>
            <option selected>== Role ==</option>
            <option value="1">Admin</option>
            <option value="2">Guru</option>
            <option value="3">Siswa</option>
        </select>
    </div> -->

    <div class="pt-1 mb-4">
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block"
            type="submit">Submit</button>
    </div>

    <p class="mb-5 pb-lg-2" style="color: #393f81;">Sudah punya akun? <a href="index.php?page=login"
            style="color: #393f81;">Masuk
            disini</a></p>
</form>


<?php
require_once __DIR__ . '/footer.php';
?>