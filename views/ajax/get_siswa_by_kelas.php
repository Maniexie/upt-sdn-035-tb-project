<?php
require_once '../../koneksi.php';

if (isset($_GET['kelas'])) {
    $kelas = $_GET['kelas'];

    $stmt = $db->prepare("SELECT id, nama FROM users WHERE kelas = ?");
    $stmt->execute([$kelas]);
    $siswaList = $stmt->fetchAll();

    foreach ($siswaList as $siswa) {
        echo "<option value='{$siswa['id']}'>{$siswa['nama']}</option>";
    }
}
?>