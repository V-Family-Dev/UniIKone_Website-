<?php
require_once '../DB/dbconfig.php';
require_once '../functions/item/itemFunction.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addNewItem'])) {
    $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $price = $_POST['price'];
    $level_1 = $_POST['level_1'];
    $level_2 = $_POST['level_2'];
    $level_3 = $_POST['level_3'];
    $level_4 = $_POST['level_4'];
    $level_5 = $_POST['level_5'];
    $level_6 = $_POST['level_6'];

    if (empty($itemCode) || empty($itemName) || empty($price) || empty($level_1) || empty($level_2) || empty($level_3) || empty($level_4) || empty($level_5) || empty($level_6)) {
        header("Location: item.php?error=emptyfields");
        exit();
    } else {
        $dataadd = itemDataInsert($conn, $itemCode, $itemName, $commission, $price, $level_1, $level_2, $level_3, $level_4, $level_5, $level_6);
        if ($dataadd) {
            header("Location: item.php?success=itemadded");
            exit();
        }
    }
}
