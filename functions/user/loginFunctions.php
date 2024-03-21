<?php

// Check username
function checkUsername($conn, $username) {
    $stmt = $conn->prepare("SELECT username FROM userlogin WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return "1";
    } else {
        return "0";
    }
}

// Check user status
function checkUserStatus($conn, $username) {
    $stmt = $conn->prepare("SELECT UserStatus FROM userlogin WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $row['UserStatus'];
        return $data == 1 ? "1" : "0";
    } else {
        return "0";
    }
}

// Check user type
function checkUserType($conn, $username) {
    $stmt = $conn->prepare("SELECT loginType FROM userlogin WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['loginType'];
    } else {
        return false;
    }
}

// Check user login
function checkUserLogin($conn, $username, $password) {
    if (checkUsername($conn, $username) == "1" && checkUserStatus($conn, $username) == "1") {
        $stmt = $conn->prepare("SELECT username FROM userlogin WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? "1" : "0";
    } else {
        return "0";
    }
}
?>