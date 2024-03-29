<?php
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





//view item master 
function viewItemMaster($conn, $limit, $page)
{
    $sql = "SELECT * FROM `itemsmaster` LIMIT $limit OFFSET " . ($page - 1) * $limit;
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




// item page function

function pagination($conn, $limit, $page)
{
    $sql = "SELECT COUNT(*) FROM `itemsmaster`";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $total_records = $row[0];
    $total_pages = ceil($total_records / $limit);


    $pageLink = "<div class='pagination'>";

    // Link for the first page
    if ($page > 1) {
        if ($page != 1) {
            $pageLink .= "<a href='item.php?page=" . ($page - 1) . "'>&laquo;</a>";
        }
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        $activeClass = ($page == $i) ? 'active' : '';
        $pageLink .= "<a class='$activeClass' href='item.php?page=" . $i . "'>" . $i . "</a>";
    }

    if ($page < $total_pages) {
        $pageLink .= "<a href='item.php?page=" . ($page + 1) . "'>&raquo;</a>";
    }

    echo $pageLink . "</div>";
}