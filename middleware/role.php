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
            'daftar_guru',
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
