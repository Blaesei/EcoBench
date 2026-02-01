<?php
session_start();
// Protect the dashboard - redirect to signin if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../public/signin.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

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
                <!-- Logo Section with Creative Design -->
                <div class="logo-container mb-8">
                    <div class="logo-wrapper">
                        <img src="../assets/img/EcoBench Logo.png" alt="EcoBench Logo" class="ecobench-logo">
                        <div class="logo-glow"></div>
                        <div class="logo-particles">
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                        </div>
                    </div>
                    <p class="logo-tagline">Sustainable Energy Solutions</p>
                </div>

                <nav class="space-y-2 flex-1">
                    <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <i class="fas fa-chart-line w-5"></i>
                        <span>Dashboard</span>
                    </a>                    
                    <a href="users.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User Management</span>
                    </a>
                </nav>

                <div class="mt-auto pt-6 border-t border-white/20">
                    <a href="../logout.php" class="nav-item logout flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 lg:ml-64 p-6 md:p-8">

            <!-- HEADER -->
            <div class="mb-8 header-section">
                <div class="flex items-center gap-4 mb-4">
                    <div>
                        <h1 class="text-4xl font-bold gradient-text mb-2">EcoBench Monitoring System Dashboard</h1>
                        <p class="text-gray-600 text-sm font-medium">Real-time monitoring and status display</p>
                    </div>
                </div>
                <div class="status-badges">
                    <div class="status-badge status-online">
                        <i class="fas fa-circle pulse-dot"></i>
                        <span>System Online</span>
                    </div>
                    <div class="status-badge">
                        <i class="fas fa-clock"></i>
                        <span id="currentTime">--:--:--</span>
                    </div>
                    <div class="status-badge">
                        <i class="fas fa-calendar"></i>
                        <span id="currentDate">-- -- --</span>
                    </div>
                </div>
            </div>

            <!-- LOW BATTERY WARNING -->
            <div id="lowBatteryWarning" class="warning-alert rounded-lg p-4 mb-6 hidden">
                <div class="flex items-center gap-3">
                    <i class="fas fa-exclamation-triangle text-orange-600 text-3xl warning-icon"></i>
                    <div>
                        <p class="font-bold text-orange-900 text-lg">LOW BATTERY WARNING</p>
                        <p class="text-sm text-orange-800">Battery level below 20%. Enable manual crank or wait for solar charging to resume.</p>
                    </div>
                    <button onclick="document.getElementById('lowBatteryWarning').classList.add('hidden')" class="ml-auto text-orange-600 hover:text-orange-800">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- E-INK STYLE MAIN DISPLAY -->
            <div class="eink-display mb-8">
                <!-- Header -->
                <div class="eink-header">
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-bold eink-text mb-2">PUP INSTITUTE OF TECHNOLOGY</h2>
                        <p class="text-sm eink-text opacity-70 tracking-widest">SUSTAINABLE ENERGY BENCH SYSTEM</p>
                        <div class="eink-divider"></div>
                    </div>
                </div>

                <!-- Main Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

                    <!-- COLUMN 1: BATTERY & VOLTAGE -->
                    <div class="eink-card">
                        <h3 class="eink-section-title">
                            <i class="fas fa-battery-three-quarters"></i>
                            BATTERY STATUS
                        </h3>

                        <div class="battery-main-display">
                            <div class="battery-percentage-large" id="batteryPercentLarge">78%</div>
                            <div class="battery-status-text" id="batteryMainStatus">CHARGING</div>
                        </div>

                        <div class="battery-visual">
                            <div class="battery-container">
                                <div class="battery-level-fill" id="batteryBarMain"></div>
                                <div class="battery-segments">
                                    <div class="segment"></div>
                                    <div class="segment"></div>
                                    <div class="segment"></div>
                                    <div class="segment"></div>
                                </div>
                                <i class="fas fa-bolt battery-icon"></i>
                            </div>
                            <div class="battery-terminal"></div>
                        </div>

                        <div class="metric-grid">
                            <div class="metric-box">
                                <div class="metric-label">VOLTAGE</div>
                                <div class="metric-value" id="voltageDisplay">12.4V</div>
                            </div>
                            <div class="metric-box">
                                <div class="metric-label">CAPACITY</div>
                                <div class="metric-value" id="capacityDisplay">8.5Ah</div>
                            </div>
                        </div>
                    </div>

                    <!-- COLUMN 2: POWER FLOW -->
                    <div class="eink-card">
                        <h3 class="eink-section-title">
                            <i class="fas fa-bolt"></i>
                            POWER METRICS
                        </h3>

                        <div class="power-display-main">
                            <div class="power-label">TOTAL INCOMING POWER</div>
                            <div class="power-value-huge" id="totalWattsBig">132.5W</div>
                        </div>

                        <div class="metric-grid mb-4">
                            <div class="metric-box highlight">
                                <div class="metric-label">CHARGE RATE</div>
                                <div class="metric-value text-green-700" id="chargeRateDisplay">+2.3A</div>
                            </div>
                            <div class="metric-box highlight">
                                <div class="metric-label">RUNTIME</div>
                                <div class="metric-value text-blue-700" id="runtimeDisplay">6.2h</div>
                            </div>
                        </div>

                        <div class="energy-balance-section">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs eink-text font-bold">ENERGY BALANCE</span>
                                <span class="text-xs eink-text font-bold" id="balanceValue">+65W</span>
                            </div>
                            <div class="energy-balance-bar">
                                <div class="balance-fill" id="balanceFill"></div>
                                <div class="balance-indicator" id="balanceIndicator">
                                    <div class="indicator-arrow"></div>
                                </div>
                            </div>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs eink-text opacity-60">Discharge</span>
                                <span class="text-xs eink-text opacity-60">Neutral</span>
                                <span class="text-xs eink-text opacity-60">Charge</span>
                            </div>
                            <p class="text-sm eink-text mt-2 text-center font-semibold" id="balanceStatusText">System Charging Normally</p>
                        </div>
                    </div>

                    <!-- COLUMN 3: CHARGING PORTS -->
                    <div class="eink-card">
                        <h3 class="eink-section-title">
                            <i class="fas fa-plug"></i>
                            CHARGING PORTS
                        </h3>

                        <div class="ports-summary mb-4">
                            <div class="port-stat">
                                <span class="port-stat-number" id="portsActive">2</span>
                                <span class="port-stat-label">Active</span>
                            </div>
                            <div class="port-stat">
                                <span class="port-stat-number" id="portsAvailable">2</span>
                                <span class="port-stat-label">Available</span>
                            </div>
                        </div>

                        <div class="ports-list">
                            <div class="port-item port-charging">
                                <div class="port-indicator"></div>
                                <div class="port-info">
                                    <div class="port-name">PORT 1</div>
                                    <div class="port-type">USB-C</div>
                                </div>
                                <div class="port-stats">
                                    <div class="port-status">CHARGING</div>
                                    <div class="port-specs">5.0V / 2.1A</div>
                                </div>
                            </div>

                            <div class="port-item port-available">
                                <div class="port-indicator"></div>
                                <div class="port-info">
                                    <div class="port-name">PORT 2</div>
                                    <div class="port-type">Lightning</div>
                                </div>
                                <div class="port-stats">
                                    <div class="port-status">AVAILABLE</div>
                                    <div class="port-specs">Ready</div>
                                </div>
                            </div>

                            <div class="port-item port-charging">
                                <div class="port-indicator"></div>
                                <div class="port-info">
                                    <div class="port-name">PORT 3</div>
                                    <div class="port-type">USB-C</div>
                                </div>
                                <div class="port-stats">
                                    <div class="port-status">CHARGING</div>
                                    <div class="port-specs">5.0V / 1.8A</div>
                                </div>
                            </div>

                            <div class="port-item port-available">
                                <div class="port-indicator"></div>
                                <div class="port-info">
                                    <div class="port-name">PORT 4</div>
                                    <div class="port-type">Lightning</div>
                                </div>
                                <div class="port-stats">
                                    <div class="port-status">AVAILABLE</div>
                                    <div class="port-specs">Ready</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- POWER SOURCES -->
                <div class="eink-divider my-6"></div>

                <h3 class="eink-section-title mb-4">
                    <i class="fas fa-solar-panel"></i>
                    POWER SOURCES
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="power-source-card active" id="solarCard">
                        <div class="power-source-icon">
                            <i class="fas fa-sun"></i>
                        </div>
                        <div class="power-source-name">SOLAR PANEL</div>
                        <div class="power-source-status">Active</div>
                        <div class="power-source-value" id="solarPowerDisplay">132.5W</div>
                        <div class="power-source-graph">
                            <div class="graph-bar" style="height: 85%"></div>
                            <div class="graph-bar" style="height: 92%"></div>
                            <div class="graph-bar" style="height: 78%"></div>
                            <div class="graph-bar" style="height: 88%"></div>
                            <div class="graph-bar" style="height: 95%"></div>
                        </div>
                    </div>

                    <div class="power-source-card" id="crankCard">
                        <div class="power-source-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="power-source-name">HAND CRANK</div>
                        <div class="power-source-status" id="crankStatus">Standby</div>
                        <div class="power-source-value" id="crankPowerDisplay">0.0W</div>
                        <div class="crank-detector">
                            <i class="fas fa-microchip"></i>
                            <span>Motion Sensor: Idle</span>
                        </div>
                    </div>

                    <div class="power-source-card">
                        <div class="power-source-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="power-source-name">BATTERY BANK</div>
                        <div class="power-source-status" id="batteryBankStatus">Charging</div>
                        <div class="power-source-value" id="batteryCurrentDisplay">+2.3A</div>
                        <div class="battery-health">
                            <div class="health-label">Health</div>
                            <div class="health-bar">
                                <div class="health-fill" style="width: 94%"></div>
                            </div>
                            <div class="health-percent">94%</div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTION ANALYTICS -->
                <div class="eink-divider my-6"></div>

                <h3 class="eink-section-title mb-4">
                    <i class="fas fa-chart-bar"></i>
                    PRODUCTION ANALYTICS
                </h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
                    <div class="analytics-box">
                        <div class="analytics-icon"><i class="fas fa-clock"></i></div>
                        <div class="analytics-label">UPTIME</div>
                        <div class="analytics-value" id="uptimeDisplay">6.5 hrs</div>
                    </div>
                    <div class="analytics-box">
                        <div class="analytics-icon"><i class="fas fa-calendar-day"></i></div>
                        <div class="analytics-label">TODAY</div>
                        <div class="analytics-value" id="energyTodayDisplay">3.45 kWh</div>
                    </div>
                    <div class="analytics-box">
                        <div class="analytics-icon"><i class="fas fa-calendar-week"></i></div>
                        <div class="analytics-label">THIS WEEK</div>
                        <div class="analytics-value" id="energyWeekDisplay">18.2 kWh</div>
                    </div>
                    <div class="analytics-box">
                        <div class="analytics-icon"><i class="fas fa-tachometer-alt"></i></div>
                        <div class="analytics-label">EFFICIENCY</div>
                        <div class="analytics-value" id="efficiencyDisplay">87%</div>
                    </div>
                </div>

                <!-- DAILY CHART -->
                <div class="chart-section mb-4">
                    <h4 class="chart-title">24-HOUR PRODUCTION CHART</h4>
                    <div class="production-chart">
                        <div class="chart-bar" style="height: 45%"><span class="chart-time">00</span></div>
                        <div class="chart-bar" style="height: 38%"><span class="chart-time">02</span></div>
                        <div class="chart-bar" style="height: 42%"><span class="chart-time">04</span></div>
                        <div class="chart-bar" style="height: 58%"><span class="chart-time">06</span></div>
                        <div class="chart-bar" style="height: 75%"><span class="chart-time">08</span></div>
                        <div class="chart-bar" style="height: 88%"><span class="chart-time">10</span></div>
                        <div class="chart-bar" style="height: 95%"><span class="chart-time">12</span></div>
                        <div class="chart-bar" style="height: 92%"><span class="chart-time">14</span></div>
                        <div class="chart-bar" style="height: 78%"><span class="chart-time">16</span></div>
                        <div class="chart-bar" style="height: 52%"><span class="chart-time">18</span></div>
                        <div class="chart-bar" style="height: 35%"><span class="chart-time">20</span></div>
                        <div class="chart-bar" style="height: 30%"><span class="chart-time">22</span></div>
                    </div>
                </div>

                <!-- PEAK USAGE & SYSTEM STATUS -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="info-panel">
                        <div class="info-icon"><i class="fas fa-chart-line"></i></div>
                        <div class="info-content">
                            <div class="info-label">PEAK USAGE TIME</div>
                            <div class="info-value">12:00 PM - 2:00 PM</div>
                            <div class="info-detail">Average: 4 ports active • 15.2W consumed</div>
                        </div>
                    </div>
                    <div class="info-panel">
                        <div class="info-icon system-ok"><i class="fas fa-check-circle"></i></div>
                        <div class="info-content">
                            <div class="info-label">SYSTEM STATUS</div>
                            <div class="info-value status-online-text" id="systemStatusText">ONLINE</div>
                            <div class="info-detail">All systems operational • No errors detected</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MANUAL CRANK CONTROL -->
            <div class="control-panel mb-8">
                <div class="control-header">
                    <div class="control-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div>
                        <h3 class="control-title">Manual Crank Generator</h3>
                        <p class="control-subtitle">Activate emergency power generation system</p>
                    </div>
                    <button id="crankToggle" class="crank-button">
                        <i class="fas fa-cog mr-2"></i>
                        <span id="crankButtonText">ACTIVATE CRANK</span>
                    </button>
                </div>
                <div id="crankActiveStatus" class="crank-active-display hidden">
                    <div class="crank-animation">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>
                    <div class="crank-info">
                        <p class="crank-status-text">CRANKING IN PROGRESS...</p>
                        <p class="crank-output">Generating <span id="crankOutputValue">45W</span> of emergency power</p>
                        <div class="crank-metrics">
                            <div class="crank-metric">
                                <i class="fas fa-bolt"></i>
                                <span>Output: <strong id="crankInstantOutput">45W</strong></span>
                            </div>
                            <div class="crank-metric">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>RPM: <strong id="crankRPM">120</strong></span>
                            </div>
                            <div class="crank-metric">
                                <i class="fas fa-stopwatch"></i>
                                <span>Duration: <strong id="crankDuration">0:00</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ENVIRONMENTAL IMPACT -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="impact-card impact-carbon">
                    <div class="impact-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="impact-content">
                        <p class="impact-label">CO₂ Saved Today</p>
                        <p class="impact-value">2.45 <span class="impact-unit">kg</span></p>
                        <div class="impact-bar">
                            <div class="impact-fill" style="width: 73%"></div>
                        </div>
                    </div>
                </div>

                <div class="impact-card impact-trees">
                    <div class="impact-icon">
                        <i class="fas fa-tree"></i>
                    </div>
                    <div class="impact-content">
                        <p class="impact-label">Trees Equivalent</p>
                        <p class="impact-value">0.11 <span class="impact-unit">trees</span></p>
                        <div class="impact-bar">
                            <div class="impact-fill" style="width: 45%"></div>
                        </div>
                    </div>
                </div>

                <div class="impact-card impact-energy">
                    <div class="impact-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="impact-content">
                        <p class="impact-label">Total Generated</p>
                        <p class="impact-value">3.45 <span class="impact-unit">kWh</span></p>
                        <div class="impact-bar">
                            <div class="impact-fill" style="width: 86%"></div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>

    <script src="../assets/js/dashboard.js"></script>

</body>

</html>