<?php


function get_dataorder($conn)
{
    $data = array();
    $getdata = $conn->prepare("SELECT * FROM `salesorders`");
    $getdata->execute();
    $result = $getdata->get_result();
    while ($row = $result->fetch_assoc()) {
        $data[] = ['sonumber' => $row['SONumber'], 'salesdate' => $row['SalesDate'], 'duedate' => $row['DueDate'], 'contactname' => $row['ContactName'], 'contactno' => $row['ContactNo'], 'empno' => $row['EmpNo'], 'address' => $row['address'], 'itemqty' => $row['ItemQty'], 'city' => $row['City']];
    }
    $getdata->close();
    return $data;
}









//form validation and sanitization
function sOrderADD($conn, $data1, $data2)
{
    //first get user data 
    foreach ($data1 as $row) {
        $empid = $row['empid'];
        $contactPerson = $row['contactPerson'];
        $contactNo = $row['contactNo'];
        $city = $row['city'];
        $address = $row['address'];
        $salesDate = $row['salesDate'];
        $dueDate = $row['dueDate'];

        foreach ($data2 as $row) {
            $itemcode = $row['itemCode'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $total = $quantity * $price;
            $adddatasalesorders = "INSERT INTO `salesorders` (`SalesDate`, `DueDate`, `ContactName`, `ContactNo`, `EmpNo`, `address`, `ItemQty`, `City`) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($adddatasalesorders);
            $stmt->bind_param('ssssssss', $salesDate, $dueDate, $contactPerson, $contactNo, $empid, $address, $quantity, $city);
            $stmt->execute();
            if ($stmt) {
                $last_id = $conn->insert_id;
                $adddatasaleslines = "INSERT INTO `saleslines` (`ContactName`, `ContactNo`, `SalesDate`, `itemcode`, `unitprice`, `quantity`, `amount`, `salesorders_sonumber`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($adddatasaleslines);
                $stmt->bind_param('ssssdddi', $contactPerson, $contactNo, $salesDate, $itemcode, $price, $quantity, $total, $last_id);
                if ($stmt->execute()) {
                    header("Location: ../sales/order.php");
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }
}

//trimdata
function datamake($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}






//get emp id with other data 
function getEmpId($conn)
{
    $sql = "SELECT * FROM `employees` WHERE `idEmployees`";
    $result = mysqli_query($conn, $sql);
    $empId = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $empId;
}

//get item data

function getItemData($conn)
{
    $getItemInfo = "SELECT `idItems`, `ItemCode`, `ItemName`, `Price` FROM `itemsmaster` WHERE `ItemStatus`='1'";
    $getItemInforesult = mysqli_query($conn, $getItemInfo);
    $itemInfoData = [];
    while ($row = mysqli_fetch_assoc($getItemInforesult)) {
        $itemInfoData[] = $row;
    }
    return $itemInfoData;
}




//get getSalesData();


function getSalesData()
{
    $tbdata = array();
    require '../DB/dbconfig.php';
    $getSalesData = $conn->prepare("SELECT i.ItemCode, i.ItemName, i.Price, s.quantity FROM itemsmaster AS i INNER JOIN saleslines AS s ON i.ItemCode = s.itemcode limit 10;");
    $getSalesData->execute();
    $result = $getSalesData->get_result();
    while ($row = $result->fetch_assoc()) {
        $tbdata[] = ['ItemCode' => $row['ItemCode'], 'ItemName' => $row['ItemName'], 'Price' => $row['Price'], 'Quantity' => $row['quantity']];
    }
    $getSalesData->close();

    return $tbdata;
}
