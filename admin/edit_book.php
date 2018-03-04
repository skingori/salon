<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 04/03/2018
 * Time: 21:59
 */

    require('../connection/db.php');
    $bid = $_GET['id'];

    if (isset($_POST['submit'])) {


        $Booking_Time_ = $_POST['Booking_Time'];
        $Booking_Salon_Id_ = $_POST['Booking_Salon_Id'];
        $Booking_Style_Id_ = $_POST['Booking_Style_Id'];
        $Booking_Id_ = $_POST['Booking_Id'];

        $sql = mysqli_query($con, "UPDATE Booking_Table SET Booking_Style_Id='$Booking_Style_Id_', Booking_Salon_Id='$Booking_Salon_Id_'
  ,Booking_Time='$Booking_Time_' WHERE Booking_Id=$Booking_Id_");

        header('Location:index.php?Success');

    }


?>
<form method="post" action="edit_book.php" role="form">
	<div class="modal-body">

        <div class="form-group has-success">
            <input type="text" name="Booking_Id" value="<?php echo $bid;?>" hidden>
            <label for="Booking_Salon_Id">Change Salon ID:</label>
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
            <label for="Booking_Style_Id">Change Style ID:</label>
            <select class="form-control effect-16" id="Booking_Style_Id" name="Booking_Style_Id" required>
                <option selected=""></option>
                <?php
                //include("../connection/db.php");
                $query = "SELECT * FROM Style_Table";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $Salon_Id = $row['Style_Id'];
                    $Salon_Name = $row['Style_Name'];
                    echo "<option>$Salon_Id</option>";
                    echo "<option readonly>Name: ($Salon_Name)</option>";
                    echo "<option readonly>..................</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group has-success">
            <label for="Booking_Time">Choose Date:</label>
            <input type="date" class="form-control effect-16" name="Booking_Time">
        </div>
	</div>
		<div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>

