<?php

 // Database connection
    $hostname="127.0.0.1";
    $username="root";
    $passwod="ABandara2001";
    $dbname="db_mlm";

    $conn= new mysqli($hostname,$username,$passwod,$dbname);
    if ($conn->connect_error) {
        die("Database connection error " . $conn->connect_error);
    }
    echo "Database connection successful";   
?>