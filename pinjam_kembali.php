<?php
    session_start();
    include 'config.php';
    $id = $_GET['id'];
    $sql = "UPDATE peminjaman SET pengembalian = TRUE WHERE pinjam_id = '$id'";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: pinjam_show.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
?>
