<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

// Ambil data semua guru (role_id = 2)
$dataGuru = $db->query("
    SELECT 
        u.id AS id, 
        u.nama AS nama,
        u.email AS email,
        u.kelas AS kelas 
    FROM users u 
    WHERE u.role_id = 2 
    ORDER BY u.kelas ASC
")->fetchAll();
?>

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
                            <?= htmlspecialchars($guru['nama']) ?> (Kelas: <?= htmlspecialchars($guru['kelas']) ?>)
                        </button>
                    </h2>
                    <div id="<?= $collapseId ?>" class="accordion-collapse collapse <?= $showClass ?>"
                        aria-labelledby="<?= $headingId ?>" data-bs-parent="#accordionGuru">
                        <div class="accordion-body">
                            <p><strong>Nama:</strong> <?= htmlspecialchars($guru['nama']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($guru['email']) ?></p>
                            <p><strong>Kelas:</strong> <?= htmlspecialchars($guru['kelas']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>