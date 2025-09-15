<?php
require_once __DIR__ . '/../../config/koneksi.php';
require_once __DIR__ . '/header.php';

$nama = trim($_POST['nama']);
// $email = trim($_POST['email']);
$kelas = trim($_POST['kelas']);
$username = trim($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role_id = $_POST['role_id'];


// Cek apakah email sudah ada
$check_email = $conn->prepare('SELECT email FROM users WHERE email = ?');
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();

// Cek apakah username sudah ada
$check_username = $conn->prepare('SELECT username FROM users WHERE username = ?');
$check_username->bind_param("s", $username);
$check_username->execute();
$check_username->store_result();

// Validasi role_id
if (empty($role_id) || $role_id == 0) {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Role belum dipilih!',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                showConfirmButton: true
            }).then(() => {
                window.location.href = 'index.php?page=register';
            });
        </script>";
    exit;
}


if ($check_username->num_rows > 0) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            title: 'Username sudah terdaftar!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            timer: 5000,
            showConfirmButton: true
        }).then(() => {
            window.location.href = 'index.php?page=register';
        });
    </script>";
    exit;
}
$check_username->close();

$role_id = 3;
$jabatan_id = 51;
$jadwal_piket_id = 6;
// Insert data baru
$stmt = $conn->prepare("INSERT INTO users (nama, kelas, username, password, role_id, jabatan_id, jadwal_piket_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiii", $nama, $kelas, $username, $password, $role_id, $jabatan_id, $jadwal_piket_id);

if ($stmt->execute()) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            title: 'Registrasi berhasil!',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            timer: 2000,
            showConfirmButton: true
        }).then(() => {
            window.location.href = 'index.php?page=login';
        });
    </script>";
    exit;
} else {
    echo "Error: " . $stmt->error;
}

require_once __DIR__ . '/footer.php';
?>