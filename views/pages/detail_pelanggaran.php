<?php require_once '../layouts/header.php'; ?>

<?php
// Simulasi data (bisa diganti dari database)
$data = [
    ['first' => 'Mark', 'last' => 'Otto', 'handle' => '@mdo'],
    ['first' => 'Jacob', 'last' => 'Thornton', 'handle' => '@fat'],
    ['first' => 'Larry', 'last' => 'Bird', 'handle' => '@larry'],
    ['first' => 'John', 'last' => 'Doe', 'handle' => '@social'],
    ['first' => 'Jane', 'last' => 'Smith', 'handle' => '@jane'],
    ['first' => 'Ali', 'last' => 'Baba', 'handle' => '@ali'],
    ['first' => 'Siti', 'last' => 'Aisyah', 'handle' => '@siti'],
    ['first' => 'Budi', 'last' => 'Gunawan', 'handle' => '@budi'],
    ['first' => 'Agus', 'last' => 'Salim', 'handle' => '@agus'],
    ['first' => 'Tina', 'last' => 'Turner', 'handle' => '@tina'],
    ['first' => 'Ahmad', 'last' => 'Zain', 'handle' => '@ahmad'],
    ['first' => 'Rina', 'last' => 'Rahma', 'handle' => '@rina'],
];

// Pagination setup
$perPage = 10;
$total = count($data);
$pages = ceil($total / $perPage);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, min($page, $pages));
$start = ($page - 1) * $perPage;
$dataPage = array_slice($data, $start, $perPage);
?>

<div class="container mt-4">

    <section>
        <a href="history_pelanggaran.php" class="btn btn-primary mb-2">
            <i class="fa-solid fa-angle-left">
            </i>
            Kembali
        </a>
        <table class="table table-hover table-striped">
            <h5 class="card-title mb-1">Detail Pelanggaran : 25-Januari-2023</h5>
            <thead class="table-warning">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Pelanggaran</th>
                    <th scope="col">Poin</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($dataPage as $index => $item): ?>
                    <tr>
                        <th scope="row"><?= $start + $index + 1 ?></th>
                        <td><?= htmlspecialchars($item['first']) ?></td>
                        <td><?= htmlspecialchars($item['last']) ?></td>
                        <td><?= htmlspecialchars($item['handle']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Pagination -->
    <?php if ($pages > 1): ?>
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>

<?php require_once '../layouts/footer.php'; ?>