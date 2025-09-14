<?php
require_once __DIR__ . '../../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$getAllUserStmt = $db->prepare('
    SELECT 
        nama_jabatan , status_kelas
    FROM jabatan
    
');
$getAllUserStmt->execute();
$getAllUserStmt->fetch();
$getAllUser = $getAllUserStmt->fetchAll(PDO::FETCH_ASSOC);

// echo $row['nama_id'];
// .''. $row[''] .''. $row[

// var_dump($getAllUser);

?>
<div class="container">
    <h1 class="text-center me-5">Daftar Jabatan UPT SDN 035 TARAIBANGUN</h1>
    <section class="d-flex justify-content-between align-items-center mb-2">
        <a href="index.php?page=tambah_jabatan" class="btn btn-primary">Tambah Jabatan</a>

        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
        </form>
    </section>

    <section class="text-center">
        <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
            <table class="table table-hover">
                <thead class="table-primary sticky-top bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Wali Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($getAllUser as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>

                            <td><?= htmlspecialchars($row['nama_jabatan']) ?></td>
                            <td><?= htmlspecialchars($row['status_kelas']) ?></td>
                            <td>
                                <!-- <a href="index.php?page=edit_user&id=<?= $row['id'] ?>"
                                    class="btn btn-primary btn-sm">Edit</a> -->
                                <!-- <a href="index.php?page=hapus_user&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete(<?= $row['id'] ?>, '<?= $row['nama'] ?>', '<?= $row['kelas'] ?>')">Hapus</a> -->
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
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const rows = document.querySelectorAll("tbody tr");

        searchInput.addEventListener("keyup", function () {
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