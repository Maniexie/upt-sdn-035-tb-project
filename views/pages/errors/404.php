<?php

http_response_code(404);
$title = "404 Not Found";
$code_error = "404";
$message = "Maaf, halaman yang kamu cari tidak ditemukan.";
require_once __DIR__ . ("/layout.php");

?>