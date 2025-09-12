<?php
require_once __DIR__ . '/../../../koneksi.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$deleteQuery = "DELETE FROM users WHERE id = ?";
$stmt = $db->prepare($deleteQuery);
$stmt->execute([$id]);

header("Location: index.php?page=daftar_user&${id}", true, 302);
exit;

?>