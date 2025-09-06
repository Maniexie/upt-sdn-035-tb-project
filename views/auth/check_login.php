<?php
session_start();
require_once __DIR__ . '/../../config/koneksi.php';



$email = $_POST['email'];
$password = $_POST['password'];

// Ambil user + role
$sql = "SELECT u.*, r.role_name 
        FROM users u
        JOIN roles r ON u.role_id = r.id
        WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nama'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['role_name'] = $user['role_name'];

        // Redirect sesuai role
        switch ($user['role_name']) {
            case 'admin':
                header("Location: index.php?page=dashboard");
                break;
            case 'guru':
                header("Location: index.php?page=input_pelanggaran");
                break;
            case 'siswa':
                header("Location: index.php?page=history_pelanggaran");
                break;
            default:
                header("Location: index.php?page=dashboard");
        }
        exit;
    }
}

echo "Email atau password salah";
