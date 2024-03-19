<?php

function login($username, $password) {
    // Read the credentials from the JSON file
    $credentials = json_decode(file_get_contents('credentials.json'), true);

    // Check if the provided username exists in the credentials
    if (isset($credentials[$username])) {
        // Verify the password
        if ($credentials[$username]['password'] === $password) {
            // Login successful
            return true;
        }
    }

    // Login failed
    return false;
}