<?php
$host = 'localhost';
$dbname = 'upt_sdn_035_tb';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // bisa dihapus jika tidak dibutuhkan
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

define('BASE_URL', 'http://localhost/upt-sdn-035-tb-project/');
// define('BASE_URL', 'http://192.168.100.5/upt-sdn-035-tb-project/');
// define('BASE_URL', 'http://192.168.100.235/upt-sdn-035-tb-project/');
date_default_timezone_set('Asia/Jakarta');
