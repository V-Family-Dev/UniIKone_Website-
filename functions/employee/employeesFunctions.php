<?php

// generate new employeenumber
function getNewEmployeeNumber($conn)
{
    $sql = "SELECT EmpNumber FROM employees ORDER BY EmpNumber DESC LIMIT 1;";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastEmpNumber = $row['EmpNumber'];

        $prefix = 'USD'; // Constant prefix
        $numberPart = ltrim(substr($lastEmpNumber, strlen($prefix)), '0'); // Remove leading zeros
        $number = $numberPart === '' ? 0 : intval($numberPart); // Handle the case where $numberPart is empty
        $number++;

        // Determine new length of number part
        $newNumberLength = strlen((string)$number);

        // Pad the number if it's shorter than 4 digits
        if ($newNumberLength < 4) {
            $formattedNumber = str_pad($number, 4, "0", STR_PAD_LEFT);
        } else {
            $formattedNumber = (string)$number;
        }

        // Concatenate back to get the new employee number
        $newEmpNumber = $prefix . $formattedNumber;

        return $newEmpNumber;
    } else {
        // Handle the case where there are no employees
        return 'USD0001';
    }
}


function getempId($conn)
{
    $sql = "SELECT EmpNumber FROM employees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       $empNumber=[];
        while ($row = $result->fetch_assoc()) {
           $empNumber[]=$row;
        }
    }

    return $empNumber;
}

// validation and Sanitization 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// add new emp
function insertEmployee($conn, $firstName, $lastName, $nic, $employeeNumber, $refNumber, $primaryNumber, $secondNumber, $town, $province, $postalcode, $accountNum, $bankName, $bankCode, $branchName, $branchCode, $joindate, $address, $accountHolderName)
{
    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO employees (FirstName, LastName, NIC, EmpNumber, Ref, Phone, HouseNumber, City, Province, PostalCode, AccountNum, BankName, BankCode, BranchName, BranchCode, JoinedDate, Address, nameinbank) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if preparation is successful
    if ($stmt === false) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssssssssssssssss", $firstName, $lastName, $nic, $employeeNumber, $refNumber, $primaryNumber, $secondNumber, $town, $province, $postalcode, $accountNum, $bankName, $bankCode, $branchName, $branchCode, $joindate, $address, $accountHolderName);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// get all the emp details
function getAllEmployees($conn)
{
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    $employees = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
        $result->free();
    } else {
        // Handle error - the query failed
    }

    $conn->close();
    return $employees;
}

// delete the emp
function deleteEmployee($id, $conn)
{
    $sql = "UPDATE employees SET EmpStatus = 0 WHERE idEmployees = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        return true; // Indicate success
    } else {
        // Handle error - failed to prepare statement
        return false; // Indicate failure
    }
}

function gellAllbanckCode($conn)
{
    $sql = "SELECT bankcode,bankname from bankcodes;";

    $result = $conn->query($sql);
    $bankDetails = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bankDetails[] = $row;
        }
    }

    return $bankDetails;
}

function gellAllbranchCode($conn)
{
    $sql = "SELECT branchcode,branchname from branchcodes;";

    $result = $conn->query($sql);
    $branchcodes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $branchcodes[] = $row;
        }
    }

    return $branchcodes;
}

