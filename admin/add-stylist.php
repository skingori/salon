<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 04:02
 */
session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];
//AUTO GENERATE CODE

//INSERT DATA ON DB
if(isset($_POST['stylist'])) {
    $Stylist_Id=$_POST['Stylist_Id'];
    $Stylist_Name=$_POST['Stylist_Name'];
    $Stylist_Number=$_POST['Stylist_Number'];

    $sql = "INSERT INTO Stylist_Table(
             Stylist_Id 
            ,Stylist_Name
            ,Stylist_Number
           
            ) VALUES(
            
               '$Stylist_Id',
               '$Stylist_Name',
               '$Stylist_Number'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: stylists.php?success');

    } else {

        header("Location: stylists.php?error='$con->error'");

        echo $con->error;

    }

    $con->close();
}
