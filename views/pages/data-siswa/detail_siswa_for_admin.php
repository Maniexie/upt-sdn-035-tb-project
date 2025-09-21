<?php
require_once __DIR__ . "/../../../koneksi.php";
require_once __DIR__ . "/../../layouts/header.php";


$dataSiswa = $db->prepare("SELECT * FROM users  WHERE users.id = :id");
$dataSiswa->execute(['id' => $_GET['id']]);
$dataSiswa = $dataSiswa->fetch();


// Ambil data guru wali kelas
$guru = $db->query("
    SELECT nama,nip 
    FROM users 
    WHERE role_id = 2 
      AND kelas = '" . $dataSiswa['kelas'] . "'
    LIMIT 1
")->fetch();

$namaGuru = $guru ? $guru['nama'] : 'Nama Wali Kelas';
$nipGuru = $guru ? $guru['nip'] : 'NIP Wali Kelas';

?>


<style>
    /* Untuk layar kecil (max-width: 767px) */
    @media screen and (max-width: 768px) {
        .card-title {
            font-size: 18px;
        }

        .form-control-plaintext {
            font-size: 12px;
        }

        .col-form-label {
            font-size: 14px;
        }

        .btn {
            font-size: 10px;
        }
    }
</style>
<div class="container w-auto">
    <section>
        <div class="container d-flex justify-content-between">
            <a type="button"
                href="index.php?page=daftar_siswa_for_admin&scroll_to=<?= htmlspecialchars($dataSiswa['id']) ?> "
                class="btn btn-secondary mt-3" onclick="window.close();">
                ← Kembali
            </a>
        </div>
    </section>
    <section>
        <div class="card mt-4 p-4">
            <div class="card-header">
                <h2 class="card-title text-capitalize">
                    Detail Siswa : <?= htmlspecialchars($dataSiswa['nama']) ?>
                </h2>
            </div>
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">NIK </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nik"
                        value=": <?= htmlspecialchars($dataSiswa['nik']) ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nisn"
                        value=": <?= htmlspecialchars($dataSiswa['nisn']) ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="email"
                        value=": <?= htmlspecialchars($dataSiswa['email']) ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="username"
                        value=": <?= htmlspecialchars($dataSiswa['username']) ?>">
                </div>
            </div>


            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nama"
                        value=": <?= htmlspecialchars($dataSiswa['nama']) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="kelas"
                        value=": <?= htmlspecialchars($dataSiswa['kelas']) ?>">
                </div>
            </div>


            <div class="mb-3 row">
                <label for="ttl" class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="ttl"
                        value=": <?= htmlspecialchars($dataSiswa['tempat_lahir']) ?>, <?= htmlspecialchars($dataSiswa['tanggal_lahir']) ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nomor_hp"
                        value=": <?= htmlspecialchars($dataSiswa['nomor_hp']) ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ttl" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="ttl"
                        value=": <?= htmlspecialchars($dataSiswa['alamat']) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Wali Kelas</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="kelas"
                        value=": <?= htmlspecialchars($namaGuru) ?> (<?= htmlspecialchars($nipGuru) ?> )">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="aksi" class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <a href="index.php?page=edit_data_siswa&id=<?= $dataSiswa['id'] ?>" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <button type="button" class="btn btn-danger btn-sm"
                        onclick="confirmDelete(<?= $dataSiswa['id'] ?>)">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Anda yakin ingin menghapus <span class="text-danger fw-bold"><?= $dataSiswa['nama'] ?></span>  kelas <span class="text-danger fw-bold"><?= $dataSiswa['kelas'] ?></span>  ?',
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
                    html: 'Data <span class="text-danger fw-bold"><?= $dataSiswa['nama'] ?></span>  kelas <span class="text-danger fw-bold"><?= $dataSiswa['kelas'] ?></span> berhasil dihapus.',
                    icon: 'success',
                    timer: 60000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'index.php?page=hapus_data_siswa&id=<?= $dataSiswa['id'] ?>';
                    },
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data siswa tidak jadi dihapus.',
                    'error'
                )
            }
        });
    }
</script>

<!-- Script untuk melakukan scroll ke elemen tertentu -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const scrollToId = urlParams.get('scroll_to');

        if (scrollToId) {
            const targetElement = document.getElementById(scrollToId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
    });
</script>


<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>