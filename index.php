<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/02/2018
 * Time: 15:08
 */
session_start();
if (isset($_SESSION['rank'])!="" && isset($_SESSION['logname'])!="") {
    header("Location: sessions.php");
    exit;
}

require('connection/db.php');
// If form submitted, insert values into the database.
if (isset($_POST['login'])){

    $username = stripslashes($_REQUEST['Login_Username']); // removes backslashes
//$rank = stripslashes($_REQUEST['rank']); // removes backslashes
    $password = stripslashes($_REQUEST['Login_Password']);

    $username_ = mysqli_real_escape_string($con,$username); //escapes special characters in a string
//$rank_ = mysqli_real_escape_string($con,$rank); //escapes special characters in a string
    $password_ = mysqli_real_escape_string($con,$password);

    $enc = md5($password_);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `Login_Table` WHERE Login_Username='$username_' AND Login_Password='$enc'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    $rowCheck = mysqli_num_rows($result);
    $row= mysqli_fetch_array($result);


    if($row['Login_Rank']==1){

        $_SESSION['logname'] = $row['Login_Username'];
        $_SESSION['rank'] = $row['Login_Rank'];

        //below will be used as a welcome message
        $username=$_SESSION['logname'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome $username
                    </div>";


        ?>
        <p align="center">
            <meta content="2;admin/index.php?action=home" http-equiv="refresh" />
        </p>

        <?php

    } elseif ($row['Login_Rank']==2){

        $_SESSION['logname'] = $row['Login_Username'];
        $_SESSION['rank'] = $row['Login_Rank'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome
                    </div>";
        ?>

        <p align="center">
            <meta content="2;user/index.php?action=home" http-equiv="refresh" />
        </p>

        <?php

    }
    else {
        ?>
        <?php

        $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Wrong username or Password !
                    </div>";

    }
}?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Logi Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS-->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
    <!-- side nav css file -->

    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->

    <!-- Backgrund -->
    <link rel="stylesheet" href="css/background.css" />

</head>
<body>
<div class="main-content">
    <div id="page-wrapper" class="background">
        <div class="signup-page">
            <h2 class="title1">SignIn</h2>
            <div class="sign-up-row widget-shadow">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <form action="#" method="post">
                    <div class="sign-u">
                        <input type="text" placeholder="Username" name="Login_Username" required="">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <input type="password" placeholder="Password" name="Login_Password" required="">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="sub_home">

                        <input type="submit" class="btn btn-dark bg-dark" name="login" value="Login">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="registration">
                        Not Registered?
                        <a class="" href="signup.php">
                            Register Here
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--footer-->
<div class="footer">
    <p>&copy; 2018 All Rights Reserved | Salon</a></p>
</div>
<!--//footer-->
</div>


<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"> </script>
<!-- //Bootstrap Core JavaScript -->


</body>
</html>
