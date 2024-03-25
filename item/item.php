<?php
require_once '../DB/dbconfig.php';
require_once '../functions/item/itemFunction.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Management</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="item-creation">
        <h2>ITEM CREATION</h2>
        <form id="itemCreationForm" action="itemConfig.php" method="POST">
            <input type="text" id="itemCode" name="itemCode" placeholder="Item Code">
            <input type="text" id="itemName" name="itemName" placeholder="Item name">
            <input type="text" id="price" name="price" placeholder="Price">
            <input type="text" id="price" name="level_1" placeholder="Level 1">
            <input type="text" id="price" name="level_2" placeholder="Level 2">
            <input type="text" id="price" name="level_3" placeholder="Level 3">
            <input type="text" id="price" name="level_4" placeholder="Level 4">
            <input type="text" id="price" name="level_5" placeholder="Level 5">
            <input type="text" id="price" name="level_6" placeholder="Level 6">

            <button type="submit" name="addNewItem" class="create-btn">Create Item</button>

        </form>
    </div>

    <div class="item-list">
        <h2>ITEMS</h2>
        <button type="button" class="load-active-btn">Load Active Items</button>
        <button type="button" class="load-inactive-btn">Load Inactive Items</button>

        <table id="mytable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <!-- Additional headers for Level 1, Level 2, etc... -->
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $itemdata = viewItemMaster($conn);
                foreach ($itemdata as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['ItemCode']; ?></td>
                        <td><?php echo $value['ItemName']; ?></td>
                        <td><?php echo $value['Price']; ?></td>
                        <!-- Additional columns for Level 1, Level 2, etc... -->
                        <td>
                            <a href="itemConfig.php?edit=<?= $value['idItems']; ?>"> <button type="button" class="edit-btn">Edit</button></a>
                            <a href="itemConfig.php?delete=<?= $value['idItems']; ?>"><button type="button" class="delete-btn">Delete</button></a>
                        </td>
                    </tr><?php
                        }
                            ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Additional JS scripts here -->

</body>

</html>