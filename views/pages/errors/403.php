<?php

http_response_code(403);
$title = "403 Forbidden";
$code_error = "403";
$message = "Anda tidak memiliki akses ke halaman ini.";
require_once __DIR__ . ("/layout.php");
