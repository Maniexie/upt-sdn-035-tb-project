<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$getAllJadwalPiket = $db->prepare('
    SELECT u.id, u.nama,u.kelas,u.role_id,u.jadwal_piket_id, roles.role_name , jp.id AS jp_id , jp.hari_piket,j.status_kelas , j.nama_jabatan
    FROM users u 
    JOIN roles ON u.role_id = roles.id
    JOIN jabatan j ON u.jabatan_id = j.id
    JOIN jadwal_piket jp ON u.jadwal_piket_id = jp.id
    WHERE u.role_id = 1 || u.role_id = 2
    ORDER BY jp.id ASC
    
    ');
$getAllJadwalPiket->execute();
$jadwalPiket = $getAllJadwalPiket->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <h1 class="text-center me-5">Jadwal Piket Guru</h1>
    <section class="text-center">
        <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
            <table class="table table-hover">
                <thead class="table-primary sticky-top bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Wali Kelas</th>
                        <th scope="col">Jadwal Piket</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($jadwalPiket as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td class="text-capitalize"><?= htmlspecialchars($row['nama']) ?></td>
                            <td class="text-capitalize"><?= htmlspecialchars($row['kelas']) ?></td>
                            <td class="text-capitalize"><?= htmlspecialchars($row['hari_piket']) ?></td>
                            <td class="text-capitalize"><?= htmlspecialchars($row['nama_jabatan']) ?></td>
                            <?php if ($_SESSION['role_id'] == 1): ?>
                                <td>
                                    <a href=" index.php?page=edit_jadwal_piket_guru&id=<?= $row['id'] ?>"
                                        class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>