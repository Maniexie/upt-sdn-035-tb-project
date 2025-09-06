<?php
ob_start();
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kelas = $_POST['kelas'];

    $query = $db->prepare("INSERT INTO users (nama, email, kelas, role_id) VALUES (:nama, :email, :kelas, 2)");
    $query->bindParam(':nama', $nama);
    $query->bindParam(':email', $email);
    $query->bindParam(':kelas', $kelas);
    $query->execute();

    header('Location: index.php?page=daftar_guru');
    exit;
}
?>

<h2 class="text-center my-4">Input Data Guru</h2>

<form method="post" action="input_guru">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="kelas" name="kelas" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php';
ob_end_flush(); ?>