<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

$getQuestioner = $db->prepare('SELECT * FROM questioner');
$getQuestioner->execute();
$questioners = $getQuestioner->fetchAll(PDO::FETCH_ASSOC);

$getValidators = $db->prepare('SELECT id, nama FROM users WHERE validator = "yes"');
$getValidators->execute();
$validators = $getValidators->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="index.php?page=daftar_validitas_aiken" class="btn btn-primary">← Kembali</a>
        <h2 class="text-center flex-grow-1">Hasil Validitas Aiken’s V per Pertanyaan</h2>
        <a href="index.php?page=aiken_chart" class="btn btn-primary">📊 Lihat Grafik</a>
    </div>

    <p><b>Rumus:</b> <code>V = ΣS / n(c - 1)</code>,
        dengan <code>S = r - l₀</code>,
        <code>r</code> = skor yang diberikan validator,
        <code>l₀</code> = skor terendah (<?= 1 ?>),
        dan <code>c</code> = skala tertinggi (<?= 4 ?>).
    </p>

    <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Nama Responden</th>
                <th>r (Skor)</th>
                <th>l₀</th>
                <th>S = r - l₀</th>
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
                $respondenDetail = '';

                $answers = $db->prepare('
                    SELECT users.nama, questioner_answer.*
                    FROM questioner_answer
                    JOIN users ON users.id = questioner_answer.user_id
                    WHERE questioner_id = :qid
                ');
                $answers->execute(['qid' => $q['id']]);
                $rows = $answers->fetchAll(PDO::FETCH_ASSOC);

                if ($rows) {
                    foreach ($rows as $ans) {
                        $score = 0;
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

                        $S = $score - $a;
                        $sumS += $S;
                        $count++;

                        echo "<tr class='text-center'>
                                <td>{$no}</td>
                                <td>{$q['question']}</td>
                                <td>{$ans['nama']}</td>
                                <td>{$score}</td>
                                <td>{$a}</td>
                                <td>{$S}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                              </tr>";
                    }

                    $n_c_minus_1 = $count * $c_minus_1;
                    $V = $sumS / $n_c_minus_1;
                    $status = ($V >= 0.8)
                        ? '<span class="badge bg-success">Valid</span>'
                        : '<span class="badge bg-danger">Tidak Valid</span>';

                    echo "<tr class='table-warning text-center'>
                            <td colspan='5'><b>Subtotal</b></td>
                            <td><b>{$sumS}</b></td>
                            <td><b>{$sumS}</b></td>
                            <td><b>{$n_c_minus_1}</b></td>
                            <td><b>" . number_format($V, 2) . "</b></td>
                            <td>{$status}</td>
                          </tr>";
                } else {
                    echo "<tr class='text-center'>
                            <td>{$no}</td>
                            <td>{$q['question']}</td>
                            <td colspan='8'><span class='badge bg-danger'>Belum ada respon</span></td>
                          </tr>";
                }

                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>