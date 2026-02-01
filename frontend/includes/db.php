<?php

$envPath = __DIR__ . '/../../ecobench-backend/.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; 
        list($name, $value) = explode('=', $line, 2);
        putenv(trim($name) . "=" . trim($value));
    }
}

$host   = getenv('DB_HOST') ?: "localhost";
$user   = getenv('DB_USER') ?: "root";
$pass   = getenv('DB_PASS') ?: ""; 
$dbname = getenv('DB_NAME') ?: "ecobench_db";

$con = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno()) {
    error_log("Connection failed: " . mysqli_connect_error());
    exit("System temporarily unavailable.");
}
?>