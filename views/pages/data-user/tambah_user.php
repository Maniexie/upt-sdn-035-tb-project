<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';


if (isset($_POST['submit'])) {

    // Jika Nisn sudah terdaftar
    if (!empty($_POST['nisn'])) {
        $cekNisn = $db->prepare("SELECT nisn FROM users WHERE nisn = :nisn");
        $cekNisn->execute([':nisn' => $_POST['nisn']]);
        if ($cekNisn->rowCount() > 0) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'NISN sudah terdaftar!',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                showConfirmButton: true
            }).then(() => {
                window.location.href = 'index.php?page=tambah_user';
            });
        </script>";
            exit;
        }
    }

    // Jika Nip sudah terdaftar
    if (!empty($_POST['nip'])) {
        $cekNip = $db->prepare("SELECT nip FROM users WHERE nip = :nip");
        $cekNip->execute([':nip' => $_POST['nip']]);
        if ($cekNip->rowCount() > 0) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Nip sudah terdaftar!',  
                icon: 'error',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                showConfirmButton: true
            }).then(() => {
                window.location.href = 'index.php?page=tambah_user';
            });
        </script>";
            exit;
        }
    }


    // Jika Nik sudah terdaftar
    if (!empty($_POST['nik'])) {
        $cekNik = $db->prepare("SELECT nik FROM users WHERE nik = :nik");
        $cekNik->execute([':nik' => $_POST['nik']]);
        if ($cekNik->rowCount() > 0) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Nik sudah terdaftar!',  
                icon: 'error',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                showConfirmButton: true
            }).then(() => {
                window.location.href = 'index.php?page=tambah_user';
            });
        </script>";
            exit;
        }
    }



    // Jika username sudah terdaftar
    if (!(empty($_POST['username']))) {
        $cekUsername = $db->prepare("SELECT username FROM users WHERE username = :username");
        $cekUsername->execute([':username' => $_POST['username']]);
        if ($cekUsername->rowCount() > 0) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Username sudah terdaftar!',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                showConfirmButton: true
            }).then(() => {
                window.location.href = 'index.php?page=tambah_user';
            });
        </script>";
            exit;
        }
    }





    // Query untuk menambah data user
    $stmt = $db->prepare('INSERT INTO users SET nisn = :nisn, nip = :nip, nik = :nik, nama = :nama, 
    username = :username, password = :password, email = :email, kelas = :kelas, jabatan_id = :jabatan_id, jadwal_piket_id = :jadwal_piket_id, role_id = :role_id , 
    tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir, alamat = :alamat, nomor_hp = :nomor_hp ');

    $stmt->execute([
        ':nisn' => $_POST['nisn'],
        ':nip' => $_POST['nip'],
        ':nik' => $_POST['nik'],
        ':email' => $_POST['email'],
        ':nama' => $_POST['nama'],
        ':username' => $_POST['username'],
        ':password' => password_hash(($_POST['password']), PASSWORD_DEFAULT),
        ':kelas' => $_POST['kelas'],
        ':jabatan_id' => $_POST['jabatan_id'],
        ':jadwal_piket_id' => $_POST['jadwal_piket_id'],
        ':role_id' => $_POST['role_id'],
        ':tempat_lahir' => $_POST['tempat_lahir'],
        ':tanggal_lahir' => $_POST['tanggal_lahir'],
        ':alamat' => $_POST['alamat'],
        ':nomor_hp' => $_POST['nomor_hp']
    ]);

    $nama = $_POST['nama'];
    $role = $_POST['role_id'];

    // Tentukan nama role berdasarkan id role
    if ($role == 1) {
        $role = "Admin";
    } elseif ($role == 2) {
        $role = "Guru";
    } elseif ($role == 3) {
        $role = "Siswa";
    }

    // Berikan respon sukses dengan SweetAlert
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: '<strong>{$nama}</strong> berhasil ditambahkan sebagai <strong>{$role}</strong>',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = `index.php?page=daftar_user`;
                }
            });
        });
    </script>";
    exit();
}
?>
<style>
    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .card-title {
            font-size: 14px;
        }

        .text-sm {
            font-size: 12px;
        }

        .form-control-sm {
            width: 10%px;

        }

        .btn-s {
            font-size: 10px;
        }
    }
</style>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header" style="background-color: darkgoldenrod; color: aliceblue;">
                    <h4 class="card-title">Halaman <span class="fw-semibold">
                            Tambah</span> User
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 row">

                            <label for="nisn" class="col-sm-2 col-form-label text-sm">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nisn" id="nisn">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-2 col-form-label text-sm">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nip" id="nip ">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nik" class="col-sm-2 col-form-label text-sm">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nik" id="nik">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label text-sm">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="email" id="staticEmail">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label text-sm">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="username" id="username">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label text-sm">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="password" id="password">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label text-sm">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nama" id="nama">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kelas" class="col-sm-2 col-form-label text-sm">Kelas</label>
                            <div class="col-sm-10">
                                <select name="kelas" class="form-select form-select-sm" id="kelas" required>
                                    <option value="-">-</option>
                                    <?php
                                    for ($i = 1; $i <= 6; $i++) {
                                        for ($j = 'A'; $j <= 'C'; $j++) {
                                            echo "<option value=\"{$i}{$j}\">{$i}{$j}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label text-sm">Jadwal Piket</label>
                            <div class="col-sm-10">
                                <select name="jadwal_piket_id" class="form-select form-select-sm" id="" required autofocus>
                                    <?php
                                    $stmt = $db->prepare("SELECT * FROM jadwal_piket");
                                    $stmt->execute();
                                    $allJadwalPiket = $stmt->fetchAll();
                                    foreach ($allJadwalPiket as $jp) {
                                        echo "<option value=\"{$jp['id']}\">{$jp['hari_piket']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="role_name" class="col-sm-2 col-form-label text-sm">Status</label>
                            <div class="col-sm-10">
                                <?php
                                $stmt = $db->prepare("SELECT id AS id_role, role_name FROM roles");
                                $stmt->execute();
                                $allRoles = $stmt->fetchAll();
                                ?>
                                <select name="role_id" class="form-select form-select-sm text-capitalize" id="role_id" required>
                                    <?php foreach ($allRoles as $r): ?>
                                        <option class="text-capitalize" value="<?= $r['id_role']; ?>">
                                            <span class=" text-capitalize">
                                                <?= htmlspecialchars($r['role_name']); ?></span>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_jabatan" class="col-sm-2 col-form-label text-sm">Jabatan</label>
                            <div class="col-sm-10">
                                <?php
                                $stmt = $db->prepare("SELECT id AS id_jabatan, nama_jabatan AS jabatan_nama , status_kelas FROM jabatan");
                                $stmt->execute();
                                $alljabatan = $stmt->fetchAll();
                                ?>
                                <select name="jabatan_id" class="form-select form-select-sm text-capitalize" id="nama_jabatan">
                                    <?php foreach ($alljabatan as $jbtn): ?>
                                        <option class="text-capitalize" value="<?= $jbtn['id_jabatan']; ?>">
                                            <span class="text-capitalize">
                                                <?= htmlspecialchars($jbtn['jabatan_nama']); ?>
                                                <?php echo " (" . $jbtn['status_kelas'] . ")"; ?></span>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nomor_hp" class="col-sm-2 col-form-label text-sm">Nomor HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nomor_hp" id="nomor_hp">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label text-sm">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="tempat_lahir" id="tempat_lahir">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label text-sm">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control form-control-sm" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label text-sm">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="alamat" id="alamat">
                            </div>
                        </div>

                        <div class="container mb-3 d-flex justify-content-between">
                            <a href="index.php?page=daftar_user" class="btn btn-s btn-secondary">
                                ← Kembali</a>
                            <button type="submit" name="submit" class="btn btn-s btn-primary">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fields = ["nisn", "nip", "nik", "username"];

        fields.forEach(field => {
            const input = document.getElementById(field);
            if (input) {
                input.addEventListener("blur", function() { // blur = saat pindah dari input
                    const value = this.value.trim();
                    if (value !== "") {
                        fetch("views/ajax/check_unique_input_user.php", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/x-www-form-urlencoded"
                                },
                                body: "field=" + encodeURIComponent(field) + "&value=" + encodeURIComponent(value)
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.status === "duplicate") {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Duplikat!",
                                        text: data.message,
                                        confirmButtonColor: "#d33"
                                    });
                                    input.value = ""; // kosongkan input kalau duplicate
                                    input.focus();
                                }
                            });
                    }
                });
            }
        });
    });
</script>


<?php require_once __DIR__ . '/../../layouts/header.php'; ?>