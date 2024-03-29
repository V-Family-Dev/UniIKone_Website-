<?php

// Database connection
$hostname = "127.0.0.1:3308";
$username = "root";
$password = "admin";
$dbname = "db_mlm_ori";

try {
    $conn = new mysqli($hostname, $username, $password, $dbname);
    // Set the PDO error mode to exception
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else { ?>
        <script>
            console.log("Connected successfully");
        </script>
<?php
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>