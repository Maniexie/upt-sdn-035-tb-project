<?php
require_once '../layouts/header.php';
require_once '../../koneksi.php';

// Ambil data pelanggaran hari ini
$dataPelanggaran = $db->query("
    SELECT 
        ps.id,
        ps.tanggal,
        u.nama AS nama_siswa,
        u.kelas,
        p.nama_pelanggaran,
        p.poin
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE DATE(ps.tanggal) = CURDATE()
    ORDER BY u.kelas, ps.tanggal DESC
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
?>

<div class="container-fluid mt-4">
    <section>
        <div class="accordion" id="accordionTable">
            <?php if (empty($pelanggaranPerKelas)): ?>
                <div class="alert alert-info">Belum ada data pelanggaran hari ini.</div>
            <?php else: ?>
                <?php $index = 0; ?>
                <?php foreach ($pelanggaranPerKelas as $kelas => $dataSiswa): ?>
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
                                                <th>Pelanggaran</th>
                                                <th>Poin</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dataSiswa as $i => $siswa): ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?= htmlspecialchars($siswa['nama_siswa']) ?></td>
                                                    <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                                                    <td><?= htmlspecialchars($siswa['nama_pelanggaran']) ?></td>
                                                    <td><?= $siswa['poin'] ?></td>
                                                    <td><?= $siswa['tanggal'] ?></td>
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