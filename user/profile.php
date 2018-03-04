<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 21/02/2018
 * Time: 19:10
 */

include "sess_ctrl.php";

if (isset($_POST['add'])) {

    $Customer_Id_=$myid;
    $Customer_Name_=$_POST['Customer_Name'];
    $Customer_Email_=$_POST['Customer_Email'];
    $Customer_Number_=$_POST['Customer_Number'];
    $Customer_Address_=$_POST['Customer_Address'];

    mysqli_query($con,"INSERT INTO Customer_Table(
        Customer_Id,
        Customer_Name,
        Customer_Email,
        Customer_Number,
        Customer_Address
        )
      values (
      '$Customer_Id_',
      '$Customer_Name_',
      '$Customer_Email_',
      '$Customer_Number_',
      '$Customer_Address_'
      )
      ") or die(mysqli_error($con));

    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Success!
					</div>";
    echo '<meta content="4;index.php" http-equiv="refresh" >';

}


include "header.php";
include "sidebar.php";
include "menu.php";
include "pre_cont.php";

?>

<!-- Add content -->

                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <div class="form-group">
                        <label for="User_Name" class="col-sm-2 control-label">Full Name</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="User_Name" name="Customer_Name" pattern="[a-zA-Z0-9\s]+{4,}" title="Use letters ONLY" placeholder="Jane Doe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="User_Contact" class="col-sm-2 control-label">Contact</label>

                        <div class="col-sm-10">
                            <input type="tel" class="form-control" required pattern="^[0-9\-\+\s\(\)]*$" title="Input the correct contact as our example" id="User_Contact" name="Customer_Number" placeholder="+254700000000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="User_Email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" name="Customer_Email" class="form-control" id="User_Email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Customer_Address" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="Customer_Address" class="form-control" id="User_Email" placeholder="P.O BOX 5736-000XX" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" required=""> I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger" name="add" id="add">Update</button>
                        </div>
                    </div>

                </form>

<?php
include "post_cont.php";
include 'footer.php';

?>
<script type="text/javascript">
    function checkAge(bday)
    {
        if(bday<18)
        {
            alert('You must be 18 or older to continue');
            document.getElementById('add').disabled=true;
        }
        else
        {
            document.getElementById('add').disabled=false;
        }
    }
</script>

