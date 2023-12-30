<?php
session_start();
include 'config.php';
$id = $_GET['id']; 

if(isset($_POST['submit'])){
// Get values from the form
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
 	$jumlah_book = $_POST['jumlah_book'];

    // Update query

    $update_query = "UPDATE book SET judul='$judul', pengarang='$pengarang', kategori='$kategori', tahun_terbit='$tahun_terbit', penerbit='$penerbit', jumlah_book='$jumlah_book' WHERE book_id=$id";
    if ($mysqli->query($update_query) === TRUE) {
    	header("Location:book_show.php");
		exit;
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
} else {
    echo "Invalid request";
}
// ID dari buku yang akan diupdate
$sql = "SELECT * FROM book WHERE book_id=$id";

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
 $row = $result->fetch_assoc();
	 ?>
	 <form method="POST">
	 Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br>
	 Pengarang: <input type="text" name="pengarang" value="<?php echo $row['pengarang'];
	?>"><br>
	 Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"><br>
	 Tahun Terbit: <input type="text" name="tahun_terbit" value="<?php echo
	$row['tahun_terbit']; ?>"><br>
	Jumlah Buku: <input type="text" name="sinopsis" value="<?php echo
	$row['jumlah_book']; ?>"><br>
	Kategori: <input type="text" name="kategori" value="<?php echo
	$row['kategori']; ?>"><br>
	 <input type="hidden" name="id" value="<?php echo $row['book_id']; ?>">
	 <input type="submit" name="submit" value="Update">
	 </form>
	 <?php
	} else {
	 echo "Data tidak ditemukan.";
	}
$mysqli->close();
?>