<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 21/02/2018
 * Time: 00:54
 */

include "sess_ctrl.php";
include "header.php";
include "sidebar.php";
include "menu.php";?>
<?php include "pre_cont.php";?>
    <h4 id="label">SALON :ALL MY PAYMENTS</h4>
<?php
$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Payment_Table WHERE Payment_customer_id='$myid' LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$i=1;
?>
    <div class="table100 ver4 m-b-110">
        <table data-vertable="ver4" class="table table-responsive">
            <thead>
            <tr class="row100 head">
                <th>#</th>
                <th>PAYMENT CODE</th>
                <th>DATE</th>
                <th>PAYMENT MODE</th>
                <th>INVOICE NO</th>
                <th>TOTAL AMOUNT</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rs_result)) {
                ?>
                <tr class="row100">
                    <td><?php echo $i; $i++?></td>
                    <td><?php echo $row["Payment_Code"]; ?></td>
                    <td><?php echo $row["Payment_Date"]; ?></td>
                    <td><?php echo $row["Payment_Mode"]; ?></td>
                    <td><?php echo $row["Payment_Invoice_Number"]; ?></td>
                    <td><?php echo $row["Payment_Amount"]; ?></td>
                </tr>
                <?php
            };
            ?>
            </tbody>
            <tfoot>
            <tr class="">
            <tr>
                <th>#</th>
                <th>PAYMENT CODE</th>
                <th>DATE</th>
                <th>PAYMENT MODE</th>
                <th>INVOICE NO</th>
                <th>TOTAL AMOUNT</th>
            </tr>
            </tfoot>
        </table>
    </div>
<?php
$sql = "SELECT COUNT(Payment_Id) FROM Payment_Table WHERE Payment_customer_id=$myid";
$rs_result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<nav><ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li><a href='my_pay.php?page=".$i."'>".$i."</a> </li>";
};
echo $pagLink . "</ul></nav>";
?>

<?php include "post_cont.php";
include "footer.php";?>