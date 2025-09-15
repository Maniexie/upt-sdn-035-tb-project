<?php
$host = 'localhost';
$dbname = 'upt_sdn_035_tb';
$username = 'root';
$password = '';


$db = new mysqli($host, $username, $password, $dbname);

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // bisa dihapus jika tidak dibutuhkan
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

date_default_timezone_set('Asia/Jakarta');

if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2):

    $getHariPiket = $db->prepare('SELECT users.jadwal_piket_id, jadwal_piket.hari_piket FROM users JOIN jadwal_piket ON users.jadwal_piket_id = jadwal_piket.id WHERE users.id = :user_id');
    $getHariPiket->execute(['user_id' => $_SESSION['user_id']]);
    $hariPiket = $getHariPiket->fetch();

    $hariModeEnglish = date('l');

    $hariMapping = [
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu'
    ];

    $hariSaatIni = $hariMapping[$hariModeEnglish] ?? '';

    $guruBolehInput = ($hariSaatIni === $hariPiket['hari_piket']);

    // echo 'hari piket ' . $hariPiket['hari_piket'] . 'adalah';
endif;


?>