<?php
require_once __DIR__ . "/../../../koneksi.php";
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    $deleteQuery = "DELETE FROM pelanggaran WHERE id = ?";
    $stmt = $db->prepare($deleteQuery);
    $stmt->execute([$id]);

    header("Location: index.php?page=jenis_pelanggaran");
    exit;
}

?>