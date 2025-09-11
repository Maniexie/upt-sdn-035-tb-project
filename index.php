<?php

require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/middleware/role.php';

// ambil parameter ?page=
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

switch ($page) {
    case 'login':
        $title = "Login Page";
        $content = "views/auth/login.php";
        break;
    case 'register':
        $title = "Register Page";
        $content = "views/auth/register.php";
        break;
    case 'dashboard':
        $title = "Dashboard";
        $content = "pages/dashboard.php";
        break;
    case 'check_login':
        $title = "Processing Login";
        $content = "pages/check_login.php";
        break;
    default:
        $title = "Page Not Found";
        $content = "pages/404.php"; // optional
        break;
}

// daftar halaman yang ada
$allowedPages = [
    'index' => 'views/pages/index.php',
    'dashboard' => 'views/pages/index.php',
    'profile' => 'views/pages/profile/profile.php',
    'cetak_rekap_siswa' => 'views/pages/cetak_rekap_siswa.php',
    'detail_pelanggaran' => 'views/pages/pelanggaran/detail_pelanggaran.php',
    'history_pelanggaran' => 'views/pages/pelanggaran/history_pelanggaran.php',
    'input_jenis_pelanggaran' => 'views/pages/pelanggaran/input_jenis_pelanggaran.php',
    'jenis_pelanggaran' => 'views/pages/pelanggaran/jenis_pelanggaran.php',
    'input_pelanggaran' => 'views/pages/pelanggaran/input_pelanggaran.php',
    'edit_pelanggaran' => 'views/pages/pelanggaran/edit_pelanggaran.php',
    'rekap_pelanggaran' => 'views/pages/pelanggaran/rekap_pelanggaran.php',
    'rekap_pelanggaran_siswa' => 'views/pages/pelanggaran/rekap_pelanggaran_siswa.php',
    'hapus_pelanggaran' => 'views/pages/pelanggaran/hapus_pelanggaran.php',
    'pelanggaran_siswa' => 'views/pages/pelanggaran/pelanggaran_siswa.php',
    'login' => 'views/auth/login.php',
    'register' => 'views/auth/register.php',
    'check_register' => 'views/auth/check_register.php',
    'check_login' => 'views/auth/check_login.php',
    'get_siswa_by_kelas' => 'views/ajax/get_siswa_by_kelas.php',
    'logout' => 'views/auth/logout.php',
    'daftar_guru' => 'views/pages/data-guru/daftar_guru.php',
    'input_guru' => 'views/pages/data-guru/input_guru.php',
    'data_siswa_pelanggaran_siswa' => 'views/pages/data-siswa/data_siswa_pelanggaran_siswa.php',
    'daftar_siswa' => 'views/pages/data-siswa/daftar_siswa.php',
    'daftar_siswa_for_admin' => 'views/pages/data-siswa/daftar_siswa_for_admin.php',
    'detail_siswa_for_admin' => 'views/pages/data-siswa/detail_siswa_for_admin.php',
    'edit_data_siswa' => 'views/pages/data-siswa/edit_data_siswa.php',
    'hapus_data_siswa' => 'views/pages/data-siswa/hapus_data_siswa.php',
    'input_data_siswa' => 'views/pages/data-siswa/input_data_siswa.php',
];

// cek apakah halaman ada
if (!array_key_exists($page, $allowedPages)) {
    http_response_code(404);
    // echo "<h1 class='text-center'>404 - Halaman tidak ditemukan mas</h1>";
    require_once __DIR__ . '/views/pages/errors/404.php';
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
