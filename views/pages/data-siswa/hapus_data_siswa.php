<?php
require_once __DIR__ . '/../../../koneksi.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if (!$id) {
    echo "<div class='alert alert-danger'>ID tidak valid.</div>";
    exit;
} else if (isset($_GET["id"])) {
    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $stmt = $db->prepare($deleteQuery);
    $stmt->execute([$id]);
}


header("Location: index.php?page=daftar_siswa_for_admin");
exit();


?>