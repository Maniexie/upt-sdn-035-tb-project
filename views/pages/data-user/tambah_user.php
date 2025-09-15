<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';


if (isset($_POST['submit'])) {
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

    if ($role == 1) {
        $role = "Admin";
    } elseif ($role == 2) {
        $role = "Guru";
    } elseif ($role == 3) {
        $role = "Siswa";
    }



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
    </script>
    ";
    exit();
}


?>

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

                            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nisn" id="nisn">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip" id="nip ">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" id="nik">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="staticEmail">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select name="kelas" class="form-select" id="kelas" required>
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
                            <label for="nama" class="col-sm-2 col-form-label">Jadwal Piket</label>
                            <div class="col-sm-10">
                                <select name="jadwal_piket_id" class="form-select" id="" required autofocus>
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
                            <label for="role_name" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <?php
                                $stmt = $db->prepare("SELECT id AS id_role, role_name FROM roles");
                                $stmt->execute();
                                $allRoles = $stmt->fetchAll();
                                ?>
                                <select name="role_id" class="form-select text-capitalize" id="role_id" required>
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
                            <label for="nama_jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <?php
                                $stmt = $db->prepare("SELECT id AS id_jabatan, nama_jabatan AS jabatan_nama , status_kelas FROM jabatan");
                                $stmt->execute();
                                $alljabatan = $stmt->fetchAll();
                                ?>
                                <select name="jabatan_id" class="form-select text-capitalize" id="nama_jabatan">
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
                            <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomor_hp" id="nomor_hp">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>
                        </div>

                        <div class="container mb-3 d-flex justify-content-between">
                            <a href="index.php?page=detail_user&id=<?= $row['id'] ?>" class="btn btn-secondary">
                                <= Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/header.php'; ?>