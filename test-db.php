<?php
include 'db.php';
$test = mysqli_query($conn, "SELECT 1+1 AS result");
$row = mysqli_fetch_assoc($test);
echo "Database connection test: 1+1 = ".$row['result'];