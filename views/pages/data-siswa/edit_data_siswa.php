<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";


$dataSiswa = $db->prepare("SELECT id FROM users  WHERE users.id = :id");
$dataSiswa->execute(['id' => $_GET['id']]);
$dataSiswa = $dataSiswa->fetch();



// pastikan ID valid 
if ($dataSiswa == false || $dataSiswa == 0) {
    echo "<div class='alert alert-danger'>ID tidak valid.</div>";
    exit;
}
if (isset($_POST["submit"])) {
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $wali_kelas = $_POST["wali_kelas"];
    $alamat = $_POST["alamat"];

    $stmt = $db->prepare("SELECT id , nisn , nama , kelas , tempat_lahir , tanggal_lahir , wali_kelas , alamat FROM users WHERE id = :id");





}


// Ambil data guru wali kelas
$guru = $db->query("
    SELECT nama,nip 
    FROM users 
    WHERE role_id = 2 
      AND kelas = '" . $dataSiswa['kelas'] . "'
    LIMIT 1
")->fetch();

$namaGuru = $guru ? $guru['nama'] : 'Nama Wali Kelas';
$nipGuru = $guru ? $guru['nip'] : 'NIP Wali Kelas';

?>
<div class="container w-auto">
    <!-- Halaman edit siswa -->
    <section>
        <div class="container d-flex justify-content-between">
            <a href="index.php?page=detail_pelanggaran&id=<?= $pelanggaran['siswa_id'] ?>"
                class="btn btn-secondary mt-3">←
                Kembali</a>
        </div>
        <div class="container-md">
            <h1 class="text-center">Halaman Edit Data Siswa </h1>
            <form action="" method="POST" class="border rounded p-3">

                <div class="form-group">
                    <label for="nama_siswa">NISN</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                        value="<?php echo $dataSiswa["nama"]; ?>" readonly disabled>
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                        value="<?php echo $dataSiswa["nama"]; ?>" readonly disabled>
                </div>

                <div class="form-group">
                    <label for="pelanggaran_id">Kelas</label>
                    <select class="form-select" name="pelanggaran_id" id="pelanggaran_id" onchange="updatePoin()">
                        <option value="<?php echo $pelanggaran['pelanggaran_id']; ?>" selected>
                            <?php echo $pelanggaran['nama_pelanggaran'] . " (" . $pelanggaran['poin'] . " poin)" ?>
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kelas">Tempat Lahir</label>
                    <input type="text" class="form-control" id="kelas" name="kelas"
                        value="<?php echo $pelanggaran["kelas"]; ?>" readonly disabled>
                </div>

                <div class="form-group">
                    <label for="kelas">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="kelas" name="kelas"
                        value="<?php echo $pelanggaran["kelas"]; ?>" readonly disabled>
                </div>

                <div class="form-group">
                    <label for="kelas">Alamat</label>
                    <input type="text" class="form-control" id="kelas" name="kelas"
                        value="<?php echo $pelanggaran["kelas"]; ?>" readonly disabled>
                </div>

                <div class="form-group">
                    <label for="kelas">Wali Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas"
                        value=" <?= htmlspecialchars($namaGuru) ?>" readonly disabled>
                </div>

                <div class="form-group">
                    <label for="pelanggaran_id">Pelanggaran</label>
                    <select class="form-select" name="pelanggaran_id" id="pelanggaran_id" onchange="updatePoin()">
                        <option value="<?php echo $pelanggaran['pelanggaran_id']; ?>" selected>
                            <?php echo $pelanggaran['nama_pelanggaran'] . " (" . $pelanggaran['poin'] . " poin)" ?>
                        </option>
                        <!-- Pastikan menampilkan daftar pelanggaran lainnya jika ada -->
                        <?php
                        // Query untuk mengambil semua pelanggaran
                        $stmt_pelanggaran = $db->query("SELECT * FROM pelanggaran");
                        while ($p = $stmt_pelanggaran->fetch()) {
                            echo "<option value='" . $p['id'] . "'>" . $p['nama_pelanggaran'] . " (" . $p['poin'] . " poin)" . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="container d-flex-justify-content-end"> -->
                <button type="submit" class="btn btn-primary mt-2" name="submit">Simpan</button>
                <!-- </div> -->
            </form>
        </div>

    </section>

</div>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>