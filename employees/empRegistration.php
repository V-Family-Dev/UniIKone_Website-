<?php
require "../DB/dbconfig.php";
require "../functions/employee/employeesFunctions.php";


$newEmpNumber = getNewEmployeeNumber($conn);
$firstNameErr = $lastNameErr = $nicErr = $employeeNumberErr = $refNumberErr = $primaryNumberErr = $secondNumberErr = $addressErr = $joinDateErr = $townErr = $provinceErr = $postalcodeErr = $refNumberErr = $bankNameErr = $bankCodeErr = $branchNameErr = $branchCodeErr = $accountHolderNameErr = $accountNumberErr = "";
$firstName = $lastName = $nic = $employeeNumber = $refNumber = $primaryNumber = $secondNumber = $address = $joindate = $town = $province = $postalcode = $refNumber = $bankName = $bankCode = $branchName = $branchCode = $accountHolderName = $accountNumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First Name is required";
    } else {
        $firstName = test_input($_POST["firstName"]);
    }
    if (empty($_POST["lastName"])) {
        $lastName = "";
    } else {
        $lastName = test_input($_POST["lastName"]);
    }
    if (empty($_POST["nic"])) {
        $nicErr = "NIC is required";
    } else {
        $nic = test_input($_POST["nic"]);
    }
    if (empty($_POST["employeeNumber"])) {
        $employeeNumberErr = "Employee Number is required";
    } else {
        $employeeNumber = test_input($_POST["employeeNumber"]);
    }
    if (empty($_POST["refNumber"])) {
        $refNumber = "";
    } else {
        $refNumber = test_input($_POST["refNumber"]);
    }
    if (empty($_POST["primaryNumber"])) {
        $primaryNumber = "";
    } else {
        $primaryNumber = test_input($_POST["primaryNumber"]);
    }
    if (empty($_POST["secondaryNumber"])) {
        $secondNumber = "";
    } else {
        $secondNumber = test_input($_POST["secondaryNumber"]);
    }
    if (empty($_POST["address"])) {
        $address = "";
    } else {
        $address = test_input($_POST["address"]);
    }
    if (empty($_POST["joinDate"])) {
        $joindate ="";
    } else {
        $joindate = test_input( $_POST["joinDate"]);
    }
    if (empty($_POST["town"])) {
        $town = "";
    } else {
        $town = test_input($_POST["town"]);
    }
    if (empty($_POST["province"])) {
        $province = "";
    } else {
        $province = test_input($_POST["province"]);
    }
    if (empty($_POST["postalCode"])) {
        $postalcode = "";
    } else {
        $postalcode = test_input($_POST["postalCode"]);
    }

    if (empty($_POST["bankName"])) {
        $bankName = "";
    } else {
        $bankName = test_input($_POST["bankName"]);
    }
    if (empty($_POST["bankCode"])) {
        $bankCode = "";
    } else {
        $bankCode = test_input($_POST["bankCode"]);
    }

    if (empty($_POST["branchName"])) {
        $branchName = "";
    } else {
        $branchName = test_input($_POST["branchName"]);
    }
    if (empty($_POST["branchCode"])) {
        $branchCode = "";
    } else {
        $branchCode = test_input($_POST["branchCode"]);
    }
    if (empty($_POST["accountHolderName"])) {
        $accountHolderName = "";
    } else {
        $accountHolderName = test_input($_POST["accountHolderName"]);
    }
    if (empty($_POST["accountNumber"])) {
        $accountNumber = "";
    } else {
        $accountNumber = test_input($_POST["accountNumber"]);
    }
}


try {
    insertEmployee($conn, $firstName, $lastName, $nic, $employeeNumber, $refNumber, $primaryNumber, $secondNumber, $town, $province, $postalcode, $accountNumber, $bankName, $bankCode, $branchName, $branchCode, $joindate, $address, $accountHolderName);
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}


?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value=""><?php echo $firstNameErr; ?><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value=""><br>

    <label for="nic">NIC:</label>
    <input type="text" id="nic" name="nic" value=""><?php echo $nicErr; ?><br>

    <label for="employeeNumber">Employee Number:</label>
    <input type="text" id="employeeNumber" name="employeeNumber" value="<?php echo $newEmpNumber; ?>" readonly><br>

    <label for="refNumber">Ref Number:</label>
    <input type="text" id="refNumber" name="refNumber"><br>

    <label for="primaryNumber">Primary Number</label>
    <input type="text" id="primaryNumber" name="primaryNumber" value=""><br>

    <label for="secondaryNumber">Secondary Number</label>
    <input type="text" id="secondaryNumber" name="secondaryNumber" value=""><br>

    <label for="address">Address</label>
    <textarea id="address" name="address" rows="4" cols="50"></textarea><br>

    <label for="joinDate">Join Date</label>
    <input type="date" id="joinDate" name="joinDate" value=""><br>

    <label for="town">Town</label>
    <input type="text" id="town" name="town" value=""><br>

    <label for="province">Province</label>
    <select id="province" name="province">
        <option value="">Select a province</option>
        <option value="Central">Central</option>
        <option value="Eastern">Eastern</option>
        <option value="North Central">North Central</option>
        <option value="Northern">Northern</option>
        <option value="North Western">North Western</option>
        <option value="Sabaragamuwa">Sabaragamuwa</option>
        <option value="Southern">Southern</option>
        <option value="Uva">Uva</option>
        <option value="Western">Western</option>
    </select><br>
    <label for="postalCode">Postal Code</label>
    <input type="text" id="postalCode" name="postalCode" value=""><br>




    <p>bank details</p>

    <label for="bankName">Bank Name:</label>
    <input type="text" id="bankName" name="bankName" value=""><br>

    <label for="bankCode">Bank Code:</label>
    <input type="text" id="bankCode" name="bankCode" value=""><br>

    <label for="branchName">Branch Name:</label>
    <input type="text" id="branchName" name="branchName" value=""><br>

    <label for="branchCode">Branch Code:</label>
    <input type="text" id="branchCode" name="branchCode" value=""><br>

    <label for="accountHolderName">Account Holder Name:</label>
    <input type="text" id="accountHolderName" name="accountHolderName" value=""><br>

    <label for="accountNumber">Account Number:</label>
    <input type="text" id="accountNumber" name="accountNumber" value=""><br>






    <!-- Other form fields -->

    <input type="submit" name="submit" value="Submit">
</form>


<?php
?>