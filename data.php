<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Jakarta');

// 1. Load konfigurasi database
include 'db.php';

// 2. Buat response default
$response = [
    'status' => 'error',
    'message' => 'Unknown error',
    'data' => null
];

try {
    // 3. Cek koneksi database
    if (!$conn) {
        throw new Exception("Database connection failed");
    }

    // 4. Ambil data terbaru
    $latest_query = mysqli_query($conn, "SELECT suhu, ph, kelembapan, waktu FROM tb_sensor1 ORDER BY id DESC LIMIT 1");
    if (!$latest_query) {
        throw new Exception("Failed to get latest data: " . mysqli_error($conn));
    }

    $latest_data = mysqli_fetch_assoc($latest_query);
    if (!$latest_data) {
        throw new Exception("No data found in database");
    }

    // 5. Ambil data untuk grafik (7 data terakhir)
    $graph_query = mysqli_query($conn, 
        "SELECT waktu, suhu, kelembapan 
        FROM tb_sensor1 
        ORDER BY id DESC 
        LIMIT 7");
    
    if (!$graph_query) {
        throw new Exception("Failed to get graph data: " . mysqli_error($conn));
    }

    $labels = [];
    $temperature = [];
    $humidity = [];
    
    // Format data terbalik (terlama -> terbaru)
    $graph_data = [];
    while ($row = mysqli_fetch_assoc($graph_query)) {
        $graph_data[] = $row;
    }
    $graph_data = array_reverse($graph_data);

    foreach ($graph_data as $row) {
        $labels[] = date('d M H:i', strtotime($row['waktu']));
        $temperature[] = (float)$row['suhu'];
        $humidity[] = (float)$row['kelembapan'];
    }

    // 6. Siapkan response
    //respon ph card
    $ph_value = (float)$latest_data['ph'];
    $ph_status = 'Good';
    $ph_class = 'bg-green-900 text-green-400'; // Default good

    if ($ph_value > 8.9 || ($ph_value > 5 && $ph_value < 6)) {
        $ph_status = 'Alert!';
        $ph_class = 'bg-yellow-900 text-yellow-400';//alert
    } elseif ($ph_value < 4) {
        $ph_status = 'Danger!';
        $ph_class = 'bg-red-900 text-red-400';//danger
    }
    //respon status device
    $last_update_query = mysqli_query($conn, "SELECT waktu FROM tb_sensor1 ORDER BY id DESC LIMIT 1");
    $last_update = mysqli_fetch_assoc($last_update_query);
    $last_update_time = strtotime($last_update['waktu']);
    $current_time = time();
    $is_online = ($current_time - $last_update_time) < 300; // 5 menit toleransi

    $response = [
        'status' => 'success',
        'data' => [
            'cards' => [
                'temperature' => round($latest_data['suhu'], 1) . '°C',
                'ph' => round($latest_data['ph'], 1),
                'ph_status' => $ph_status,
                'ph_class' => $ph_class,
                'device_status' => $is_online ? 'online' : 'offline',
                'humidity' => round($latest_data['kelembapan'], 1) . '%',
                'timestamp' => date('d F Y H:i:s', strtotime($latest_data['waktu'])),
                'timestamp1' => date('H:i:s', strtotime($latest_data['waktu']))
            ],
            'graph' => [
                'labels' => $labels,
                'temperature' => $temperature,
                'humidity' => $humidity
            ]
        ]
    ];

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
    http_response_code(500);
}

// 7. Output response
echo json_encode($response);
?>