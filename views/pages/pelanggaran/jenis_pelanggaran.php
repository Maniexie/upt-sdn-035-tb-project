<?php
require_once __DIR__ . '../../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$getNamaPelanggaran = $db->query('SELECT * FROM pelanggaran')->fetchAll();



?>
<div class="container">
    <h1 class="text-center me-5">Jenis Pelanggaran Beserta Poin</h1>
    <section>
        <div class="table-responsive" style="max-height: 800px; overflow-y: auto;">
            <table class="table table-hover">
                <thead class="table-primary sticky-top bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Pelanggaran</th>
                        <th scope="col">Jenis Pelanggaran</th>
                        <th scope="col">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getNamaPelanggaran as $i => $item): ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['nama_pelanggaran'] ?></td>
                            <td><?= $item['poin'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <div class="container">
            <h6>NB:</h6>
            <ul>
                <li>Semua pelanggaran di atas akan dikaji dan ditindak sesuai dengan akumulasi poin, namun tetap
                    mempertimbangkan aspek-aspek yang melatar belakangi tindakan pelanggaran tersebut.</li>
                <li>Ada perbedaan penerapan antara kelas kecil dan kelas besar</li>
                <li>Khusu membully dipanggil orang tua</li>
                <li>Batas maksimal poin:</li>
                <ol>
                    <li>30 Poin panggil orang tua</li>
                    <li>50 Poin panggil orang tua dan anak di skor selama 3 Hari</li>
                    <li>70 Poin panggil orang tua dan anak di skor selama 7 Hari</li>
                    <li>100 Poin panggil orang tua dan buat surat perjanjian bermaterai</li>
                </ol>
            </ul>
        </div>
    </section>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>