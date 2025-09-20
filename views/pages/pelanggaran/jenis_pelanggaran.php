<?php
require_once __DIR__ . '../../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$getNamaPelanggaran = $db->query('SELECT * FROM pelanggaran')->fetchAll();
?>

<style>
    @media screen and (max-width: 768px) {
        .title {
            font-size: 22px;
        }

        .btn {
            font-size: 12px;
        }

        .btn-flex {
            font-size: 12px;
            display: flex;
            gap: 2px;
        }

        table {
            font-size: 14px;
        }

        .nb {
            font-size: 12px;
        }
    }
</style>
<div class="container">
    <h1 class="text-center me-5 title">Jenis Pelanggaran Beserta Poin</h1>
    <?php if ($_SESSION['role_id'] == 1): ?>
        <div class="container mb-2">
            <a href="index.php?page=input_jenis_pelanggaran" class="btn btn-primary" target="_blank"> + Input Jenis
                Pelanggaran</a>
        </div>
    <?php endif; ?>
    <section class="container">
        <div class="table-responsive " style="max-height: 400px; overflow-y: auto;">
            <table class="table table-hover">
                <thead class="table-primary sticky-top bg-primary text-white" style="z-index: auto;">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Jenis Pelanggaran</th>
                        <th scope="col">Poin</th>
                        <?php if ($_SESSION['role_id'] == 1): ?>
                            <th scope="col">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($getNamaPelanggaran as $i => $item): ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $item['nama_pelanggaran'] ?></td>
                            <td><?= $item['poin'] ?></td>

                            <?php if ($_SESSION['role_id'] == 1): ?>
                                <td class="btn-flex">
                                    <a href="index.php?page=edit_jenis_pelanggaran&id=<?= $item['id'] ?>"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete(<?= $item['id'] ?>, '<?= htmlspecialchars(addslashes($item['nama_pelanggaran'])) ?>')">
                                        Hapus
                                    </button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <div class="container nb">
            <h6 class="nb">NB:</h6>
            <ul>
                <li>Semua pelanggaran di atas akan dikaji dan ditindak sesuai dengan akumulasi poin, namun tetap
                    mempertimbangkan aspek-aspek yang melatar belakangi tindakan pelanggaran tersebut.</li>
                <li>Ada perbedaan penerapan antara kelas kecil dan kelas besar</li>
                <li>Khusu membully dipanggil orang tua</li>
                <li>Batas maksimal poin:</li>
                <ol>
                    <li>30 Poin panggil orang tua</li>
                    <li>50 Poin panggil orang tua dan anak di skor selama 3 Hari</li>
                    <li>70 Poin panggil orang tua dan anak di skor selama 7 Hari</li>
                    <li>100 Poin panggil orang tua dan buat surat perjanjian bermaterai</li>
                </ol>
            </ul>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id, nama) {
        Swal.fire({
            title: `Anda yakin ingin menghapus <span class="text-danger fw-bold">${nama}</span> ?`,
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
                    html: `Data <span class="text-danger fw-bold">${nama}</span> berhasil dihapus.`,
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = `index.php?page=hapus_jenis_pelanggaran&id=${id}`;
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

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>