<?php require_once '../layouts/header.php'; ?>

<?php
// Simulasi data pelanggaran
$pelanggaran = [
    ['tanggal' => '2025-09-02', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-08-15', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-08-10', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-07-05', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-07-01', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-01', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-03', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-04', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-05', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-06', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-07', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-08', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-08', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-08', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2025-09-08', 'detail_link' => 'detail_pelanggaran.php'],
    ['tanggal' => '2024-09-09', 'detail_link' => 'detail_pelanggaran.php'],
];

// Ambil filter bulan dari query string
$filterBulan = $_GET['bulan'] ?? date('Y-m');

// Filter data berdasarkan bulan
$filtered = array_filter($pelanggaran, function ($item) use ($filterBulan) {
    return strpos($item['tanggal'], $filterBulan) === 0;
});

// Pagination setup
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$perPage = 10;
$total = count($filtered);
$pages = ceil($total / $perPage);
$start = ($page - 1) * $perPage;
$items = array_slice($filtered, $start, $perPage);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">History Pelanggaran Siswa</h2>

    <!-- Filter Bulan -->
    <section>

        <div class="container d-flex justify-content-end">
            <form method="GET" class="mb-2">
                <label for="bulan">Pilih Bulan & Tahun:</label>
                <select name="bulan" id="bulan" class="custom-select-enhanced" style="min-height: 300 px;">

                    <?php
                    // Auto generate dropdown dari tahun 2024-2025
                    for ($year = 2024; $year <= 2025; $year++) {
                        for ($month = 1; $month <= 12; $month++) {
                            $value = sprintf('%04d-%02d', $year, $month);
                            $label = date('F Y', strtotime($value . '-01'));
                            $selected = ($filterBulan === $value) ? 'selected' : '';
                            echo "<option value=\"$value\" $selected>$label</option>";
                        }
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
            </form>
        </div>
    </section>


    <!-- Tabel Pelanggaran -->
    <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-primary sticky-top">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pelanggaran</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($items)): ?>
                    <tr>
                        <td colspan="3">Tidak ada data pelanggaran di bulan ini.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($items as $index => $data): ?>
                        <tr class="table-active">
                            <td><?= $start + $index + 1 ?></td>
                            <td><?= date('l, j F Y', strtotime($data['tanggal'])) ?></td>
                            <td>
                                <a href="<?= htmlspecialchars($data['detail_link']) ?>" target="_blank">
                                    <i class="fa-solid fa-magnifying-glass text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($pages > 1): ?>
        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?bulan=<?= $filterBulan ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>

<?php require_once '../layouts/footer.php'; ?>