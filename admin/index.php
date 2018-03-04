<?php
include "sess_ctrl.php";
include "header.php";
include "sidebar.php";
include "menu.php";?>
<?php include "pre_cont.php";?>
    <h5 id="label">SALON :BOOKINGS AVAILABLE</h5>
<?php
$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Booking_Table ORDER BY Booking_Id ASC LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$counter=1;


?>
    <div class="table100 ver2 m-b-110 table-responsive bs-example widget-shadow">
    <table data-vertable="ver2" class="table table-responsive">
        <thead>
        <tr class="row100 head">
            <th scope="row">#</th>
            <th>BOOKING ID</th>
            <th>BOOKING TIME</th>
            <th>SALON ID</th>
            <th>STYLE ID</th>
            <th>CUSTOMER ID</th>
            <th>EDIT</th>
            <th>DEL</th>

        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <tr class="row100">
                <td scope="row"><?php echo $counter;$counter++; ?></td>
                <td><?php echo $row["Booking_Id"]; ?></td>
                <td><?php echo $row["Booking_Time"]; ?></td>
                <td><?php echo $row["Booking_Salon_Id"]; ?></td>
                <td><?php echo $row["Booking_Style_Id"]; ?></td>
                <td><?php echo $row["Booking_customer_id"]; ?></td>
                <td><a href="" data-toggle="modal" data-target='#editbook' data-whatever='<?php echo $row["Booking_Id"]; ?>' class="btn btn-primary btn-xs fa fa-pencil"></a></td>
                <td><a href="del.php?del=<?php echo $row["Booking_Id"]; ?>" class="btn btn-danger btn-xs fa fa-trash-o"></a></td>
            </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr class="">
            <th scope="row">#</th>
            <th>BOOKING ID</th>
            <th>BOOKING TIME</th>
            <th>SALON ID</th>
            <th>STYLE ID</th>
            <th>CUSTOMER ID</th>
            <th>EDIT</th>
            <th>DEL</th>

        </tr>
        </tfoot>
    </table>
    </div>
<?php
$sql = "SELECT COUNT(Booking_Id) FROM Booking_Table";
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

<div class="modal fade" id="editbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">EDIT BOOKING</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<?php include "post_cont.php";
include "footer.php";?>

<script>
    $('#editbook').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'id=' + recipient;

        $.ajax({
            type: "GET",
            url: "edit_book.php",
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
