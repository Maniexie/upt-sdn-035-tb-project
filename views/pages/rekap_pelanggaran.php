<?php
require_once '../layouts/header.php';
require_once '../../koneksi.php';

// Ambil data pelanggaran hari ini
$dataPelanggaran = $db->query("
    SELECT 
        u.id AS siswa_id,
        u.nama AS nama_siswa,
        u.kelas,
        SUM(p.poin) AS total_poin
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    GROUP BY u.kelas, u.nama
    ORDER BY u.kelas, total_poin ASC
")->fetchAll();

// Kelompokkan data berdasarkan kelas
$pelanggaranPerKelas = [];
foreach ($dataPelanggaran as $item) {
    $kelas = $item['kelas'];
    if (!isset($pelanggaranPerKelas[$kelas])) {
        $pelanggaranPerKelas[$kelas] = [];
    }
    $pelanggaranPerKelas[$kelas][] = $item;
}

// Urutan kelas yang diinginkan: 1A - 6C
$urutanKelas = [];
$tingkatan = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
$subkelas = ['A', 'B', 'C'];

foreach ($tingkatan as $t) {
    foreach ($subkelas as $s) {
        $urutanKelas[] = $t . $s;
    }
}

// Susun ulang berdasarkan urutan tersebut
$pelanggaranPerKelasTerurut = [];
foreach ($urutanKelas as $kelas) {
    if (isset($pelanggaranPerKelas[$kelas])) {
        $pelanggaranPerKelasTerurut[$kelas] = $pelanggaranPerKelas[$kelas];
    }
}

?>

<div class="container-fluid mt-4">
    <section>
        <div class="accordion" id="accordionTable">
            <?php if (empty($pelanggaranPerKelas)): ?>
                <div class="alert alert-info">Belum ada data pelanggaran hari ini.</div>
            <?php else: ?>
                <?php $index = 0; ?>
                <?php foreach ($pelanggaranPerKelasTerurut as $kelas => $dataSiswa): ?>
                    <?php
                    $headingId = "heading" . $index;
                    $collapseId = "collapse" . $index;
                    $showClass = $index === 0 ? 'show' : '';
                    $collapsedClass = $index === 0 ? '' : 'collapsed';
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="<?= $headingId ?>">
                            <button class="accordion-button <?= $collapsedClass ?>" type="button" data-bs-toggle="collapse"
                                data-bs-target="#<?= $collapseId ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>"
                                aria-controls="<?= $collapseId ?>">
                                Kelas <?= htmlspecialchars($kelas) ?>
                            </button>
                        </h2>
                        <div id="<?= $collapseId ?>" class="accordion-collapse collapse <?= $showClass ?>"
                            aria-labelledby="<?= $headingId ?>" data-bs-parent="#accordionTable">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Total Poin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dataSiswa as $i => $siswa): ?>
                                                <!-- <tr> -->
                                                <tr class="
                                                    <?php
                                                    if ($siswa['total_poin'] >= 100) {
                                                        echo 'table-danger';
                                                    } elseif ($siswa['total_poin'] >= 70) {
                                                        echo 'table-warning';
                                                    }
                                                    ?>
                                                ">
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?= htmlspecialchars($siswa['nama_siswa']) ?></td>
                                                    <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                                                    <td><?= $siswa['total_poin'] ?></td>
                                                    <td>
                                                        <a target="_blank"
                                                            href="detail_pelanggaran.php?id=<?= $siswa['siswa_id'] ?>"
                                                            class="btn btn-primary btn-sm">
                                                            Detail
                                                            <!-- <i class="fa-solid fa-file-pdf"></i> -->
                                                        </a>
                                                        <a target="_blank"
                                                            href="rekap_pelanggaran_siswa.php?id=<?= $siswa['siswa_id'] ?>"
                                                            class="btn btn-success btn-sm">
                                                            Rekap
                                                            <i class="fa-solid fa-file-pdf"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $index++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php require_once '../layouts/footer.php'; ?>