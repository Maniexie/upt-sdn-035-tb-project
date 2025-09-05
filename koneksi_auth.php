<?php
$host = 'localhost';
$dbname = 'upt_sdn_035_tb';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>