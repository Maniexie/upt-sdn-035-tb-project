<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

// Mendapatkan ID pengguna dari URL / daftar_guru_for_supervisi
$id = (int) $_GET['id'];
//==============================================================//

// Cek login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo 'Session user_id tidak ditemukan.';
    exit;
}
//==============================================================//



// Mengambil data user
$getAllUserStmt = $db->prepare('SELECT * FROM users WHERE role_id IN (1, 2) AND id = :id LIMIT 1');
$getAllUserStmt->execute(['id' => $id]);

if (!$getAllUserStmt) {
    echo "<div class='alert alert-danger'>Data pengguna tidak ditemukan di database.</div>";
    require_once __DIR__ . '/../../layouts/footer.php';
    exit;
}

$getAllUserStmt = $getAllUserStmt->fetch();
//=================================================================//



// Mendapatkan questioner valid 
$stmt = $db->prepare('SELECT questioner.id  ,questioner.questioner_category_id , questioner.question , questioner_category.name_category , questioner.status_valid as status_valid
                      FROM questioner 
                      JOIN questioner_category ON questioner.questioner_category_id = questioner_category.id 
                      WHERE questioner.status_valid = "Valid"
                      ORDER BY questioner.questioner_category_id ASC');
$stmt->execute();
$questioner = $stmt->fetchAll();

// Grouping pertanyaan berdasarkan kategori
$groupedQuestions = [];
foreach ($questioner as $item) {
    $groupedQuestions[$item['questioner_category_id']]['name_category'] = $item['name_category'];
    // Menyimpan ID pertanyaan bersama dengan pertanyaan
    $groupedQuestions[$item['questioner_category_id']]['questions'][] = [
        'id' => $item['id'],  // Menyimpan ID pertanyaan
        'question' => $item['question'],
        'status_valid' => $item['status_valid']
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

        // Pastikan ada periode aktif berdasarkan tanggal hari ini
        $today = date('Y-m-d');
        // Cek apakah sudah ada periode untuk hari ini
        $cekPeriode = $db->prepare("SELECT id FROM periode_supervisi 
                            WHERE tanggal_mulai <= :today AND tanggal_selesai >= :today 
                            LIMIT 1");
        $cekPeriode->execute(['today' => $today]);
        $periode = $cekPeriode->fetch();

        if (!$periode) {
            echo '<script>alert("Pesan peringatan Anda di sini!");</script>';
            // Jika belum ada, buat periode baru otomatis
            $db->query("UPDATE periode_supervisi SET status = 'Nonaktif' WHERE status = 'Aktif'");
            $nama_periode = 'Periode ' . date('d M Y');
            $insertPeriode = $db->prepare("INSERT INTO periode_supervisi 
        (nama_periode, tanggal_mulai, tanggal_selesai, status) 
        VALUES (:nama_periode, :tanggal_mulai, :tanggal_selesai, 'Aktif')");
            $insertPeriode->execute([
                'nama_periode' => $nama_periode,
                'tanggal_mulai' => $today,
                'tanggal_selesai' => $today
            ]);

            // Ambil id periode baru
            // $periode_id = $db->lastInsertId();
        } else {
            $periode_id = $periode['id'];
        }


        // Ambil periode aktif
        // $getPeriode = $db->query("SELECT id FROM periode_supervisi WHERE tanggal_mulai <= CURDATE() AND CURDATE() <= tanggal_selesai LIMIT 1");
        // $periode = $getPeriode->fetch();
        // $periode_id = $periode ? $periode['id'] : null;

        // Persiapkan query untuk menyimpan jawaban
        $questioner_answer_query = $db->prepare('
            INSERT INTO responden (user_id, questioner_id, supervisi_id , periode_id, answer, answerA, answerB, answerC, answerD, answerE, created_at)
            VALUES (:user_id, :questioner_id,:supervisi_id,:periode_id, :answer, :answerA, :answerB, :answerC, :answerD, :answerE, NOW())
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
                'user_id' => $id,
                'supervisi_id' => $_SESSION['user_id'],
                'periode_id' => $periode_id,
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
                        text: 'Supervisi berhasil disimpan.',
                        confirmButtonColor: '#3085d6',
                        timer: 60000,
                        timerProgressBar: true,
                        willClose: () => {
                            window.location.href = 'index.php?page=daftar_guru_for_supervisi';
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
                <ul class="list-none">
                    <li>
                        <p class="color-primary">Nama Guru : <span>
                                <?= htmlspecialchars($getAllUserStmt['nama']) ?></span>
                        </p>
                    </li>
                </ul>

                <?php foreach ($groupedQuestions as $categoryId => $categoryData): ?>
                    <h5 class="mt-3 color-primary" style="background-color: blueviolet; color: white;">Kategori:
                        <?= $categoryData['name_category'] ?>
                    </h5>
                    <div class=" questioner-button border rounded">

                        <?php foreach ($categoryData['questions'] as $index => $question): ?>
                            <!-- Menampilkan pertanyaan -->
                            <p class="border-bottom border-top"> <?= $index + 1 ?>. <?= $question['question'] ?>
                                <!-- || Status Questioner = <?= $question['status_valid'] ?> -->
                            </p>

                            <!-- Menggunakan nama unik untuk setiap radio button, berdasarkan categoryId dan index pertanyaan -->
                            <div class=" form-check ">
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