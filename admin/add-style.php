<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 00:19
 */
session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];
//AUTO GENERATE CODE

$chars = array(0,1,2,3,4,5,6,7,8,9);
$serial = '';
$max = count($chars)-1;
for($i=0;$i<5;$i++){
    $serial .=(!($i % 5) && $i ? '' : '').$chars[rand(0, $max)];
}
//INSERT DATA ON DB
if(isset($_POST['style'])) {
    $Style_Name=$_POST['Style_Name'];
    $Style_Charges=$_POST['Style_Charges'];
    $Style_Description=$_POST['Style_Description'];

    $sql = "INSERT INTO Style_Table(
              Style_Name
            ,Style_Charges
            ,Style_Id
            ,Style_Description
           
            ) VALUES(
            
               '$Style_Name',
               '$Style_Charges',
               '$serial',
               '$Style_Description'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: styles.php?success');

    } else {

        header("Location: styles.php?error='$con->error'");

        echo $con->error;

    }

    $con->close();
}
