<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 03:42
 */

include "sess_ctrl.php";
include "header.php";
include "sidebar.php";
include "menu.php";?>
<?php include "pre_cont.php";?>
    <h5 id="label">SALON :STYLISTS AVAILABLE</h5>
<?php
$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Stylist_Table LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$i=1;
?>
<div class="table100 ver4 m-b-110">
    <table data-vertable="ver4" class="table table-responsive">
        <thead>
        <tr class="row100 head">
            <th>#</th>
            <th>STYLIST ID</th>
            <th>FULL NAME</th>
            <th>MOBILE NO</th>


        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <tr class="row100">
                <td><?php echo $i; $i++?></td>
                <td><?php echo $row["Stylist_Id"]; ?></td>
                <td><?php echo $row["Stylist_Name"]; ?></td>
                <td><?php echo $row["Stylist_Number"]; ?></td>
            </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr class="">
        <tr>
            <th>#</th>
            <th>STYLIST ID</th>
            <th>FULL NAME</th>
            <th>MOBILE NO</th>
        </tr>
        </tfoot>
    </table>
</div>
<?php
$sql = "SELECT COUNT(Stylist_Id) FROM Stylist_Table WH";
$rs_result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<nav><ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li><a href='stylists.php?page=".$i."'>".$i."</a> </li>";
};
echo $pagLink . "</ul></nav>";
?>
<div class="modals widget-shadow">
    <div class="col-md-4 modal-grids">
        <!-- <button type="button" class="btn btn-dark fa fa-plus-circle" data-toggle="modal" data-target="#style" data-whatever="@mdo">add</button>-->
        <button type="button" class="btn btn-dark fa fa-file-pdf-o"></button>
        <button type="button" class="btn btn-dark fa fa-print"></button>

    </div>

    <div class="clearfix"> </div>
</div>
<?php include "post_cont.php";
include "footer.php";?>

