<?php
require_once '../../koneksi.php';

if (isset($_GET['kelas'])) {
    $kelas = $_GET['kelas'];

    $stmt = $db->prepare("SELECT id, nama ,role_id FROM users WHERE kelas = ? AND role_id = 3 ORDER BY nama ASC");
    $stmt->execute([$kelas]);
    $siswaList = $stmt->fetchAll();

    foreach ($siswaList as $siswa) {
        echo "<option value='{$siswa['id']}'>{$siswa['nama']} ({$siswa['role_id']})</option>";
    }
}
?>