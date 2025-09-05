<?php
session_start();

// jika belum login dan akses selain login/register -> paksa ke login
if (
    !isset($_SESSION['user_id']) &&
    !in_array($page, ['login', 'register', 'check_login', 'check_register'])
) {
    header("Location: index.php?page=login");
    exit;
}

// jika sudah login, cegah akses login/register lagi
if (isset($_SESSION['user_id']) && in_array($page, ['login', 'register'])) {
    header("Location: index.php?page=dashboard");
    exit;
}

// if (isset($_SESSION["user_id"]) && in_array($page, ["])) {