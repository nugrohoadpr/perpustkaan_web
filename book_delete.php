<?php
	session_start();
	include 'config.php';
	$id = $_GET['id']; // ID dari buku yang akan dihapus
	$sql = "DELETE FROM book WHERE book_id=$id";

	if ($mysqli->query($sql) === TRUE) {
		header("Location: book_show.php"); // Redirect ke tampilan Read setelah berhasil hapus data
		exit;
	} else {
	 	echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
	$mysqli->close();
?>


