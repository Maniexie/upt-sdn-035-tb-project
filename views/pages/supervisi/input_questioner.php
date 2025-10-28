<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}



$getCategory = $db->prepare("SELECT * FROM questioner_category");
$getCategory->execute();
$categories = $getCategory->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $question = $_POST['question'];
    $questioner_category_id = $_POST['questioner_category_id'];

    $stmt = $db->prepare("INSERT INTO questioner (questioner_category_id,question) VALUES (:questioner_category_id,:question)");
    $stmt->execute([
        ':questioner_category_id' => $questioner_category_id,
        ':question' => $question
    ]);

    echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Questioner Berhasil Ditambahkan.',
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
        <h1 class="text-center me-5 title">question</h1>
        <section class="container">
            <form method="post">
                <div class="mb-3">
                    <select name="questioner_category_id" id="questioner_category_id">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name_category'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="question" class="form-label">question</label>
                    <textarea class="form-control" id="question" name="question" rows="3"></textarea>
                </div>
                <div class="mb-3 flex justify-content-between">
                    <!-- <button type="submit" class="btn btn-secondary">Kembali</button> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </section>
    </div>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>