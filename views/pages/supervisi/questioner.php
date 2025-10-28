<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo 'Session user_id tidak ditemukan.';
    exit;
}

// Cek apakah pengguna sudah mengisi questioner sebelumnya
$stmt = $db->prepare('SELECT COUNT(*) FROM questioner_answer WHERE user_id = :user_id');
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$userAnsweredCount = $stmt->fetchColumn();

if ($userAnsweredCount > 0) {
    echo "
    <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'info',
                        title: 'Terimakasih 🙏',
                        text: 'Kamu Sudah Mengisi Questioner.',
                        confirmButtonColor: '#3085d6',
                        timer: 60000,
                        timerProgressBar: true,
                        willClose: () => {
                            window.location.href = 'index.php?page=daftar_validator';
                        }
                    });
                });
            </script>
    ";

}



$stmt = $db->prepare('SELECT questioner.id  ,questioner.questioner_category_id , questioner.question , questioner_category.name_category 
                      FROM questioner 
                      JOIN questioner_category ON questioner.questioner_category_id = questioner_category.id 
                      ORDER BY questioner.questioner_category_id ASC');
$stmt->execute();
$questioner = $stmt->fetchAll();

// Grouping pertanyaan berdasarkan kategori
$groupedQuestions = [];
foreach ($questioner as $item) {
    $groupedQuestions[$item['questioner_category_id']]['name_category'] = $item['name_category'];
    // $groupedQuestions[$item['questioner_category_id']]['questions'][] = $item['question'];
    // Menyimpan ID pertanyaan bersama dengan pertanyaan
    $groupedQuestions[$item['questioner_category_id']]['questions'][] = [
        'id' => $item['id'],  // Menyimpan ID pertanyaan
        'question' => $item['question']
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek jika ada jawaban yang belum diisi
    $isAllAnswered = true; // Flag untuk mengecek apakah semua pertanyaan sudah dijawab
    $missingAnswers = [];

    foreach ($_POST['answer'] as $questionerId => $answer) {
        // Cek jika jawaban kosong untuk pertanyaan tertentu
        if (empty($answer)) {
            $isAllAnswered = false;
            // Dapatkan informasi tentang pertanyaan berdasarkan ID-nya
            $stmt = $db->prepare('SELECT question, questioner_category_id FROM questioner WHERE id = :id');
            $stmt->execute(['id' => $questionerId]);
            $questionData = $stmt->fetch();

            if ($questionData) {
                $categoryName = $groupedQuestions[$questionData['questioner_category_id']]['name_category'];
                $missingAnswers[] = "Pertanyaan: " . $questionData['question'] . " di kategori " . $categoryName . " belum dijawab.";
            }
        }
    }


    if (!$isAllAnswered) {
        // Menampilkan pesan error jika ada pertanyaan yang belum dijawab
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong><br>";
        foreach ($missingAnswers as $missingAnswer) {
            echo $missingAnswer . "<br>";
        }
        echo "</div>";
    } else {
        // Jika semua jawaban sudah terisi, lanjutkan ke penyimpanan ke database
        $user_id_questioner = $_SESSION['user_id'];

        // Persiapkan query untuk menyimpan jawaban
        $questioner_answer_query = $db->prepare('
            INSERT INTO questioner_answer (user_id, questioner_id, answer, answerA, answerB, answerC, answerD, answerE)
            VALUES (:user_id, :questioner_id, :answer, :answerA, :answerB, :answerC, :answerD, :answerE)
        ');

        // Looping kategori dan pertanyaan untuk menyimpan jawaban
        foreach ($_POST['answer'] as $questionerId => $answer) {
            // Tentukan nilai untuk answerA, answerB, answerC, answerD, answerE
            $answerA = $answer == 'A' ? 1 : 0;
            $answerB = $answer == 'B' ? 1 : 0;
            $answerC = $answer == 'C' ? 1 : 0;
            $answerD = $answer == 'D' ? 1 : 0;
            $answerE = $answer == 'E' ? 1 : 0;

            // Query untuk memasukkan jawaban ke database
            $questioner_answer_query->execute([
                'questioner_id' => $questionerId,  // Menyimpan ID pertanyaan
                'user_id' => $user_id_questioner,
                'answer' => $answer,
                'answerA' => $answerA,
                'answerB' => $answerB,
                'answerC' => $answerC,
                'answerD' => $answerD,
                'answerE' => $answerE
            ]);
        }

        // Menampilkan pesan sukses setelah pengiriman data
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Jawaban berhasil disimpan.',
                        confirmButtonColor: '#3085d6',
                        timer: 60000,
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

<div class="container">
    <div class="table">
        <div class="form ">
            <form action="" method="post" class="mt-1 border rounded p-3">

                <?php foreach ($groupedQuestions as $categoryId => $categoryData): ?>
                    <h5 class="mt-3 color-primary" style="background-color: blueviolet; color: white;">Kategori:
                        <?= $categoryData['name_category'] ?>
                    </h5>
                    <div class="questioner-button border rounded">

                        <?php foreach ($categoryData['questions'] as $index => $question): ?>
                            <!-- Menampilkan pertanyaan -->
                            <p class="border-bottom border-top"> <?= $index + 1 ?>. <?= $question['question'] ?></p>

                            <!-- Menggunakan nama unik untuk setiap radio button, berdasarkan categoryId dan index pertanyaan -->
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="answer[<?= $question['id'] ?>]" value="A"
                                    id="radioDefault1_<?= $categoryId ?>_<?= $index ?>" required>
                                <label class="form-check-label" for="radioDefault1_<?= $categoryId ?>_<?= $index ?>">
                                    Sangat Relevan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer[<?= $question['id'] ?>]" value="B"
                                    id="radioDefault2_<?= $categoryId ?>_<?= $index ?>" required>
                                <label class="form-check-label" for="radioDefault2_<?= $categoryId ?>_<?= $index ?>">
                                    Relevan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer[<?= $question['id'] ?>]" value="C"
                                    id="radioDefault3_<?= $categoryId ?>_<?= $index ?>" required>
                                <label class="form-check-label" for="radioDefault3_<?= $categoryId ?>_<?= $index ?>">
                                    Tidak Relevan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer[<?= $question['id'] ?>]" value="D"
                                    id="radioDefault4_<?= $categoryId ?>_<?= $index ?>" required>
                                <label class="form-check-label" for="radioDefault4_<?= $categoryId ?>_<?= $index ?>">
                                    Sangat Tidak Relevan
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>

        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>