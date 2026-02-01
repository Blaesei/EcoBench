
#include <Wire.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>
#include <Adafruit_ADS1X15.h>


const char* WIFI_SSID = "YOUR_WIFI_NAME";        // ← CHANGE THIS
const char* WIFI_PASSWORD = "YOUR_WIFI_PASSWORD"; // ← CHANGE THIS


const char* API_URL = "http://192.168.1.100:8000/api/sensor-data"; // ← CHANGE IP



Adafruit_ADS1115 ads; 

// Pin Definitions
#define CURRENT_PIN 34  // ACS712 current sensor



float RESISTOR_RATIO = 1.0; 
float ZERO_POINT = 2.36; 
float BATTERY_MULTIPLIER = 12.5;
float SENSITIVITY = 0.100; // 20A Module
float NOISE_THRESHOLD = 0.20;



const float CURRENT_PER_PORT = 1.5; // Average current per active port

struct PortStatus {
  int portNumber;
  bool isActive;
  float estimatedCurrent;
  String deviceType;
  String status;
};



const unsigned long SEND_INTERVAL = 5000; // 5 seconds
unsigned long lastSendTime = 0;



void setup() {
  Serial.begin(115200);
  delay(1000);
  
  Serial.println("\n\n========================================");
  Serial.println("   ECOBENCH ESP32 - PORT DETECTION");
  Serial.println("========================================\n");
  
  pinMode(CURRENT_PIN, INPUT);
  Serial.println("✓ Current sensor initialized");
  
  Serial.print("Initializing ADS1115...");
  if (!ads.begin(0x48)) {
    Serial.println(" FAILED!");
    while (1) delay(1000);
  }
  Serial.println(" OK");
  
  connectWiFi();
  
  Serial.println("\n========================================");
  Serial.println("  SYSTEM READY");
  Serial.println("========================================\n");
}



void loop() {
  // Read sensors
  float batteryVolts = readBatteryVoltage();
  float totalCurrent = readCurrent();
  
  // Detect which ports are active
  PortStatus ports[4];
  detectActivePorts(totalCurrent, ports);
  
  // Display on Serial Monitor
  displayReadings(batteryVolts, totalCurrent, ports);
  
  // Send to backend every 5 seconds
  unsigned long currentTime = millis();
  if (currentTime - lastSendTime >= SEND_INTERVAL) {
    if (WiFi.status() == WL_CONNECTED) {
      sendDataToBackend(batteryVolts, totalCurrent, ports);
    } else {
      Serial.println("⚠ WiFi disconnected. Reconnecting...");
      connectWiFi();
    }
    lastSendTime = currentTime;
  }
  
  delay(500);
}



float readBatteryVoltage() {
  int16_t adc1 = ads.readADC_SingleEnded(1);
  float safeVolts = adc1 * 0.0001875;
  float batteryVolts = safeVolts * BATTERY_MULTIPLIER;
  return batteryVolts;
}



float readCurrent() {
  int rawCurrent = analogRead(CURRENT_PIN);
  float pinVoltage = (rawCurrent / 4095.0) * 3.3;
  float sensorOutputVoltage = pinVoltage * RESISTOR_RATIO;
  float amps = (sensorOutputVoltage - ZERO_POINT) / SENSITIVITY;
  
  if (abs(amps) < NOISE_THRESHOLD) {
    amps = 0.00;
  }
  
  return amps;
}



void detectActivePorts(float totalCurrent, PortStatus ports[]) {
  // Calculate how many ports are likely active
  int activePorts = 0;
  if (totalCurrent >= NOISE_THRESHOLD) {
    activePorts = (int)((totalCurrent / CURRENT_PER_PORT) + 0.5); // Round to nearest
    if (activePorts > 4) activePorts = 4; // Max 4 ports
  }
  
  // Define port types (alternating USB-C and Lightning for variety)
  String portTypes[4] = {"USB-C", "Lightning", "USB-C", "Lightning"};
  
  // Assign status to each port
  for (int i = 0; i < 4; i++) {
    ports[i].portNumber = i + 1;
    ports[i].deviceType = portTypes[i];
    
    if (i < activePorts) {
      // Port is active
      ports[i].isActive = true;
      ports[i].status = "CHARGING";
      
      // Distribute current among active ports
      ports[i].estimatedCurrent = totalCurrent / activePorts;
      
    } else {
      // Port is available
      ports[i].isActive = false;
      ports[i].status = "AVAILABLE";
      ports[i].estimatedCurrent = 0.0;
    }
  }
}



void displayReadings(float voltage, float totalCurrent, PortStatus ports[]) {
  float totalPower = voltage * abs(totalCurrent);
  
  Serial.println("╔═══════════════════════════════════════╗");
  Serial.println("║        ECOBENCH SENSOR STATUS        ║");
  Serial.println("╠═══════════════════════════════════════╣");
  
  Serial.print("║ Battery:      ");
  Serial.print(voltage, 1);
  Serial.println(" V                    ║");
  
  Serial.print("║ Total Current: ");
  Serial.print(totalCurrent, 2);
  Serial.println(" A                   ║");
  
  Serial.print("║ Total Power:   ");
  Serial.print(totalPower, 1);
  Serial.println(" W                    ║");
  
  Serial.println("╠═══════════════════════════════════════╣");
  Serial.println("║           CHARGING PORTS              ║");
  Serial.println("╠═══════════════════════════════════════╣");
  
  int activeCount = 0;
  for (int i = 0; i < 4; i++) {
    if (ports[i].isActive) activeCount++;
    
    Serial.print("║ PORT ");
    Serial.print(ports[i].portNumber);
    Serial.print(" (");
    Serial.print(ports[i].deviceType);
    Serial.print(")");
    
    // Padding
    int padding = 12 - ports[i].deviceType.length();
    for (int p = 0; p < padding; p++) Serial.print(" ");
    
    if (ports[i].isActive) {
      Serial.print("⚡ ");
      Serial.print(ports[i].estimatedCurrent, 1);
      Serial.print("A     ║");
    } else {
      Serial.print("○ Ready        ║");
    }
    Serial.println();
  }
  
  Serial.println("╠═══════════════════════════════════════╣");
  Serial.print("║ Active Ports: ");
  Serial.print(activeCount);
  Serial.print(" / 4");
  Serial.println("                    ║");
  Serial.println("╚═══════════════════════════════════════╝");
  Serial.println();
}



void connectWiFi() {
  Serial.print("Connecting to WiFi: ");
  Serial.println(WIFI_SSID);
  
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  
  int attempts = 0;
  while (WiFi.status() != WL_CONNECTED && attempts < 30) {
    delay(500);
    Serial.print(".");
    attempts++;
  }
  Serial.println();
  
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("✓ WiFi Connected!");
    Serial.print("IP Address: ");
    Serial.println(WiFi.localIP());
  } else {
    Serial.println("✗ WiFi Failed!");
  }
}



void sendDataToBackend(float voltage, float totalCurrent, PortStatus ports[]) {
  HTTPClient http;
  
  // Create comprehensive JSON payload
  StaticJsonDocument<512> doc;
  
  // Basic measurements
  doc["voltage"] = round(voltage * 100) / 100.0;
  doc["current"] = round(totalCurrent * 100) / 100.0;
  
  // Port information
  JsonArray portsArray = doc.createNestedArray("ports");
  
  for (int i = 0; i < 4; i++) {
    JsonObject port = portsArray.createNestedObject();
    port["port_number"] = ports[i].portNumber;
    port["device_type"] = ports[i].deviceType;
    port["is_active"] = ports[i].isActive;
    port["status"] = ports[i].status;
    port["current"] = round(ports[i].estimatedCurrent * 100) / 100.0;
    
    // Add voltage and specs if active
    if (ports[i].isActive) {
      port["voltage"] = 5.0; // USB standard
      port["power"] = round((5.0 * ports[i].estimatedCurrent) * 10) / 10.0;
    }
  }
  
  // Statistics
  int activeCount = 0;
  for (int i = 0; i < 4; i++) {
    if (ports[i].isActive) activeCount++;
  }
  
  doc["active_ports"] = activeCount;
  doc["available_ports"] = 4 - activeCount;
  
  String jsonString;
  serializeJson(doc, jsonString);
  
  // Send POST request
  http.begin(API_URL);
  http.addHeader("Content-Type", "application/json");
  http.setTimeout(3000);
  
  Serial.println("→ Sending to Python backend...");
  
  int httpCode = http.POST(jsonString);
  
  if (httpCode > 0) {
    if (httpCode == 200) {
      Serial.println("✓ Data sent successfully!");
      
      String response = http.getString();
      
      // Parse response
      StaticJsonDocument<512> responseDoc;
      DeserializationError error = deserializeJson(responseDoc, response);
      
      if (!error) {
        Serial.println("← Server Response:");
        Serial.print("   Battery: ");
        Serial.print(responseDoc["battery_percentage"].as<int>());
        Serial.println("%");
        Serial.print("   Status: ");
        Serial.println(responseDoc["status"].as<const char*>());
      }
    } else {
      Serial.print("✗ HTTP Error: ");
      Serial.println(httpCode);
    }
  } else {
    Serial.println("✗ Connection failed!");
  }
  
  http.end();
  Serial.println();
}