<?php

declare(strict_types=1);

function checkLoginError()
{
    if (isset($_SESSION['login_errors'])) {
        $errors = $_SESSION['login_errors'];
        echo "<br>";
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger' role='alert'>$error</div>";
        }
        unset($_SESSION['login_errors']);
    }else if(isset($_GET['login'])&&$_GET['login']==="success"){
        echo "<div class='alert alert-success' role='alert'>Login Success</div>";
    }
}