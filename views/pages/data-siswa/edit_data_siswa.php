<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";


$dataSiswa = $db->prepare("SELECT id , nisn , nama , kelas, tempat_lahir, tanggal_lahir, alamat  FROM users  WHERE users.id = :id");
$dataSiswa->execute(['id' => $_GET['id']]);
$dataSiswa = $dataSiswa->fetch();



// ambil data siswa 


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
    $alamat = $_POST["alamat"];

    $stmt = $db->prepare("SELECT id , nisn , nama , kelas , tempat_lahir , tanggal_lahir , wali_kelas , alamat FROM users WHERE id = :id");
    $stmt->execute();

    $updateQuery = "UPDATE nisn, nama, kelas, tempat_lahir, tanggal_lahir, alamat SET "
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
            <a href="index.php?page=detail_siswa_for_admin&id=<?= $dataSiswa['id'] ?>"
                class="btn btn-secondary mt-3">←
                Kembali</a>
        </div>
        <div class="container-md">
            <h1 class="text-center">Halaman Edit Data Siswa </h1>
            <form action="" method="POST" class="border rounded p-3">

                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn"
                        value="<?php echo $dataSiswa["nisn"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="<?php echo $dataSiswa["nama"]; ?>">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-select" name="kelas" id="kelas" onchange="updatePoin()">
                        <option value="<?php echo $dataSiswa['kelas']; ?>" selected>
                            <?php echo $dataSiswa['kelas'] . " " ?>
                        </option>
                        <option value="1A">1A</option>
                        <option value="1B">1B</option>
                        <option value="1C">1C</option>
                        <option value="2A">2A</option>
                        <option value="2B">2B</option>
                        <option value="2C">2C</option>
                        <option value="3A">3A</option>
                        <option value="3B">3B</option>
                        <option value="3C">3C</option>
                        <option value="4A">4A</option>
                        <option value="4B">4B</option>
                        <option value="4C">4C</option>
                        <option value="5A">5A</option>
                        <option value="5B">5B</option>
                        <option value="5C">5C</option>
                        <option value="6A">6A</option>
                        <option value="6B">6B</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        value="<?php echo $dataSiswa["tempat_lahir"]; ?>">
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        value="<?php echo $dataSiswa["tanggal_lahir"]; ?>">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="<?php echo $dataSiswa["alamat"]; ?>">
                </div>

                <div class="form-group">
                    <label for="wali_kelas">Wali Kelas</label>
                    <input type="text" class="form-control" id="wali_kelas" name="wali_kelas"
                        value=" <?= htmlspecialchars($namaGuru) ?>" readonly disabled>
                </div>

                <!-- <div class="container d-flex-justify-content-end"> -->
                <button type="submit" class="btn btn-primary mt-2" name="submit">Simpan</button>
                <!-- </div> -->
            </form>
        </div>

    </section>

</div>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>