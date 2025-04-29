<?php
    $conn = mysqli_connect("localhost", "root", "","smartgardening");

    // Tambahkan pengecekan koneksi
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // else {
    //     echo "Connected successfully"; // Hanya untuk testing
    // }

?>