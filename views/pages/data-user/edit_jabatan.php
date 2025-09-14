<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';

$stmt = $db->prepare('SELECT * FROM jabatan WHERE id =:id');
$stmt->execute(['id' => $_GET['id']]);
$result = $stmt->fetch();



if (isset($_POST['submit'])) {
    $stmt = $db->prepare('UPDATE jabatan SET kode_jabatan = :kode_jabatan, nama_jabatan = :nama_jabatan, status_kelas = :status_kelas WHERE id = :id');
    $stmt->execute([
        ':id' => $_POST['id'],
        ':kode_jabatan' => $_POST['kode_jabatan'],
        ':nama_jabatan' => $_POST['nama_jabatan'],
        ':status_kelas' => $_POST['status_kelas']
    ]);

    $nama_jabatan = htmlspecialchars($_POST['nama_jabatan']);
    $status_kelas = htmlspecialchars($_POST['status_kelas']);


    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Jabatan <strong>{$nama_jabatan}</strong> dan status kelas <strong>{$status_kelas}</strong> berhasil diubah',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = `index.php?page=daftar_jabatan`;
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
                    <h4 class="card-title">Halaman <span class="fw-semibold">Edit</span> Jabatan :
                        <?= $result['nama_jabatan']; ?>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">ID Jabatan</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?= $result['id']; ?>">
                                <input type="text" readonly disabled class="form-control" id="id"
                                    value="<?= $result['id']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kode_jabatan" class="col-sm-2 col-form-label">kode_jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_jabatan" id="kode_jabatan"
                                    value="<?= $result['kode_jabatan'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_jabatan" class="col-sm-2 col-form-label">nama_jabatan</label>
                            <div class="col-sm-10">
                                <select name="nama_jabatan" id="nama_jabatan" class="form-control form-select">
                                    <?php
                                    $options = [
                                        'Kepala Sekolah',
                                        'Wakil Kepala Sekolah',
                                        'Guru Kelas',
                                        'Guru PJOK',
                                        'Guru BMR',
                                        'Guru PAI',
                                        'Guru BDR',
                                        'Operator Sekolah',
                                        'Pengelola Pustaka',
                                        'Tata Usaha',
                                        'Tenaga Kebersihan',
                                        'Ketua Kelas',
                                        'Anggota Kelas',
                                        'Siswa',
                                    ];

                                    foreach ($options as $option) {
                                        if ($result['nama_jabatan'] === $option) {
                                            echo "<option value='$option' selected>$option</option>";
                                        } else {
                                            echo "<option value='$option'>$option</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status_kelas" class="col-sm-2 col-form-label">status_kelas</label>
                            <div class="col-sm-10">
                                <select name="status_kelas" id="status_kelas" class="form-select">
                                    <option value="-">-</option>
                                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                                        <?php for ($j = 'A'; $j <= 'C'; $j++) { ?>
                                            <option value="<?php echo $i . $j; ?>" <?= $result['status_kelas'] == $i . $j ? 'selected' : '' ?>>
                                                <?php echo $i . $j; ?>
                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>



                        <div class="container mb-3 d-flex justify-content-between">
                            <a href="index.php?page=daftar_jabatan" class="btn btn-secondary">
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