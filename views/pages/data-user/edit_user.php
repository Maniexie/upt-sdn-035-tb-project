<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';

$stmt = $db->prepare('SELECT users.* , roles.role_name , jabatan.nama_jabatan , jabatan.status_kelas FROM users JOIN roles ON roles.id = users.role_id JOIN jabatan ON jabatan.id = users.jabatan_id WHERE users.id =:id');
$stmt->execute(['id' => $_GET['id']]);
$result = $stmt->fetchAll();

if (isset($_POST['submit'])) {


    $row = mysqli_fetch_assoc($result);

    $old_username = $row['username'];
    $old_nik = $row['nik'];
    $old_nisn = $row['nisn'];
    $old_nip = $row['nip'];

    $new_username = $_POST['username'];
    $new_nik = $_POST['nik'];
    $new_nisn = $_POST['nisn'];
    $new_nip = $_POST['nip'];
    $new_nama = $_POST['nama'];
    $new_kelas = $_POST['kelas'];
    $new_email = $_POST['email'];
    $new_jabatan_id = $_POST['jabatan_id'];
    $new_role_id = $_POST['role_id'];
    $new_tempat_lahir = $_POST['tempat_lahir'];
    $new_tanggal_lahir = $_POST['tanggal_lahir'];
    $new_alamat = $_POST['alamat'];
    $new_nomor_hp = $_POST['nomor_hp'];

    $update_query = "UPDATE users SET";

    $update_fields = [];

    if ($new_username != $old_username) {
        $update_fields[] = "username = '$new_username'";
    }
    if ($new_nik != $old_nik) {
        $update_fields[] = "nik = '$new_nik'";
    }
    if ($new_nisn != $old_nisn) {
        $update_fields[] = "nisn = '$new_nisn'";
    }
    if ($new_nip != $old_nip) {
        $update_fields[] = "nip = '$new_nip'";
    }



    if (count($update_fields) > 0) {
        $update_query .= implode(",", $update_fields);
        $update_query .= implode("WHERE id = '$id_user'");

        if (mysqli_query($db, $update_query)) {
            echo "data berhasil di perbarui";
        } else {
            echo "Terjadi kesalahan" . mysqli_error($db);
        }
    }

    // Persiapkan query update
    $stmt = mysqli_prepare($db, "UPDATE users SET id = ?, username = ?, email = ?, nama = ?, kelas = ?, email= ? , jabatan_id= ? , role_id= ? , tempat_lahir= ? , tanggal_lahir= ?, alamat= ? , nomor_hp= ? WHERE id= ?");

    // Binding parameter
    mysqli_stmt_bind_param(
        $stmt,
        "issssssssiissss",
        $id_user,
        $new_username,
        $new_email,
        $new_nama,
        $new_kelas,
        $new_email,
        $new_jabatan_id,
        $new_role_id,
        $new_tempat_lahir,
        $new_tanggal_lahir,
        $new_alamat,
        $new_nomor_hp
    );

    // Eksekusi query
    mysqli_stmt_execute($stmt);

    echo "Data berhasil diperbarui.";


    // $stmt = $db->prepare('UPDATE users SET nisn = :nisn, nip = :nip, nik = :nik, nama = :nama, 
    // username = :username, email = :email, kelas = :kelas, jabatan_id = :jabatan_id, role_id = :role_id , 
    // tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir, alamat = :alamat, nomor_hp = :nomor_hp WHERE id = :id');
    // $stmt->execute([
    //     ':id' => $_POST['id'],
    //     ':nisn' => $_POST['nisn'],
    //     ':nip' => $_POST['nip'],
    //     ':nik' => $_POST['nik'],
    //     ':nama' => $_POST['nama'],
    //     ':username' => $_POST['username'],
    //     ':email' => $_POST['email'],
    //     ':kelas' => $_POST['kelas'],
    //     ':jabatan_id' => $_POST['jabatan_id'],
    //     ':role_id' => $_POST['role_id'],
    //     ':tempat_lahir' => $_POST['tempat_lahir'],
    //     ':tanggal_lahir' => $_POST['tanggal_lahir'],
    //     ':alamat' => $_POST['alamat'],
    //     ':nomor_hp' => $_POST['nomor_hp']
    // ]);


    // $nama = htmlspecialchars($_POST['nama']);


    // echo "
    // <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    // <script>
    //     document.addEventListener('DOMContentLoaded', function () {
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Berhasil!',
    //             html: 'Profil <strong>{$nama}</strong> berhasil diubah',
    //             confirmButtonColor: '#3085d6',
    //             timer: 6000,
    //             timerProgressBar: true,
    //                 willClose: () => {
    //                 window.location.href = `index.php?page=edit_user&=$id`;
    //             }
    //         });
    //     });
    // </script>
    // ";
    // exit();
}


?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <?php foreach ($result as $row): ?>

                    <div class="card-header" style="background-color: darkgoldenrod; color: aliceblue;">
                        <h4 class="card-title">Halaman <span class="fw-semibold">Edit</span> User : <?= $row['nama']; ?> -
                            <?= $row['username']; ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3 row">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

                                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nisn" id="nisn"
                                        value="<?= $row['nisn'] ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $row['nip'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $row['nik'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username"
                                        value="<?= $row['username'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="staticEmail"
                                        value="<?= $row['email']; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="<?= $row['nama'] ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <select name="kelas" class="form-select" id="kelas" required>
                                        <option value="<?= $row['kelas']; ?>"><?= $row['kelas']; ?>
                                        </option>
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
                                <label for="role_name" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <?php
                                    $stmt = $db->prepare("SELECT id AS id_role, role_name FROM roles");
                                    $stmt->execute();
                                    $allRoles = $stmt->fetchAll();
                                    ?>
                                    <select name="role_id" class="form-select text-capitalize" id="role_id" required>
                                        <?php foreach ($allRoles as $role): ?>
                                            <option class="text-capitalize" value="<?= $role['id_role']; ?>"
                                                <?= $role['id_role'] == $row['role_id'] ? 'selected' : ''; ?>>

                                                <span class="text-capitalize">
                                                    <?= htmlspecialchars($role['role_name']); ?></span>
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
                                            <option class="text-capitalize" value="<?= $jbtn['id_jabatan']; ?>"
                                                <?= $jbtn['id_jabatan'] == $row['jabatan_id'] ? 'selected' : ''; ?>>

                                                <span class="text-capitalize">
                                                    <?= htmlspecialchars($jbtn['jabatan_nama']); ?>
                                                    (<?= htmlspecialchars($jbtn['status_kelas']); ?>)</span>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp"
                                        value="<?= $row['nomor_hp'] ?>">
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        value="<?= $row['tempat_lahir'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                        value="<?= date('Y-m-d', strtotime($row['tanggal_lahir'])) ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        value="<?= $row['alamat'] ?>">
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

                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/header.php'; ?>