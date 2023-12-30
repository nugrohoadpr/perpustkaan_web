<?php
	session_start();
	include 'config.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $judul = $_POST['judul'];
		 $pengarang = $_POST['pengarang'];
		 $kategori = $_POST['kategori'];
		 $tahun_terbit = $_POST['tahun_terbit'];
		 $penerbit = $_POST['penerbit'];
		 $jumlah_book = $_POST['jumlah_book'];

		 $sql = "INSERT INTO book (judul, pengarang, kategori, tahun_terbit, penerbit, jumlah_book) VALUES ('$judul',
		'$pengarang', '$kategori', '$tahun_terbit', '$penerbit', '$jumlah_book')";

		 if ($mysqli->query($sql) === TRUE) {
		 	$bukuiId = $mysqli->insert_id;
		 	header("Location:book_show.php");
			exit;
		 } else {
		 	echo "Error: " . $sql . "<br>" . $mysqli->error;
		 }

		 $mysqli->close();
	}
?>
<form action="book_create.php" method="POST">
 Judul: <input type="text" name="judul"><br>
 Pengarang: <input type="text" name="pengarang"><br>
 Kategori: <input type="text" name="kategori"><br>
 Tahun Terbit: <input type="text" name="tahun_terbit"><br>
 Penerbit: <input type="text" name="penerbit"><br>
 Jumlah Buku: <input type="text" name="jumlah_book"><br>
 <input type="submit" value="Tambah">
</form>