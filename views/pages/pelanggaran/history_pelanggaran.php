<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

// Ambil filter bulan dan tahun dari query string (default ke bulan dan tahun saat ini)
$filterBulan = $_GET['bulan'] ?? date('Y-m');

// Query untuk mengambil data pelanggaran berdasarkan bulan
$sql = "SELECT ps.tanggal, u.id AS siswa_id, u.nama AS nama_siswa, u.kelas, p.nama_pelanggaran AS pelanggaran , p.poin
        FROM pelanggaran_siswa ps
        JOIN users u ON ps.siswa_id = u.id
        JOIN pelanggaran p ON ps.pelanggaran_id = p.id
        WHERE DATE_FORMAT(ps.tanggal, '%Y-%m') = '$filterBulan'
        ORDER BY ps.tanggal";

// Eksekusi query
$result = $db->query($sql);
$historyPelanggaran = $result->fetchAll();

// Menyusun data per hari
$groupedByDate = [];
foreach ($historyPelanggaran as $pelanggaran) {
    $tanggal = date('Y-m-d', strtotime($pelanggaran['tanggal']));  // Format tanggal untuk pengelompokan
    $groupedByDate[$tanggal][] = $pelanggaran;
}

// Pagination setup
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$perPage = 10;
$total = count($groupedByDate);
$pages = ceil($total / $perPage);
$start = ($page - 1) * $perPage;
$items = array_slice($groupedByDate, $start, $perPage);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">History Pelanggaran Siswa</h2>

    <!-- Filter Bulan -->
    <section>
        <div class="container d-flex justify-content-end">
            <form method="GET" class="mb-2">
                <input type="hidden" name="page" value="history_pelanggaran">
                <label for="bulan">Pilih Bulan & Tahun:</label>
                <select name="bulan" id="bulan" class="custom-select-enhanced">
                    <?php
                    // Auto generate dropdown dari tahun 2024 hingga tahun sekarang
                    for ($year = 2024; $year <= date('Y'); $year++) {
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

    <!-- Tabel Pelanggaran per Hari -->
    <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
        <table class="table  table-bordered table-hover text-center border-dark border-striped">
            <thead class="table-primary sticky-top border-dark border-striped ">
                <tr>
                    <th>No</th>
                    <!-- <th>Tanggal Pelanggaran</th> -->
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pelanggaran</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($items)): ?>
                    <tr>
                        <td colspan="5">Tidak ada data pelanggaran untuk bulan ini.</td>
                    </tr>
                <?php else: ?>
                    <?php
                    // Menampilkan data per hari
                    foreach ($items as $tanggal => $pelanggarans):
                        $no = 1;  // Reset nomor urut per tanggal
                        ?>

                        <tr class="table-secondary border-bottom border-dark">
                            <td colspan="5"><strong><?= date('l, j F Y', strtotime($tanggal)) ?></strong></td>
                        </tr>
                        <?php foreach ($pelanggarans as $data): ?>
                            <tr class="table-active">
                                <td><?= $no++ ?></td>
                                <!-- <td><?= date('l, j F Y', strtotime($data['tanggal'])) ?></td> -->
                                <td><?= htmlspecialchars($data['nama_siswa']) ?></td>
                                <td><?= htmlspecialchars($data['kelas']) ?></td>
                                <td><?= htmlspecialchars($data['pelanggaran']) ?> (<?= htmlspecialchars($data['poin']) ?> poin)</td>
                            </tr>
                        <?php endforeach; ?>
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

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>