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
            'history_pelanggaran'
        ],
        3 => [ // siswa
            'dashboard',
            'rekap_pelanggaran',
            'index',
            'history_pelanggaran',
            'jenis_pelanggaran',
            'profile'
        ],
    ];

    if (!$role || !isset($rolePages[$role]) || !in_array($page, $rolePages[$role])) {
        http_response_code(403);
        echo "<h1>403 Forbidden - Anda tidak punya akses ke halaman ini!</h1>";
        exit;
    }
}
