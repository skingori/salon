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
    <h4 id="label">SALON :ALL MY BOOKINGS</h4>
<?php
$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Booking_Table WHERE Booking_customer_id='$myid' LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$i=1;
?>
    <div class="table100 ver4 m-b-110">
    <table data-vertable="ver4" class="table table-responsive">
        <thead>
        <tr class="row100 head">
            <th>#</th>
            <th>BOOKING CODE</th>
            <th>TIME</th>
            <th>SALON ID</th>
            <th>STYLE ID</th>

        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <tr class="row100">
                <td><?php echo $i; $i++?></td>
                <td><?php echo $row["Booking_Id"]; ?></td>
                <td><?php echo $row["Booking_Time"]; ?></td>
                <td><?php echo $row["Booking_Salon_Id"]; ?></td>
                <td><?php echo $row["Booking_Style_Id"]; ?></td>
             </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr class="">
        <tr>
            <th>#</th>
            <th>BOOKING CODE</th>
            <th>TIME</th>
            <th>SALON ID</th>
            <th>STYLE ID</th>
        </tr>
        </tfoot>
    </table>
    </div>
<?php
$sql = "SELECT COUNT(Booking_Id) FROM Booking_Table WHERE Booking_customer_id=$myid";
$rs_result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<nav><ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li><a href='my_book.php?page=".$i."'>".$i."</a> </li>";
};
echo $pagLink . "</ul></nav>";
?>

<?php include "post_cont.php";
include "footer.php";?>