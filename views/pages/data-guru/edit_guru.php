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
$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);
$result = $stmt->fetch();


// ambil data guru wali kelas
$stmt = $db->prepare('SELECT nama, nip FROM users WHERE role_id = 2 AND kelas = :kelas');
$stmt->execute(['kelas' => $result['kelas']]);
$dataGuru = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $db->prepare('UPDATE users SET 
    nik = :nik, 
    nip = :nip, 
    email = :email, 
    username = :username, 
    nama = :nama, 
    kelas = :kelas, 
    tempat_lahir = :tempat_lahir, 
    tanggal_lahir = :tanggal_lahir, 
    nomor_hp = :nomor_hp, 
    alamat = :alamat,
    role_id = :role_id 
WHERE id = :id');

    $stmt->execute([
        ':id' => $result['id'],
        ':nik' => $_POST['nik'],
        ':nip' => $_POST['nip'],
        ':email' => $_POST['email'],
        ':username' => $_POST['username'],
        ':nama' => $_POST['nama'],
        ':kelas' => $_POST['kelas'],
        ':tempat_lahir' => $_POST['tempat_lahir'],
        ':tanggal_lahir' => $_POST['tanggal_lahir'],
        ':nomor_hp' => $_POST['nomor_hp'],
        ':alamat' => $_POST['alamat'],
        ':role_id' => $_POST['role_id'],
    ]);

    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Profil Guru berhasil diubah.',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = 'index.php?page=daftar_guru';
                }
            });
        });
    </script>
    ";

    exit;
}


?>

<div class="container w-auto">
    <section class="mx-2">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="card-title text-capitalize">
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
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP </label>
                    <div class="col-sm-10">
                        <input type="text" name="nip" class="form-control" id="nip"
                            value="<?= htmlspecialchars($result['nip']); ?>">
                    </div>
                </div>
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
                        <input type="text" name="username" class="form-control" id="username"
                            value="<?= htmlspecialchars($result['username']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="<?= htmlspecialchars($result['nama']); ?>">
                    </div>
                </div>
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
                <div class="mb-3 row">
                    <label for="role_id" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <?php
                        $stmt = $db->prepare("SELECT id AS id_role, role_name FROM roles");
                        $stmt->execute();
                        $allRoles = $stmt->fetchAll();
                        ?>
                        <select name="role_id" class="form-select text-capitalize" id="role_id" required>
                            <?php foreach ($allRoles as $role): ?>
                                <option class="text-capitalize" value="<?= $role['id_role']; ?>"
                                    <?= $role['id_role'] == $result['role_id'] ? 'selected' : ''; ?>>

                                    <span class="text-capitalize"> <?= htmlspecialchars($role['role_name']); ?></span>
                                </option>
                            <?php endforeach; ?>
                        </select>
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
            <a href="index.php?page=daftar_guru&id=<?= $result['id']; ?>" class="btn btn-secondary mt-3"><- Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3" name="submit">Simpan</button>
        </div>
        </form>
    </section>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>