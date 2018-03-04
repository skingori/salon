<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/02/2018
 * Time: 15:07
 */
session_start();

if (!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header("Location: index.php");
} else if (isset($_SESSION['logname'])!="" && isset($_SESSION['rank'])!="")  {
    header("Location: sessions.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userSession']);
    header("Location: index.php");
}
