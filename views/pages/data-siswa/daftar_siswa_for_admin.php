<?php
require_once(__DIR__ . '/../../layouts/header.php');
require_once(__DIR__ . '/../../../koneksi.php');

$dataSiswa = $db->query('SELECT * FROM users WHERE role_id = 3 ORDER BY kelas ASC');

$dataSiswaArray = $dataSiswa->fetchAll(PDO::FETCH_ASSOC);

$dataSiswaPerKelas = [];
foreach ($dataSiswaArray as $siswa) {
    $kelas = $siswa['kelas'];
    if (!isset($dataSiswaPerKelas[$kelas])) {
        $dataSiswaPerKelas[$kelas] = [];
    }
    $dataSiswaPerKelas[$kelas][] = $siswa;
}

?>

<div class="container-fluid mt-4">
    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-4">Daftar Siswa SDN 035 TARAIBANGUN</h2>
            <a href="index.php?page=input_siswa" class="btn btn-primary">Tambah Siswa</a>
        </div>

    </section>

    <section>
        <div class="accordion" id="accordionTable">

            <?php $index = 0; ?>
            <?php foreach ($dataSiswaPerKelas as $kelas => $siswa): ?>
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
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($siswa as $i => $siswa): ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= htmlspecialchars($siswa['nisn']) ?></td>
                                                <td><?= htmlspecialchars($siswa['nama']) ?></td>
                                                <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                                                <td>
                                                    <a href="index.php?page=detail_siswa_for_admin&id=<?= $siswa['id'] ?>"
                                                        class="btn btn-primary btn-sm">
                                                        Detail
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
        </div>
    </section>
</div>

<?php
require_once(__DIR__ . '/../../layouts/footer.php');
?>