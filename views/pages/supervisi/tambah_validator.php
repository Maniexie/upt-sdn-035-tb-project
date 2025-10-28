<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

?>
<div class="container">
    <div class="table">
        <div class="table-wrapper">
            <h2 class=" text-center">Tambah Validator</h2>
            <div class="table-title text-center">
                <div class="row ">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <a href="index.php?page=daftar_validator" class="btn btn-success" data-toggle="modal">
                    <span>← Kembali</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Validator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil semua data user yang ada
                            $stmt = $db->prepare("SELECT * FROM users WHERE role_id IN (1, 2) ");
                            $stmt->execute();
                            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            $no = 1;
                            foreach ($users as $user):
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= htmlspecialchars($user['nama']); ?></td>
                                    <td><?= htmlspecialchars($user['username']); ?></td>
                                    <td><?= htmlspecialchars($user['kelas']); ?></td>
                                    <td><?= htmlspecialchars($user['role_id'] == 1 ? 'Admin' : 'Guru'); ?></td>
                                    <td>
                                        <select name="validator[<?= $user['id'] ?>]" class="form-control">
                                            <option value="yes" <?= $user['validator'] == 'yes' ? 'selected' : ''; ?>>Yes
                                            </option>
                                            <option value="no" <?= $user['validator'] == 'no' ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <div class="container mb-3 d-flex justify-content-between">
                        <a href="index.php?page=daftar_validator" class="btn btn-secondary">← Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    // Proses penyimpanan pilihan validator
                    if (isset($_POST['validator'])) {
                        foreach ($_POST['validator'] as $userId => $validatorValue) {
                            $stmt = $db->prepare("UPDATE users SET validator = :validator WHERE id = :id");
                            $stmt->execute([
                                ':validator' => $validatorValue,
                                ':id' => $userId
                            ]);
                        }

                        // Tampilkan pesan sukses
                        echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Status validator berhasil diperbarui',
                                    confirmButtonColor: '#3085d6',
                                    timer: 5000,
                                    timerProgressBar: true,
                                    willClose: () => {
                                        window.location.href = 'index.php?page=daftar_validator';
                                    }
                                });
                            });
                        </script>
                        ";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>