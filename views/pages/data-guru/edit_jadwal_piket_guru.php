<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . '/../../layouts/header.php';


$stmt = $db->prepare('SELECT 
    u.id,
    u.nama,
    jp.id AS jp_id,
    jp.hari_piket,
    j.nama_jabatan,
    j.status_kelas,
    j.id AS j_id,
    u.jadwal_piket_id
FROM users u
JOIN jabatan j ON u.jabatan_id = j.id
JOIN jadwal_piket jp ON u.jadwal_piket_id = jp.id
WHERE u.id = :id
ORDER BY u.nama ASC, jp.hari_piket ASC

');

$stmt->execute(['id' => $_GET['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {
    $stmt = $db->prepare('UPDATE users SET jadwal_piket_id = :jadwal_piket_id WHERE id = :id');
    $stmt->execute([
        'id' => $_GET['id'],
        ':jadwal_piket_id' => $_POST['jadwal_piket_id']
    ]);

    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: 'Daftar Piket berhasil dirubah ',
                timer: 6000,
                timerProgressBar: true,
                    willClose: () => {
                    window.location.href = `index.php?page=jadwal_piket_guru`;
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
                            Edit Piket Guru </span>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $result['id']; ?>">

                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama"
                                    value="<?= htmlspecialchars($result['nama']); ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_jabatan" readonly
                                    value=" <?= htmlspecialchars($result['nama_jabatan']); ?>">
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <label for="status_kelas" class="col-sm-2 col-form-label">Guru Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status_kelas" readonly
                                    value=" <?= htmlspecialchars($result['status_kelas']); ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Jadwal Piket</label>
                            <div class="col-sm-10">
                                <select name="jadwal_piket_id" id="jadwal_piket_id" class="form-select text-capitalize">
                                    <?php
                                    $stmt = $db->prepare('SELECT id AS jp_id, hari_piket FROM jadwal_piket');
                                    $stmt->execute();
                                    $jadwalPiketList = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($jadwalPiketList as $jp) {
                                        echo "<option value='" . htmlspecialchars($jp['jp_id']) . "'>" . htmlspecialchars(ucfirst($jp['hari_piket'])) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="container mb-3 d-flex justify-content-between">
                            <a href="index.php?page=jadwal_piket_guru" class="btn btn-secondary">
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