<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$getQuestioner = $db->prepare('SELECT * FROM questioner');
$getQuestioner->execute();
$questioners = $getQuestioner->fetchAll(PDO::FETCH_ASSOC);

// Ambil semua validator (responden)
$getValidators = $db->prepare('SELECT id, nama FROM users WHERE validator = "yes"');
$getValidators->execute();
$validators = $getValidators->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2 class="text-center">Hasil Validitas Aiken’s V per Questioner</h2>
    <div class="d-flex justify-content-end mb-1">
        <a href="index.php?page=aiken_detail" class="btn btn-primary">Detail Aiken</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jumlah Responden (n)</th>
                <th>ΣS</th>
                <th>n(c-1)</th>
                <th>V</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $a = 1; // skala terendah
            $c = 4; // skala tertinggi
            $c_minus_1 = $c - 1;

            foreach ($questioners as $q) {
                $sumS = 0;
                $count = 0;

                // ambil semua jawaban untuk pertanyaan ini dari semua validator
                $answers = $db->prepare('
                    SELECT * FROM questioner_answer
                    WHERE questioner_id = :qid
                ');
                $answers->execute(['qid' => $q['id']]);
                $rows = $answers->fetchAll(PDO::FETCH_ASSOC);

                foreach ($rows as $ans) {
                    $score = 0;

                    // tentukan skor berdasarkan kolom jawaban
                    if ($ans['answerA'] == 1)
                        $score = 4;
                    elseif ($ans['answerB'] == 1)
                        $score = 3;
                    elseif ($ans['answerC'] == 1)
                        $score = 2;
                    elseif ($ans['answerD'] == 1)
                        $score = 1;
                    elseif ($ans['answerE'] == 1)
                        $score = 0;

                    // konversi ke S = r - l_o
                    $S = $score - $a;
                    $sumS += $S;
                    $count++;
                }

                if ($count > 0) {
                    $n_c_minus_1 = $count * $c_minus_1;
                    $V = $sumS / $n_c_minus_1;
                    $status = ($V >= 0.8) ? '<span class="badge bg-success">Valid</span>' : '<span class="badge bg-danger">Tidak Valid</span>';

                    echo "<tr class='text-center'>
                            <td>{$no}</td>
                            <td>{$q['question']}</td>
                            <td>{$count}</td>
                            <td>{$sumS}</td>
                            <td>{$n_c_minus_1}</td>
                            <td>" . number_format($V, 2) . "</td>
                            <td>{$status}</td>
                          </tr>";
                } else {
                    echo "<tr class='text-center'>
                            <td>{$no}</td>
                            <td>{$q['question']}</td>
                            <td colspan='5'><span class='badge bg-danger'>Belum ada respon</span></td>
                          </tr>";
                }

                $no++;
            }
            ?>
        </tbody>

    </table>
    <!-- <table>
        <tbody>
            <tr>
                <td colspan="6">
                    <b>Skala Aiken</b>
                    <?php
                    echo $n;
                    ?>
                </td>
            </tr>
        </tbody>
    </table> -->
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>