<?php

require_once '../sales/user/salesFunction.php';
require_once '../DB/dbconfig.php';





if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['neworder']) {
    $empid = $_POST['getempdata'];
    $contactPerson = $_POST['contact-person'];
    $contactNo = $_POST['contact-no'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $salesDate = $_POST['sales-date'];
    $dueDate = $_POST['due-date'];
    $howManyItems = $_POST['hdata'];
    $empidErr = false;
    $contactPersonErr = false;
    $contactNoErr = false;
    $dueDateErr = false;
    $salesDateErr = false;
    $hasErrors = false;
    $howMdata = array();
    $userdata = array();

    if (empty($empid)) {
        $empidErr = true;
    } else {
        $empid = datamake($empid);
    }
    if (empty($contactPerson)) {
        $contactPersonErr = true;
    } else {
        $contactPerson = datamake($contactPerson);
    }
    if (empty($contactNo)) {
        $contactNoErr = true;
    } else {
        $contactNo = datamake($contactNo);
    }
    if (empty($city)) {
        $city = "";
    } else {
        $city = datamake($city);
    }
    if (empty($address)) {
        $address = "";
    } else {
        $address = datamake($address);
    }

    if (empty($salesDate)) {
        $salesDateErr = true;
    } else {
        $salesDate = datamake($salesDate);
    }
    if (empty($dueDate)) {
        $dueDateErr = true;
    } else {
        $dueDate = datamake($dueDate);
    }
    if ($empidErr || $contactPersonErr || $contactNoErr || $dueDateErr || $salesDateErr) {
        $hasErrors = true;
        echo "Error in form submission";
    }

    if (!$hasErrors) {
        $userdata[] = array(
            'empid' => $empid,
            'contactPerson' => $contactPerson,
            'contactNo' => $contactNo,
            'city' => $city,
            'address' => $address,
            'salesDate' => $salesDate,
            'dueDate' => $dueDate
        );
        for ($i = 1; $i <= $howManyItems; $i++) {


            if (
                isset($_POST["selectitem"][$i - 1], $_POST["item-name-$i"], $_POST["price-$i"]) &&
                !empty($_POST["item-name-$i"]) && !empty($_POST["price-$i"])
            ) {
                $itemCode = $_POST["selectitem"][$i - 1];

                $itemName = $_POST["item-name-$i"];
                $quantity = $_POST["quantity-$i"];
                $price = $_POST["price-$i"];

                $howMdata[] = array(
                    'itemCode' => $itemCode,
                    'itemName' => $itemName,
                    'quantity' => $quantity,
                    'price' => $price
                );
            }
        }

        sOrderADD($conn, $userdata, $howMdata);
    } else {
        echo "Error in form submission";
    }
}
