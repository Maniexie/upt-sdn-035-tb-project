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

    .btn-link {
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .show-password {
        margin-top: -15px;
        padding: 0;
    }
</style>

<form action="index.php?page=check_login" method="post">

    <div class="d-flex align-items-center mb-3 pb-1">
        <i class="fas fa-cubes fa-2x " style="color: #ffF;"></i>
        <span class="h1 fw-bold mb-0 text-capitalize"> <?= isset($page) ? $page : 'Default Title'; ?></span>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="username">ID</label>
        <input id="username" type="text" name="username" class="form-control" required autofocus checked
            placeholder="NIP / NISN / Username"
            value="<?= htmlspecialchars($_POST[trim('username')] ?? $_SESSION['username'] ?? '') ?>" />
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control form-control" required />
    </div>
    <div class="show-password">
        <p>
            <input type="checkbox" onclick="showHide()" />
            Tampilkan Password
        </p>
    </div>

    <div class="pt-1 mb-4">
        <button class="btn btn-dark btn-block" type="submit">Submit</button>
    </div>
    <p class="m-0">Lupa Password? <a type="button" class="p-0 mt-0 btn-link" onclick="btnLupaPassword(1)">
            Klik disini</a>
    </p>
    <p class="mb-3 pb-lg-2">Belum punya akun? <a href="index.php?page=register">Daftar
            disini</a></p>
</form>


<!-- SCRIPT FOR WRONG USERNAME OR PASSWORD -->
<script type="text/javascript">
    window.onload = function () {
        let username = localStorage.getItem('username');
        if (username) {
            document.getElementById('username').value = username; //Tampilkan username
            localStorage.removeItem('username'); //Hapus username setelah login
        }
    };
</script>


<!-- SCRIPT FOR SHOW PASSWORD -->
<script type="text/javascript">
    function showHide() {
        let inputan = document.getElementById("password");
        if (inputan.type === "password") {
            inputan.type = "text";
        } else {
            inputan.type = "password";
        }
    } 
</script>


<!-- SCRIPT FOR LUPA PASSWORD -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function btnLupaPassword(id) {
        Swal.fire({
            icon: 'info',
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