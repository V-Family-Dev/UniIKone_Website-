<?php
require "../header/include.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteEmployee($id, $conn)) {
        header('Location: allempDetails.php'); // Redirect back to the employee list
    } else {
        // Handle failure - could not delete employee
    }
} else {
    // Handle error - ID not provided
}
?>