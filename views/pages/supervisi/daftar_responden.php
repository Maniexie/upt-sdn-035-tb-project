<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$getQuestioner = $db->prepare('SELECT * FROM questioner');
$getQuestioner->execute();
$questioners = $getQuestioner->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="table">
        <div class="table-wrapper">
            <h2 class=" text-center">Daftar Responden</h2>
            <div class="table-title text-center">
                <div class="row ">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Responden</th>
                            <?php foreach ($questioners as $questioner) {
                                echo '<th>' . 'Q' . $questioner['id'] . '</th>';
                            }
                            ?>
                            <!-- <th>∑S</th>
                            <th>n(c-1)</th>
                            <th>V</th>
                            <th>Status</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // Query untuk mengambil daftar validator dan status pengisian questioner
                        $stmt = $db->prepare('
                                SELECT users.*, roles.role_name, 
                                       COUNT(questioner_answer.user_id) AS answered_count
                                FROM users 
                                JOIN roles ON roles.id = users.role_id
                                LEFT JOIN questioner_answer ON questioner_answer.user_id = users.id
                                WHERE users.role_id IN (1, 2)
                                AND users.validator = "yes"
                                GROUP BY users.id
                            ');
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $validator) {
                            echo '<tr>';
                            echo '<td>' . $validator['nama'] . '</td>';
                            $totalScore = 0; // Inisialisasi total skor
                            $n = count($questioners); // Jumlah pertanyaan
                        

                            // Array untuk menyimpan skor setiap item
                            $scores = [];
                            foreach ($questioners as $questioner) {
                                $answer = $db->prepare('
                                    SELECT * FROM questioner_answer
                                    WHERE user_id = :id AND questioner_id = :questioner_id
                                ');
                                $answer->execute([
                                    'id' => $validator['id'],
                                    'questioner_id' => $questioner['id']
                                ]);
                                $answer = $answer->fetch();

                                // Hitung total skor
                                if ($answer) {
                                    $score = 0;

                                    // Tentukan skor berdasarkan pilihan yang dipilih
                                    // Misalnya, jika answerA=1, maka score=5, answerB=1 maka score=4, dan seterusnya
                                    if ($answer['answerA'] == 1) {
                                        $score = 4;
                                    } elseif ($answer['answerB'] == 1) {
                                        $score = 3;
                                    } elseif ($answer['answerC'] == 1) {
                                        $score = 2;
                                    } elseif ($answer['answerD'] == 1) {
                                        $score = 1;
                                    } elseif ($answer['answerE'] == 1) {
                                        $score = 0;
                                    }

                                    // Tambahkan skor ke total
                                    $totalScore += $score;
                                    $scores[] = $score;
                                    echo '<td><span class="">' . $score . '</span></td>';
                                    // echo '<td><span class="">' . $score - 0 . '</span></td>';
                                } else {
                                    echo '<td><span class="badge bg-danger">Belum</span></td>';
                                }
                            }

                            // Hitung Aiken's V untuk pertanyaan
                            if (!empty($scores)) {
                                $a = 1; // Skala terendah (misal 1)
                                $b = 4; // Skala tertinggi (misal 5)
                        
                                // Hitung ΣS (total skor dari semua item)
                                $sumS = array_sum($scores);

                                // Hitung n(c-1), dengan n adalah jumlah responden dan c adalah jumlah skala
                                $n_c_minus_1 = $n * ($b - $a);

                                // Hitung Aiken's V
                                $aikensV = ($sumS - ($n * ($a - 1))) / $n_c_minus_1;

                                // Tampilkan hasil Aiken's V
                                // echo '<td>' . $sumS . '</td>';
                                // echo '<td>' . $n_c_minus_1 . '</td>';
                                // echo '<td>' . number_format($aikensV, 2) . '</td>'; // Format Aiken's V
                                // echo '<td>' . ($aikensV > 0.80 ? '<span class="badge bg-success">Valid</span>' : '<span class="badge bg-danger">Tidak Valid</span>') . '</td>';
                            }

                            echo '</tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php

require_once __DIR__ . '/../../layouts/footer.php';
?>