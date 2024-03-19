<?php
require './DB/dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        /* CSS styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }
        
        .dashboard-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        p {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-content">
            <h1>Welcome to the Dashboard</h1>
            <p>This is a simple dashboard example.</p>
        </div>
    </div>
</body>
</html>