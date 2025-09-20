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

// Menentukan status berdasarkan role_id
$roleLabel = '';
switch ($dataUser["role_id"]) {
    case 1:
        $roleLabel = 'Admin'; // Role 1 adalah Admin
        break;
    case 2:
        $roleLabel = 'Guru'; // Role 2 adalah Guru
        break;
    case 3:
        $roleLabel = 'Siswa'; // Role 3 adalah Siswa
        break;
    default:
        $roleLabel = 'Tidak Dikenal';
        break;
}
?>

<style>
    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .card-title {
            font-size: 14px;
        }

        .btn {
            font-size: 10px;
            padding: 2px 3px 2px 3px;
        }

        .form-control {
            width: 100%;
            /* Atau atur sesuai kebutuhan */
            padding: 0.25rem 0.5rem;
            font-size: 0.675rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .form-label {
            font-size: 12px;
        }
    }
</style>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="container mt-1 mb-2">
                <a href="index.php?page=daftar_user" class="btn btn-secondary">
                    ← Kembali </a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Password</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $dataUser['id']; ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" value="<?= $dataUser['nama']; ?>" readonly
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <input type="text" class="form-control" id="kelas" value="<?= $dataUser['kelas']; ?>"
                                readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Status:</label>
                            <input type="text" class="form-control" id="role_id"
                                value="<?= htmlspecialchars($roleLabel); ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" value="<?= $dataUser['username']; ?>"
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