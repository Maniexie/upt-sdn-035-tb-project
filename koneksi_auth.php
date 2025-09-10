<?php
$host = 'localhost';
$dbname = 'upt_sdn_035_tb';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
// base url assets
define('BASE_URL', 'http://192.168.100.235/upt-sdn-035-tb-project/');
date_default_timezone_set('Asia/Jakarta');
