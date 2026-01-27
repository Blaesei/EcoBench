import requests
import json
from datetime import datetime

# Configuration
API_BASE_URL = "http://localhost:8000"

def test_health_check():
    print("Testing health check...")
    response = requests.get(f"{API_BASE_URL}/")
    print(f"Status: {response.status_code}")
    print(f"Response: {response.json()}\n")
    return response.status_code == 200

def test_sensor_data_submission():
    print("Testing sensor data submission...")
    
    test_data = {
        "voltage": 12.8,
        "current": 3.5
    }
    
    response = requests.post(
        f"{API_BASE_URL}/api/sensor-data",
        json=test_data
    )
    
    print(f"Status: {response.status_code}")
    print(f"Response: {json.dumps(response.json(), indent=2)}\n")
    return response.status_code == 200

def test_current_status():
    print("Testing current status endpoint...")
    
    response = requests.get(f"{API_BASE_URL}/api/status/current")
    print(f"Status: {response.status_code}")
    print(f"Response: {json.dumps(response.json(), indent=2, default=str)}\n")
    return response.status_code == 200

def test_daily_energy():
    print("Testing daily energy endpoint...")
    
    response = requests.get(f"{API_BASE_URL}/api/energy/daily")
    print(f"Status: {response.status_code}")
    print(f"Response: {json.dumps(response.json(), indent=2, default=str)}\n")
    return response.status_code == 200

def test_hourly_energy():
    print("Testing hourly energy endpoint...")
    
    response = requests.get(f"{API_BASE_URL}/api/energy/hourly")
    print(f"Status: {response.status_code}")
    print(f"Hourly data points: {len(response.json())}\n")
    return response.status_code == 200

def test_weekly_energy():
    print("Testing weekly energy endpoint...")
    
    response = requests.get(f"{API_BASE_URL}/api/energy/weekly")
    print(f"Status: {response.status_code}")
    print(f"Response: {json.dumps(response.json(), indent=2)}\n")
    return response.status_code == 200

def test_battery_status():
    print("Testing battery status endpoint...")
    
    response = requests.get(f"{API_BASE_URL}/api/battery/status")
    print(f"Status: {response.status_code}")
    print(f"Response: {json.dumps(response.json(), indent=2)}\n")
    return response.status_code == 200

def test_crank_status():
    print("Testing crank status endpoint...")
    
    response = requests.get(f"{API_BASE_URL}/api/crank/status")
    print(f"Status: {response.status_code}")
    print(f"Response: {json.dumps(response.json(), indent=2)}\n")
    return response.status_code == 200

def run_all_tests():
    print("=" * 60)
    print("EcoBench API Test Suite")
    print("=" * 60 + "\n")
    
    tests = [
        ("Health Check", test_health_check),
        ("Sensor Data Submission", test_sensor_data_submission),
        ("Current Status", test_current_status),
        ("Daily Energy", test_daily_energy),
        ("Hourly Energy", test_hourly_energy),
        ("Weekly Energy", test_weekly_energy),
        ("Battery Status", test_battery_status),
        ("Crank Status", test_crank_status),
    ]
    
    results = []
    for name, test_func in tests:
        try:
            success = test_func()
            results.append((name, success))
        except Exception as e:
            print(f"❌ Error in {name}: {str(e)}\n")
            results.append((name, False))
    
    # Print summary
    print("=" * 60)
    print("Test Summary")
    print("=" * 60)
    for name, success in results:
        status = "✅ PASS" if success else "❌ FAIL"
        print(f"{status} - {name}")
    
    total = len(results)
    passed = sum(1 for _, success in results if success)
    print(f"\nTotal: {passed}/{total} tests passed")

if __name__ == "__main__":
    run_all_tests()