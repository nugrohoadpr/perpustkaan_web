<?php
	session_start();
	include 'config.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $nis = strtoupper($_POST['nis']);
		 $nama = strtoupper($_POST['nama']);
		 $kelas = strtoupper($_POST['kelas']);
		 $nohp = $_POST['nohp'];

		 $sql = "INSERT INTO siswa (nis, nama, kelas, nohp) VALUES ('$nis',
		'$nama', '$kelas', '$nohp')";

		 if ($mysqli->query($sql) === TRUE) {
		 	$bukuiId = $mysqli->insert_id;
		 	header("Location:siswa_show.php");
			exit;
		 } else {
		 	echo "Error: " . $sql . "<br>" . $mysqli->error;
		 }

		 $mysqli->close();
	}
?>
<form action="siswa_create.php" method="POST">
 NIS: <input type="text" name="nis"><br>
 Nama: <input type="text" name="nama"><br>
 kelas: <input type="text" name="kelas"><br>
 No Telepon: <input type="text" name="nohp"><br>
 <input type="submit" value="Tambah">
</form>