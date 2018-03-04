<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 04/03/2018
 * Time: 21:49
 */

session_start();

if (isset($_SESSION['logname']) && ($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}

include '../connection/db.php';
$username=$_SESSION['logname'];

if (isset($_POST['dates'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

}
//$result1 = mysqli_query($con, "SELECT * FROM Payment_Table WHERE Payment_Date >='$date1%' AND Payment_Date <='$date2%'");

    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lasting Imp | Statement</title>
        <!-- Tell the browser to be responsive to screen width -->
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>

        <!-- Custom CSS -->
        <link href="../css/style.css" rel='stylesheet' type='text/css'/>

        <!-- font-awesome icons CSS -->
        <link href="../css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome icons CSS -->

        <!-- side nav css file -->
        <link href='../css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
        <!-- side nav css file -->

        <!-- js-->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/modernizr.custom.js"></script>

        <!--webfonts-->
        <link
            href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
            rel="stylesheet">
        <!--//webfonts-->

        <!-- Metis Menu -->
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/custom.js"></script>
        <link href="../css/custom.css" rel="stylesheet">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <style type="text/css" media="print">
            @media print
            {
                @page {
                    margin-top: 0;
                    margin-bottom: 0;
                }
                body  {
                    padding-top: 72px;
                    padding-bottom: 72px ;
                }
            }
        </style>
    </head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class=""></i> Lasting Impressions,ltd.
                    <small class="pull-right">Date: <?php echo date('d:m:Y') ?></small>
                    <!--<img style='width: 80%;height: 190px; text-align: center' src='../logo-head/logo-head.png'>-->
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Lasting Impressions.</strong><br>
                    P.O.BOX 0004-00200<br>
                    Nairobi Kenya<br>
                    Phone: (+254)03039347<br>
                    Email: info@lastingimp.co.ke
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Printed By : <?php echo $username; ?>
                <address>

                    <!-- FOR USER PROFILE -->

                    <strong>SALON REPORT</strong><br>
                </address>
                <!-- FOR USER PROFILE -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <img src='../images/logo.PNG'>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <style>

            .test {
                float: left;
                width: 90%;
                height: auto;
                border: 0;
                font-family: 'Consolas', Seravek, serif;
                background-color: inherit;
                overflow: hidden;
                resize: none;

            }

        </style>
        <div class="row">
            <div class="col-xs-12 table-responsive">

                <hr style=" border-top: 1px dotted #8c8b8b;">
                <h4 class="heading">SALON INFORMATION:</h4>
                <table class="table table-striped table-bordered" style="font-family: 'Palatino','serif',Consolas;font-size: small">
                    <?php
                    $sql = "SELECT * FROM Salon_Table ORDER BY Salon_Id";
                    $rs_result = mysqli_query($con, $sql);
                    $test=1;
                    ?>

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>LOCATION</th>
                        <th>OPEN TIME</th>
                        <th>CLOSING TIME</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($rs_result)) {
                        ?>
                        <tr>
                            <td><textarea class="test"><?php echo $test;$test++; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Salon_Name"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Salon_Location"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Salon_OpenTime"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Salon_CloseTime"]; ?></textarea></td>
                        </tr>
                        <?php
                    };
                    ?>
                    </tbody>

                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Payment Methods:</p>
                <img src="../images/visa.png" alt="Visa">
                <img src="../images/mpesa-logo.png" style="width: auto;height: 35px" alt="M-Pesa">
                <img src="../images/Airtel_logo.png" style="width: auto;height: 30px" alt="Airtel Money">
                <img src="../images/mastercard.png" alt="Mastercard">
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Note: This is an electronic generated copy.<br>
                    The receipt which appears on the screen has also been sent to the e-mail address of the customer.
                    Please keep a copy for your records.
                </p>
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
