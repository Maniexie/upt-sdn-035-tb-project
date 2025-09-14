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
        <label class="form-label" for="username">Username</label>
        <input id="username" type="text" name="username" class="form-control" required>
    </div>

    <div class="form-outline mb-4">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="name@example.com" required>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control" required />
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="password">Kelas</label>
        <select name="kelas" class="form-select" aria-label="Default select example" required>
            <option selected>== Kelas ==</option>
            <option value="1A">1A</option>
            <option value="1B">1B</option>
            <option value="1C">1C</option>
            <option value="2A">2A</option>
            <option value="2B">2B</option>
            <option value="2C">2C</option>
            <option value="3A">3A</option>
            <option value="3B">3B</option>
            <option value="3C">3C</option>
            <option value="4A">4A</option>
            <option value="4B">4B</option>
            <option value="4C">4C</option>
            <option value="5A">5A</option>
            <option value="5B">5B</option>
            <option value="5C">5C</option>
            <option value="6A">6A</option>
            <option value="6B">6B</option>
            <option value="6C">6C</option>
        </select>
    </div>

    <input type="hidden" name="role_id" value="3">

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