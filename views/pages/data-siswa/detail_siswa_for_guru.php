<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";

// Ambil data guru wali kelas
$guru = $db->query("
    SELECT nama,nip 
    FROM users 
    WHERE role_id = 2 
      AND kelas = '" . $siswa['kelas'] . "'
    LIMIT 1
")->fetch();

$namaGuru = $guru ? $guru['nama'] : 'Nama Wali Kelas';
$nipGuru = $guru ? $guru['nip'] : 'NIP Wali Kelas';

$dataSiswa = $db->prepare("SELECT u.id, u.nisn, u.nama , u.kelas ,u.role_id");

?>
<tr>
    <th>NISN</th>
    <td><?= htmlspecialchars($siswa['nisn']) ?></td>
</tr>
<tr>
    <th>Nama</th>
    <td><?= htmlspecialchars($siswa['nama_siswa']) ?></td>
</tr>
<tr>
    <th>Kelas</th>
    <td><?= htmlspecialchars($siswa['kelas']) ?></td>
</tr>
<tr>
    <th>Total Poin</th>
    <td><?= $siswa['total_poin'] ?></td>
</tr>
<tr>
    <th>Wali Kelas</th>
    <td><?= $namaGuru . ' (' . $nipGuru . ')' ?></td>
</tr>
<tr>
    <th>&nbsp;</th>
    <td>
        <a href="index.php?page=edit_siswa&id=<?= $siswa['id'] ?>" class="btn btn-primary btn-sm">
            Edit
        </a>
        <a href="index.php?page=hapus_siswa&id=<?= $siswa['id'] ?>" class="btn btn-danger btn-sm"
            onclick="return confirm('Anda yakin ingin menghapus siswa ini?')">
            Hapus
        </a>
    </td>
</tr>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>