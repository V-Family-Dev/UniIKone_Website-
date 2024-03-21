<?php

// Require files
require '../DB/dbconfig.php';
require '../functions/user/loginFunctions.php';

// Get username and password
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check username
    $checkUsername = checkUsername($conn, $username);
    if ($checkUsername == "0") {
        echo "Username does not exist";
    } else {
        // Check user status
        $checkUserStatus = checkUserStatus($conn, $username);
        if ($checkUserStatus == "0") {
            echo "User is not active";
        } else {
            // Check user login
            $checkUserLogin = checkUserLogin($conn, $username, $password);
            if ($checkUserLogin == "0") {
                echo "Incorrect password";
            } else {
                // Check user type
                $checkUserType = checkUserType($conn, $username);
                if ($checkUserType == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['loginType'] = 1;
                    header("Location:../Views/empDashboard.php");
                } else {
                    $_SESSION['username'] = $username;
                    $_SESSION['loginType'] = 2;
                    echo "user";
                }
            }
        }
    }
} else {
    echo "Invalid request";
}
?>