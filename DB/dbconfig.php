<?php

// Database connection
$hostname = "127.0.0.1";
$username = "root";
$password = "admin";
$dbname = "db_mlm";

$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// try {
//     $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
//     // Set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully"; 
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
?>
