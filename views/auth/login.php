<?php

if (isset($_SESSION['user_id'])) {
    header('Location: index.php?page=dashboard');
    exit;
}


require_once __DIR__ . '/header.php';

?>

<style>
    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: #393f81;
        background-color: aqua;
    }
</style>

<form action="index.php?page=check_login" method="post">

    <div class="d-flex align-items-center mb-3 pb-1">
        <i class="fas fa-cubes fa-2x " style="color: #ffF;"></i>
        <span class="h1 fw-bold mb-0 text-capitalize"> <?= isset($page) ? $page : 'Default Title'; ?></span>
    </div>

    <!-- <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5> -->

    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="username">ID</label>
        <input id="username" type="text" name="username" class="form-control" required autofocus checked
            placeholder="NIK / NIP / NISN / Username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" />
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control form-control" required />
    </div>

    <div class="pt-1 mb-4">
        <button class="btn btn-dark btn-block" type="submit">Submit</button>
    </div>
    <p class="">Lupa password? <button class="btn" href="" onclick="btnLupaPassword(1)">Klik disini</button> </p>
    <p class="mb-5 pb-lg-2" style="color: #393f81;">Belum punya akun? <a href="index.php?page=register"
            style="color: #393f81;">Daftar
            disini</a></p>
</form>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function btnLupaPassword(id) {
        Swal.fire({
            icon: 'error',
            title: "Oops...",
            text: "Silahkan Lapor Admin / Operator!",
            confirmButtonColor: '#3085d6',
            timer: 6000,
            timerProgressBar: true
        })
    }
</script>
<?php
require_once __DIR__ . '/footer.php';
?>