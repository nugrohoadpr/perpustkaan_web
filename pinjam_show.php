<?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$username = $_SESSION['username'];

// Query untuk menampilkan data peminjaman
$query = "SELECT p.pinjam_id, p.waktu_pinjam, p.waktu_pengembalian, p.pengembalian, b.judul AS judul_buku, s.nama AS nama_siswa
          FROM peminjaman p
          JOIN book b ON p.book_id = b.book_id
          JOIN siswa s ON p.siswa_id = s.siswa_id
          ORDER BY p.pinjam_id DESC";

$result = $mysqli->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Peminjaman</title>
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
<h2>Data Peminjaman</h2>

<a href='pinjam_create.php'>Add Pinjam Buku</a><br>

<table border="1">
    <tr>
        <th>ID Peminjaman</th>
        <th>Judul Buku</th>
        <th>Nama Siswa</th>
        <th>Waktu Pinjam</th>
        <th>Waktu Pengembalian</th>
        <th>Status Pengembalian</th>
        <th>kembalikan</th>
        <th>Action</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['pinjam_id']}</td>";
        echo "<td>{$row['judul_buku']}</td>";
        echo "<td>{$row['nama_siswa']}</td>";
        echo "<td>{$row['waktu_pinjam']}</td>";
        echo "<td>{$row['waktu_pengembalian']}</td>";
        echo "<td>{$row['pengembalian']}</td>";
        echo "<td><a href='pinjam_kembali.php?id=".$row["pinjam_id"]."'>kembali</a></td>";
        echo "<td><a href='pinjam_edit.php?id=".$row["pinjam_id"]."'>Edit</a> | <a href='pinjam_delete.php?id=".$row["pinjam_id"]."'>Hapus</a></td>";
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
