<?php
ob_start();
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../../koneksi.php';

$siswa_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$pelanggaran_siswa_id = isset($_GET['pelanggaran_siswa_id']) ? (int) $_GET['pelanggaran_siswa_id'] : 0;

if ($siswa_id > 0 && $pelanggaran_siswa_id > 0) {
    $deleteQuery = "DELETE FROM pelanggaran_siswa WHERE id = ? AND siswa_id = ?";
    $stmt = $db->prepare($deleteQuery);
    $stmt->execute([$pelanggaran_siswa_id, $siswa_id]);
}

// Setelah hapus, redirect ke halaman detail
header("Location: index.php?page=detail_pelanggaran&id=$siswa_id");
exit;

?>


<?php
ob_end_flush();
?>
<?php require_once __DIR__ . '/../layouts/footer.php';

?>