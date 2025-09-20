<?php
require_once(__DIR__ . '/../../layouts/header.php');
require_once(__DIR__ . '/../../../koneksi.php');

$dataSiswa = $db->query('SELECT * FROM users WHERE role_id = 3  ORDER BY kelas ASC, nama ASC');

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

<style>
    /* Untuk layar kecil (min-width: 767px) */
    @media screen and (min-width: 768px) {
        .title-sm {
            display: none;
        }
    }

    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .title-lg {
            font-size: 14px;
            text-align: center;
            display: none;
        }

        .title-sm {
            text-align: center;
            font-size: 18px;
        }

        .tambah-siswa-lg {
            display: none;
        }

        .tambah-siswa-sm {
            font-size: 12px;
            margin-top: -20px;
            margin-bottom: -20px;
        }

        .accordion-button {
            font-size: 12px;
        }

        .accordion-body {
            font-size: 12px;
        }

        .btn {
            font-size: 10px;
        }
    }
</style>

<div class="container-fluid mt-4">
    <h2 class="mb-4 title-sm">Daftar Siswa SDN 035 TARAIBANGUN</h2>
    <a href="index.php?page=input_data_siswa" class="btn btn-primary tambah-siswa-sm">Tambah Siswa</a>
    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-4 title-lg">Daftar Siswa SDN 035 TARAIBANGUN</h2>
            <a href="index.php?page=input_data_siswa" class="btn btn-primary tambah-siswa-lg">Tambah Siswa</a>
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
                                        <?php foreach ($siswa as $i => $s): ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= htmlspecialchars($s['nisn']) ?></td>
                                                <td><?= htmlspecialchars($s['nama']) ?></td>
                                                <td><?= htmlspecialchars($s['kelas']) ?></td>
                                                <td>
                                                    <a target="_blank"
                                                        href="index.php?page=detail_siswa_for_admin&id=<?= $s['id'] ?>"
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


<!-- JavaScript -  -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const scrollToId = urlParams.get('scroll_to');

        if (scrollToId) {
            const targetElement = document.getElementById(scrollToId);
            if (targetElement) {
                // Tambahkan highlight untuk menonjolkan baris
                targetElement.classList.add("highlight");
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                // Hapus highlight setelah beberapa detik
                setTimeout(() => {
                    targetElement.classList.remove("highlight");
                }, 2000);
            }
        }
    });
</script>
<style>
    /* Gaya highlight opsional */
    .highlight {
        background-color: #ffff99 !important;
    }
</style>

<?php
require_once(__DIR__ . '/../../layouts/footer.php');
?>