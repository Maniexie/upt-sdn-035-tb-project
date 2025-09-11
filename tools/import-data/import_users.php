<?php
$mysqli = new mysqli("localhost", "root", "", "upt_sdn_035_tb");

if (($handle = fopen("data-sekolah-copy.csv", "r")) !== FALSE) {
	fgetcsv($handle); // skip header
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$nik = trim($data[7]);
		$username = trim($data[2]);
		$nisn = trim($data[4]);
		$nip = '';
		$nama = trim($data[0]);
		$kelas = trim($data[1]);
		$email = trim($data[10] ?: '');
		$password = trim(password_hash($data[3], PASSWORD_BCRYPT));
		$jabatan = '';
		$nama_ortu = '';
		$nomor_hp = trim($data[9]);
		$alamat = trim($data[8]);
		$tempat_lahir = trim($data[5]);
		$tanggal_lahir = trim($data[6]);
		$role_id = trim($data[11]);

		$stmt = $mysqli->prepare("INSERT INTO users (nik, username, nisn, nip, nama, kelas, email, password, jabatan, nama_ortu, nomor_hp, alamat, tempat_lahir, tanggal_lahir, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssssssssi", $nik, $username, $nisn, $nip, $nama, $kelas, $email, $password, $jabatan, $nama_ortu, $nomor_hp, $alamat, $tempat_lahir, $tanggal_lahir, $role_id);
		$stmt->execute();
	}
	fclose($handle);
}
