<?php
session_start();

function authorize($permission)
{
    if (!isset($_SESSION['permissions']) || !in_array($permission, $_SESSION['permissions'])) {
        http_response_code(403);
        die("403 Forbidden - Anda tidak punya akses!");
    }
}
