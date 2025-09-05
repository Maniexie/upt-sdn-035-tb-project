<?php

require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/middleware/role.php';

// ambil parameter ?page=
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// daftar halaman yang ada
$allowedPages = [
    'index' => 'views/pages/index.php',
    'dashboard' => 'views/pages/index.php',
    'profile' => 'views/pages/profile.php',
    'cetak_rekap_siswa' => 'views/pages/cetak_rekap_siswa.php',
    'detail_pelanggaran' => 'views/pages/detail_pelanggaran.php',
    'history_pelanggaran' => 'views/pages/history_pelanggaran.php',
    'jenis_pelanggaran' => 'views/pages/jenis_pelanggaran.php',
    'input_pelanggaran' => 'views/pages/input_pelanggaran.php',
    'edit_pelanggaran' => 'views/pages/edit_pelanggaran.php',
    'rekap_pelanggaran' => 'views/pages/rekap_pelanggaran.php',
    'rekap_pelanggaran_siswa' => 'views/pages/rekap_pelanggaran_siswa.php',
    'hapus_pelanggaran' => 'views/pages/hapus_pelanggaran.php',
    'login' => 'views/auth/login.php',
    'register' => 'views/auth/register.php',
    'check_register' => 'views/auth/check_register.php',
    'check_login' => 'views/auth/check_login.php',
    'get_siswa_by_kelas' => 'views/ajax/get_siswa_by_kelas.php',
    'logout' => 'views/auth/logout.php'
];

// cek apakah halaman ada
if (!array_key_exists($page, $allowedPages)) {
    http_response_code(404);
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
    exit;
}

// include middleware auth
require_once __DIR__ . '/middleware/auth.php';

// khusus role guest
if (!in_array($page, ['login', 'register', 'check_register', 'check_login', 'logout'])) {
    checkRoleAccess($page);
}

// load halaman
require_once __DIR__ . '/' . $allowedPages[$page];
