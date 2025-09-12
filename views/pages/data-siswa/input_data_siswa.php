<?php
ob_start();
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";

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

    // == CEK DUPLIKAT ==
    // cek duplikat username
    $query = "SELECT * FROM users WHERE username = :username ";
    $stmt = $db->prepare($query);
    $stmt->execute([':username' => $username]);

    if ($stmt->fetchColumn() > 0) {
        // $error_message = "Username sudah digunakan.";
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal Username!',
                    html: 'Data <b>$nama</b> kelas <b>$kelas</b> gagal ditambahkan.',
                    confirmButtonColor: '#c53d3dff',
                    timer: 6000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'index.php?page=daftar_siswa_for_admin';
                    }
                });
            });
        </script>
        ";
        exit;
    } else if ($stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE nik = :nik")) {
        if ($stmt->execute([':nik' => $nik])) {
            if ($stmt->fetchColumn() > 0) {
                // $error_message = "Nik Sudah digunakan";
                echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal NIK',
                    html: 'Data <b>$nama</b> kelas <b>$kelas</b> gagal ditambahkan.',
                    confirmButtonColor: '#c53d3dff',
                    timer: 6000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'index.php?page=daftar_siswa_for_admin';
                    }
                });
            });
        </script>
        ";
                exit;
            }
        }
    } else if ($stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE nisn = :nisn")) {
        if ($stmt->execute([':nisn' => $nisn])) {
            if ($stmt->fetchColumn() > 0) {
                // $error_message = "NISN Sudah digunakan";
                echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal NISN',
                    html: 'Data <b>$nama</b> kelas <b>$kelas</b> gagal ditambahkan.',
                    confirmButtonColor: '#c53d3dff',
                    timer: 6000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'index.php?page=daftar_siswa_for_admin';
                    }
                });
            });
        </script>
        ";
                exit;
            }
        }
    }







    try {
        $insertData = "INSERT INTO users (nik, nisn, email, username, nama, kelas, tempat_lahir, tanggal_lahir, nomor_hp, alamat, role_id)
                       VALUES (:nik, :nisn, :email, :username, :nama, :kelas, :tempat_lahir, :tanggal_lahir, :nomor_hp, :alamat, :role_id)";

        $stmt = $db->prepare($insertData);
        $stmt->execute([
            ':nik' => $nik,
            ':nisn' => $nisn,
            ':email' => $email,
            ':username' => $username,
            ':nama' => $nama,
            ':kelas' => $kelas,
            ':tempat_lahir' => $tempat_lahir,
            ':tanggal_lahir' => $tanggal_lahir,
            ':nomor_hp' => $nomor_hp,
            ':alamat' => $alamat,
            ':role_id' => $role_id
        ]);

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
        exit;
    } catch (PDOException $error) {
        if ($error->getCode() === "23000") {
            echo "<script>alert('Gagal menyimpan data. Duplikasi data terdeteksi.'); window.history.back();</script>";
        } else {
            echo "Error: " . $error->getMessage();
        }
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
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

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