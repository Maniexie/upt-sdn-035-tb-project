<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "upt_sdn_035_tb";


$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);




}


echo "Connected successfully";

?>