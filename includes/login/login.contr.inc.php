<?php

declare(strict_types=1);

// Check fields are empty
function isEmpty(string $username, string $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

// Check username
function isCorrectUsername(object $conn, string $username)
{
    if (getUsername($conn, $username)) {
        return true;
    } else {
        return false;
    }
}
// Check user status
function isUserActive(object $conn, string $username)
{
    if (getUserStatus($conn, $username) == "1") {
        return true;
    } else {
        return false;
    }
}

// Check user type
function isUserAdmin(object $conn, string $username)
{
    if (getUserType($conn, $username) == "1") {
        return "admin";
    }if(getUserType($conn, $username) == "2"){
        return "user";
    }else {
        return false;
    }
}

function loginUser(object $conn, string $username, string $password)
{
    if (login($conn, $username, $password) == "1") {
        return "admin";
    } else if (login($conn, $username, $password) == "2") {
        return "user";
    }else{
        return false;
    }
}
?>