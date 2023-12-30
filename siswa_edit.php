<?php
session_start();
include 'config.php';
$id = $_GET['id']; 

if(isset($_POST['submit'])){
// Get values from the form
    $id = $_POST['id'];
    $nis = strtoupper($_POST['nis']);
    $nama = strtoupper($_POST['nama']);
    $kelas = strtoupper($_POST['kelas']);
    $nohp = $_POST['nohp'];
    $kategori = $_POST['kategori'];
 	$jumlah_book = $_POST['jumlah_book'];

    // Update query

    $update_query = "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', nohp='$nohp' WHERE siswa_id=$id";
    if ($mysqli->query($update_query) === TRUE) {
    	header("Location:siswa_show.php");
		exit;
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
} else {
    echo "Invalid request";
}
// ID dari buku yang akan diupdate
$sql = "SELECT * FROM siswa WHERE siswa_id=$id";

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
 $row = $result->fetch_assoc();
	 ?>
	 <form method="POST">
	 NIS: <input type="text" name="nis" value="<?php echo $row['nis']; ?>"><br>
	 Nama: <input type="text" name="nama" value="<?php echo $row['nama'];
	?>"><br>
	 kelas: <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"><br>
	 No Telepon: <input type="text" name="nohp" value="<?php echo
	$row['nohp']; ?>"><br>
	 <input type="hidden" name="id" value="<?php echo $row['siswa_id']; ?>">
	 <input type="submit" name="submit" value="Update">
	 </form>
	 <?php
	} else {
	 echo "Data tidak ditemukan.";
	}
$mysqli->close();
?>