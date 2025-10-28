<?php

require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/middleware/role.php';

// ambil parameter ?page=
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

switch ($page) {
    case 'dashboard':
        $title = "Dashboard Page";
        $content = "pages/dashboard.php";
        break;
    case 'index':
        $title = "Home Page";
        $content = "pages/index.php";
        break;
    case 'login':
        $title = "Login Page";
        $content = "views/auth/login.php";
        break;
    case 'register':
        $title = "Register Page";
        $content = "views/auth/register.php";
        break;
    case 'check_login':
        $title = "Processing Login";
        $content = "pages/check_login.php";
        break;
    case "check_register":
        $title = "Processing Register";
        $content = "pages/check_register.php";
        break;
    case "logout":
        $title = "Logout";
        $content = "pages/logout.php";
        break;
    case "profile":
        $title = "Profile";
        $content = "pages/profile/profile.php";
        break;
    case "edit_profile":
        $title = "Edit Profile";
        $content = "pages/profile/edit_profile.php";
        break;
    case "daftar_user":
        $title = "Daftar User";
        $content = "pages/data-user/daftar_user.php";
        break;
    case "detail_user":
        $title = "Detail User";
        $content = "pages/data-user/detail_user.php";
        break;
    case "edit_user":
        $title = "Edit User";
        $content = "pages/data-user/edit_user.php";
        break;
    case "hapus_user":
        $title = "Hapus User";
        $content = "pages/data-user/hapus_user.php";
        break;
    case "password_user":
        $title = "Password User";
        $content = "pages/data-user/password_user.php";
        break;
    case "tambah_user":
        $title = "Tambah User";
        $content = "pages/data-user/tambah_user.php";
        break;
    case "daftar_guru":
        $title = "Daftar Guru";
        $content = "pages/data-guru/daftar_guru.php";
        break;
    case "detail_guru":
        $title = "Detail Guru";
        $content = "pages/data-guru/detail_guru.php";
        break;
    case "edit_guru":
        $title = "Edit Guru";
        $content = "pages/data-guru/edit_guru.php";
        break;
    case "hapus_guru":
        $title = "Hapus Guru";
        $content = "pages/data-guru/hapus_guru.php";
        break;
    case "tambah_guru":
        $title = "Tambah Guru";
        $content = "pages/data-guru/tambah_guru.php";
        break;
    case "daftar_jadwal_piket_guru":
        $title = "Daftar Jadwal Piket Guru";
        $content = "pages/data-guru/daftar_jadwal_piket_guru.php";
        break;
    case "tambah_jadwal_piket_guru":
        $title = "Tambah Jadwal Piket Guru";
        $content = "pages/data-guru/tambah_jadwal_piket_guru.php";
        break;
    case "edit_jadwal_piket_guru":
        $title = "Edit Jadwal Piket Guru";
        $content = "pages/data-guru/edit_jadwal_piket_guru.php";
        break;
    case "hapus_jadwal_piket_guru":
        $title = "Hapus Jadwal Piket Guru";
        $content = "pages/data-guru/hapus_jadwal_piket_guru.php";
        break;
    case "jadwal_piket_guru":
        $title = "Jadwal Piket Guru";
        $content = "pages/data-guru/jadwal_piket_guru.php";
        break;
    case "jenis_pelanggaran":
        $title = "Jenis Pelanggaran Siswa";
        $content = "pages/pelanggaran/jenis_pelanggaran.php";
        break;
    case "input_jenis_pelanggaran":
        $title = "Input Jenis Pelanggaran";
        $content = "pages/pelanggaran/input_jenis_pelanggaran.php";
        break;
    case "edit_jenis_pelanggaran":
        $title = "Edit Jenis Pelanggaran";
        $content = "pages/pelanggaran/edit_jenis_pelanggaran.php";
        break;
    case "hapus_jenis_pelanggaran":
        $title = "Hapus Jenis Pelanggaran";
        $content = "pages/pelanggaran/hapus_jenis_pelanggaran.php";
        break;
    case "detail_pelanggaran":
        $title = "Detail Pelanggaran";
        $content = "pages/pelanggaran/detail_pelanggaran.php";
        break;
    case "input_pelanggaran":
        $title = "Input Pelanggaran";
        $content = "pages/pelanggaran/input_pelanggaran.php";
        break;
    case "history_pelanggaran":
        $title = "History Pelanggaran";
        $content = "pages/pelanggaran/history_pelanggaran.php";
        break;
    case "data_siswa_pelanggaran_siswa":
        $title = "Data Siswa Pelanggaran Siswa";
        $content = "pages/data-siswa/data_siswa_pelanggaran_siswa.php";
        break;
    case "daftar_siswa":
        $title = "Daftar Siswa";
        $content = "pages/data-siswa/daftar_siswa.php";
        break;
    case "detail_siswa_for_admin":
        $title = "Detail Siswa For Admin";
        $content = "pages/data-siswa/detail_siswa_for_admin.php";
        break;
    case "daftar_jabatan":
        $title = "Daftar Jabatan";
        $content = "pages/data-user/daftar_jabatan.php";
        break;
    case "daftar_siswa_for_admin":
        $title = "Daftar Siswa For Admin";
        $content = "pages/data-siswa/daftar_siswa_for_admin.php";
        break;
    case "edit_jabatan":
        $title = "Edit Jabatan";
        $content = "pages/data-user/edit_jabatan.php";
        break;
    case "tambah_jabatan":
        $title = "Tambah Jabatan";
        $content = "pages/data-user/tambah_jabatan.php";
        break;
    case "edit_data_siswa":
        $title = "Edit Data Siswa";
        $content = "pages/data-siswa/edit_data_siswa.php";
        break;
    case "input_data_siswa":
        $title = "Input Data Siswa";
        $content = "pages/data-siswa/input_data_siswa.php";
        break;
    case "edit_pelanggaran":
        $title = "Edit Pelanggaran";
        $content = "pages/pelanggaran/edit_pelanggaran.php";
        break;
    case "rekap_pelanggaran":
        $title = "Rekap Pelanggaran";
        $content = "pages/pelanggaran/rekap_pelanggaran.php";
        break;
    case "rekap_pelanggaran_siswa":
        $title = "Rekap Pelanggaran Siswa";
        $content = "pages/pelanggaran/rekap_pelanggaran_siswa.php";
        break;
    case "detail_siswa_for_guru":
        $title = "Detail Siswa";
        $content = "pages/data-siswa/detail_siswa_for_guru.php";
        break;
    case "soal_supervisi":
        $title = "Soal Supervisi";
        $content = "pages/supervisi/soal_supervisi.php";
        break;
    case "input_questioner":
        $title = "Input Quesioner";
        $content = "pages/supervisi/input_questioner.php";
        break;
    case "input_questioner_category":
        $title = "Input Category Quesioner";
        $content = "pages/supervisi/input_questioner_category.php";
        break;

    case "questioner":
        $title = "Questioner";
        $content = "pages/supervisi/questioner.php";
        break;
    default:
        $title = "Page Not Found";
        $content = "pages/404.php"; // optional
        break;
}

// daftar halaman yang ada
$allowedPages = [
    // auth
    'login' => 'views/auth/login.php',
    'register' => 'views/auth/register.php',
    'check_register' => 'views/auth/check_register.php',
    'check_login' => 'views/auth/check_login.php',
    'logout' => 'views/auth/logout.php',

    // pages dashboard
    'index' => 'views/pages/index.php',
    'dashboard' => 'views/pages/index.php',

    // profile
    'profile' => 'views/pages/profile/profile.php',
    'edit_profile' => 'views/pages/profile/edit_profile.php',


    //data user
    'daftar_user' => 'views/pages/data-user/daftar_user.php',
    'detail_user' => 'views/pages/data-user/detail_user.php',
    'edit_user' => 'views/pages/data-user/edit_user.php',
    'hapus_user' => 'views/pages/data-user/hapus_user.php',
    'password_user' => 'views/pages/data-user/password_user.php',
    'tambah_user' => 'views/pages/data-user/tambah_user.php',

    //data-user//daftar-jabatan
    'daftar_jabatan' => 'views/pages/data-user/daftar_jabatan.php',
    'edit_jabatan' => 'views/pages/data-user/edit_jabatan.php',
    'tambah_jabatan' => 'views/pages/data-user/tambah_jabatan.php',
    'hapus_jabatan' => 'views/pages/data-user/hapus_jabatan.php',

    //data-guru
    'daftar_guru' => 'views/pages/data-guru/daftar_guru.php',
    'input_guru' => 'views/pages/data-guru/input_guru.php',
    'edit_guru' => 'views/pages/data-guru/edit_guru.php',


    //data-guru//daftar-piket-guru
    'jadwal_piket_guru' => 'views/pages/data-guru/jadwal_piket_guru.php',
    'tambah_jadwal_piket_guru' => 'views/pages/data-guru/tambah_jadwal_piket_guru.php',
    'edit_jadwal_piket_guru' => 'views/pages/data-guru/edit_jadwal_piket_guru.php',

    //data-siswa
    'daftar_siswa' => 'views/pages/data-siswa/daftar_siswa.php',
    'data_siswa_pelanggaran_siswa' => 'views/pages/data-siswa/data_siswa_pelanggaran_siswa.php',



    //data-siswa-for-admin
    'daftar_siswa_for_admin' => 'views/pages/data-siswa/daftar_siswa_for_admin.php',
    'detail_siswa_for_admin' => 'views/pages/data-siswa/detail_siswa_for_admin.php',
    'edit_data_siswa' => 'views/pages/data-siswa/edit_data_siswa.php',
    'hapus_data_siswa' => 'views/pages/data-siswa/hapus_data_siswa.php',
    'input_data_siswa' => 'views/pages/data-siswa/input_data_siswa.php',


    //data-siswa-for-guru
    'detail_siswa_for_guru' => 'views/pages/data-siswa/detail_siswa_for_guru.php',


    //pelanggaran
    'edit_jenis_pelanggaran' => 'views/pages/pelanggaran/edit_jenis_pelanggaran.php',
    'hapus_jenis_pelanggaran' => 'views/pages/pelanggaran/hapus_jenis_pelanggaran.php',
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
    'cetak_rekap_siswa' => 'views/pages/cetak_rekap_siswa.php',

    //pelanggaran//input-pelanggaran
    'edit_input_pelanggaran' => 'views/pages/pelanggaran/edit_input_pelanggaran.php',


    //supervisi
    'soal_supervisi' => 'views/pages/supervisi/soal_supervisi.php',
    'input_questioner' => 'views/pages/supervisi/input_questioner.php',
    'input_questioner_category' => 'views/pages/supervisi/input_questioner_category.php',
    'questioner' => 'views/pages/supervisi/questioner.php',
    'daftar_validator' => 'views/pages/supervisi/daftar_validator.php',
    'tambah_validator' => 'views/pages/supervisi/tambah_validator.php',
    'daftar_validitas_aiken' => 'views/pages/supervisi/daftar_validitas_aiken.php',
    'daftar_responden' => 'views/pages/supervisi/daftar_responden.php',
    'aiken_detail' => 'views/pages/supervisi/aiken_detail.php',
    'aiken_chart' => 'views/pages/supervisi/aiken_chart.php',

    //ajax
    'get_siswa_by_kelas' => 'views/ajax/get_siswa_by_kelas.php',
    'check_unique_input_user' => 'views/ajax/check_unique_input_user.php',




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
