<?php
	session_start();
	include 'config.php';

	if (!isset($_SESSION['username'])) {
	    header('Location: login.php');
	    exit;
	}
	$username = $_SESSION['username'];

	$sql = "SELECT * FROM book";
	$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Book</title>
    <style>
        /* Tambahkan styling CSS sesuai kebutuhan */
    </style>
</head>
<body>

<h2>Welcome, <?php echo $username; ?></h2>
<a href='logout.php'>Logout</a><br>

<ul>
    <li><a href="book_show.php">Buku</a></li>
    <li><a href="siswa_show.php">Siswa</a></li>
    <li><a href="pinjam_show.php">Peminjaman</a></li>
</ul>

<h2>Data Buku</h2>
<a href='book_create.php'>Add Books</a><br>
<table border='1'>
	<tr>
	 	<th>ID</th>
	 	<th>Judul</th>
	 	<th>Pengarang</th>
	 	<th>Kategori</th>
	 	<th>TahunTerbit</th>
	 	<th>Penerbit</th>
	 	<th>Jumlah Buku</th>
	 	<th>Action</th>
	 </tr>
	 <?php
	 while ($row = $result->fetch_assoc()) {
			 echo "<tr>";
			 echo "<td>".$row["book_id"]."</td>";
			 echo "<td>".$row["judul"]."</td>";
			 echo "<td>".$row["pengarang"]."</td>";
			 echo "<td>".$row["kategori"]."</td>";
			 echo "<td>".$row["tahun_terbit"]."</td>";
			 echo "<td>".$row["penerbit"]."</td>";
			 echo "<td>".$row["jumlah_book"]."</td>";
			 echo "<td><a href='book_edit.php?id=".$row["book_id"]."'>Edit</a> | <a href='book_delete.php?id=".$row["book_id"]."'>Hapus</a></td>";
			 echo "</tr>";
	 	}
	 ?>
</table>
</body>
</html>

<?php
$result->free_result();
$mysqli->close();
?>