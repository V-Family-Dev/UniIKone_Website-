<?php
require_once '../includes/login/login.view.inc.php';
require_once '../includes/config_session.inc.php';  


?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Employee Dashboard</h1>
    <h1>Admin</h1>
    <?php
    checkLoginError();
    ?>
</body>
</html>