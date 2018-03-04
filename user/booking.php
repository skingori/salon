<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 19/02/2018
 * Time: 10:11
 */

    require('../connection/db.php');
    include "sess_ctrl.php";

    $id = $_GET['id'];

    if (isset($_POST['submit'])) {

    	$Booking_Id = $_POST['Booking_Id'];
        $Booking_Time = $_POST['Booking_Time'];
        $Booking_Salon_Id = $_POST['Booking_Salon_Id'];
        $Booking_Style_Id = $_POST['Booking_Style_Id'];
        $Booking_customer_id = $myid;

        //Payment
        $Payment_Id=$_POST['Payment_Id'];
        $Payment_Code=$_POST['Payment_Code'];
        $Payment_Date=date('Y-m-d');
        $Payment_Mode=$_POST['Payment_Mode'];
        $Payment_Invoice_Number=$_POST['Payment_Invoice_Number'];
        $Payment_customer_id=$myid;
        $Payment_Amount=$_POST['Payment_Amount'];



        $sql = "INSERT INTO Payment_Table(

             Payment_Id
            ,Payment_Code
            ,Payment_Date
            ,Payment_Mode
            ,Payment_Invoice_Number
            ,Payment_customer_id
            ,Payment_Amount
        
            ) VALUES(
            
               '$Payment_Id',
               '$Payment_Code',
               '$Payment_Date',
               '$Payment_Mode',
               '$Payment_Invoice_Number',
               '$Payment_customer_id',
               '$Payment_Amount'
               
            );";

        $sql .= "INSERT INTO Booking_Table(
            
             Booking_Id
            ,Booking_Time
            ,Booking_Salon_Id
            ,Booking_Style_Id
            ,Booking_customer_id
           
           
            ) VALUES(
          
               '$Booking_Id',
               '$Booking_Time',
               '$Booking_Salon_Id',
               '$Booking_Style_Id',
               '$Booking_customer_id'
               
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: index.php?success');

    } else {

        header("Location: index.php?error='$con->error'");

        echo $con->error;

    }

    $con->close();

    }

//ADDING BOOKING ID
$chars = array(0,1,2,3,4,5,6,7,8,9);
$serial = '';
$max = count($chars)-1;
for($i=0;$i<6;$i++){
    $serial .=(!($i % 5) && $i ? '' : '').$chars[rand(0, $max)];
}
//GETTING MY SQL
    $stylists = $con->query("SELECT * FROM `Style_Table` WHERE `Style_Id`='$id'");
    $style = mysqli_fetch_assoc($stylists);
?>
<form method="post" action="booking.php" role="form">
        <div class="panel-group tool-tips widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            STEP 1: PREFERENCE
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="form-group has-success has-feedback" hidden>
                            <label for="Booking_Style_Id">Selected Style:</label>
                            <input type="text" class="form-control" name="Booking_Style_Id" value="<?php echo $style['Style_Id'];?>" readonly="true">
                        </div>
                        <div class="form-group has-success has-feedback" hidden>
                            <label for="Booking_Id">Booking Id:</label>
                            <input type="text" class="form-control" name="Booking_Id" value="<?php echo $serial;?>" readonly="true">
                        </div>
                        <div class="form-group has-success">
                            <label for="Booking_Salon_Id">Select Salon ID:</label>
                            <select class="form-control effect-16" id="Booking_Salon_Id" name="Booking_Salon_Id" required>
                                <option selected=""></option>
                                <?php
                                //include("../connection/db.php");
                                $query = "SELECT * FROM Salon_Table";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    $Salon_Id = $row['Salon_Id'];
                                    $Salon_Name = $row['Salon_Name'];
                                    echo "<option>$Salon_Id</option>";
                                    echo "<option readonly>Name: ($Salon_Name)</option>";
                                    echo "<option>..................</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group has-success">
                            <label for="Booking_Time">Choose Date:</label>
                            <input type="date" class="form-control effect-16" name="Booking_Time">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            STEP 2: PAYMENT INFO
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                    <div class="form-group has-warning" hidden>
                        <label for="Payment_Invoice_Number">Invoice Number:</label>
                        <input type="text" class="form-control" id="Payment_Invoice_Number" name="Payment_Invoice_Number" value="<?php echo $serial;?>">
                    </div>

                    <div class="form-group">
                        <label for="Payment_Mode">Payment Mode:</label>
                        <select name="Payment_Mode" class="form-control effect-16" id="Payment_Mode">
                            <option value="M-PESA">M-PESA</option>
                            <option value="AIRTEL">AIRTEL</option>
                            <option value="BANK">BANK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Payment Code:</label>
                        <input type="text" class="form-control effect-16 sam-cap" id="Payment_Code" name="Payment_Code" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Payment_Amount">Total Amount (Kes):</label>
                        <input type="text" class="form-control effect-16" id="Payment_Amount" name="Payment_Amount" value="<?php echo $style['Style_Id'];?>" readonly>
                    </div>
                    </div>
                </div>
            </div>

        </div>
		<div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit">Book</button>&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
