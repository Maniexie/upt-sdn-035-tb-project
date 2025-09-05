<?php
require_once __DIR__ . '/../../koneksi.php';
// require_once '../../koneksi.php';
// require_once __DIR__ . '../../vendor/autoload.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use Mpdf\Mpdf;

// Ambil ID siswa
if (!isset($_GET['id'])) {
    die("ID siswa tidak ditemukan.");
}

$siswa_id = (int) $_GET['id'];

// Ambil info siswa
$siswa = $db->query("SELECT nama, kelas FROM users WHERE id = $siswa_id")->fetch();
if (!$siswa) {
    die("Data siswa tidak ditemukan.");
}

// Ambil pelanggaran siswa
$dataPelanggaran = $db->query("
    SELECT 
        p.nama_pelanggaran,
        p.poin,
        ps.tanggal
    FROM pelanggaran_siswa ps
    JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE ps.siswa_id = $siswa_id
    ORDER BY ps.tanggal DESC
")->fetchAll();

$totalPoin = array_sum(array_column($dataPelanggaran, 'poin'));

// HTML content for PDF
$html = '
<style>
    body { font-family: sans-serif; }
    h3 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: center; }
    .info { margin-top: 10px; }
</style>

<h3>Rekap Pelanggaran Siswa</h3>
<div class="info">
    <strong>Nama:</strong> ' . htmlspecialchars($siswa['nama']) . '<br>
    <strong>Kelas:</strong> ' . htmlspecialchars($siswa['kelas']) . '<br>
    <strong>Total Poin:</strong> ' . $totalPoin . '
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Pelanggaran</th>
            <th>Poin</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>';

if (empty($dataPelanggaran)) {
    $html .= '<tr><td colspan="4">Belum ada pelanggaran.</td></tr>';
} else {
    foreach ($dataPelanggaran as $i => $item) {
        $html .= '<tr>
                    <td>' . ($i + 1) . '</td>
                    <td>' . htmlspecialchars($item['nama_pelanggaran']) . '</td>
                    <td>' . $item['poin'] . '</td>
                    <td>' . $item['tanggal'] . '</td>
                  </tr>';
    }
}

$html .= '</tbody></table>';

// Generate PDF
$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('Rekap_Pelanggaran_' . $siswa['nama'] . '.pdf', 'I'); // I = inline, D = download
