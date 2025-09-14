<?php
function checkRoleAccess($page)
{
    $role = $_SESSION['role_id'] ?? null;

    // Mapping halaman per role
    $rolePages = [
        1 => [ // admin
            'index',
            'dashboard',
            'profile',
            'input_pelanggaran',
            'edit_pelanggaran',
            'rekap_pelanggaran',
            'hapus_pelanggaran',
            'detail_pelanggaran',
            'history_pelanggaran',
            'jenis_pelanggaran',
            'rekap_pelanggaran_siswa',
            'cetak_rekap_siswa',
            'daftar_guru',
            'input_guru',
            'input_jenis_pelanggaran',
            'daftar_siswa_for_admin',
            'detail_siswa_for_admin',
            'edit_data_siswa',
            'hapus_data_siswa',
            'input_data_siswa',
            'edit_profile',
            'edit_guru',
            'daftar_user',
            'detail_user',
            'edit_user',
            'hapus_user',
            'password_user',
            'tambah_user',
            'jadwal_piket_guru',
            'daftar_jabatan',
            'edit_jabatan',
            'tambah_jabatan',
            'hapus_jabatan',
            'tambah_jadwal_piket_guru',
            'edit_jadwal_piket_guru',
            'edit_jenis_pelanggaran',
            'hapus_jenis_pelanggaran',
            'edit_input_pelanggaran',

        ],
        2 => [ // guru
            'dashboard',
            'input_pelanggaran',
            'edit_pelanggaran',
            'profile',
            'index',
            'rekap_pelanggaran',
            'detail_pelanggaran',
            'rekap_pelanggaran_siswa',
            'cetak_rekap_siswa',
            'jenis_pelanggaran',
            'history_pelanggaran',
            'data_siswa_pelanggaran_siswa',
            'daftar_siswa',
            'jadwal_piket_guru',
            'edit_input_pelanggaran',
        ],
        3 => [ // siswa
            'dashboard',
            'index',
            'history_pelanggaran',
            'jenis_pelanggaran',
            'profile',
            'pelanggaran_siswa',
            'cetak_rekap_siswa'
        ],
    ];

    if (!$role || !isset($rolePages[$role]) || !in_array($page, $rolePages[$role])) {
        http_response_code(403);
        require_once __DIR__ . '/../views/pages/errors/403.php';
        // echo "<h1>403 Forbidden - Anda tidak punya akses ke halaman ini mas!</h1>";
        exit;
    }
}
