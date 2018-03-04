<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/02/2018
 * Time: 15:08
 */
require('connection/db.php');

if(isset($_POST['reg'])) {


    $Login_Id_= strip_tags($_POST['Login_Id']);
    $Login_Username_= strip_tags($_POST['Login_Username']);
    $Login_Password_= strip_tags($_POST['Login_Password']);
    //$login_rank_= strip_tags($_POST['login_rank']);
//$Login_Username_= strip_tags($_POST['Login_Username']);


    $Login_Id= $con->real_escape_string($Login_Id_ );
    $Login_Username= $con->real_escape_string($Login_Username_ );
    $Login_Password= $con->real_escape_string($Login_Password_);
    //$login_rank= $con->real_escape_string($login_rank_ );
//$Login_Username= $con->real_escape_string($Login_Username_);
    $enc= md5($Login_Password);
//$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    $check_ = $con->query("SELECT Login_Username FROM Login_Table WHERE Login_Username='$Login_Username'");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO Login_Table(Login_Id,Login_Username,Login_Password,Login_Rank) VALUES('$Login_Id','$Login_Username','$enc','2')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,Login_Password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div>";
            ?>

            <p align="center">
                <meta content="2;index.php?login" http-equiv="refresh" />
            </p>

            <?php

        }else {
            $msg = "<div class='alert alert-warning'>
    <span class='glyphicon glyphicon-warning-sign'></span> &nbsp; error while registering !
</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry username already taken !
</div>";

    }

    $con->close();
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Register| Page</title>
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
            <h2 class="title1">SignUp Here</h2>
            <div class="sign-up-row widget-shadow">
                <h5>Personal Information :</h5>
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <form action="#" method="post">
                    <div class="sign-u">
                        <input type="text" placeholder="Your ID/Passport" name="Login_Id" required="">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <input type="text" placeholder="Username" name="Login_Username" required="">
                        <div class="clearfix"> </div>
                    </div>
                    <h6>Login Information :</h6>
                    <div class="sign-u">
                        <input type="password" placeholder="Password" required="" id="Login_Password" >
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <input type="password" placeholder="Confirm Password" id="Login_Password2" name="Login_Password" required="">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="sub_home">
                        <input type="submit" value="Register" class="btn bg-dark" name="reg" >
                        <div class="clearfix"> </div>
                    </div>
                    <div class="registration">
                        Already Registered.
                        <a class="" href="index.php">
                            Login
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

<!-- //Classie --><!-- //for toggle left push menu script -->

<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"> </script>
<!-- //Bootstrap Core JavaScript -->
<script>
    var password = document.getElementById("Login_Password")
        , confirm_password = document.getElementById("Login_Password2");

    function validatePassword(){
        if(password.value != confirm_password.value) {

            confirm_password.setCustomValidity("Passwords Don't Match");

        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>
</body>
</html>
