<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 01:36
 */
session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];
//AUTO GENERATE CODE

$chars = array(0,1,2,3,4,5,6,7,8,9);
$serial = '';
$max = count($chars)-1;
for($i=0;$i<6;$i++){
    $serial .=(!($i % 5) && $i ? '' : '').$chars[rand(0, $max)];
}
//INSERT DATA ON DB
if(isset($_POST['salon'])) {
    $Salon_Name=$_POST['Salon_Name'];
    $Salon_Location=$_POST['Salon_Location'];
    $Salon_OpenTime=$_POST['Salon_OpenTime'];
    $Salon_CloseTime=$_POST['Salon_CloseTime'];

    $sql = "INSERT INTO Salon_Table(
              Salon_Id
            ,Salon_Name
            ,Salon_Location
            ,Salon_OpenTime
            ,Salon_CloseTime
           
            ) VALUES(
            
               '$serial',
               '$Salon_Name',
               '$Salon_Location',
               '$Salon_OpenTime',
               '$Salon_CloseTime'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: salons.php?success');

    } else {

        header("Location: salons?error='$con->error'");

        echo $con->error;

    }

    $con->close();
}