<?php
session_start();
// Protect the dashboard - redirect to signin if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
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
        
        .nav-item.logout {
            color: #fca5a5;
        }
        
        .nav-item.logout:hover {
            background: rgba(239, 68, 68, 0.2);
            border-left-color: #ef4444;
            color: #fca5a5;
        }
        
        /* E-ink Display Style */
        .eink-display {
            background: #f5f5f0;
            border: 4px solid #2d2d2d;
            border-radius: 8px;
            box-shadow: inset 0 2px 8px rgba(0,0,0,0.1), 0 4px 12px rgba(0,0,0,0.15);
            padding: 32px;
            position: relative;
        }
        
        .eink-display::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 2px,
                    rgba(0,0,0,0.02) 2px,
                    rgba(0,0,0,0.02) 4px
                );
            pointer-events: none;
            border-radius: 4px;
        }
        
        .eink-text {
            color: #1a1a1a;
            font-weight: 600;
        }
        
        .eink-border {
            border: 2px solid #2d2d2d;
        }
        
        /* Battery Display */
        .battery-display {
            background: white;
            border: 3px solid #2d2d2d;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }
        
        .battery-level {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            transition: width 1s ease;
        }
        
        .battery-terminal {
            width: 8px;
            height: 40px;
            background: #2d2d2d;
            border-radius: 0 4px 4px 0;
        }
        
        /* Port Status */
        .port-indicator {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 3px solid #2d2d2d;
            transition: all 0.3s ease;
        }
        
        .port-indicator.charging {
            background: #22c55e;
            box-shadow: 0 0 12px rgba(34, 197, 94, 0.5);
            animation: pulse 2s infinite;
        }
        
        .port-indicator.available {
            background: #e5e7eb;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        
        /* Power Source Indicator */
        .power-source {
            background: white;
            border: 2px solid #2d2d2d;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .power-source.active {
            background: #dcfce7;
            border-color: #22c55e;
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Segment Display Numbers */
        .segment-display {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            letter-spacing: 2px;
            text-shadow: 1px 1px 0px rgba(0,0,0,0.2);
        }
        
        /* Warning Alert */
        .warning-alert {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            animation: warningBlink 2s infinite;
        }
        
        @keyframes warningBlink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Energy Balance Bar */
        .energy-bar {
            background: white;
            border: 2px solid #2d2d2d;
            border-radius: 8px;
            height: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .energy-bar-fill {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            transition: width 0.5s ease;
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#22c55e',
                        secondary: '#fbbf24',
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
        <div class="p-6 flex flex-col h-full">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-yellow-400 rounded-2xl flex items-center justify-center shadow-lg float-animation">
                    <i class="fas fa-leaf text-green-700 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">EcoBench</h1>
                    <span class="text-xs text-yellow-300 font-semibold tracking-wide">SMART ENERGY</span>
                </div>
            </div>
            
            <nav class="space-y-2 flex-1">
                <!-- Removed Home link -->
                <a href="pro_faqs.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-question-circle w-5"></i>
                    <span>FAQs</span>
                </a>
                <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="prototype.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-cube w-5"></i>
                    <span>Prototype</span>
                </a>
                <a href="pro_contact.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-envelope w-5"></i>
                    <span>Contact</span>
                </a>
            </nav>
            
            <!-- Logout at the bottom -->
            <div class="mt-auto pt-6 border-t border-white/20">
                <a href="logout.php" class="nav-item logout flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 lg:ml-64 p-6 md:p-8">
        
        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">EcoBench Dashboard</h1>
            <p class="text-gray-600 text-sm font-medium">Real-time monitoring and status display</p>
        </div>

        <!-- LOW BATTERY WARNING -->
        <div id="lowBatteryWarning" class="warning-alert rounded-lg p-4 mb-6 hidden">
            <div class="flex items-center gap-3">
                <i class="fas fa-exclamation-triangle text-orange-600 text-2xl"></i>
                <div>
                    <p class="font-bold text-orange-900">LOW BATTERY WARNING</p>
                    <p class="text-sm text-orange-800">Battery level below 20%. Please enable manual crank or wait for solar charging.</p>
                </div>
            </div>
        </div>

        <!-- E-INK STYLE MAIN DISPLAY -->
        <div class="eink-display mb-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold eink-text mb-2">PUP INSTITUTE OF TECHNOLOGY</h2>
                <p class="text-sm eink-text opacity-70">SUSTAINABLE ENERGY BENCH SYSTEM</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                
                <!-- LEFT COLUMN: BATTERY & POWER -->
                <div>
                    <!-- BATTERY STATUS -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-bold eink-text">BATTERY STATUS</h3>
                            <span class="segment-display text-2xl eink-text" id="batteryPercent">78%</span>
                        </div>
                        
                        <div class="flex items-center gap-2 mb-3">
                            <div class="battery-display flex-1 h-20 relative">
                                <div class="battery-level" style="width: 78%" id="batteryBar"></div>
                                <div class="absolute inset-0 flex items-center justify-center z-10">
                                    <i class="fas fa-bolt text-xl eink-text"></i>
                                </div>
                            </div>
                            <div class="battery-terminal"></div>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-2 text-center">
                            <div class="eink-border rounded p-2">
                                <p class="text-xs eink-text opacity-70 mb-1">VOLTAGE</p>
                                <p class="text-lg font-bold segment-display eink-text" id="voltage">12.4V</p>
                            </div>
                            <div class="eink-border rounded p-2">
                                <p class="text-xs eink-text opacity-70 mb-1">CHARGE</p>
                                <p class="text-lg font-bold segment-display eink-text" id="chargeRate">+2.3A</p>
                            </div>
                            <div class="eink-border rounded p-2">
                                <p class="text-xs eink-text opacity-70 mb-1">RUNTIME</p>
                                <p class="text-lg font-bold segment-display eink-text" id="runtime">6.2h</p>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL INCOMING POWER -->
                    <div class="eink-border rounded p-4 mb-4 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-2">TOTAL INCOMING POWER</p>
                        <p class="text-3xl font-bold segment-display eink-text" id="totalWatts">132.5W</p>
                        <div class="mt-2">
                            <p class="text-xs eink-text">Energy Balance:</p>
                            <div class="energy-bar mt-1">
                                <div class="energy-bar-fill" style="width: 65%" id="energyBalance"></div>
                            </div>
                            <p class="text-xs eink-text mt-1" id="balanceText">Charging (+65W)</p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: CHARGING PORTS -->
                <div>
                    <h3 class="text-lg font-bold eink-text mb-3">CHARGING PORTS</h3>
                    
                    <div class="space-y-3">
                        <!-- Port 1 -->
                        <div class="flex items-center justify-between p-3 bg-white eink-border rounded">
                            <div class="flex items-center gap-3">
                                <div class="port-indicator charging"></div>
                                <div>
                                    <p class="font-bold eink-text text-sm">PORT 1</p>
                                    <p class="text-xs eink-text opacity-70">USB-C</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-green-700 text-sm">CHARGING</p>
                                <p class="text-xs segment-display eink-text">5.0V / 2.1A</p>
                            </div>
                        </div>

                        <!-- Port 2 -->
                        <div class="flex items-center justify-between p-3 bg-white eink-border rounded">
                            <div class="flex items-center gap-3">
                                <div class="port-indicator available"></div>
                                <div>
                                    <p class="font-bold eink-text text-sm">PORT 2</p>
                                    <p class="text-xs eink-text opacity-70">Lightning</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-gray-600 text-sm">AVAILABLE</p>
                                <p class="text-xs segment-display eink-text">Ready</p>
                            </div>
                        </div>

                        <!-- Port 3 -->
                        <div class="flex items-center justify-between p-3 bg-white eink-border rounded">
                            <div class="flex items-center gap-3">
                                <div class="port-indicator charging"></div>
                                <div>
                                    <p class="font-bold eink-text text-sm">PORT 3</p>
                                    <p class="text-xs eink-text opacity-70">USB-C</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-green-700 text-sm">CHARGING</p>
                                <p class="text-xs segment-display eink-text">5.0V / 1.8A</p>
                            </div>
                        </div>

                        <!-- Port 4 -->
                        <div class="flex items-center justify-between p-3 bg-white eink-border rounded">
                            <div class="flex items-center gap-3">
                                <div class="port-indicator available"></div>
                                <div>
                                    <p class="font-bold eink-text text-sm">PORT 4</p>
                                    <p class="text-xs eink-text opacity-70">Lightning</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-gray-600 text-sm">AVAILABLE</p>
                                <p class="text-xs segment-display eink-text">Ready</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- POWER SOURCES -->
            <div class="border-t-2 border-gray-800 pt-4 mb-4">
                <h3 class="text-lg font-bold eink-text mb-4">POWER SOURCES</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <!-- Solar Power -->
                    <div class="power-source active p-3 text-center">
                        <i class="fas fa-sun text-3xl mb-2 text-yellow-600"></i>
                        <p class="font-bold eink-text text-sm mb-1">SOLAR PANEL</p>
                        <p class="text-xs eink-text opacity-70 mb-1">Active</p>
                        <p class="text-xl font-bold segment-display text-green-700" id="solarPower">132.5W</p>
                    </div>

                    <!-- Manual Crank -->
                    <div class="power-source p-3 text-center" id="crankSource">
                        <i class="fas fa-cog text-3xl mb-2 text-orange-600"></i>
                        <p class="font-bold eink-text text-sm mb-1">HAND CRANK</p>
                        <p class="text-xs eink-text opacity-70 mb-1" id="crankStatusText">Standby</p>
                        <p class="text-xl font-bold segment-display eink-text" id="crankPower">0.0W</p>
                    </div>

                    <!-- Battery Storage -->
                    <div class="power-source p-3 text-center">
                        <i class="fas fa-battery-three-quarters text-3xl mb-2 text-blue-600"></i>
                        <p class="font-bold eink-text text-sm mb-1">BATTERY</p>
                        <p class="text-xs eink-text opacity-70 mb-1" id="batteryStatusText">Charging</p>
                        <p class="text-xl font-bold segment-display text-blue-700" id="batteryStatus">+2.3A</p>
                    </div>
                </div>
            </div>

            <!-- USAGE ANALYTICS -->
            <div class="border-t-2 border-gray-800 pt-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                    <div class="text-center eink-border rounded p-2 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-1">UPTIME</p>
                        <p class="text-lg font-bold segment-display eink-text" id="uptime">6.5 hrs</p>
                    </div>
                    <div class="text-center eink-border rounded p-2 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-1">TODAY</p>
                        <p class="text-lg font-bold segment-display eink-text" id="energyToday">3.45 kWh</p>
                    </div>
                    <div class="text-center eink-border rounded p-2 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-1">THIS WEEK</p>
                        <p class="text-lg font-bold segment-display eink-text" id="energyWeek">18.2 kWh</p>
                    </div>
                    <div class="text-center eink-border rounded p-2 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-1">EFFICIENCY</p>
                        <p class="text-lg font-bold segment-display eink-text" id="efficiency">87%</p>
                    </div>
                </div>

                <!-- Peak Usage -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="eink-border rounded p-3 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-2">PEAK USAGE TIME</p>
                        <p class="font-bold eink-text">12:00 PM - 2:00 PM</p>
                        <p class="text-xs eink-text opacity-70 mt-1">Average: 4 ports active</p>
                    </div>
                    <div class="eink-border rounded p-3 bg-white">
                        <p class="text-xs eink-text opacity-70 mb-2">SYSTEM STATUS</p>
                        <p class="font-bold text-green-700 text-lg" id="systemStatus">ONLINE</p>
                        <p class="text-xs eink-text opacity-70 mt-1">All systems operational</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MANUAL CRANK CONTROL -->
        <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 border-2 border-black">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Manual Crank Generator</h3>
                    <p class="text-gray-600">Activate emergency power generation</p>
                </div>
                <button id="crankToggle" class="px-8 py-4 bg-gradient-to-br from-stone-600 to-stone-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <i class="fas fa-cog mr-2"></i> ACTIVATE CRANK
                </button>
            </div>
            <div id="crankStatus" class="text-center py-4 hidden">
                <i class="fas fa-cog fa-spin text-6xl text-orange-500 mb-3"></i>
                <p class="text-xl font-bold text-orange-700">CRANKING IN PROGRESS...</p>
                <p class="text-sm text-gray-600 mt-2">Generating <span id="crankOutput">45W</span> of emergency power</p>
            </div>
        </div>

        <!-- ENVIRONMENTAL IMPACT -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gradient-to-br from-stone-700 to-stone-800 rounded-2xl p-5 text-white shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-cloud text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-xs opacity-80 mb-1">CO₂ Saved Today</p>
                        <p class="text-2xl font-bold">2.45 <span class="text-sm font-normal">kg</span></p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-yellow-800 to-yellow-900 rounded-2xl p-5 text-white shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-tree text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-xs opacity-80 mb-1">Trees Equivalent</p>
                        <p class="text-2xl font-bold">0.11 <span class="text-sm font-normal">trees</span></p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl p-5 text-white shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bolt text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-xs opacity-80 mb-1">Total Generated</p>
                        <p class="text-2xl font-bold">3.45 <span class="text-sm font-normal">kWh</span></p>
                    </div>
                </div>
            </div>
        </div>

    </main>

</div>

<script>
// Simulate real-time data updates
function updateDashboard() {
    // Battery simulation
    const currentBattery = parseInt(document.getElementById('batteryPercent').textContent);
    const newBattery = Math.min(100, Math.max(0, currentBattery + (Math.random() * 4 - 1)));
    document.getElementById('batteryPercent').textContent = Math.round(newBattery) + '%';
    document.getElementById('batteryBar').style.width = Math.round(newBattery) + '%';
    
    // Low battery warning
    const warningDiv = document.getElementById('lowBatteryWarning');
    if (newBattery < 20) {
        warningDiv.classList.remove('hidden');
    } else {
        warningDiv.classList.add('hidden');
    }
    
    // Voltage simulation
    const voltage = (12.0 + Math.random() * 0.8).toFixed(1);
    document.getElementById('voltage').textContent = voltage + 'V';
    
    // Charge/discharge rate simulation
    const isCharging = Math.random() > 0.3;
    const rate = (Math.random() * 3).toFixed(1);
    document.getElementById('chargeRate').textContent = (isCharging ? '+' : '-') + rate + 'A';
    document.getElementById('batteryStatusText').textContent = isCharging ? 'Charging' : 'Discharging';
    
    // Runtime estimation
    const runtime = (4 + Math.random() * 4).toFixed(1);
    document.getElementById('runtime').textContent = runtime + 'h';
    
    // Solar power simulation
    const solarPower = (100 + Math.random() * 50).toFixed(1);
    document.getElementById('solarPower').textContent = solarPower + 'W';
    
    // Total incoming watts
    const crankPower = parseFloat(document.getElementById('crankPower').textContent);
    const totalWatts = (parseFloat(solarPower) + crankPower).toFixed(1);
    document.getElementById('totalWatts').textContent = totalWatts + 'W';
    
    // Energy balance
    const consumption = 50 + Math.random() * 30; // Simulated consumption
    const balance = parseFloat(totalWatts) - consumption;
    const balancePercent = Math.min(100, Math.max(0, ((parseFloat(totalWatts) / 200) * 100)));
    document.getElementById('energyBalance').style.width = balancePercent + '%';
    document.getElementById('balanceText').textContent = balance > 0 ? 
        `Charging (+${balance.toFixed(0)}W)` : 
        `Discharging (${balance.toFixed(0)}W)`;
}

// Manual crank activation
let crankActive = false;
let crankInterval;

document.getElementById('crankToggle').addEventListener('click', function() {
    crankActive = !crankActive;
    const crankSource = document.getElementById('crankSource');
    const crankPower = document.getElementById('crankPower');
    const crankStatus = document.getElementById('crankStatus');
    const crankStatusText = document.getElementById('crankStatusText');
    const button = this;
    
    if (crankActive) {
        crankSource.classList.add('active');
        crankStatusText.textContent = 'Active';
        crankStatus.classList.remove('hidden');
        button.innerHTML = '<i class="fas fa-stop mr-2"></i> STOP CRANK';
        
        // Simulate cranking
        crankInterval = setInterval(() => {
            if (!crankActive) {
                clearInterval(crankInterval);
                return;
            }
            const power = (40 + Math.random() * 15).toFixed(1);
            crankPower.textContent = power + 'W';
            crankPower.classList.add('text-green-700');
            document.getElementById('crankOutput').textContent = power + 'W';
        }, 500);
    } else {
        crankSource.classList.remove('active');
        crankPower.textContent = '0.0W';
        crankPower.classList.remove('text-green-700');
        crankStatusText.textContent = 'Standby';
        crankStatus.classList.add('hidden');
        button.innerHTML = '<i class="fas fa-cog mr-2"></i> ACTIVATE CRANK';
        clearInterval(crankInterval);
    }
});

// Update dashboard every 3 seconds
setInterval(updateDashboard, 3000);

// Simulate port status changes
setInterval(() => {
    const ports = document.querySelectorAll('.port-indicator');
    if (Math.random() > 0.7) {
        ports.forEach(port => {
            if (Math.random() > 0.5) {
                port.classList.toggle('charging');
                port.classList.toggle('available');
            }
        });
    }
}, 10000);
</script>

</body>
</html>