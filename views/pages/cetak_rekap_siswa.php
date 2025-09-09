<?php
require_once __DIR__ . '/../../koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
date_default_timezone_set('Asia/Jakarta');


use Mpdf\Mpdf;

// --- Ambil ID siswa ---
if (!isset($_GET['id'])) {
    die("ID siswa tidak ditemukan.");
}
$siswa_id = (int) $_GET['id'];

// --- Ambil data siswa ---
$siswa = $db->query("SELECT nama, kelas FROM users WHERE id = $siswa_id")->fetch();
if (!$siswa) {
    die("Data siswa tidak ditemukan.");
}

// --- Ambil pelanggaran siswa ---
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


// Ambil data guru wali kelas
$guru = $db->query("
    SELECT nama,nip 
    FROM users 
    WHERE role_id = 2 
      AND kelas = '" . $siswa['kelas'] . "'
    LIMIT 1
")->fetch();

$namaGuru = $guru ? $guru['nama'] : 'Nama Wali Kelas';
$nipGuru = $guru ? $guru['nip'] : 'NIP Wali Kelas';

// --- Fungsi format tanggal ---
function formatTanggalIndonesia($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];
    $tanggal = date('Y-m-d', strtotime($tanggal));
    [$tahun, $bulanIndex, $hari] = explode('-', $tanggal);
    return (int) $hari . ' ' . $bulan[(int) $bulanIndex] . ' ' . $tahun;
}



// --- Fungsi nama hari ---
function getNamaHariIndonesia($tanggal)
{
    $hariInggris = date('l', strtotime($tanggal));
    $hariIndonesia = [
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu',
    ];
    return $hariIndonesia[$hariInggris] ?? $hariInggris;
}

// --- Fungsi dapatkan tanggal 3 hari kerja ke depan ---
function getTanggalHariKerja($jumlahHariKerja)
{
    $tanggal = new DateTime();
    $hariKerjaDihitung = 0;

    while ($hariKerjaDihitung < $jumlahHariKerja) {
        $tanggal->modify('+1 day');
        $hari = $tanggal->format('N'); // 1 = Senin, 7 = Minggu

        if ($hari >= 1 && $hari <= 6) {
            $hariKerjaDihitung++;
        }
    }

    return $tanggal;
}

// --- Hitung hari & tanggal pemanggilan ---
$tanggalPemanggilanObj = getTanggalHariKerja(2);
$hariPemanggilan = getNamaHariIndonesia($tanggalPemanggilanObj->format('Y-m-d'));
$tanggalPemanggilan = formatTanggalIndonesia($tanggalPemanggilanObj->format('Y-m-d'));



// --- Path logo ---
$logoPath = realpath(__DIR__ . "/../../assets/img/logo.jpg");

// --- Path logo ---
$pemanggilan = '';

if ($totalPoin >= 100) {
    $pemanggilan = 4;
} else if ($totalPoin >= 70) {
    $pemanggilan = 3;
} else if ($totalPoin >= 50) {
    $pemanggilan = 2;
} else if ($totalPoin >= 30) {
    $pemanggilan = 1;
} else {
    $pemanggilan = 'Belum ada pemanggilan';
}

// --- HTML untuk PDF ---
$html = '
<style>
table { width: 100%; border-collapse: collapse; }
th, td { border: 1px solid #000; padding: 6px; text-align: center; }

    .garis {
        border-bottom: 4px solid #000;
        margin-top: 10px;
    }
    body { font-family: sans-serif; }
    h3 { text-align: center; margin : 0; }
    h4 { text-align: center; margin : 0; }
    p { text-align: center; margin : 0; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: center; font-size: 12px; }
    .info { margin-top: 10px; font-size: 12px; }
    .header { text-align:center;  display: flex;  align-items: center; margin-top: -90px; margin-left: 17x; }

    .text-normal {
        font-weight: normal;
    }

    table.no-border, 
table.no-border td, 
table.no-border th {
    border: none;
}
</style>

<img src="' . str_replace("\\", "/", $logoPath) . '" style="width:70px;">
<div class="header">
    <h3 class="text-normal"> PEMERINTAH KABUPATEN KAMPAR</h3>
    <h3 class="text-normal">DINAS PENDIDIKAN KEPEMUDAAN DAN OLAHRAGA</h3>
    <h3>UPT SEKOLAH DASAR NEGERI 035 TARAI BANGUN</h3>
    <h4>KECAMATAN TAMBANG</h4>
    <div class="kode" style="display: flex; justify-content: space-between; align-items: center;">
      <p style="margin: 0;">Jl. Suka Karya Dusun II Tarabmandiri Desa Taraibangun (    Kode Pos: 28462 )</p>
    </div>
</div>

    <div class="garis"></div>

<div style="display: flex; justify-content: start; ">
    <table style="width: 50%; ">
        <tr>
            <td colspan="0" style="text-align:left; border: none;">Nomor</td>
            <td style="border: none;">:</td>
            <td style="text-align:left; border: none;">421.2/UPT.SDN 035.TB/I/135</td>
        </tr>
        <tr>
            <td style="text-align:left; border: none;">Lampiran</td>
            <td style=" border: none;">:</td>
            <td style="text-align:left; border: none;">-</td>
        </tr>
        <tr>
            <td style="text-align:left; border: none;">Hal</td>
            <td style=" border: none;">:</td>
            <td style="text-align:left; border: none;">Panggilan Orang Tua/Wali Murid ke Sekolah</td>
        </tr>
        <tr>
            <td style=" border: none;">Keterangan</td>
            <td style=" border: none;">:</td>
            <td style="text-align:left; border: none;">Panggilan ke-' . $pemanggilan . '</td>
        </tr>
    </table>
</div>

<h6 style="font-size:12px; font-weight: normal;">Kepada Yth. <br>
    Orang Tua/Wali Murid
 </h6>

<h6 style="font-size:12px; font-weight: normal; margin-left: 20px;">di - <br> 
    Tempat
</h6>

<h6 style="font-size:12px; font-weight: normal; margin-left: 60px;">
    <span style="font-style: italic;">Assalamualaikum Wr. Wb.</span>  
    <br>
    <br>
    Bersama surat ini, kami pihak sekolah mengharap kehadiran Bapak/Ibu/Wali Murid <br> dari  
    <span style="font-weight: bold;">' . $siswa['nama'] . '</span> Kelas <span style="font-weight: bold;">' . $siswa['kelas'] . '</span> pada :
<br> 
</h6>



    <table style="width: 50%; margin-left: 55px; height: 10%; ">
        <tr>
            <td style="text-align:left; border: none;">Hari</td>
            <td style=" border: none;">:</td>
            <td style="text-align:left; border: none;">' . $hariPemanggilan . '</td>
        </tr>
        <tr>
            <td colspan="0" style="text-align:left; border: none;">Tanggal</td>
            <td style="border: none;">:</td>
            <td style="text-align:left; border: none;">' . $tanggalPemanggilan . '</td>
        </tr>
        <tr>
            <td style="text-align:left; border: none;">Jam</td>
            <td style=" border: none;">:</td>
            <td style="text-align:left; border: none;">08.00WIB s/d Selesai</td>
        </tr>
        <tr>
            <td style="text-align:left; border: none;">Tempat</td>
            <td style=" border: none;">:</td>
            <td style="text-align:left; border: none;">Kantor UPT SDN 035 Tarai Bangun</td>
        </tr>
        
    </table>

<table style="width: 85%; margin-left: auto; margin-right: auto; margin-top: 5px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Pelanggaran</th>
            <th>Poin</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
    ';


// --- Isi tabel pelanggaran ---
if (empty($dataPelanggaran)) {
    $html .= '<tr><td colspan="4">Belum ada pelanggaran.</td></tr>';
} else {
    foreach ($dataPelanggaran as $i => $item) {
        $html .= '<tr>
                    <td>' . ($i + 1) . '</td>
                    <td>' . htmlspecialchars($item['nama_pelanggaran']) . '</td>
                    <td>' . $item['poin'] . '</td>
                    <td>' . formatTanggalIndonesia($item['tanggal']) . '</td>
                  </tr>';
    }
    $html .= '<tr>
                <td colspan="2" style="text-align:right;"><strong>Total Poin</strong></td>
                <td colspan="2" style="text-align:left;"><strong>' . $totalPoin . '</strong></td>
              </tr>';
}

$html .= '</tbody></table>';
$html .= '
    <h6 style="font-size:12px; font-weight: normal; margin-left: 60px;">
        Kehadiran Bapak/Ibu/Wali Murid sangat kami harapkan mengingat pentingnya kerjasama antara pihak sekolah dan orang tua dalam membina dan mendampingi perkembangan karakter serta kedisiplinan siswa.
    </h6>

   <h6 style="font-size:12px; font-weight: normal; margin-left: 60px;">
   Berikut kami sampaikan kembali beberapa ketentuan terkait penanganan pelanggaran:
    <ul style="font-size:12px; margin-left: 20px;">
        <li>Semua pelanggaran di atas akan dikaji dan ditindak sesuai akumulasi poin.</li>
        <li>Ada perbedaan penerapan antara kelas kecil dan kelas besar.</li>
        <li>Khusus membully dipanggil orang tua.</li>
        <li>Batas maksimal poin:</li>
        <ol>
            <li>30 Poin → panggil orang tua</li>
            <li>50 Poin → panggil orang tua + skors 3 hari</li>
            <li>70 Poin → panggil orang tua + skors 7 hari</li>
            <li>100 Poin → panggil orang tua + surat perjanjian bermaterai</li>
        </ol>
    </ul>
   </h6>

    <h6 style="font-size:12px; font-weight: normal; margin-left: 60px;">
     Demikian surat ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
      <span style="font-style: italic;">Wassalamualaikum Wr. Wb.</span>  
    </h6>
    <h6>';

$html .= '
<br><br><br>
<table class="no-border" style="width:100%; margin-top:30px;">
    <tr>
        <td style="width:50%; text-align:center;">
            Mengetahui,<br>
            Kepala UPT SDN 035 Tarai Bangun<br><br><br><br><br>
            <u><strong>EVI YENTI, S.Pd</strong></u><br>
            NIP: 19700509 199304 2 001
            </td>
            <td style="width:50%; text-align:center;">
            Tarai Bangun,' . formatTanggalIndonesia(date('Y-m-d')) . '<br>
            Wali Kelas,<br><br><br><br><br>
            <u><strong>' . $namaGuru . '</strong></u><br>
            NIP: ' . $nipGuru . '
        </td>
    </tr>
</table>
';




// --- Generate PDF ---
$mpdf = new Mpdf();
$mpdf->showImageErrors = true; // debug jika gambar gagal muncul
$mpdf->WriteHTML($html);
$mpdf->Output('Rekap_Pelanggaran_' . $siswa['nama'] . '_pemanggilan_ke-' . $pemanggilan . '.pdf', 'I');
