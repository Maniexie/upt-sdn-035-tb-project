<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<div class="container">
    <h4>catatan program</h4>
    <ul>
        <li>Reset validator menggunakan query (Reset ALL) </li>
        <li>Reset validator menggunakan query (Reset per validator)</li>
        <li>Rekap Per periode</li>
        ###
        SELECT ps.nama_periode, COUNT(DISTINCT user_id) AS total_guru, COUNT(DISTINCT supervisi_id) AS total_penilai
        FROM responden r
        JOIN periode_supervisi ps ON ps.id = r.periode_id
        GROUP BY ps.id
        ORDER BY ps.tanggal_mulai DESC;
        ###
        <li>Buatkan export excel</li>
        <li>rubah value skala likert responden</li>

    </ul>
</div>


<?php require_once __DIR__ . '/../layouts/footer.php'; ?>