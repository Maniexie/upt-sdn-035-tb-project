<?php
ob_start();
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";


// ambil data siswa sebagai value
$dataSiswa = $db->prepare("SELECT *  FROM users  WHERE users.id = :id");
$dataSiswa->execute(['id' => $_GET['id']]);
$dataSiswa = $dataSiswa->fetch();


// pastikan ID valid 
if ($dataSiswa == false || $dataSiswa == 0) {
    echo "<div class='alert alert-danger'>ID tidak valid.</div>";
    exit;
}

// merubah data siswa
if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $nik = $_POST["nik"];
    $nisn = $_POST["nisn"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nomor_hp = $_POST["nomor_hp"];
    $alamat = $_POST["alamat"];

    $updateQuery = "UPDATE users SET nik = :nik, nisn = :nisn,email = :email, username = :username, nama = :nama, kelas = :kelas, tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir, nomor_hp = :nomor_hp, alamat = :alamat WHERE id = :id";

    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':nik', $nik);
    $stmt->bindParam(':nisn', $nisn);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kelas', $kelas);
    $stmt->bindParam(':tempat_lahir', $tempat_lahir);
    $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':nomor_hp', $nomor_hp);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    html: 'Data siswa berhasil diubah.',
                    confirmButtonColor: '#3085d6',
                    timer: 6000,
                    timerProgressBar: true,
                        willClose: () => {
                        window.location.href = 'index.php?page=detail_siswa_for_admin&id=' + '$id';
                    }
                });
            });
        </script>
    ";

    // header("Location: index.php?page=detail_siswa_for_admin&id=" . $id);
    exit;
}


// Ambil data guru wali kelas sebagai value
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
            <a href="index.php?page=detail_siswa_for_admin&id=<?= $dataSiswa['id'] ?>" class="btn btn-secondary mt-3">←
                Kembali</a>
        </div>
        <div class="container-md">
            <h1 class="text-center">Halaman Edit Data Siswa </h1>
            <form action="" method="POST" class="border rounded p-3">
                <!-- <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dataSiswa["id"]; ?>"> -->

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik"
                        value="<?php echo $dataSiswa["nik"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn"
                        value="<?php echo $dataSiswa["nisn"]; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        value="<?php echo $dataSiswa["email"]; ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php echo $dataSiswa["username"]; ?>">
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
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                        value="<?php echo $dataSiswa["nomor_hp"]; ?>">
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