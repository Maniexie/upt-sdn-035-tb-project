<?php
ob_start();
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";


// check nisn unik , nik , username



// menambah data siswa
if (isset($_POST["submit"])) {
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
    $role_id = $_POST["role_id"];




    $getCheckData = $db->prepare("SELECT * FROM users WHERE username = :username OR nik = :nik OR nisn = :nisn");
    $getCheckData->bindParam(':username', $username);
    $getCheckData->bindParam(':nik', $nik);
    $getCheckData->bindParam(':nisn', $nisn);
    $getCheckData->execute();
    $getCheckData = $getCheckData->fetchAll();

    if ($getCheckData->num_rows > 0) {
        echo "
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                 Swal.fire({
                    icon: 'info',
                    title: 'Gagal!',
                    html: 'Data <b>$nik</b> atau <b>$username</b> atau <b>$nisn</b> sudah terdaftar.',
                    confirmButtonColor: '#e9b635ff',
                    timer: 6000,
                    timerProgressBar: true,
                        willClose: () => {
                        window.location.href = 'index.php?page=input_data_siswa';
                    }
                });
            });
        </script>
    ";

        $insertData = "INSERT INTO users (nik, nisn,email, username, nama, kelas, tempat_lahir, tanggal_lahir,nomor_hp, alamat , role_id) VALUES (:nik, :nisn, :email, :username, :nama, :kelas, :tempat_lahir, :tanggal_lahir,:nomor_hp ,:alamat , :role_id)";

        $stmt = $db->prepare($insertData);
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
        $stmt->bindParam(':role_id', $role_id);
        $stmt->execute();

        echo "
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                 Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    html: 'Data <b>$nama</b> kelas <b>$kelas</b> berhasil ditambahkan.',
                    confirmButtonColor: '#3085d6',
                    timer: 6000,
                    timerProgressBar: true,
                        willClose: () => {
                        window.location.href = 'index.php?page=daftar_siswa_for_admin';
                    }
                });
            });
        </script>
    ";

        // header("Location: index.php?page=detail_siswa_for_admin&id=" . $id);
        exit;
    }
}

?>
<div class="container w-auto">
    <!-- Halaman edit siswa -->
    <section>
        <div class="container d-flex justify-content-between">
            <a href="index.php?page=daftar_siswa_for_admin" class="btn btn-secondary mt-3">←
                Kembali</a>
        </div>
        <div class="container-md">
            <h1 class="text-center">Halaman Edit Data Siswa </h1>
            <form action="" method="POST" class="border rounded p-3">

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik">
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-select" name="kelas" id="kelas" required>
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
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>

                <input type="hidden" name="role_id" value="3">

                <!-- <div class="container d-flex-justify-content-end"> -->
                <button type="submit" class="btn btn-primary mt-2" name="submit">Submit</button>
                <!-- </div> -->
            </form>
        </div>

    </section>

</div>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>