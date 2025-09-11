<?php
require_once __DIR__ . '/../../../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if (!$id) {
    echo "<script>alert('ID tidak valid.'); window.close();</script>";
    exit;
}

$deleteQuery = "DELETE FROM users WHERE id = ?";
$stmt = $db->prepare($deleteQuery);
$stmt->execute([$id]);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menghapus...</title>
    <script>
        // Tunggu sebentar lalu tutup jendela
        setTimeout(() => {
            window.close();
        }, 1); // 1 detik
    </script>
</head>

<body>
    <!-- <p>Data berhasil dihapus. Menutup halaman...</p> -->
</body>

</html>