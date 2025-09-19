<?php
require_once __DIR__ . "/../../koneksi.php";

$field = $_POST['field'] ?? '';
$value = trim($_POST['value'] ?? '');

$response = ['status' => 'ok'];

if (!empty($field) && !empty($value)) {
    $allowed = ['nisn', 'nip', 'nik', 'username']; // field yang boleh dicek

    if (in_array($field, $allowed)) {
        $stmt = $db->prepare("SELECT id FROM users WHERE $field = :val LIMIT 1");
        $stmt->execute([':val' => $value]);
        if ($stmt->rowCount() > 0) {
            $response = [
                'status' => 'duplicate',
                'message' => strtoupper($field) . " sudah terdaftar!"
            ];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
