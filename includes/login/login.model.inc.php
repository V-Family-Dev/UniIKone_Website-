<?php

declare(strict_types=1);


// Check username
function getUsername(object $conn, string $username)
{
    $stmt = $conn->prepare("SELECT UserName FROM userlogin WHERE UserName = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// Check user status
function getUserStatus(object $conn, string $username)
{
    $stmt = $conn->prepare("SELECT UserStatus FROM userlogin WHERE UserName = :username");
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
function getUserType(object $conn, string $username)
{
    $stmt = $conn->prepare("SELECT loginType FROM userlogin WHERE UserName = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['loginType'];
    } else {
        return false;
    }
}

function login(object $conn, string $username, string $password)
{
    $stmt = $conn->prepare("SELECT UserName FROM userlogin WHERE UserName = :username AND password = :password");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->rowCount() > 0 ? "1" : "0";

    if ($user == "1") {
        $type = getUserType($conn, $username);
        if ($type == 1) {
            return "admin";
        } else if ($type == 2) {
            return "user";
        }
    }else{
        return false;
    }
}
