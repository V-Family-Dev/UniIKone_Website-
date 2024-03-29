<?php

require '../include/head.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


?>


<body>

    <h1>Sales Order Search</h1>

    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>So No</th>
                <th>Employee ID</th>
                <th>Contact Person</th>
                <th>Contact No</th>
                <th>Sales Date</th>
                <th>Due Date</th>
                <th>Amount</th>
                <th>Edit</th>
                <th>Delete</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $tabledata = get_dataorder($conn, 10, $page);
            foreach ($tabledata as $row) {

            ?>
                <tr>
                    <td><?php echo $row['sonumber']; ?></td>
                    <td><?php echo $row['EmpNo']; ?></td>
                    <td><?php echo $row['ContactName']; ?></td>
                    <td><?php echo $row['ContactNo']; ?></td>
                    <td><?php echo $row['SalesDate']; ?></td>
                    <td><?php echo $row['DueDate']; ?></td>
                    <td><?php echo $row['Total']; ?></td>
                    <td><button type="button" id="edit">Edit</button></td>
                    <td><button type="button" id="delete">Delete</button></td>
                </tr>
            <?php
            }
            ?>



        </tbody>
    </table>

    <?php

    pagination($conn, 10, $page);

    ?>

    <script>
        $('#mytable').DataTable({
            "pageLength": 50,

        });
    </script>

</body>

</html>