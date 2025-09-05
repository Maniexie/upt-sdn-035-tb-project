<?php
session_start();

// require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/middleware/role.php';

// ambil parameter ?page=
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// daftar halaman yang ada
$allowedPages = [
    'index' => 'views/pages/index.php',
    'dashboard' => 'views/pages/dashboard.php',
    'profile' => 'views/pages/profile.php',
    'cetak_rekap_siswa' => 'views/rekap/cetak_rekap_siswa.php',
    'detail_pelanggaran' => 'views/pages/detail_pelanggaran.php',
    'history_pelanggaran' => 'views/pages/history_pelanggaran.php',
    'jenis_pelanggaran' => 'views/pages/jenis_pelanggaran.php',
    'input_pelanggaran' => 'views/pages/input_pelanggaran.php',
    'edit_pelanggaran' => 'views/pages/edit_pelanggaran.php',
    'rekap_pelanggaran' => 'views/pages/rekap_pelanggaran.php',
    'hapus_pelanggaran' => 'views/pages/hapus_pelanggaran.php',
    'login' => 'views/auth/login.php',
    'register' => 'views/auth/register.php',
];

// cek apakah halaman ada
if (!array_key_exists($page, $allowedPages)) {
    http_response_code(404);
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
    exit;
}

// kalau bukan login/register → cek role
if (!in_array($page, ['login', 'register'])) {
    checkRoleAccess($page);
}

// load halaman
require_once __DIR__ . '/' . $allowedPages[$page];
