<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/02/2018
 * Time: 15:09
 */
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {
        case 1:
            header('location:admin/index.php');//redirect to client page
            break;
        case 2:
            header('location:user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:index.php');
}
else
{

    header('Location:index.php');
}
