<?php require '../include/head.php';

?>

<body>

    <form action="orderConfig.php" method="POST">
        <h2>SALES ORDER DETAILS</h2>
        <label for="getempdata">Emp Employee</label>
        <select name="getempdata" id="getempdata">
            <option value="">Select Employee</option>
            <?php
            $emp = getEmpId($conn);
            foreach ($emp as $row) {
                $datas = "data-name='" . $row['FirstName'] . " " . $row['LastName'] . "'";
                $datas .= " data-number='" . $row['Phone'] . "'";
                $datas .= " data-city='" . $row['City'] . "'";
                $datas .= " data-address='" . $row['Address'] . "'";



            ?>
                <option value="<?= $row['idEmployees']; ?>" <?= $datas; ?>><?= $row['idEmployees']; ?></option>
            <?php } ?>
        </select>
        <div><label for="Contact-Person">Contact Person</label>
            <input type="text" id="contact-person" name="contact-person" placeholder="Contact Person">
        </div>
        <div>
            <label for="Contact-No">Contact No</label>
            <input type="text" id="contact-no" name="contact-no" placeholder="Contact No">
        </div>

        <div>
            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="City">
        </div>

        <label for="address">address</label>
        <textarea id="address" name="address" rows="3" placeholder="Address"></textarea>

        <div>
            <label for="sales-date">Sales Date</label>
            <label for="sales-date">Sales Date</label><input type="date" name="sales-date">
        </div>
        <div>
            <label for="due-date">Due Date</label>
            <input type="date" name="due-date">
        </div>


        <h2>SALES ORDER ITEMS</h2>

        <div class="itemgrop-1">
            <select name="selectitem[]" id="getitemdata">
                <option value="">Select Item</option>

                <?php
                $item = getSalesData($conn);
                foreach ($item as $row) {
                ?>
                    <option value="<?= $row['ItemCode']; ?>" data-iname="<?= $row['ItemName']; ?>" data-price="<?= $row['Price']; ?>"><?= $row['ItemName']; ?></option>
                <?php } ?>
            </select>
            <input type="text" id="itemname" name="item-name-1" placeholder="Item Name">
            <input type="text" id="price" name="price-1" placeholder="Price">
            <input type="text" name="quantity-1" placeholder="Quantity">
        </div>
        <div id="fieldsContainer"></div>

        <input type="hidden" name="hdata" id="hdata" value="1"><br>


        <button type="button" id="addFieldButton">Add More</button>
        <button type="button" id="removef">Remove</button><br>


        <input type="submit" id='Submit' name="neworder" value="Submit">


    </form>






    <hr>
    <hr>

    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>Item</th>
                <th>Item Code</th>
                <th>Unit Price </th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
        </tbody>
    </table>






</body>




<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>

<?php
require '../include/script.php';

?>

</html>