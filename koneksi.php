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



?>