// ===================================
// ECOBENCH DASHBOARD JAVASCRIPT
// ===================================

// Global variables
let crankActive = false;
let crankInterval = null;
let crankStartTime = null;
let updateInterval = null;

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
    document.getElementById('currentTime').textContent = timeString;
    
    // Update date
    const dateString = now.toLocaleDateString('en-US', { 
        month: 'short', 
        day: 'numeric', 
        year: 'numeric' 
    });
    document.getElementById('currentDate').textContent = dateString;
}

// ===================================
// DASHBOARD DATA SIMULATION
// ===================================

function updateDashboard() {
    // Get current battery percentage
    const batteryPercentText = document.getElementById('batteryPercentLarge').textContent;
    const currentBattery = parseInt(batteryPercentText);
    
    // Simulate battery change (slight increase if charging, decrease if discharging)
    const isCharging = Math.random() > 0.2; // 80% chance of charging
    const batteryChange = isCharging ? (Math.random() * 2) : -(Math.random() * 0.5);
    const newBattery = Math.min(100, Math.max(0, currentBattery + batteryChange));
    const batteryRounded = Math.round(newBattery);
    
    // Update battery displays
    document.getElementById('batteryPercentLarge').textContent = batteryRounded + '%';
    const batteryBar = document.getElementById('batteryBarMain');
    batteryBar.style.width = batteryRounded + '%';
    
    // Update battery status text
    const batteryStatusText = isCharging ? 'CHARGING' : 'DISCHARGING';
    document.getElementById('batteryMainStatus').textContent = batteryStatusText;
    document.getElementById('batteryMainStatus').style.color = isCharging ? '#16a34a' : '#dc2626';
    
    // Low battery warning
    const warningDiv = document.getElementById('lowBatteryWarning');
    if (batteryRounded < 20) {
        warningDiv.classList.remove('hidden');
    } else {
        warningDiv.classList.add('hidden');
    }
    
    // Update voltage (12V system with slight variations)
    const voltage = (12.0 + Math.random() * 0.8).toFixed(1);
    document.getElementById('voltageDisplay').textContent = voltage + 'V';
    
    // Update capacity
    const capacity = (8.0 + Math.random() * 1.0).toFixed(1);
    document.getElementById('capacityDisplay').textContent = capacity + 'Ah';
    
    // Update charge/discharge rate
    const rate = (Math.random() * 3).toFixed(1);
    const chargeRateDisplay = document.getElementById('chargeRateDisplay');
    chargeRateDisplay.textContent = (isCharging ? '+' : '-') + rate + 'A';
    chargeRateDisplay.style.color = isCharging ? '#16a34a' : '#dc2626';
    
    // Update runtime
    const runtime = (4 + Math.random() * 4).toFixed(1);
    document.getElementById('runtimeDisplay').textContent = runtime + 'h';
    
    // Update solar power
    const hour = new Date().getHours();
    let solarMultiplier = 0;
    if (hour >= 6 && hour < 18) {
        // Daytime - simulate solar curve
        const noon = 12;
        const distFromNoon = Math.abs(hour - noon);
        solarMultiplier = Math.max(0, 1 - (distFromNoon / 6)) * (0.8 + Math.random() * 0.2);
    }
    const solarPower = (solarMultiplier * 150).toFixed(1);
    document.getElementById('solarPowerDisplay').textContent = solarPower + 'W';
    
    // Update total incoming power
    const crankPower = parseFloat(document.getElementById('crankPowerDisplay').textContent) || 0;
    const totalWatts = (parseFloat(solarPower) + crankPower).toFixed(1);
    document.getElementById('totalWattsBig').textContent = totalWatts + 'W';
    
    // Update energy balance
    const consumption = 50 + Math.random() * 30; // Simulated consumption
    const balance = parseFloat(totalWatts) - consumption;
    const balancePercent = Math.min(100, Math.max(0, 50 + (balance / 2)));
    
    document.getElementById('balanceFill').style.width = balancePercent + '%';
    document.getElementById('balanceIndicator').style.left = balancePercent + '%';
    document.getElementById('balanceValue').textContent = (balance > 0 ? '+' : '') + balance.toFixed(0) + 'W';
    
    // Update balance status text
    let balanceText = '';
    let balanceColor = '';
    if (balance > 20) {
        balanceText = 'System Charging Normally';
        balanceColor = '#16a34a';
    } else if (balance > 0) {
        balanceText = 'Low Charge Rate';
        balanceColor = '#f59e0b';
    } else {
        balanceText = 'Battery Discharging';
        balanceColor = '#dc2626';
    }
    document.getElementById('balanceStatusText').textContent = balanceText;
    document.getElementById('balanceStatusText').style.color = balanceColor;
    
    // Update battery bank status
    document.getElementById('batteryBankStatus').textContent = isCharging ? 'Charging' : 'Discharging';
    document.getElementById('batteryCurrentDisplay').textContent = (isCharging ? '+' : '-') + rate + 'A';
    
    // Update port count
    const activePorts = document.querySelectorAll('.port-item.port-charging').length;
    const availablePorts = document.querySelectorAll('.port-item.port-available').length;
    document.getElementById('portsActive').textContent = activePorts;
    document.getElementById('portsAvailable').textContent = availablePorts;
    
    // Update analytics values with slight variations
    const currentUptime = parseFloat(document.getElementById('uptimeDisplay').textContent) || 6.5;
    document.getElementById('uptimeDisplay').textContent = (currentUptime + 0.017).toFixed(1) + ' hrs'; // ~1 min per update
    
    const currentEnergyToday = parseFloat(document.getElementById('energyTodayDisplay').textContent) || 3.45;
    document.getElementById('energyTodayDisplay').textContent = (currentEnergyToday + 0.01).toFixed(2) + ' kWh';
    
    const currentEnergyWeek = parseFloat(document.getElementById('energyWeekDisplay').textContent) || 18.2;
    document.getElementById('energyWeekDisplay').textContent = (currentEnergyWeek + 0.01).toFixed(1) + ' kWh';
    
    const efficiency = (85 + Math.random() * 5).toFixed(0);
    document.getElementById('efficiencyDisplay').textContent = efficiency + '%';
}

// ===================================
// PORT STATUS RANDOMIZATION
// ===================================

function randomizePortStatus() {
    const ports = document.querySelectorAll('.port-item');
    
    // Randomly change one port status
    if (Math.random() > 0.7) {
        const randomPort = ports[Math.floor(Math.random() * ports.length)];
        
        if (randomPort.classList.contains('port-charging')) {
            randomPort.classList.remove('port-charging');
            randomPort.classList.add('port-available');
            randomPort.querySelector('.port-status').textContent = 'AVAILABLE';
            randomPort.querySelector('.port-specs').textContent = 'Ready';
        } else {
            randomPort.classList.remove('port-available');
            randomPort.classList.add('port-charging');
            randomPort.querySelector('.port-status').textContent = 'CHARGING';
            const voltage = (5.0).toFixed(1);
            const current = (1.5 + Math.random() * 1.0).toFixed(1);
            randomPort.querySelector('.port-specs').textContent = `${voltage}V / ${current}A`;
        }
    }
}

// ===================================
// MANUAL CRANK CONTROL
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
        crankCard.classList.add('active');
        crankStatus.textContent = 'Active';
        crankStatus.style.color = '#16a34a';
        crankActiveStatus.classList.remove('hidden');
        crankButton.classList.add('active');
        crankButtonText.textContent = 'STOP CRANK';
        
        crankStartTime = Date.now();
        
        // Simulate cranking with varying power output
        crankInterval = setInterval(() => {
            if (!crankActive) {
                clearInterval(crankInterval);
                return;
            }
            
            // Random power between 35W and 55W
            const power = (35 + Math.random() * 20).toFixed(1);
            crankPowerDisplay.textContent = power + 'W';
            crankPowerDisplay.style.color = '#16a34a';
            document.getElementById('crankOutputValue').textContent = power + 'W';
            document.getElementById('crankInstantOutput').textContent = power + 'W';
            
            // Random RPM between 100 and 150
            const rpm = Math.floor(100 + Math.random() * 50);
            document.getElementById('crankRPM').textContent = rpm;
            
            // Update duration
            const duration = Math.floor((Date.now() - crankStartTime) / 1000);
            const minutes = Math.floor(duration / 60);
            const seconds = duration % 60;
            document.getElementById('crankDuration').textContent = 
                `${minutes}:${seconds.toString().padStart(2, '0')}`;
        }, 500);
        
    } else {
        // Deactivate crank
        crankCard.classList.remove('active');
        crankStatus.textContent = 'Standby';
        crankStatus.style.color = '';
        crankPowerDisplay.textContent = '0.0W';
        crankPowerDisplay.style.color = '';
        crankActiveStatus.classList.add('hidden');
        crankButton.classList.remove('active');
        crankButtonText.textContent = 'ACTIVATE CRANK';
        
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
    // Update date and time immediately and every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
    
    // Update dashboard immediately
    updateDashboard();
    
    // Update dashboard every 3 seconds
    updateInterval = setInterval(updateDashboard, 3000);
    
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
    
    console.log('EcoBench Dashboard initialized successfully');
});