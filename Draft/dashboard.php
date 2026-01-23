<?php
// ==============================================================
// ECOBENCH MONITORING SYSTEM - SUSTAINABLE ENERGY DASHBOARD
// Clean, eco-friendly, and futuristic design
// ==============================================================

// Mock Data Configuration
$systemData = [
    'current_watts' => 145.7,
    'voltage' => 12.4,
    'battery_percent' => 78,
    'charge_rate' => 2.3,
    'is_charging' => true,
    'runtime_hours' => 6.5,
    'crank_active' => false,
    'solar_power' => 132.5,
    'manual_power' => 13.2,
    'total_generated_today' => 3450,
    'total_consumed_today' => 2180
];

// Energy efficiency score (0-100)
$efficiencyScore = 87;

// Monthly generation comparison
$monthlyData = [
    ['month' => 'Jan', 'solar' => 2100, 'manual' => 180],
    ['month' => 'Feb', 'solar' => 2450, 'manual' => 210],
    ['month' => 'Mar', 'solar' => 3200, 'manual' => 250],
    ['month' => 'Apr', 'solar' => 3800, 'manual' => 290],
    ['month' => 'May', 'solar' => 4200, 'manual' => 310]
];

// Hourly power generation today (realistic solar curve)
$hourlyData = [
    ['hour' => '00', 'power' => 0], ['hour' => '01', 'power' => 0], ['hour' => '02', 'power' => 0],
    ['hour' => '03', 'power' => 0], ['hour' => '04', 'power' => 0], ['hour' => '05', 'power' => 0],
    ['hour' => '06', 'power' => 15], ['hour' => '07', 'power' => 45], ['hour' => '08', 'power' => 85],
    ['hour' => '09', 'power' => 125], ['hour' => '10', 'power' => 155], ['hour' => '11', 'power' => 175],
    ['hour' => '12', 'power' => 185], ['hour' => '13', 'power' => 180], ['hour' => '14', 'power' => 165],
    ['hour' => '15', 'power' => 140], ['hour' => '16', 'power' => 105], ['hour' => '17', 'power' => 65],
    ['hour' => '18', 'power' => 25], ['hour' => '19', 'power' => 5], ['hour' => '20', 'power' => 0],
    ['hour' => '21', 'power' => 0], ['hour' => '22', 'power' => 0], ['hour' => '23', 'power' => 0]
];

// Active power sources
$powerSources = [
    ['name' => 'Solar Panel', 'power' => 132.5, 'status' => 'active'],
    ['name' => 'Manual Crank', 'power' => 13.2, 'status' => 'active'],
    ['name' => 'Battery Storage', 'power' => 0, 'status' => 'charging']
];

// Environmental impact
$co2Saved = 2.45; // kg today
$treesEquivalent = 0.11;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Sustainable Energy Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfccb 50%, #fef9c3 100%);
        }
        
        .sidebar {
            background: linear-gradient(180deg, #166534 0%, #15803d 100%);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(34, 197, 94, 0.1);
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(34, 197, 94, 0.15), 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .nav-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #fbbf24;
            color: white;
        }
        
        .nav-item.active {
            background: rgba(251, 191, 36, 0.2);
            border-left-color: #fbbf24;
            color: white;
        }
        
        .stat-badge {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .pulse-dot {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }
        
        .glow-green {
            box-shadow: 0 0 30px rgba(34, 197, 94, 0.4), 0 0 60px rgba(34, 197, 94, 0.2);
        }
        
        .glow-yellow {
            box-shadow: 0 0 30px rgba(251, 191, 36, 0.4), 0 0 60px rgba(251, 191, 36, 0.2);
        }
        
        .progress-ring {
            transform: rotate(-90deg);
        }
        
        .gradient-green {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        }
        
        .gradient-yellow {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#22c55e',
                        secondary: '#fbbf24',
                        accent: '#84cc16',
                    }
                }
            }
        }
    </script>
</head>
<body class="text-gray-800">

<div class="flex min-h-screen">
    
    <!-- SIDEBAR -->
    <aside class="sidebar w-64 fixed h-full left-0 top-0 z-50 hidden lg:block">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-yellow-400 rounded-2xl flex items-center justify-center shadow-lg float-animation">
                    <i class="fas fa-leaf text-green-700 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">EcoBench</h1>
                    <span class="text-xs text-yellow-300 font-semibold tracking-wide">SMART ENERGY</span>
                </div>
            </div>
            
            <nav class="space-y-2">
                <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-bolt w-5"></i>
                    <span>Power Sources</span>
                </a>
                <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-battery-three-quarters w-5"></i>
                    <span>Battery Status</span>
                </a>
                <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-chart-bar w-5"></i>
                    <span>Analytics</span>
                </a>
                <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-leaf w-5"></i>
                    <span>Environmental</span>
                </a>
                <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-cog w-5"></i>
                    <span>Settings</span>
                </a>
            </nav>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-6">
            <div class="glass-effect rounded-xl p-4 border border-white/20">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-3 h-3 bg-green-400 rounded-full pulse-dot"></div>
                    <span class="text-xs text-gray-700 font-semibold">System Status</span>
                </div>
                <p class="text-sm font-bold text-green-700">All Systems Online</p>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 lg:ml-64 p-6 md:p-8">
        
        <!-- HEADER -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">Energy Dashboard</h1>
                <p class="text-gray-600 text-sm font-medium">Real-time sustainable power monitoring</p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="flex bg-white rounded-xl p-1 shadow-md border border-green-100">
                    <button class="px-5 py-2 gradient-green text-white rounded-lg text-sm font-semibold shadow-sm">TODAY</button>
                    <button class="px-5 py-2 text-gray-600 text-sm font-semibold hover:text-green-600 transition-colors">WEEK</button>
                    <button class="px-5 py-2 text-gray-600 text-sm font-semibold hover:text-green-600 transition-colors">MONTH</button>
                </div>
                <div class="text-right bg-white px-4 py-2 rounded-xl shadow-md border border-green-100">
                    <p class="text-xs text-gray-500 font-medium">Current Date</p>
                    <p class="text-sm font-bold text-gray-800"><?php echo date('F Y'); ?></p>
                </div>
            </div>
        </div>

        <!-- TOP METRICS ROW -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- Total Power Generated Today -->
            <div class="card p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-2">Total Generated</p>
                        <h3 class="text-4xl font-bold text-green-600" id="totalGenerated"><?php echo number_format($systemData['total_generated_today']); ?></h3>
                        <p class="text-xs text-gray-500 mt-1 font-medium">Wh today</p>
                    </div>
                    <div class="w-14 h-14 gradient-green rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-solar-panel text-white text-2xl"></i>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="stat-badge">↑ 12.5%</span>
                    <span class="text-xs text-gray-500 font-medium">vs yesterday</span>
                </div>
            </div>

            <!-- Current Power Input -->
            <div class="card p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-2">Power Input</p>
                        <h3 class="text-4xl font-bold text-yellow-600" id="currentPower"><?php echo number_format($systemData['current_watts'], 1); ?></h3>
                        <p class="text-xs text-gray-500 mt-1 font-medium">Watts</p>
                    </div>
                    <div class="w-14 h-14 gradient-yellow rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-yellow-400 to-green-500 rounded-full transition-all duration-500" style="width: 73%"></div>
                </div>
            </div>

            <!-- Battery Status -->
            <div class="card p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-2">Battery Level</p>
                        <h3 class="text-4xl font-bold text-blue-600"><?php echo $systemData['battery_percent']; ?>%</h3>
                        <p class="text-xs text-gray-500 mt-1 font-medium"><?php echo $systemData['voltage']; ?>V</p>
                    </div>
                    <div class="w-14 h-14 gradient-blue rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-battery-three-quarters text-white text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full transition-all duration-500" style="width: <?php echo $systemData['battery_percent']; ?>%"></div>
                </div>
            </div>

            <!-- Runtime Estimate -->
            <div class="card p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-2">Est. Runtime</p>
                        <h3 class="text-4xl font-bold text-purple-600"><?php echo number_format($systemData['runtime_hours'], 1); ?></h3>
                        <p class="text-xs text-gray-500 mt-1 font-medium">Hours</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-info-circle text-gray-400 text-xs"></i>
                    <span class="text-xs text-gray-500 font-medium">At current load</span>
                </div>
            </div>

        </div>

        <!-- MAIN DASHBOARD GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- POWER GENERATION CHART (Large) -->
            <div class="lg:col-span-2 card p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Power Generation Today</h3>
                        <p class="text-sm text-gray-500 font-medium">Real-time energy production</p>
                    </div>
                    <div class="w-3 h-3 bg-green-500 rounded-full pulse-dot"></div>
                </div>
                <div style="position: relative; height: 300px;">
                    <canvas id="powerGenerationChart"></canvas>
                </div>
            </div>

            <!-- ENERGY EFFICIENCY SCORE -->
            <div class="card p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Energy Efficiency</h3>
                <div class="flex justify-center items-center mb-6">
                    <div class="relative w-48 h-48">
                        <svg class="w-full h-full" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb" stroke-width="8"/>
                            <circle cx="50" cy="50" r="45" fill="none" stroke="url(#gradient)" stroke-width="8" 
                                    stroke-dasharray="<?php echo ($efficiencyScore / 100) * 283; ?> 283" 
                                    class="progress-ring" stroke-linecap="round"/>
                            <defs>
                                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#22c55e;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#fbbf24;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-5xl font-bold bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text text-transparent"><?php echo $efficiencyScore; ?></span>
                            <span class="text-sm text-gray-500 font-semibold mt-1">Score</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-xl border border-green-100">
                        <span class="text-sm text-gray-700 font-medium">Solar Efficiency</span>
                        <span class="text-sm font-bold text-green-600">92%</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-xl border border-yellow-100">
                        <span class="text-sm text-gray-700 font-medium">Manual Efficiency</span>
                        <span class="text-sm font-bold text-yellow-600">78%</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-xl border border-blue-100">
                        <span class="text-sm text-gray-700 font-medium">Storage Efficiency</span>
                        <span class="text-sm font-bold text-blue-600">91%</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- SECOND ROW -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- ACTIVE POWER SOURCES -->
            <div class="card p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Active Power Sources</h3>
                <div class="space-y-4">
                    <?php foreach ($powerSources as $index => $source): ?>
                    <div class="flex items-center justify-between p-4 <?php echo $index === 0 ? 'bg-green-50 border-green-200' : ($index === 1 ? 'bg-yellow-50 border-yellow-200' : 'bg-blue-50 border-blue-200'); ?> rounded-xl border">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full <?php echo $source['status'] === 'active' ? 'bg-green-500 pulse-dot' : 'bg-blue-500'; ?>"></div>
                            <div>
                                <p class="text-sm font-bold text-gray-800"><?php echo $source['name']; ?></p>
                                <p class="text-xs text-gray-500 capitalize font-medium"><?php echo $source['status']; ?></p>
                            </div>
                        </div>
                        <span class="text-xl font-bold text-green-600"><?php echo $source['power']; ?>W</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- MANUAL CRANK STATUS -->
            <div class="card p-6" id="crankCard">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Manual Crank Generator</h3>
                <div class="text-center py-6">
                    <div class="inline-flex items-center justify-center w-28 h-28 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mb-4 shadow-xl" id="crankIcon">
                        <i class="fas fa-cog text-white text-5xl"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-800 mb-3" id="crankPower">13.2 W</p>
                    <span class="inline-block px-5 py-2 gradient-green text-white rounded-full text-sm font-bold shadow-md" id="crankStatus">Active</span>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600 font-medium">Today's Output</span>
                        <span class="font-bold text-gray-800">245 Wh</span>
                    </div>
                </div>
            </div>

            <!-- ENVIRONMENTAL IMPACT -->
            <div class="card p-6 bg-gradient-to-br from-green-50 to-emerald-50">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Environmental Impact</h3>
                <div class="space-y-6">
                    <div class="bg-white p-4 rounded-xl border border-green-200">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-cloud text-green-500 text-xl"></i>
                            <span class="text-sm text-gray-600 font-semibold">CO₂ Saved Today</span>
                        </div>
                        <p class="text-4xl font-bold text-green-600"><?php echo $co2Saved; ?> <span class="text-xl text-gray-500">kg</span></p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-green-200">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-tree text-green-500 text-xl"></i>
                            <span class="text-sm text-gray-600 font-semibold">Trees Equivalent</span>
                        </div>
                        <p class="text-4xl font-bold text-green-600"><?php echo $treesEquivalent; ?> <span class="text-xl text-gray-500">trees</span></p>
                    </div>
                    <div class="p-4 bg-green-600 rounded-xl shadow-lg">
                        <p class="text-sm text-white font-semibold">🌱 Great job! You're making a positive impact on the environment.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- BOTTOM ROW -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- MONTHLY COMPARISON -->
            <div class="card p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Monthly Energy Production</h3>
                <div style="position: relative; height: 280px;">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>

            <!-- ENERGY BALANCE -->
            <div class="card p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Energy Balance</h3>
                <div class="flex justify-center mb-6">
                    <div style="position: relative; width: 250px; height: 250px;">
                        <canvas id="energyBalanceChart"></canvas>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center p-4 bg-green-50 rounded-xl border border-green-200">
                        <p class="text-3xl font-bold text-green-600"><?php echo number_format($systemData['total_generated_today']); ?></p>
                        <p class="text-xs text-gray-600 mt-2 font-semibold">Generated (Wh)</p>
                    </div>
                    <div class="text-center p-4 bg-yellow-50 rounded-xl border border-yellow-200">
                        <p class="text-3xl font-bold text-yellow-600"><?php echo number_format($systemData['total_consumed_today']); ?></p>
                        <p class="text-xs text-gray-600 mt-2 font-semibold">Consumed (Wh)</p>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>

<script>
// PHP Data to JavaScript
const phpData = <?php echo json_encode([
    'currentWatts' => $systemData['current_watts'],
    'batteryPercent' => $systemData['battery_percent'],
    'hourlyData' => $hourlyData,
    'monthlyData' => $monthlyData,
    'totalGenerated' => $systemData['total_generated_today'],
    'totalConsumed' => $systemData['total_consumed_today']
]); ?>;

// Chart.js Configuration - Clean, modern style
Chart.defaults.color = '#6b7280';
Chart.defaults.borderColor = '#e5e7eb';
Chart.defaults.font.family = 'Inter';
Chart.defaults.font.size = 12;

// Power Generation Chart
const powerCtx = document.getElementById('powerGenerationChart').getContext('2d');
new Chart(powerCtx, {
    type: 'line',
    data: {
        labels: phpData.hourlyData.map(d => d.hour + ':00'),
        datasets: [{
            label: 'Power (W)',
            data: phpData.hourlyData.map(d => d.power),
            borderColor: '#22c55e',
            backgroundColor: 'rgba(34, 197, 94, 0.15)',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointRadius: 0,
            pointHoverRadius: 8,
            pointHoverBackgroundColor: '#22c55e',
            pointHoverBorderColor: '#fff',
            pointHoverBorderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 2.5,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'white',
                titleColor: '#1f2937',
                bodyColor: '#6b7280',
                borderColor: '#e5e7eb',
                borderWidth: 1,
                padding: 12,
                displayColors: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 200,
                grid: { color: '#f3f4f6', drawBorder: false },
                ticks: { 
                    color: '#6b7280', 
                    padding: 8,
                    stepSize: 50
                }
            },
            x: {
                grid: { display: false, drawBorder: false },
                ticks: { 
                    color: '#6b7280', 
                    padding: 8,
                    maxRotation: 0,
                    autoSkip: true,
                    maxTicksLimit: 12
                }
            }
        }
    }
});

// Monthly Comparison Chart
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
new Chart(monthlyCtx, {
    type: 'bar',
    data: {
        labels: phpData.monthlyData.map(d => d.month),
        datasets: [{
            label: 'Solar (Wh)',
            data: phpData.monthlyData.map(d => d.solar),
            backgroundColor: '#22c55e',
            borderRadius: 8,
            borderSkipped: false
        }, {
            label: 'Manual (Wh)',
            data: phpData.monthlyData.map(d => d.manual),
            backgroundColor: '#fbbf24',
            borderRadius: 8,
            borderSkipped: false
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 2,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: { weight: '600' }
                }
            },
            tooltip: {
                backgroundColor: 'white',
                titleColor: '#1f2937',
                bodyColor: '#6b7280',
                borderColor: '#e5e7eb',
                borderWidth: 1,
                padding: 12
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: '#f3f4f6', drawBorder: false },
                ticks: { color: '#6b7280', padding: 8 }
            },
            x: {
                grid: { display: false, drawBorder: false },
                ticks: { color: '#6b7280', padding: 8 }
            }
        }
    }
});

// Energy Balance Donut Chart
const balanceCtx = document.getElementById('energyBalanceChart').getContext('2d');
new Chart(balanceCtx, {
    type: 'doughnut',
    data: {
        labels: ['Generated', 'Consumed', 'Stored'],
        datasets: [{
            data: [phpData.totalGenerated, phpData.totalConsumed, phpData.totalGenerated - phpData.totalConsumed],
            backgroundColor: ['#22c55e', '#fbbf24', '#3b82f6'],
            borderWidth: 0,
            hoverOffset: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    padding: 15,
                    font: { weight: '600' }
                }
            },
            tooltip: {
                backgroundColor: 'white',
                titleColor: '#1f2937',
                bodyColor: '#6b7280',
                borderColor: '#e5e7eb',
                borderWidth: 1,
                padding: 12
            }
        }
    }
});

// Real-time updates simulation with smooth transitions
setInterval(() => {
    const currentPower = document.getElementById('currentPower');
    let value = parseFloat(currentPower.textContent);
    value += (Math.random() - 0.5) * 10;
    value = Math.max(50, Math.min(200, value));
    currentPower.textContent = value.toFixed(1);
}, 2000);

// Simulate manual crank activation with visual effects
setInterval(() => {
    if (Math.random() > 0.95) {
        activateCrank();
        setTimeout(deactivateCrank, 3000);
    }
}, 5000);

function activateCrank() {
    const card = document.getElementById('crankCard');
    const icon = document.getElementById('crankIcon');
    const status = document.getElementById('crankStatus');
    const power = document.getElementById('crankPower');
    
    card.classList.add('glow-yellow');
    icon.innerHTML = '<i class="fas fa-cog text-white text-5xl fa-spin"></i>';
    icon.classList.add('shadow-2xl');
    status.textContent = '⚡ CRANKING';
    status.className = 'inline-block px-5 py-2 gradient-yellow text-white rounded-full text-sm font-bold shadow-md animate-pulse';
    power.textContent = '45.8 W';
    power.classList.add('text-yellow-600');
}

function deactivateCrank() {
    const card = document.getElementById('crankCard');
    const icon = document.getElementById('crankIcon');
    const status = document.getElementById('crankStatus');
    const power = document.getElementById('crankPower');
    
    card.classList.remove('glow-yellow');
    icon.innerHTML = '<i class="fas fa-cog text-white text-5xl"></i>';
    icon.classList.remove('shadow-2xl');
    status.textContent = 'Active';
    status.className = 'inline-block px-5 py-2 gradient-green text-white rounded-full text-sm font-bold shadow-md';
    power.textContent = '13.2 W';
    power.classList.remove('text-yellow-600');
}

console.log('🌱 EcoBench Dashboard Initialized Successfully!');
console.log('📊 Mock Data Loaded:', phpData);
</script>

</body>
</html>