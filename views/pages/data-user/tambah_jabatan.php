<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';

// $stmt = $db->prepare('SELECT users.* , roles.role_name , jabatan.nama_jabatan FROM users JOIN roles ON roles.id = users.role_id JOIN jabatan ON jabatan.id = users.jabatan_id WHERE users.id =:id');
// $stmt->execute(['id' => $_GET['id']]);
// $result = $stmt->fetchAll();

$stmt = $db->query("SELECT kode_jabatan FROM jabatan ORDER BY kode_jabatan DESC LIMIT 1");
$lastKodeJabatan = $stmt->fetchColumn();

if ($lastKodeJabatan) {
    $number = (int) substr($lastKodeJabatan, 3);
    $newNumber = $number + 1;
} else {
    $newNumber = 1;
}

$kode_jabatan = 'KJ-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
if (isset($_POST['submit'])) {



    $stmt = $db->prepare('INSERT INTO jabatan (kode_jabatan, nama_jabatan , status_kelas) VALUES ( :kode_jabatan,:nama_jabatan ,:status_kelas)');
    $stmt->execute([
        ':kode_jabatan' => $kode_jabatan,
        ':nama_jabatan' => $_POST['nama_jabatan'],
        ':status_kelas' => $_POST['status_kelas']
    ]);

    $nama_jabatan = htmlspecialchars($_POST['nama_jabatan']);


    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Jabatan <strong>{$nama_jabatan}</strong> berhasil ditambahkan',
                confirmButtonColor: '#3085d6',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = 'index.php?page=daftar_jabatan';
                }
            });
        });
    </script>
    ";
    exit;

}
?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header" style="background-color: darkgoldenrod; color: aliceblue;">
                    <h4 class="card-title">Halaman <span class="fw-semibold">Tambah Jabatan </span>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 row">

                            <div class="mb-3 row">
                                <label for="kode_jabatan" class="col-sm-2 col-form-label">Kode Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="kode_jabatan" id="kode_jabatan"
                                        value="<?= $kode_jabatan ?>">
                                    <input type="text" class="form-control" id="kode_jabatan"
                                        value="<?= $kode_jabatan ?>" readonly disabled>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <!-- <input type="hidden" class="form-control" name="kode_jabatan" id="kode_jabatan"
                                        value="<?= $kode_jabatan ?>"> -->
                                    <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan">
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="status_kelas" class="col-sm-2 col-form-label">Wali Kelas</label>
                                <div class="col-sm-10">
                                    <select name="status_kelas" id="status_kelas" class="form-select">
                                        <option value="-">-</option>
                                        <?php for ($i = 1; $i <= 6; $i++) { ?>
                                            <?php for ($j = 'A'; $j <= 'C'; $j++) { ?>
                                                <option value="<?php echo $i . $j; ?>"><?php echo $i . $j; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="container mb-3 d-flex justify-content-between">
                                <a href="index.php?page=daftar_jabatan" class="btn btn-secondary">
                                    ← Kembali</a>
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