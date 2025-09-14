<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';





// FORM INPUT ATAU TABEL KIRI //

// 1. Ambil data kelas unik
$kelasList = $db->query("SELECT DISTINCT kelas 
FROM users 
ORDER BY 
  CAST(SUBSTRING(kelas, 1, LENGTH(kelas) - 1) AS UNSIGNED),
  RIGHT(kelas, 1)")->fetchAll();

// 2. Jika kelas dipilih, ambil siswa berdasarkan kelas
$selectedKelas = $_GET['kelas'] ?? '';
$siswaList = [];
if ($selectedKelas) {
    $stmt = $db->prepare("SELECT id, nama ,role_id FROM users WHERE kelas = ? AND role_id = 3 ORDER BY nama ASC");
    $stmt->execute([$selectedKelas]);
    $siswaList = $stmt->fetchAll();
}

// 3. Ambil semua jenis pelanggaran
$pelanggaranList = $db->query("SELECT * FROM pelanggaran")->fetchAll();





// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $siswaId = $_POST['siswa_id'];
    $pelanggaranId = $_POST['pelanggaran_id'];
    $guruPiket = $_SESSION['user_name'];

    $stmt = $db->prepare("INSERT INTO pelanggaran_siswa (siswa_id, pelanggaran_id, guru_piket) VALUES (?, ?, ?)");
    $stmt->execute([$siswaId, $pelanggaranId, $guruPiket]);

    // Mengambil data pelanggaran siswa Untuk Sweetalert

    // Ambil nama siswa
    $stmt = $db->prepare("SELECT nama FROM users WHERE id = ? AND role_id = 3");
    $stmt->execute([$siswaId]);
    $siswa = $stmt->fetchColumn(); // hasil: nama siswa

    // Ambil nama pelanggaran
    $stmt = $db->prepare("SELECT nama_pelanggaran FROM pelanggaran WHERE id = ?");
    $stmt->execute([$pelanggaranId]);
    $pelanggaran = $stmt->fetchColumn(); // hasil: nama pelanggaran
    echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    html: '<strong>$siswa</strong> <br> <em>$pelanggaran</em>', 
                    confirmButtonColor: '#3085d6',
                    timer: 6000,
                    timerProgressBar: true,
                        willClose: () => {
                window.location.href = window.location.href; 
            }
                });
            });
        </script>
        ";
}
?>


<!-- TABEL KANAN -->
<?php
// Menampilkan data pelanggaran siswa untuk tabel kanan
$dataPelanggaran = $db->query("
    SELECT 
        ps.id,
        ps.tanggal,
        u.nama AS nama_siswa,
        u.kelas,
        p.nama_pelanggaran,
        p.poin,
        ps.guru_piket AS guru_piket
    FROM pelanggaran_siswa ps
    JOIN users u ON ps.siswa_id = u.id
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE DATE (ps.tanggal) = CURDATE()
    ORDER BY ps.tanggal DESC
")->fetchAll();

// Pagination setup
$page = isset($_GET['halaman']) ? max(1, (int) $_GET['halaman']) : 1;
$perPage = 5;
$total = count($dataPelanggaran);
$pages = ceil($total / $perPage);
$start = ($page - 1) * $perPage;
$items = array_slice($dataPelanggaran, $start, $perPage);

?>

<div class="container-fluid mt-4">
    <div class="row">

        <!-- Form Input (Kiri) -->
        <div class="col-md-5 border-end">
            <h3 class="mb-3">Form Input Pelanggaran Siswa</h3>
            <!-- <form action="" method="post"> -->
            <form action="" method="post" id="pelanggaran-form" class="position-relative border rounded p-3">
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas" required>
                        <option value="" selected disabled>Pilih kelas</option>
                        <?php foreach ($kelasList as $kelas): ?>
                            <option value="<?= $kelas['kelas'] ?>" <?= $selectedKelas == $kelas['kelas'] ?>>
                                <?= $kelas['kelas'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="siswa_id">Nama Siswa:</label>
                    <select name="siswa_id" class="form-select" required>
                        <option value="">Pilih Siswa</option>
                        <?php if (!empty($siswaList)): ?>
                            <?php foreach ($siswaList as $siswa): ?>
                                <option value="<?= $siswa['id'] ?>">
                                    <?= htmlspecialchars($siswa['nama']) ?> (<?= htmlspecialchars($siswa['username']) ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pelanggaran_id">Jenis Pelanggaran:</label>
                    <select name="pelanggaran_id" class="form-select" required>
                        <option value="">Pelanggaran</option>
                        <?php foreach ($pelanggaranList as $p): ?>
                            <option value="<?= $p['id'] ?>"><?= $p['nama_pelanggaran'] ?> (<?= $p['poin'] ?> poin)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="guru_piket" value="<?= $guruPiket ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Tabel Daftar Siswa (Kanan) -->
        <div class="col-md-7 border-start">
            <div class="container d-flex justify-content-between">
                <h3 class="mb-3">Daftar Siswa yang Melanggar <span class="fw-bold" id="tanggal"></span></h3>
                <a href="index.php?edit_input_pelanggaran" class="btn btn-sm btn-primary mb-3">Edit Pelanggaran</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Pelanggaran</th>
                            <th>Poin</th>
                            <th>Guru Piket</th>
                            <!-- <th>Tanggal</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($items)): ?>
                            <tr>
                                <td colspan="5">Belum ada data pelanggaran.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($items as $i => $siswa): ?>
                                <tr>
                                    <td><?= $start + $i + 1 ?></td>
                                    <td> <a target="_blank" class="text-decoration-none text-dark" style="cursor: pointer;"
                                            href="index.php?page=edit_input_pelanggaran&id=<?= $siswa['id'] ?>">
                                            <?= htmlspecialchars($siswa['nama_siswa']) ?>
                                        </a>
                                    </td>
                                    <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                                    <td><?= htmlspecialchars($siswa['nama_pelanggaran']) ?></td>
                                    <td><?= $siswa['poin'] ?></td>
                                    <td><?= $_SESSION['user_name'] ?></td>
                                    <!-- <td><?= $siswa['tanggal'] ?></td> -->
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($pages > 1): ?>
                <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $pages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="index.php?page=input_pelanggaran&halaman=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="../../utilities/tanggal.js"></script>



<script>
    document.getElementById('kelas').addEventListener('change', function () {
        var kelas = this.value;



        fetch(`views/ajax/get_siswa_by_kelas.php?kelas=${encodeURIComponent(kelas)}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector('select[name="siswa_id"]').innerHTML = '<option value="">Pilih Siswa</option>' + data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    // Fungsi untuk memformat tanggal
    function tampilkanTanggal() {
        const sekarang = new Date();

        // Opsi format lokal
        const opsiFormat = {
            weekday: 'long',     // Hari (misal: Senin)
            year: 'numeric',
            month: 'long',       // Bulan (misal: September)
            day: 'numeric'
        };

        // Format dengan bahasa Indonesia
        const tanggalFormatted = sekarang.toLocaleDateString('id-ID', opsiFormat);

        // Tampilkan di elemen <p id="tanggal">
        document.getElementById('tanggal').textContent = tanggalFormatted;
    }


    tampilkanTanggal();
</script>



<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>