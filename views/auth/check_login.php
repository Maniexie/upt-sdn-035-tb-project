<?php
// session_start();
require_once __DIR__ . '/../../config/koneksi.php';
require_once __DIR__ . '/header.php';



// $email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Ambil user + role
$sql = "SELECT u.*, r.role_name , u.jadwal_piket_id
        FROM users u
        JOIN jadwal_piket jp ON u.jadwal_piket_id = jp.id
        JOIN roles r ON u.role_id = r.id
        WHERE u.username = ? 
            OR u.email = ?
            OR u.nisn = ?
            OR u.nip = ?
            OR u.nik = ?
        LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $username, $username, $username, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nama'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['role_name'] = $user['role_name'];
        $_SESSION['user_username'] = $user['username'];
        $_SESSION['user_kelas'] = $user['kelas'];
        $_SESSION['user_jadwal_piket'] = $user['jadwal_piket_id'];

        // Redirect sesuai role
        switch ($user['role_name']) {
            case 'admin':
                header("Location: index.php?page=dashboard");
                break;
            case 'guru':
                header("Location: index.php?page=dashboard");
                break;
            case 'siswa':
                header("Location: index.php?page=dashboard");
                break;
            default:
                header("Location: index.php?page=dashboard");
        }
        exit;
    }
}

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            title: 'Username atau Password Salah!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            timer: 5000,
            showConfirmButton: true
        }).then(() => {
        localStorage.setItem('username', '" . htmlspecialchars($_POST['username']) . "');
            window.location.href = 'index.php?page=login';
        });
    </script>";
