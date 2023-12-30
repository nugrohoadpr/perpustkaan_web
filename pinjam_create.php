<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $siswa_id = $_POST['siswa_id'];
    $waktu_pinjam = date("Y-m-d H:i:s");
    $waktu_pengembalian = date("Y-m-d H:i:s", strtotime($waktu_pinjam) + 604800);
    $pengembalian = FALSE;

    // Query untuk menambahkan data peminjaman
    $sql = "INSERT INTO peminjaman (book_id, siswa_id, waktu_pinjam, waktu_pengembalian, pengembalian)
            VALUES ('$book_id', '$siswa_id', '$waktu_pinjam', '$waktu_pengembalian', '$pengembalian')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: pinjam_show.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>

<form action="pinjam_create.php" method="POST">
    ID Buku:<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="book_id">
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
    ID Siswa:<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="siswa_id">
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


    <input type="submit" value="Tambah Peminjaman">
</form>

