<?php
    session_start();
    include 'config.php';
    $id = $_GET['id']; // ID dari buku yang akan dihapus
    $sql = "DELETE FROM peminjaman WHERE pinjam_id=$id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: pinjam_show.php"); // Redirect ke tampilan Read setelah berhasil hapus data
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
?>


