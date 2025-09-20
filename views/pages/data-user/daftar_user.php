<?php
require_once __DIR__ . '../../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$getAllUserStmt = $db->prepare('
    SELECT 
        users.*, 
        roles.role_name, 
        jabatan.nama_jabatan,
        jabatan.status_kelas,
        jabatan.id, 
        users.id AS u_id
    FROM users
    LEFT JOIN roles ON roles.id = users.role_id
    LEFT JOIN jabatan ON jabatan.id = users.jabatan_id
    ORDER BY users.role_id ASC , users.kelas ASC , users.nama ASC
');
$getAllUserStmt->execute();
$getAllUser = $getAllUserStmt->fetchAll(PDO::FETCH_ASSOC);


// var_dump($getJabatanUser);

?>
<style>
    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .table-search {
            /* display: none; */
            width: 150px;
            padding: 1px;
        }

        .daftar-user {
            font-size: 20px;
        }

        .btn-tambah-user {
            font-size: 12px;
            padding: 3px;
        }

        .table {
            font-size: 13px;
        }

        .btn-sm {
            font-size: 10px;
            padding: 1px;
        }
    }
</style>

<div class="container">
    <h1 class="text-center me-5 mb-2 daftar-user">Daftar User</h1>
    <section class="d-flex justify-content-between mb-0 ">
        <a href="index.php?page=tambah_user" class="btn btn-primary mb-3 btn-tambah-user">+ Tambah User</a>
        <form role="search">
            <input class="form-control table-search " type="search" placeholder="Search" aria-label="Search" id="searchInput" autofocus>
        </form>
    </section>

    <section class="text-center">
        <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
            <table class="table table-hover">
                <thead class="table-primary sticky-top bg-primary text-white text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-center">
                    <?php foreach ($getAllUser as $i => $item): ?>
                        <tr id="row-<?= $item['id'] ?>">
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['kelas'] ?></td>
                            <td class="text-capitalize">
                                <?= $item['role_name'] ?>
                            </td>

                            <td>
                                <?= $item['nama_jabatan'] ?>
                            </td>

                            <td class="container justify-content-center d-flex gap-2">
                                <a href="index.php?page=detail_user&id=<?= $item['u_id'] ?>"
                                    class="btn btn-sm btn-primary">Detail</a>
                                <a href="index.php?page=password_user&id=<?= $item['u_id'] ?>"
                                    class="btn btn-sm btn-warning text-white">
                                    Password</a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete(<?= $item['u_id'] ?>, '<?= addslashes($item['nama']) ?>', '<?= addslashes($item['kelas']) ?>')">
                                    Hapus
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id, nama, kelas) {
        Swal.fire({
            title: `Anda yakin ingin menghapus <span class="text-danger fw-bold">${nama}</span> kelas <span class="text-danger fw-bold">${kelas}</span>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Terhapus!',
                    html: `Data <span class="text-danger fw-bold">${nama}</span> kelas <span class="text-danger fw-bold">${kelas}</span> berhasil dihapus.`,
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = `index.php?page=hapus_user&id=${id}`;
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data user tidak jadi dihapus.',
                    'error'
                );
            }
        });
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const rows = document.querySelectorAll("tbody tr");

        searchInput.addEventListener("keyup", function() {
            const keyword = this.value.toLowerCase();

            rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                if (rowText.includes(keyword)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>



<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>