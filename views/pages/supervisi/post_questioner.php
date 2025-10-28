<?php
require_once __DIR__ . '/../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $questioner_category_id = $_POST['questioner_category_id'];
    $question = $_POST['question'];

    $stmt = $db->prepare('INSERT INTO questioner (questioner_category_id, question) VALUES (?, ?)');
    $stmt->execute([$questioner_category_id, $question]);
}

?>