<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name_category = $_POST['name_category'];

    $stmt = $db->prepare("INSERT INTO questioner_category (name_category) VALUES (:name_category)");
    $stmt->execute([':name_category' => $name_category]);

    echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Kategori Supervisi Berhasil Ditambahkan.',
                    confirmButtonColor: '#3085d6',
                    timer: 6000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'index.php?page=soal_supervisi';
                    }
                });
            });
        </script>
    ";
}
?>

<div class="container" method="post">
    <div class="container">
        <h1 class="text-center me-5 title">Kategori Questioner</h1>
        <section class="container">
            <form method="post">
                <div class="mb-3">
                    <label for="name_category" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="name_category" name="name_category">
                </div>
                <div class="mb-3 flex justify-content-between">
                    <button type="submit" class="btn btn-secondary">Kembali</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </section>
    </div>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>