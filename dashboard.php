<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring</title>
    <!-- CSS dan Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="text-gray-100">
    <div class="min-h-screen flex item-center justify-center p-4">
        <div class="w-full max-w-6xl rounded-2xl overflow-hidden flex flex-col md:flex-row shadow-xl bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-600">
            <!-- sidebar -->
            <aside class="p-6 w-full md:w-64 flex-shrink-0 border-r border-gray-600">
                <div class="flex items-center space-x-3 mb-10">
                    <div class="p-3 bg-green-500 rounded-xl">
                        <i class="fa-solid fa-seedling text-green-400 text-xl">

                        </i>
                    </div>
                    <h2 class="text-xl font-bold text-white">
                        Dashboard
                        <!-- <span class="text-green-400"></span> -->
                    </h2>
                </div>

                <nav class="space-y-2">
                    <a href="#" class="doy-pill active flex item-center space-x-3 px-4 py-3 rounded-lg text-white">
                        <i class="fa-solid fa-chart-simple text-green-400 w-5"></i>
                        <span>Live Data</span>
                        <!-- <span class="ml-auto text-xs bg-green-900/30 text-green-400 px-2 py-1 rounded-full doy-badge">Hot</span> -->
                    </a>
                    <!-- <a href="#" class="doy-fill flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white">
                        <i class="fas fa-cogs w-5"></i>
                        <span>Setting</span>
                    </a> -->
                    <!-- <a href="#" class="doy-fill flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white">
                        <i class="fas fa-clock-rotate-left w-5"></i>
                        <span>History</span>
                    </a> -->
                </nav>
                <!-- <div class="mt-auto pt-8">
                    <div class="text-xs text-gray-400 text-center">
                        Crafted by
                        <span class="signature">Ridho Alamsyah</span>
                    </div>
                </div> -->
            </aside>
            <!-- Main Content -->
            <main class="flex-1 p-6 md:p-8">
                <!-- header -->
                <header class="mb-8">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-2">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-white">
                                Smart <span class="text-green-400">Gardening</span> System
                            </h1>
                            <p class="text-gray-400 mt-2">
                                Dashboard Monitoring untuk Tanaman Cabai
                            </p>
                        </div>
                        <p class="text-xs text-gray-400 md:text-right">
                            <i class="fa-regular fa-clock mr-1"></i>
                            Last Updated: <span id="timestamp" class="font-medium">Just Now</span>
                        </p>
                    </div>
                </header>
                <!-- card -->
                <section class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- Temperature Card -->
                    <div class="doy-card rounded-xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-sm font-medium text-gray-400">
                                <i class="fa-solid fa-thermometer-half text-red-400 mr-2"></i>
                                Temperature
                            </h2>
                            <i class="fa-solid fa-sync-alt text-grey-500 animate-spin"></i>
                        </div>
                        <p id="temperature" class="text-4xl font-bold text-white mb-1"> °C</p>
                        <p class="text-xs text-gray-400 mt-3">
                            <i class="fa-regular fa-clock mr-1"></i>
                            updated: <span id="timestamp1">Just Now</span>
                        </p>
                    </div>
                    <!-- pH card -->
                    <div class="doy-card rounded-xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-sm font-medium text-gray-400">
                                <i class="fa-solid fa-seedling text-yellow-400 mr-2"></i>
                                pH Level
                            </h2>
                            <span id="phStatus" class="text-xs bg-green-900 text-green-400 px-2 py-1 rounded-full">
                                Good
                            </span>
                        </div>
                        <p id="ph" class="text-4xl font-bold text-white mb-1"></p>
                        <p class="text-xs text-gray-400 mt-2">
                            <i class="fa-solid fa-info-circle mr-1"></i>
                            Ideal Range: <span>6.0-7.0</span>
                        </p>
                    </div>
                    <!-- status card -->
                    <div class="doy-card rounded-xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-sm font-medium text-gray-400">
                                <i class="fa-solid fa-plug text-purple-400 mr-2"></i>
                                Device Status
                            </h2>
                            <div id="deviceStatus" class="flex items-center">
                                <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                                <span class="text-xs text-green-400">Online</span>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-white">ESP32</p>
                        <p class="text-xs text-gray-400 mt-3">
                            <i class="fa-solid fa-code-branch mr-1"></i>
                            Firmware: v3.1.2
                        </p>
                    </div>

                </section>
                <div class="mt-8">
                    <!-- humidity card -->
                    <div class="doy-card rounded-xl p-6 ">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-sm font-medium text-gray-400">
                                <i class="fa-solid fa-droplet text-blue-400 mr-2"></i>
                                Humidity & temperature
                            </h2>
                            <!-- <span class="text-xs bg-yellow-700 text-white-400 px-2 py-1 rounded-full">
                                Real Time
                            </span> -->
                        </div>
                        <div class="h-64">
                            <canvas id="humidityChart"></canvas>
                            <script type="text/javascript"></script>
                        </div>
                        <div class="text-xs text-gray-400 mt-4 pt-3 border-t border-gray-600">
                            <div class="flex items-center space-x-4">
                                <p class="flex items-center">
                                    <i class="fa-solid fa-info-circle mr-1"></i>
                                    Ideal Range Humidity: <span class="ml-1 font-medium">60-80%</span>
                                </p>
                                <p class="flex items-center">
                                    <i class="fa-solid fa-info-circle mr-1"></i>
                                    Ideal Range Temperature: <span class="ml-1 font-medium">20-32°C</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="assets/js/jquery-3.4.0.min.js"></script>
                <script src="assets/js/mdb.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- script untuk grafik -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // 1. Inisialisasi MDB jika diperlukan
                        if (typeof mdb !== 'undefined') {
                            mdb.AutoInit();
                        }

                        // 2. Cek elemen chart
                        const canvas = document.getElementById('humidityChart');
                        if (!canvas) {
                            console.error('Canvas element not found');
                            return;
                        }

                        // 3. Inisialisasi Chart
                        const ctx = canvas.getContext('2d');
                        const sensorChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [],
                                datasets: [{
                                        label: 'Humidity (%)',
                                        data: [],
                                        borderColor: 'rgb(96, 165, 250)',
                                        backgroundColor: 'rgba(96, 165, 250, 0.1)',
                                        borderWidth: 2,
                                        tension: 0.5,
                                        pointRadius: 3,
                                        fill: true,
                                        yAxisID: 'y'
                                    },
                                    {
                                        label: 'Temperature (°C)',
                                        data: [],
                                        borderColor: 'rgb(239, 82, 93)',
                                        backgroundColor: 'rgba(239, 82, 93, 0.1)',
                                        borderWidth: 2,
                                        tension: 0.5,
                                        pointRadius: 3,
                                        fill: true,
                                        yAxisID: 'y1'
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                Animation: {
                                    duration: 3
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    }
                                },
                                scales: {
                                    y: {
                                        type: 'linear',
                                        display: true,
                                        position: 'left',
                                        title: {
                                            display: true,
                                            text: 'Humidity (%)'
                                        },
                                        min: 0,
                                        max: 100,
                                        grid: {
                                            drawOnChartArea: false
                                        }
                                    },
                                    y1: {
                                        type: 'linear',
                                        display: true,
                                        position: 'right',
                                        title: {
                                            display: true,
                                            text: 'Temperature (°C)'
                                        },
                                        min: 0,
                                        max: 50
                                    }
                                }
                            }
                        });

                        // 4. Fungsi Update Data
                        function updateSensorData() {
                            $.ajax({
                                url: 'data.php',
                                type: 'GET',
                                dataType: 'json',
                                timeout: 5000,
                                success: function(response) {
                                    console.log('Data received:', response);

                                    if (response.status === 'success') {
                                        // Update Card Values
                                        $('#temperature').text(response.data.cards.temperature || 'N/A');
                                        $('#ph').text(response.data.cards.ph || 'N/A');
                                        $('#humidity').text(response.data.cards.humidity || 'N/A');
                                        $('#timestamp').text((response.data.cards.timestamp || 'Just Now'));
                                        $('#timestamp1').text((response.data.cards.timestamp1 || 'Just Now'))

                                        // Update status pH
                                        const phStatus = $('#phStatus');
                                        phStatus.text(response.data.cards.ph_status);
                                        phStatus.removeClass().addClass(`text-xs px-2 py-1 rounded-full ${response.data.cards.ph_class}`);

                                        // Update device status
                                        const deviceStatus = $('#deviceStatus');
                                        const isOnline = response.data.cards.device_status === 'online';
                                        if (isOnline) {
                                            deviceStatus.find('div').removeClass('bg-gray-400').addClass('bg-green-400');
                                            deviceStatus.find('span').removeClass('text-gray-400').addClass('text-green-400').text('Online');
                                            deviceStatus.find('i').removeClass('text-red-400').addClass('text-green-400');
                                        } else {
                                            deviceStatus.find('div').removeClass('bg-green-400').addClass('bg-gray-400');
                                            deviceStatus.find('span').removeClass('text-green-400').addClass('text-gray-400').text('Offline');
                                            deviceStatus.find('i').removeClass('text-red-400').addClass('text-gray-400');
                                        }

                                        // Update Chart
                                        if (response.data.graph) {
                                            sensorChart.data.labels = response.data.graph.labels || [];
                                            sensorChart.data.datasets[0].data = response.data.graph.temperature || [];
                                            sensorChart.data.datasets[1].data = response.data.graph.humidity || [];
                                            sensorChart.update();
                                        }
                                    } else {
                                        console.error('Server error:', response.message);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', status, error);
                                }
                            });
                        }

                        // 5. Load Data Awal
                        updateSensorData();

                        // 6. Set Interval untuk Update (3 detik)
                        const updateInterval = setInterval(updateSensorData, 3000);

                        // 7. Cleanup
                        window.addEventListener('beforeunload', function() {
                            clearInterval(updateInterval);
                        });
                    });
                </script>

                <!-- signature/footer -->
                <div class="mt-10 pt-6 border-t border-gray-500 text-center">
                    <p class="text-xs text-gray-500">
                        Copyright &copy; Smart Gardening System 2025 • by
                        <span class="signature">Ridho Alamsyah </span>
                    </p>
                </div>
            </main>
        </div>
    </div>
    <!-- end of Page -->
</body>

</html>