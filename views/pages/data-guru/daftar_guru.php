<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

// Ambil data semua guru (role_id = 2)
$dataGuru = $db->query("
    SELECT 
        u.id AS id,
        u.nik AS nik,
        u.nip AS nip,
        u.username AS username,
        u.nama AS nama,
        u.email AS email,
        u.kelas AS kelas, 
        u.tempat_lahir AS tempat_lahir,
        u.tanggal_lahir AS tanggal_lahir,
        u.alamat AS alamat,
        u.nomor_hp AS nomor_hp,
        u.role_id AS role_id,
        u.jabatan_id AS jabatan_id,
        j.nama_jabatan
    FROM users u 
    JOIN jabatan j ON u.jabatan_id = j.id
    WHERE u.role_id IN (1,2)
    ORDER BY   u.kelas ASC
")->fetchAll();
?>

<style>
    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .list-group-item {
            font-size: 12px;
        }

        .accordion-button {
            font-size: 14px;
        }
    }
</style>

<div class="container-fluid mt-4">
    <h2 class="mb-4">Daftar Guru</h2>

    <section>
        <div class="accordion" id="accordionGuru">
            <?php foreach ($dataGuru as $index => $guru): ?>
                <?php
                $headingId = 'heading' . $index;
                $collapseId = 'collapse' . $index;
                $showClass = $index === 0 ? 'show' : '';
                $collapsedClass = $index === 0 ? '' : 'collapsed';
                $ariaExpanded = $index === 0 ? 'true' : 'false';
                ?>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="<?= $headingId ?>">
                        <button class="accordion-button <?= $collapsedClass ?>" type="button" data-bs-toggle="collapse"
                            data-bs-target="#<?= $collapseId ?>" aria-expanded="<?= $ariaExpanded ?>"
                            aria-controls="<?= $collapseId ?>">
                            <?= htmlspecialchars($guru['nama']) ?> (Kelas: <?= htmlspecialchars($guru['kelas']) ?> ||
                            Jabatan: <?= htmlspecialchars($guru['nama_jabatan']) ?>)
                        </button>
                    </h2>
                </div>

                <div id="<?= $collapseId ?>" class="accordion-collapse collapse <?= $showClass ?>"
                    aria-labelledby="<?= $headingId ?>" data-bs-parent="#accordionGuru">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>NIK:</strong>
                                <?= htmlspecialchars($guru['nik']) ?></li>
                            <li class="list-group-item"><strong>NIP:</strong> <?= htmlspecialchars($guru['nip']) ?></li>
                            <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($guru['nama']) ?>
                            </li>
                            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($guru['email']) ?>
                            </li>
                            <li class="list-group-item"><strong>Kelas:</strong> <?= htmlspecialchars($guru['kelas']) ?>
                            </li>
                            <li class="list-group-item"><strong>TTL:</strong>
                                <?= htmlspecialchars($guru['tempat_lahir']) ?>,
                                <?= htmlspecialchars(date('d-m-Y', strtotime($guru['tanggal_lahir']))) ?>
                            </li>
                            <li class="list-group-item"><strong>Nomor HP:</strong>
                                <?= htmlspecialchars($guru['nomor_hp']) ?></li>
                            <li class="list-group-item"><strong>Alamat:</strong>
                                <?= htmlspecialchars($guru['alamat']) ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>