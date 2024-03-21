<?php

// Database connection
$hostname = "127.0.0.1";
$username = "root";
$password = "ABandara2001";
$dbname = "db_mlm";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
