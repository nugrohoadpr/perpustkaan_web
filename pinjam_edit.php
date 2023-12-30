<?php
session_start();
include 'config.php';
$id = $_GET['id']; 

if(isset($_POST['submit'])){
// Get values from the form
    $id = $_POST['id'];
    $book_id = $_POST['book_id'];
    $siswa_id = $_POST['siswa_id'];

    $update_query = "UPDATE peminjaman SET book_id='$book_id', siswa_id='$siswa_id' WHERE pinjam_id=$id";
    if ($mysqli->query($update_query) === TRUE) {
        header("Location:pinjam_show.php");
        exit;
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}

$mysqli->close();
?>
<form action="pinjam_edit.php" method="POST">
    Nama Buku:<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="book_id">
            <?php
            $sql = "SELECT * FROM book";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=".$row["book_id"].">".$row["judul"]."</option>";
                }
            }
            ?>
           </select><br>
    Nama Siswa:<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="siswa_id">
            <?php
            $sql = "SELECT * FROM siswa";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=".$row["siswa_id"].">".$row["nis"]."</option>";
                }
            }
            ?>
           </select><br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="submit">
</form>