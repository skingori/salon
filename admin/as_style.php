<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 04:53
 */
    require('../connection/db.php');
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
    	$Stylist_Style_Stylist_Id = $_POST['Stylist_Style_Stylist_Id'];
    	$Stylist_Style_Style_Id = $_POST['Stylist_Style_Style_Id'];
        $con->query( "INSERT INTO Stylist_Style_table(Stylist_Style_Style_Id,Stylist_Style_Stylist_Id) VALUES('$Stylist_Style_Style_Id','$Stylist_Style_Stylist_Id')");
        header("location:stylists.php");

    }

    $stylists = $con->query("SELECT * FROM `Stylist_Table` WHERE `Stylist_Id`='$id'");
    $style = mysqli_fetch_assoc($stylists);

?>
<form method="post" action="as_style.php" role="form">
	<div class="modal-body">
		<div class="form-group">
			<label for="id">Stylist Id:</label>
			<input type="text" class="form-control" id="id" name="Stylist_Style_Stylist_Id" value="<?php echo $style['Stylist_Id'];?>" readonly>

		</div>
		<div class="form-group">
            <label for="email">Select Style:</label>
            <select class="form-control text-success" name="Stylist_Style_Style_Id">
                <option selected="">...Select Code...</option>
                <?php
                //include("../connection/db.php");
                $query = "SELECT * FROM Style_Table";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $Style_Id = $row['Style_Id'];
                    $Style_Name = $row['Style_Name'];
                    echo "<option>$Style_Id</option>";
                    echo "<option>Name: ($Style_Name)</option>";
                }
                ?>
            </select>

		</div>
	</div>
		<div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit">Assign</button>&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>

