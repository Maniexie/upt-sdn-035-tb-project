<?php

require_once __DIR__ . '/../../layouts/header.php';

require_once __DIR__ . '/../../../koneksi.php';

?>


<div class="container">
    <h1 class="text-center me-5 title">Daftar Guru Supervisi</h1>
    <div class="container mb-2">
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Penilai</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $no = 1;
            $sql = $db->prepare('SELECT users.*, roles.role_name, COUNT(responden.user_id) AS responden_count , supervisi.nama AS nama_supervisi
            FROM users 
            JOIN roles ON roles.id = users.role_id
            LEFT JOIN responden ON responden.user_id = users.id
            LEFT JOIN users AS supervisi ON supervisi.id = responden.supervisi_id
            WHERE users.role_id IN (1, 2)
            GROUP BY users.id');
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $data) { ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nip'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_supervisi'] ?></td>
                    <?php $status = $data['responden_count'] > 0 ? '✅' : '❌'; ?>
                    <td><?= $status ?></td>
                    <?php if ($data['responden_count'] > 0) { ?>
                        <td>
                            <a class=" btn btn-success btn-sm disabled" style="cursor: not-allowed;">Selesai</a>
                        </td>
                    <?php } else { ?>
                        <td>
                            <a href="index.php?page=form_penilaian_kepala_sekolah&id=<?= $data['id'] ?>"
                                class="btn btn-primary btn-sm">Mulai</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>