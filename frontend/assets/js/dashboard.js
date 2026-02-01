// ===================================
// ECOBENCH DASHBOARD JAVASCRIPT
// Real-time data integration with Python backend
// ===================================

// Global variables
let crankActive = false;
let crankInterval = null;
let crankStartTime = null;
let updateInterval = null;

// API Configuration
const API_BASE_URL = '/api';
const UPDATE_INTERVAL = 5000; // 5 seconds

// ===================================
// DATE AND TIME DISPLAY
// ===================================

function updateDateTime() {
    const now = new Date();
    
    // Update time
    const timeString = now.toLocaleTimeString('en-US', { 
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit',
        hour12: false 
    });
    const timeEl = document.getElementById('currentTime');
    if (timeEl) timeEl.textContent = timeString;
    
    // Update date
    const dateString = now.toLocaleDateString('en-US', { 
        month: 'short', 
        day: 'numeric', 
        year: 'numeric' 
    });
    const dateEl = document.getElementById('currentDate');
    if (dateEl) dateEl.textContent = dateString;
}

// ===================================
// FETCH REAL DATA FROM BACKEND
// ===================================

async function fetchSensorData() {
    try {
        const response = await fetch(`${API_BASE_URL}/get_current_status.php`);
        const result = await response.json();
        
        if (result.success && result.data) {
            updateDashboardWithRealData(result.data);
        } else {
            console.warn('No sensor data available:', result.message);
            // Keep using simulated data or show message
            showNoDataMessage();
        }
    } catch (error) {
        console.error('Error fetching sensor data:', error);
        // Fallback to simulation if API fails
        console.log('Using simulated data as fallback');
    }
}

// ===================================
// UPDATE DASHBOARD WITH REAL DATA
// ===================================

function updateDashboardWithRealData(data) {
    // BATTERY STATUS
    const batteryPercent = data.battery_percentage || 0;
    const voltage = data.system_voltage || 0;
    
    updateElement('batteryPercentLarge', batteryPercent + '%');
    updateElement('voltageDisplay', voltage.toFixed(1) + 'V');
    
    const batteryBar = document.getElementById('batteryBarMain');
    if (batteryBar) batteryBar.style.width = batteryPercent + '%';
    
    // Battery status text
    const isCharging = data.charge_rate > 0;
    const batteryStatusEl = document.getElementById('batteryMainStatus');
    if (batteryStatusEl) {
        batteryStatusEl.textContent = isCharging ? 'CHARGING' : 'STANDBY';
        batteryStatusEl.style.color = isCharging ? '#16a34a' : '#6b7280';
    }
    
    // Low battery warning
    const warningDiv = document.getElementById('lowBatteryWarning');
    if (warningDiv) {
        if (data.low_battery_warning || batteryPercent < 20) {
            warningDiv.classList.remove('hidden');
        } else {
            warningDiv.classList.add('hidden');
        }
    }
    
    // POWER METRICS
    const totalWatts = data.total_incoming_watts || 0;
    updateElement('totalWattsBig', totalWatts.toFixed(1) + 'W');
    updateElement('solarPowerDisplay', totalWatts.toFixed(1) + 'W');
    
    // Charge rate
    const chargeRate = data.charge_rate || 0;
    const chargeRateEl = document.getElementById('chargeRateDisplay');
    if (chargeRateEl) {
        chargeRateEl.textContent = (chargeRate > 0 ? '+' : '') + chargeRate.toFixed(1) + 'A';
        chargeRateEl.style.color = chargeRate > 0 ? '#16a34a' : '#6b7280';
    }
    
    // Runtime
    const runtime = data.estimated_runtime || 0;
    updateElement('runtimeDisplay', runtime.toFixed(1) + 'h');
    
    // Capacity (calculate from battery percentage and capacity)
    const capacity = ((batteryPercent / 100) * 300).toFixed(1); // 300Ah battery
    updateElement('capacityDisplay', capacity + 'Ah');
    
    // ENERGY BALANCE
    const balance = data.energy_balance || 0;
    const consumption = Math.abs(balance < 0 ? balance : 0);
    const netBalance = balance;
    
    // Balance bar (0-100% scale, 50% = neutral)
    const balancePercent = Math.min(100, Math.max(0, 50 + (netBalance / 2)));
    
    const balanceFill = document.getElementById('balanceFill');
    if (balanceFill) balanceFill.style.width = balancePercent + '%';
    
    const balanceIndicator = document.getElementById('balanceIndicator');
    if (balanceIndicator) balanceIndicator.style.left = balancePercent + '%';
    
    updateElement('balanceValue', (netBalance > 0 ? '+' : '') + netBalance.toFixed(0) + 'W');
    
    // Balance status text
    let balanceText = '';
    let balanceColor = '';
    if (netBalance > 20) {
        balanceText = 'System Charging Normally';
        balanceColor = '#16a34a';
    } else if (netBalance > 0) {
        balanceText = 'Low Charge Rate';
        balanceColor = '#f59e0b';
    } else {
        balanceText = 'Battery Discharging';
        balanceColor = '#dc2626';
    }
    
    const balanceStatusEl = document.getElementById('balanceStatusText');
    if (balanceStatusEl) {
        balanceStatusEl.textContent = balanceText;
        balanceStatusEl.style.color = balanceColor;
    }
    
    // CRANK STATUS
    const crankIsActive = data.is_crank_active || false;
    const crankStatusEl = document.getElementById('crankStatus');
    const crankPowerEl = document.getElementById('crankPowerDisplay');
    const crankCard = document.getElementById('crankCard');
    
    if (crankIsActive) {
        if (crankCard) crankCard.classList.add('active');
        if (crankStatusEl) {
            crankStatusEl.textContent = 'Active';
            crankStatusEl.style.color = '#16a34a';
        }
        // Estimate crank power (when active, assume it contributes to total power)
        const estimatedCrankPower = (totalWatts * 0.3).toFixed(1); // Assume 30% contribution
        if (crankPowerEl) {
            crankPowerEl.textContent = estimatedCrankPower + 'W';
            crankPowerEl.style.color = '#16a34a';
        }
    } else {
        if (crankCard) crankCard.classList.remove('active');
        if (crankStatusEl) {
            crankStatusEl.textContent = 'Standby';
            crankStatusEl.style.color = '';
        }
        if (crankPowerEl) {
            crankPowerEl.textContent = '0.0W';
            crankPowerEl.style.color = '';
        }
    }
    
    // BATTERY BANK STATUS
    const batteryBankStatusEl = document.getElementById('batteryBankStatus');
    if (batteryBankStatusEl) {
        batteryBankStatusEl.textContent = isCharging ? 'Charging' : 'Standby';
    }
    
    const batteryCurrentEl = document.getElementById('batteryCurrentDisplay');
    if (batteryCurrentEl) {
        batteryCurrentEl.textContent = (chargeRate > 0 ? '+' : '') + chargeRate.toFixed(1) + 'A';
    }
    
    // SYSTEM STATUS
    const systemStatusEl = document.getElementById('systemStatusText');
    if (systemStatusEl) {
        systemStatusEl.textContent = data.status ? data.status.toUpperCase() : 'ONLINE';
    }
    
    // Update analytics incrementally (keeping your animation logic)
    updateAnalytics(totalWatts, chargeRate);
}

// ===================================
// HELPER FUNCTIONS
// ===================================

function updateElement(id, value) {
    const element = document.getElementById(id);
    if (element) {
        element.textContent = value;
    }
}

function showNoDataMessage() {
    // Show message that Python backend might not be running
    console.warn('No sensor data available. Make sure Python backend is running on port 8000');
    
    // Optionally update UI to show "Waiting for data..."
    updateElement('totalWattsBig', '--W');
    updateElement('batteryPercentLarge', '--%');
    updateElement('voltageDisplay', '--V');
}

// ===================================
// ANALYTICS UPDATE (INCREMENTAL)
// ===================================

function updateAnalytics(currentPower, chargeRate) {
    // Uptime - increment by update interval
    const uptimeEl = document.getElementById('uptimeDisplay');
    if (uptimeEl) {
        const currentUptime = parseFloat(uptimeEl.textContent) || 0;
        const incrementHours = (UPDATE_INTERVAL / 1000 / 3600); // Convert ms to hours
        uptimeEl.textContent = (currentUptime + incrementHours).toFixed(1) + ' hrs';
    }
    
    // Energy today - increment based on current power
    const energyTodayEl = document.getElementById('energyTodayDisplay');
    if (energyTodayEl) {
        const currentEnergy = parseFloat(energyTodayEl.textContent) || 0;
        const incrementKWh = (currentPower * UPDATE_INTERVAL / 1000 / 3600 / 1000); // W * hours -> kWh
        energyTodayEl.textContent = (currentEnergy + incrementKWh).toFixed(2) + ' kWh';
    }
    
    // Energy week
    const energyWeekEl = document.getElementById('energyWeekDisplay');
    if (energyWeekEl) {
        const currentWeek = parseFloat(energyWeekEl.textContent) || 18.2;
        const incrementWeek = (currentPower * UPDATE_INTERVAL / 1000 / 3600 / 1000);
        energyWeekEl.textContent = (currentWeek + incrementWeek).toFixed(1) + ' kWh';
    }
    
    // Efficiency (based on charge rate vs capacity)
    const efficiencyEl = document.getElementById('efficiencyDisplay');
    if (efficiencyEl) {
        const maxChargeRate = 30; // 30A max from config
        const efficiency = Math.min(100, Math.max(50, (chargeRate / maxChargeRate) * 100));
        efficiencyEl.textContent = efficiency.toFixed(0) + '%';
    }
}

// ===================================
// PORT STATUS RANDOMIZATION (Keep your original logic)
// ===================================

function randomizePortStatus() {
    const ports = document.querySelectorAll('.port-item');
    
    if (Math.random() > 0.7 && ports.length > 0) {
        const randomPort = ports[Math.floor(Math.random() * ports.length)];
        
        if (randomPort.classList.contains('port-charging')) {
            randomPort.classList.remove('port-charging');
            randomPort.classList.add('port-available');
            const statusEl = randomPort.querySelector('.port-status');
            const specsEl = randomPort.querySelector('.port-specs');
            if (statusEl) statusEl.textContent = 'AVAILABLE';
            if (specsEl) specsEl.textContent = 'Ready';
        } else {
            randomPort.classList.remove('port-available');
            randomPort.classList.add('port-charging');
            const statusEl = randomPort.querySelector('.port-status');
            const specsEl = randomPort.querySelector('.port-specs');
            if (statusEl) statusEl.textContent = 'CHARGING';
            const voltage = (5.0).toFixed(1);
            const current = (1.5 + Math.random() * 1.0).toFixed(1);
            if (specsEl) specsEl.textContent = `${voltage}V / ${current}A`;
        }
        
        // Update port counts
        const activePorts = document.querySelectorAll('.port-item.port-charging').length;
        const availablePorts = document.querySelectorAll('.port-item.port-available').length;
        updateElement('portsActive', activePorts);
        updateElement('portsAvailable', availablePorts);
    }
}

// ===================================
// MANUAL CRANK CONTROL (Keep your original logic)
// ===================================

function toggleCrank() {
    crankActive = !crankActive;
    
    const crankCard = document.getElementById('crankCard');
    const crankStatus = document.getElementById('crankStatus');
    const crankPowerDisplay = document.getElementById('crankPowerDisplay');
    const crankActiveStatus = document.getElementById('crankActiveStatus');
    const crankButton = document.getElementById('crankToggle');
    const crankButtonText = document.getElementById('crankButtonText');
    
    if (crankActive) {
        // Activate crank
        if (crankCard) crankCard.classList.add('active');
        if (crankStatus) {
            crankStatus.textContent = 'Active';
            crankStatus.style.color = '#16a34a';
        }
        if (crankActiveStatus) crankActiveStatus.classList.remove('hidden');
        if (crankButton) crankButton.classList.add('active');
        if (crankButtonText) crankButtonText.textContent = 'STOP CRANK';
        
        crankStartTime = Date.now();
        
        crankInterval = setInterval(() => {
            if (!crankActive) {
                clearInterval(crankInterval);
                return;
            }
            
            const power = (35 + Math.random() * 20).toFixed(1);
            if (crankPowerDisplay) {
                crankPowerDisplay.textContent = power + 'W';
                crankPowerDisplay.style.color = '#16a34a';
            }
            updateElement('crankOutputValue', power + 'W');
            updateElement('crankInstantOutput', power + 'W');
            
            const rpm = Math.floor(100 + Math.random() * 50);
            updateElement('crankRPM', rpm);
            
            const duration = Math.floor((Date.now() - crankStartTime) / 1000);
            const minutes = Math.floor(duration / 60);
            const seconds = duration % 60;
            updateElement('crankDuration', `${minutes}:${seconds.toString().padStart(2, '0')}`);
        }, 500);
        
    } else {
        // Deactivate crank
        if (crankCard) crankCard.classList.remove('active');
        if (crankStatus) {
            crankStatus.textContent = 'Standby';
            crankStatus.style.color = '';
        }
        if (crankPowerDisplay) {
            crankPowerDisplay.textContent = '0.0W';
            crankPowerDisplay.style.color = '';
        }
        if (crankActiveStatus) crankActiveStatus.classList.add('hidden');
        if (crankButton) crankButton.classList.remove('active');
        if (crankButtonText) crankButtonText.textContent = 'ACTIVATE CRANK';
        
        if (crankInterval) {
            clearInterval(crankInterval);
            crankInterval = null;
        }
    }
}

// ===================================
// INITIALIZATION
// ===================================

document.addEventListener('DOMContentLoaded', function() {
    console.log('EcoBench Dashboard initializing...');
    
    // Update date and time immediately and every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
    
    // Fetch real sensor data immediately
    fetchSensorData();
    
    // Update dashboard with real data every 5 seconds
    updateInterval = setInterval(fetchSensorData, UPDATE_INTERVAL);
    
    // Randomize port status every 10 seconds
    setInterval(randomizePortStatus, 10000);
    
    // Attach crank toggle event
    const crankToggleButton = document.getElementById('crankToggle');
    if (crankToggleButton) {
        crankToggleButton.addEventListener('click', toggleCrank);
    }
    
    // Animate production chart bars on load
    const chartBars = document.querySelectorAll('.chart-bar');
    chartBars.forEach((bar, index) => {
        setTimeout(() => {
            bar.style.transition = 'height 0.8s ease';
        }, index * 50);
    });
    
    console.log('EcoBench Dashboard initialized - fetching real sensor data every 5 seconds');
    console.log('API Endpoint:', `${API_BASE_URL}/get_current_status.php`);
});