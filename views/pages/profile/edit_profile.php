<?php
ob_start();
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

function tanggal_indo_intl($tanggal)
{
    $formatter = new IntlDateFormatter(
        'id_ID',
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
        'Asia/Jakarta',
        IntlDateFormatter::GREGORIAN
    );

    return $formatter->format(new DateTime($tanggal));
}


// Ambil data user dari database berdasarkan session
$stmt = $db->prepare("SELECT users.* , roles.role_name , jabatan.nama_jabatan FROM users JOIN roles ON roles.id = users.role_id JOIN jabatan ON jabatan.id = users.jabatan_id WHERE users.id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);


// ambil data guru wali kelas
$stmt = $db->prepare('SELECT nama, nip FROM users WHERE role_id = 2 AND users.kelas = :kelas');
$stmt->execute(['kelas' => $result['kelas']]);
$dataGuru = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // FOR ADMIN
    if ($_SESSION['role_id'] == 1):

        $stmt = $db->prepare('UPDATE users SET 
        nik = :nik, 
        nip = :nip,
        kelas = :kelas, 
        email = :email, 
        nama = :nama, 
        tempat_lahir = :tempat_lahir, 
        tanggal_lahir = :tanggal_lahir, 
        nomor_hp = :nomor_hp, 
        alamat = :alamat 
        WHERE id = :id');

        $stmt->execute([
            ':id' => $result['id'],
            ':nik' => $_POST['nik'],
            ':nip' => $_POST['nip'],
            ':kelas' => $_POST['kelas'],
            ':email' => $_POST['email'],
            ':nama' => $_POST['nama'],
            ':tempat_lahir' => $_POST['tempat_lahir'],
            ':tanggal_lahir' => $_POST['tanggal_lahir'],
            ':nomor_hp' => $_POST['nomor_hp'],
            ':alamat' => $_POST['alamat']
        ]);

        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Profile berhasil diubah.',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = 'index.php?page=profile';
                }
            });
        });
    </script>
    ";

        exit();

    endif;

    // FOR GURU
    if ($_SESSION['role_id'] == 2):

        $stmt = $db->prepare('UPDATE users SET 
        nik = :nik, 
        nip = :nip,
        email = :email, 
        nama = :nama, 
        tempat_lahir = :tempat_lahir, 
        tanggal_lahir = :tanggal_lahir, 
        nomor_hp = :nomor_hp, 
        alamat = :alamat 
        WHERE id = :id');

        $stmt->execute([
            ':id' => $result['id'],
            ':nik' => $_POST['nik'],
            ':nip' => $_POST['nip'],
            ':email' => $_POST['email'],
            ':nama' => $_POST['nama'],
            ':tempat_lahir' => $_POST['tempat_lahir'],
            ':tanggal_lahir' => $_POST['tanggal_lahir'],
            ':nomor_hp' => $_POST['nomor_hp'],
            ':alamat' => $_POST['alamat']
        ]);

        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Profile berhasil diubah.',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = 'index.php?page=profile';
                }
            });
        });
    </script>
    ";

        exit();

    endif;

    if ($_SESSION['role_id'] == 3):
        $stmt = $db->prepare('UPDATE users SET 
        nik = :nik, 
        nisn = :nisn, 
        email = :email, 
        nama = :nama, 
        tempat_lahir = :tempat_lahir, 
        tanggal_lahir = :tanggal_lahir, 
        nomor_hp = :nomor_hp, 
        alamat = :alamat 
        WHERE id = :id');

        $stmt->execute([
            ':id' => $result['id'],
            ':nik' => $_POST['nik'],
            ':nisn' => $_POST['nisn'],
            ':email' => $_POST['email'],
            ':nama' => $_POST['nama'],
            ':tempat_lahir' => $_POST['tempat_lahir'],
            ':tanggal_lahir' => $_POST['tanggal_lahir'],
            ':nomor_hp' => $_POST['nomor_hp'],
            ':alamat' => $_POST['alamat']
        ]);

        var_dump($stmt);

        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Profile berhasil diubah.',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = 'index.php?page=profile';
                }
            });
        });
    </script>
    ";

        exit();

    endif;

    var_dump($stmt);
}




?>

<div class="container w-auto">
    <section class="mx-2">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="card-title text-capitalize text-nowrap text-truncate">
                    Edit Profile : <?= htmlspecialchars($result['nama']); ?>
                </h2>
            </div>
            <form action="" method="POST" class="mx-2 mt-2">
                <input type="hidden" name="id" value="<?= $result['id']; ?>">

                <div class="mb-3 row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK </label>
                    <div class="col-sm-10">
                        <input type="text" name="nik" class="form-control" id="nik"
                            value="<?= htmlspecialchars($result['nik']); ?>">
                    </div>
                </div>

                <?php if ($result['role_id'] === 1 || $result['role_id'] === 2): ?>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP </label>
                        <div class="col-sm-10">
                            <input type="text" name="nip" class="form-control" id="nip"
                                value="<?= htmlspecialchars($result['nip']); ?>">
                        </div>
                    </div>
                <?php endif; ?>


                <?php if ($result['role_id'] === 3): ?>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="text" name="nisn" class="form-control" id="nisn"
                                value="<?= htmlspecialchars($result['nisn']); ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email </label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email"
                            value="<?= htmlspecialchars($result['email']); ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username"
                            value="<?= htmlspecialchars($result['username']); ?>" readonly disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="<?= htmlspecialchars($result['nama']); ?>">
                    </div>
                </div>

                <?php if ($result['role_id'] === 1): ?>
                    <div class="mb-3 row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas" class="form-select" id="kelas" required>
                                <option value="<?= $result['kelas']; ?>"><?= $result['kelas']; ?></option>
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
                <?php endif; ?>


                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan"
                            value="<?= htmlspecialchars($result['nama_jabatan']) ?>" disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir </label>
                    <div class="col-sm-10">
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                            value="<?= htmlspecialchars($result['tempat_lahir']) ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                            value="<?= htmlspecialchars(date('Y-m-d', strtotime($result['tanggal_lahir']))) ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP </label>
                    <div class="col-sm-10">
                        <input type="text" name="nomor_hp" class="form-control" id="nomor_hp"
                            value="<?= htmlspecialchars($result['nomor_hp']); ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" id="alamat"
                            value="<?= htmlspecialchars($result['alamat']); ?>">
                    </div>
                </div>

                <?php if ($result['role_id'] === 3): ?>
                    <div class="mb-3 row">
                        <label for="wali_kelas" class="col-sm-2 col-form-label">Wali Kelas </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="wali_kelas"
                                value="<?= htmlspecialchars($dataGuru['nama']); ?> ( <?= htmlspecialchars($dataGuru['nip']); ?> )"
                                disabled>
                        </div>
                    </div>
                <?php endif; ?>
        </div>

        <div class="container d-flex justify-content-between">
            <a href="index.php?page=profile&id=<?= $result['id']; ?>" class="btn btn-secondary mt-3"><- Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3" name="submit">Simpan</button>
        </div>
        </form>
    </section>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>