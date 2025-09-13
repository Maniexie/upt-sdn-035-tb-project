<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';

$getDataUser = $db->prepare("SELECT * FROM users WHERE id = :id");
$getDataUser->execute(['id' => $_GET['id']]);
$dataUser = $getDataUser->fetch();


if (isset($_POST['submit'])) {
    $id = $dataUser['id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $db->prepare('UPDATE users SET password = :password WHERE id = :id');
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    html: 'Password berhasil diubah.',
                    confirmButtonColor: '#3085d6',
                    timer: 6000,
                    timerProgressBar: true,
                        willClose: () => {
                        window.location.href = 'index.php?page=daftar_user';
                    }
                });
            });
        </script>
    ";
    exit;
}

?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="container mt-1 mb-2">
                <a href="index.php?page=daftar_user" class="btn btn-danger">
                    <= Kembali </a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Password</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $dataUser['id']; ?>">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="nama" class="form-control" id="username" value="<?= $dataUser['username']; ?>"
                                readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="container d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary " name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?php require_once __DIR__ . '/../../layouts/header.php'; ?>