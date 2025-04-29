<?php
    require "db.php";
    $data = json_decode(file_get_contents('php://input'),true);
    $suhu = $data['suhu'] ?? null;
    $kelembapan = $data['kelembapan'] ?? null;
    $peha = $data['ph'] ?? null;

    $query = "INSERT INTO sensor (suhu, kelembapan, ph) VALUES ('$suhu','$kelembapan','$peha')";

    if ($conn->query($query)){
        echo json_encode("✅ Data berhasil di input. Suhu: $suhu, Kelembapan: $kelembapan, pH: $peha");
    }else{
        echo json_encode("❌ Error");
    }
?>