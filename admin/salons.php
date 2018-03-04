<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16/02/2018
 * Time: 23:06
 */
include "sess_ctrl.php";
include "header.php";
include "sidebar.php";
include "menu.php";?>
<?php include "pre_cont.php";?>
    <h5 id="label">SALON :SALONS AVAILABLE</h5>
<?php
$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Salon_Table LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$i=1;

?>
    <div class="table100 ver2 m-b-110">
        <table data-vertable="ver2" class="table table-responsive">
        <thead class="">
        <tr class="row100 head">
            <th>#</th>
            <th>SALON ID</th>
            <th>SALON NAME</th>
            <th>LOCATION</th>
            <th>OPEN TIME</th>
            <th>CLOSE TIME</th>
            <th>EDIT</th>
            <th>DEL</th>

        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <tr class="row100">
                <td><?php echo $i ;$i++;?></td>
                <td><?php echo $row["Salon_Id"]; ?></td>
                <td><?php echo $row["Salon_Name"]; ?></td>
                <td><?php echo $row["Salon_Location"]; ?></td>
                <td><?php echo $row["Salon_OpenTime"]; ?></td>
                <td><?php echo $row["Salon_CloseTime"]; ?></td>
                <td><a href="del.php?del=<?php echo $row["Customer_Id"]; ?>" class="btn btn-primary btn-xs fa fa-pencil"></a></td>
                <td><a href="del.php?dels=<?php echo $row["Salon_Id"]; ?>" class="btn btn-danger btn-xs fa fa-trash"></a></td>
            </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr class="">
        <tr>
            <th>#</th>
            <th>SALON ID</th>
            <th>SALON NAME</th>
            <th>LOCATION</th>
            <th>OPEN TIME</th>
            <th>CLOSE TIME</th>
            <th>EDIT</th>
            <th>DEL</th>
        </tr>
        </tfoot>
    </table>
    </div>
<?php
$sql = "SELECT COUNT(Salon_Id) FROM Salon_Table";
$rs_result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<nav><ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li><a href='salons.php?page=".$i."'>".$i."</a> </li>";
};
echo $pagLink . "</ul></nav>";
?>
    <div class="modals widget-shadow">
        <div class="col-md-4 modal-grids">
            <button type="button" class="btn btn-dark fa fa-plus-circle" data-toggle="modal" data-target="#style" data-whatever="@mdo">add</button>
            <button type="button" class="btn btn-dark fa fa-print">Print</button>
            <div class="modal fade" id="style" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Register Salon</h4>
                        </div>
                        <div class="modal-body">
                            <form action="add-salon.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Salon Name:</label>
                                    <input type="text" class="form-control" name="Salon_Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Salon Location:</label>
                                    <input type="text" class="form-control" name="Salon_Location" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Open Time:</label>
                                    <input type="text" class="form-control" name="Salon_OpenTime" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Close Time:</label>
                                    <input type="text" class="form-control" name="Salon_CloseTime" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="salon" class="btn btn-primary">Add Salon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
<?php include "post_cont.php";
include "footer.php";?>