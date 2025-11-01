<?php

require_once __DIR__ . '/../../layouts/header.php';

require_once __DIR__ . '/../../../koneksi.php';

// Cek login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo 'Session user_id tidak ditemukan.';
    exit;
}


?>


<div class="container">
    <h1 class="text-center me-5 title">Daftar Guru Supervisi</h1>
    <!-- Menampilkan pesan jika tidak ada periode aktif -->

    <div class="container mb-2">
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Penilai</th>
                <th scope="col">Nama Periode</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php


            $no = 1;
            $sql = $db->prepare("
                    SELECT 
                        u.id,
                        u.nip,
                        u.nama,
                        r_supervisi.nama AS nama_supervisi,
                        ps.nama_periode,
                        ps.id AS periode_id,
                        (
                            SELECT COUNT(*) FROM responden r2 
                            WHERE r2.user_id = u.id 
                            AND r2.periode_id = ps.id
                        ) AS sudah_menilai
                    FROM users u
                    JOIN roles ON roles.id = u.role_id
                    LEFT JOIN periode_supervisi ps ON ps.id = (
                        SELECT id FROM periode_supervisi
                        WHERE tanggal_mulai <= CURDATE() AND tanggal_selesai >= CURDATE()
                        LIMIT 1
                    )
                    LEFT JOIN responden r ON r.user_id = u.id AND r.periode_id = ps.id
                    LEFT JOIN users r_supervisi ON r_supervisi.id = r.supervisi_id
                    WHERE u.role_id = 2
                    GROUP BY u.id
                ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $data) { ?>
                <?php if ($data['periode_id'] > 0) { ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['nip'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <?php $is_nama_supervisi = $data['nama_supervisi'] == null ? '-' : $data['nama_supervisi']; ?>
                        <td><?= $is_nama_supervisi ?></td>
                        <td><?= $data['nama_periode'] ?></td>
                        <?php $status = $data['nama_periode'] > 0 ? '✅' : '❌'; ?>
                        <td><?= $status ?></td>
                        <?php if ($data['sudah_menilai'] > 0) { ?>
                            <td><span class="badge bg-success">Selesai</span></td>
                        <?php } else { ?>
                            <td>
                                <a href="index.php?page=form_penilaian_kepala_sekolah&id=<?= $data['id'] ?>"
                                    class="btn btn-primary btn-sm">Mulai</a>
                            </td>
                        <?php } ?>
                    </tr>

                    <?php
                } else {
                    echo " <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'failure',
                        title: 'Gagal!',
                        text: 'Silahkan Isi Periode Supervisi Terlebih Dahulu.',
                        confirmButtonColor: '#e04a51ff',
                        timer: 60000,
                        timerProgressBar: true,
                        willClose: () => {
                            window.location.href = 'index.php?page=input_periode_supervisi';
                        }
                    });
                });
            </script>";
                }
                ?>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>