<?php

//view item master 
function viewItemMaster($conn)
{
    $sql = "SELECT * FROM `itemsmaster`";
    $result = $conn->query($sql);
    $itemdata = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itemdata[] = $row;
        }
    } else {
        echo "0 results";
    }
    return $itemdata;

    $conn->close();
}



//data add itemmaster
function itemDataInsert($conn, $itemCode, $itemName, $commission, $price, $level_1, $level_2, $level_3, $level_4, $level_5, $level_6)
{
    $sql = "INSERT INTO `itemsmaster` (`ItemCode`, `ItemName`, `Commission`, `Price`, `Level1`, `Level2`, `Level3`, `Level4`,`Level5`,`Level6`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdddddddd", $itemCode, $itemName, $commission, $price, $level_1, $level_2, $level_3, $level_4, $level_5, $level_6);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    return true;
}
