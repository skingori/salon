<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 03:42
 */

include "sess_ctrl.php";
//get data from customer table
$check_ = $con->query("SELECT Customer_Id FROM Customer_Table WHERE Customer_Id='$myid' ");
$count=$check_->num_rows;

if ($count==0) {

    header('Location:profile.php');
}else{

    null;

}

//

include "header.php";
include "sidebar.php";
include "menu.php";?>
<?php include "pre_cont.php";?>
<h5 id="label">SALON :ALL STYLES AVAILABLE</h5>
<?php
$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Style_Table LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$i=1;
?>

<div class="table100 ver3 m-b-110">
    <table data-vertable="ver3" class="table table-responsive">
    <thead>
    <tr class="row100 head">
        <th>#</th>
        <th><input type="checkbox" disabled=""></th>
        <th>STYLE ID</th>
        <th>STYLE NAME</th>
        <th>CHARGES</th>
        <th>BOOKING</th>
        <th>STYLIST</th>



    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($rs_result)) {
        ?>
        <tr class="row100">
            <td><?php echo $i; $i++?></td>
            <td><input type="checkbox"></td>
            <td><?php echo $row["Style_Id"]; ?></td>
            <td><?php echo $row["Style_Name"]; ?></td>
            <td><?php echo $row["Style_Charges"]; ?></td>
            <td><a href="" data-toggle="modal" data-target='#booking' data-whatever='<?php echo $row["Style_Id"]; ?>' class="btn btn-sm btn-link">Book</a></td>
            <td><a href="" data-toggle="modal" data-target='#viewstylist' data-whatever='<?php echo $row["Style_Id"]; ?>' class="btn btn-sm btn-link">View</a></td>

        </tr>
        <?php
    };
    ?>
    </tbody>
    <tfoot>
    <tr>
    <tr class="row100">
        <th>#</th>
        <th><input type="checkbox" disabled=""></th>
        <th>STYLE ID</th>
        <th>STYLE NAME</th>
        <th>CHARGES</th>
        <th>BOOKING</th>
        <th>STYLIST</th>
    </tr>
    </tfoot>
</table>
</div>
<?php
$sql = "SELECT COUNT(Style_Id) FROM Style_Table";
$rs_result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<nav><ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a> </li>";
};
echo $pagLink . "</ul></nav>";
?>
<div class="modals widget-shadow">
    <div class="col-md-4 modal-grids">
       <!-- <button type="button" class="btn btn-dark fa fa-plus-circle" data-toggle="modal" data-target="#style" data-whatever="@mdo">add</button>-->
        <button type="button" class="btn btn-dark fa fa-file-pdf-o"></button>
        <button type="button" class="btn btn-dark fa fa-print"></button>

        <!-- Second model -->
        <div class="modal fade" id="viewstylist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">STYLIST INFORMATION</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Second model -->
        <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">BOOKING DETAILS</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"> </div>
</div>
<?php include "post_cont.php";
include "footer.php";?>
<script>
    $('#viewstylist').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'id=' + recipient;

        $.ajax({
            type: "GET",
            url: "get_stylst.php",
            data: dataString,
            cache: false,
            success: function (data) {
                console.log(data);
                modal.find('.modal-body').html(data);
            },
            error: function(err) {
                console.log(err);
            }
        });
    })
</script>
<script>
    $('#booking').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'id=' + recipient;

        $.ajax({
            type: "GET",
            url: "booking.php",
            data: dataString,
            cache: false,
            success: function (data) {
                console.log(data);
                modal.find('.modal-body').html(data);
            },
            error: function(err) {
                console.log(err);
            }
        });
    })
</script>

