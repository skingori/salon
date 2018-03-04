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
    <div class="table100 ver2 m-b-110">
    <table data-vertable="ver2" class="table table-responsive">
        <thead class="">
        <tr class="row100 head">
            <th>#</th>
            <th>STYLIST ID</th>
            <th>FULL NAME</th>
            <th>MOBILE NO</th>
            <th>ASSIGN</th>
            <th>EDIT</th>
            <th>DEL</th>


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
                <td><a href="" data-toggle="modal" data-target='#addstyle' data-whatever='<?php echo $row["Stylist_Id"]; ?>' class="btn-xs btn-warning">assign</a></td>
                <td><a href="del.php?delst=<?php echo $row["Stylist_Id"]; ?>" class="btn-xs btn-primary fa fa-pencil"></a></td>
                <td><a href="del.php?delst=<?php echo $row["Stylist_Id"]; ?>" class="btn-xs btn-danger fa fa-trash"></a></td>
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
            <th>ASSIGN</th>
            <th>EDIT</th>
            <th>DEL</th>
        </tr>
        </tfoot>
    </table>

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
            <button type="button" class="btn btn-dark fa fa-plus-circle" data-toggle="modal" data-target="#style" data-whatever="@mdo">add</button>
            <button type="button" class="btn btn-dark fa fa-print">Print</button>
            <div class="modal fade" id="style" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">New Stylist</h4>
                        </div>
                        <div class="modal-body">
                            <form action="add-stylist.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Stylist ID/PASS NO:</label>
                                    <input type="text" class="form-control" name="Stylist_Id" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Stylist Name:</label>
                                    <input type="text" class="form-control" name="Stylist_Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Stylist Mobile:</label>
                                    <input type="text" class="form-control" name="Stylist_Number" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="stylist" class="btn btn-primary">Add Stylist</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second model -->
            <div class="modal fade" id="addstyle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">ASSIGN STYLE</h4>
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
    $('#addstyle').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'id=' + recipient;

        $.ajax({
            type: "GET",
            url: "as_style.php",
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
