<?php
require_once '../includes/db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Get current system status
$query = "SELECT * FROM system_status WHERE id = 1";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    
    echo json_encode([
        'success' => true,
        'data' => [
            'battery_percentage' => (int)$data['battery_percentage'],
            'system_voltage' => (float)$data['system_voltage'],
            'total_incoming_watts' => (float)$data['total_incoming_watts'],
            'charge_rate' => (float)$data['charge_rate'],
            'discharge_rate' => (float)$data['discharge_rate'],
            'estimated_runtime' => (float)$data['estimated_runtime'],
            'energy_balance' => (float)$data['energy_balance'],
            'is_crank_active' => (bool)$data['is_crank_active'],
            'low_battery_warning' => (bool)$data['low_battery_warning'],
            'status' => $data['status'],
            'last_update' => $data['last_update']
        ]
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No sensor data available'
    ]);
}

mysqli_close($con);
?>