<?php

// Require files
require '../DB/dbconfig.php';
require '../admin/loginfunction.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the form data
    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
    } else {
        // Call the login function
        $result = login($username, $password);

        // Check the login result
        if ($result) {
            // Redirect to the dashboard or any other page
            header("Location: ../dashboard.php");
            exit;
        } else {
            echo "Invalid username or password.";
        }
    }
}