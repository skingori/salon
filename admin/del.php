<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 01:19
 */
include("../connection/db.php");

if (isset($_GET['del'])){
    //getting id of the data from url
    $id = $_GET['del']; //deletin milk
    //deleting the row from table
    $result = mysqli_query($con, "DELETE FROM Style_Table WHERE Style_Id=$id ");
//$result = mysqli_query($con, "DELETE FROM login_table WHERE login_username=$id");

//redirecting to the display page (index.php in our case)
    header("Location:styles.php");
}

elseif(isset($_GET['dels'])) {
    $id = $_GET['dels']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Salon_Table WHERE Salon_Id=$id");

    header("Location:salons.php");

}
elseif(isset($_GET['delst'])) {
    $id = $_GET['delst']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Stylist_Table WHERE Stylist_Id=$id");

    header("Location:stylists.php");

}

else{
    header('Location:index.php');
}