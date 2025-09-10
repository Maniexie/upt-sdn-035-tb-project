<?php
$mysqli = new mysqli("localhost", "root", "", "upt_sdn_035_tb");

if (($handle = fopen("data-sekolah-copy.csv", "r")) !== FALSE) {
	fgetcsv($handle); // skip header
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$nik = $data[7];
		$username = $data[2];
		$nisn = $data[4];
		$nip = '';
		$nama = $data[0];
		$kelas = $data[1];
		$email = $data[10] ?: '';
		$password = password_hash($data[3], PASSWORD_BCRYPT);
		$jabatan = '';
		$nama_ortu = '';
		$nomor_hp = $data[9];
		$alamat = $data[8];
		$tempat_lahir = $data[5];
		$tanggal_lahir = $data[6];
		$role_id = $data[11];

		$stmt = $mysqli->prepare("INSERT INTO users (nik, username, nisn, nip, nama, kelas, email, password, jabatan, nama_ortu, nomor_hp, alamat, tempat_lahir, tanggal_lahir, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssssssssi", $nik, $username, $nisn, $nip, $nama, $kelas, $email, $password, $jabatan, $nama_ortu, $nomor_hp, $alamat, $tempat_lahir, $tanggal_lahir, $role_id);
		$stmt->execute();
	}
	fclose($handle);
}
?>