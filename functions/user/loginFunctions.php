<?php

// Check username
function checkUsername($conn, $username)
{
    $stmt = $conn->prepare("SELECT username FROM userlogin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "1";
    } else {
        return "0";
    }
}

// Check user status
function checkUserStatus($conn, $username)
{
    $stmt = $conn->prepare("SELECT UserStatus FROM userlogin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data = $row['UserStatus'];
        if ($data == 1) {
            return "1";
        } else {
            return "0";
        }
    } else {
        return "0";
    }
}

// Check user type
function checkUserType($conn, $username)
{
    $stmt = $conn->prepare("SELECT loginType FROM userlogin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $loginType = $row['loginType'];
        return $loginType;        
    } else {
        return false;
    }
}

// Check user login
function checkUserLogin($conn, $username, $password){
    $stmt = $conn->prepare("SELECT username FROM userlogin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();    

    
    if($result->num_rows > 0 && checkUserStatus($conn, $username) == "1"){
        $stmt = $conn->prepare("SELECT username, password FROM userlogin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return "1";
        } else {
            return "0";
        }
    } else {
        return "0";
    }
}
?>