<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Employee Dashboard</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NIC</th>
                <th>Employee Number</th>
                <!-- Add more table headers for other employee properties -->
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($employees)): ?>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee->getIdEmployees(); ?></td>
                        <td><?php echo htmlspecialchars($employee->getFirstName()); ?></td>
                        <td><?php echo htmlspecialchars($employee->getLastName()); ?></td>
                        <td><?php echo htmlspecialchars($employee->getNic()); ?></td>
                        <td><?php echo htmlspecialchars($employee->getEmpNumber()); ?></td>
                        <!-- Add more table cells for other employee properties -->
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No employees found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
