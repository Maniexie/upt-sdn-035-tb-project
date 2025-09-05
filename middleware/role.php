<?php
function checkRoleAccess($page)
{
    $role = $_SESSION['role_id'] ?? null;

    // Mapping halaman per role
    $rolePages = [
        1 => [ // admin
            'dashboard',
            'input_pelanggaran',
            'edit_pelanggaran',
            'rekap_pelanggaran',
            'hapus_pelanggaran',
        ],
        2 => [ // guru
            'dashboard',
            'input_pelanggaran',
            'edit_pelanggaran',
        ],
        3 => [ // siswa
            'dashboard',
            'rekap_pelanggaran',
        ],
    ];

    if (!$role || !isset($rolePages[$role]) || !in_array($page, $rolePages[$role])) {
        http_response_code(403);
        echo "<h1>403 Forbidden - Anda tidak punya akses!</h1>";
        exit;
    }
}
