<?php
	session_start();
	include 'config.php';

	if (!isset($_SESSION['username'])) {
	    header('Location: login.php');
	    exit;
	}
	$username = $_SESSION['username'];

	$sql = "SELECT * FROM siswa";
	$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Siswa</title>
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

<a href='siswa_create.php'>Add siswa</a><br>
<table border='1'>
	<tr>
	 	<th>ID</th>
	 	<th>NIS</th>
	 	<th>Nama</th>
	 	<th>kelas</th>
	 	<th>No Telepon</th>
	 	<th>Action</th>
	</tr>
	<?php
    while ($row = $result->fetch_assoc()) {
			 echo "<tr>";
			 echo "<td>".$row["siswa_id"]."</td>";
			 echo "<td>".$row["nis"]."</td>";
			 echo "<td>".$row["nama"]."</td>";
			 echo "<td>".$row["kelas"]."</td>";
			 echo "<td>".$row["nohp"]."</td>";
			 echo "<td><a href='siswa_edit.php?id=".$row["siswa_id"]."'>Edit</a> | <a href='siswa_delete.php?id=".$row["siswa_id"]."'>Hapus</a></td>";
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