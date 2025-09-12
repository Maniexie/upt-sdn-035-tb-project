<?php
require_once __DIR__ . '../../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$getAllUserStmt = $db->prepare('SELECT * FROM users ORDER BY kelas ASC , role_id ASC');
$getAllUserStmt->execute();
$getAllUser = $getAllUserStmt->fetchAll(PDO::FETCH_ASSOC);

$getRoles = $db->prepare('SELECT * FROM roles');
$getRoles->execute();
$getAllRoles = $getRoles->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <h1 class="text-center me-5">Daftar User</h1>
    <section class="d-flex justify-content-between align-items-center mb-2">
        <a href="index.php?tambah_user" class="btn btn-primary">Tambah User</a>

        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </section>

    <section class="text-center">
        <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
            <table class="table table-hover">
                <thead class="table-primary sticky-top bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($getAllUser as $i => $item): ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['kelas'] ?></td>
                            <td class="text-capitalize">
                                <?php foreach ($getAllRoles as $role): ?>
                                    <?php if ($role['id'] === $item['role_id']): ?>
                                        <?= $role['role_name'] ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $item['jabatan'] ?></td>
                            <td class="container justify-content-center d-flex gap-2">
                                <a href="index.php?detail_user&id=<?= $item['id'] ?>"
                                    class="btn btn-sm btn-primary">Detail</a>
                                <a href="index.php?password_user&id=<?= $item['id'] ?>"
                                    class="btn btn-sm btn-warning text-white">
                                    Password</a>
                                <a href="index.php?hapus_user&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>