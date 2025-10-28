<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

// ambil semua questioner dan hitung Aiken's V
$getQuestioner = $db->prepare('SELECT * FROM questioner');
$getQuestioner->execute();
$questioners = $getQuestioner->fetchAll(PDO::FETCH_ASSOC);

$a = 1;
$c = 4;
$c_minus_1 = $c - 1;
$dataPoints = [];

foreach ($questioners as $q) {
    $sumS = 0;
    $count = 0;

    $answers = $db->prepare('SELECT * FROM questioner_answer WHERE questioner_id = :qid');
    $answers->execute(['qid' => $q['id']]);
    $rows = $answers->fetchAll(PDO::FETCH_ASSOC);

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
    }

    if ($count > 0) {
        $V = $sumS / ($count * $c_minus_1);
        $dataPoints[] = [
            'label' => "Q{$q['id']}",
            'V' => round($V, 2)
        ];
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Grafik Nilai Aiken’s V per Pertanyaan</h2>
    <canvas id="aikenChart" height="100"></canvas>

    <div class="text-center mt-4">
        <a href="index.php?page=aiken_detail" class="btn btn-secondary">← Kembali ke Detail</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('aikenChart').getContext('2d');
    const data = {
        labels: <?= json_encode(array_column($dataPoints, 'label')) ?>,
        datasets: [{
            label: 'Nilai Aiken’s V',
            data: <?= json_encode(array_column($dataPoints, 'V')) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 1
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => `V = ${ctx.raw}`
                    }
                }
            }
        }
    };

    new Chart(ctx, config);
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>