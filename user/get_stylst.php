<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 04:53
 */
    require('../connection/db.php');
    $id = $_GET['id'];

?>
<form method="post" action="get_stylst.php" role="form">
	<div class="modal-body">
        <?php
                //include("../connection/db.php");
                $query1 = "SELECT * FROM Stylist_Table WHERE Stylist_Id IN(SELECT Stylist_Style_Stylist_Id FROM Stylist_Style_table WHERE Stylist_Style_Style_Id='$id')";
                $result = mysqli_query($con,$query1);
                $i=1;
                ?>

        <div class="table100 ver3 m-b-110">
            <table data-vertable="ver3" class="table table-responsive">
            <thead>
            <tr class="row100 head">
                <th>#</th>
                <th>Full Name</th>
                <th>Mobile Number</th>


            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $i;$i++;?></td>
                    <td><?php echo $row["Stylist_Name"]; ?></td>
                    <td><?php echo $row["Stylist_Number"]; ?></td>
                </tr>
                <?php
            };
            ?>
            </tbody>
            <tfoot>
            <tr class="">
            </tfoot>
        </table>
        </div>
	</div>
		<div class="modal-footer">&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>

