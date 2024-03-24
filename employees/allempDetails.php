<?php
require "../header/include.php";

$allEmployees = getAllEmployees($conn);

?>
 

 <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <!-- Add other headers as needed -->
            <th>status</th>
            <th>action</th>
            <th>action</th>

        </tr>
        <?php foreach ($allEmployees as $employee): ?>
            <tr>
                <td><?php echo htmlspecialchars($employee['idEmployees']); ?></td>
                <td><?php echo htmlspecialchars($employee['FirstName']); ?></td>
                <td><?php echo htmlspecialchars($employee['LastName']); ?></td>
                <!-- Add other columns as needed -->

                <td><?php echo htmlspecialchars($employee['EmpStatus']); ?></td>
                <td>edit</td>
                <td><a href="delete_employee.php?id=<?php echo $employee['idEmployees']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>

            </tr>
        <?php endforeach; ?>
    </table>


 <?php

 ?>


