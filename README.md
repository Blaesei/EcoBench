# 🌿 EcoBench - Sustainable Solar Charging Bench

A solar-powered charging bench with IoT monitoring, featuring real-time energy tracking, manual backup power generation, and web-based dashboard visualization.

## 📋 Project Overview

**Institution:** Polytechnic University of the Philippines - Institute of Technology  
**Program:** Diploma in Computer Engineering Technology  
**Course:** Research Project  

### Team Members
- Jigs C. Lactao
- Mariem O. Manato
- Audrey Nicole Q. Mesa
- Marcus Cedric S. Pedrosa
- Quinn Harvey G. Pineda

## ✨ Features

- ⚡ **Solar Power Generation** - 300W monocrystalline panel
- 🔋 **Battery Storage** - 300Ah LiFePO4 battery bank
- 🔌 **Multi-Port Charging** - USB-C and Lightning ports
- 📱 **IoT Monitoring** - Real-time web dashboard
- 🖐️ **Manual Backup** - Hand crank generator
- 🌐 **Web Dashboard** - Real-time energy monitoring
- 📊 **Data Analytics** - Daily/weekly energy statistics

## 🏗️ System Architecture
```
Solar Panel → Charge Controller → Battery → Buck Converter → Charging Ports
                                     ↓
                              ESP32 Sensors
                                     ↓
                           Python Backend (FastAPI)
                                     ↓
                              MySQL Database
                                     ↓
                            PHP Web Dashboard
```

## 🛠️ Hardware Components

- ESP32 DevKit V1 (30-pin)
- ADS1115 ADC Module (16-bit)
- ACS712 Current Sensor (20A)
- 2.9" E-Ink Display
- LM2596 Buck Converter
- 300W Solar Panel
- 300Ah LiFePO4 Battery
- Manual Crank Generator

## 💻 Tech Stack

### Backend
- **Python 3.9+** - FastAPI framework
- **MySQL 8.0** - Database
- **SQLAlchemy** - ORM
- **Pydantic** - Data validation

### Frontend
- **PHP 8.x** - Server-side logic
- **JavaScript** - Real-time updates
- **Tailwind CSS** - Styling
- **Chart.js** - Data visualization

### Firmware
- **Arduino/C++** - ESP32 programming
- **Adafruit Libraries** - Sensor integration
- **ArduinoJson** - Data formatting

## 🚀 Quick Start

### Prerequisites
- Python 3.9 or higher
- MySQL 8.0 or higher
- PHP 8.0 or higher
- Arduino IDE 2.0 or higher
- Git

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/YOUR_USERNAME/EcoBench.git
cd EcoBench
```

2. **Setup Database**
```bash
mysql -u root -p < backend/setup_database.sql
```

3. **Setup Python Backend**
```bash
cd backend
python -m venv venv
venv\Scripts\activate  # Windows
source venv/bin/activate  # Mac/Linux
pip install -r requirements.txt
cp .env.example .env
# Edit .env with your configuration
uvicorn app.main:app --reload
```

4. **Setup PHP Frontend**
```bash
cd frontend
cp includes/db.php.example includes/db.php
# Edit db.php with your database credentials
php -S localhost:8080
```

5. **Upload ESP32 Firmware**
- Open `firmware/EcoBench_Firmware/EcoBench_Firmware.ino` in Arduino IDE
- Update WiFi credentials and API URL
- Upload to ESP32

### Access the Dashboard

- **Dashboard:** http://localhost:8080/dashboard.php
- **Python API Docs:** http://localhost:8000/docs
- **Default Admin Login:** admin / (your password)

## 📖 Documentation

- [Setup Guide](docs/SETUP.md) - Detailed installation instructions
- [Hardware Assembly](docs/HARDWARE.md) - Circuit diagrams and wiring
- [API Documentation](docs/API.md) - Backend API reference
- [Troubleshooting](docs/TROUBLESHOOTING.md) - Common issues and solutions

## 🔌 API Endpoints

### Sensor Data
```
POST /api/sensor-data
GET  /api/status/current
GET  /api/energy/daily
GET  /api/energy/weekly
GET  /api/battery/status
GET  /api/crank/status
```

See [API.md](docs/API.md) for detailed documentation.

## 📊 Database Schema

- **users** - User authentication
- **sensor_readings** - Raw ESP32 data
- **daily_aggregates** - Daily statistics
- **system_status** - Current system state

## 🧪 Testing

### Backend Tests
```bash
cd backend
python test_api.py
```

### Manual Testing
1. Access Swagger UI: http://localhost:8000/docs
2. Test endpoints with sample data
3. Verify MySQL storage

