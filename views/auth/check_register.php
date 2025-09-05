<?php
require_once '../../koneksi_auth.php';



$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash aman
$role_id = $_POST['role_id'];

$stmt = $conn->prepare("INSERT INTO users (nama, email, password, role_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nama, $email, $password, $role_id);


if ($stmt->execute()) {
    header("Location: login.php?register_success=true");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

