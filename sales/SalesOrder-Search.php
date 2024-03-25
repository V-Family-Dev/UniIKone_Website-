<?php

require '../include/head.php'; ?>


<body>

    <h1>Sales Order Search</h1>

    <table id="myTable">
        <thead>
            <tr>
                <th>So No</th>
                <th>Employee ID</th>
                <th>Contact Person</th>
                <th>Contact No</th>
                <th>City</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $item = getSalesData();
            foreach ($item as $row) { ?>
                <tr>
                    <td><?= $row['ItemCode']; ?></td>
                    <td><?= $row['ItemName']; ?></td>
                    <td><?= $row['Price']; ?></td>
                    <td><?= $row['Quantity']; ?></td>
                    <td><?= $row['Price'] * $row['Quantity']; ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>