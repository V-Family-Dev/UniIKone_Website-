<?php

// Get6 the username and password from the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Require files
        require_once '../../DB/dbconfig.php';        
        require_once '../../includes/config_session.inc.php';
        require_once '../../includes/login/login.contr.inc.php';
        require_once '../../includes/login/login.model.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (isEmpty($username, $password)) {
            $errors["empty_inputs"] = "Please fill in all fields!";
        }
        if (!isCorrectUsername($conn, $username)) {
            $errors["incorrect_username"] = "Incorrect username!";
        }
        
        if (!isUserActive($conn, $username)) {
            $errors["inactive_user"] = "User is inactive!";
        }
        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION['login_errors'] = $errors;
            header("Location: ../../index.php");
            die();
        }

        $usertype = loginUser($conn, $username, $password);
        if ($usertype == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;
            header("Location: ../views/adminDashboard.php?login=success");
        } else if ($usertype == "user") {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;
            header("Location: ../views/userDashboard.php");
        } else {
            $errors["incorrect_password"] = "Incorrect password!";
            $_SESSION['login_errors'] = $errors;
            header("Location: ../../index.php");
        }

        $conn = null;
        $stmt = null;
        die();
        // login user

    } catch (PDOException $e) {
        die("Query failed! " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    exit();
}
