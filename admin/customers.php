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
    <h5 id="label">SALON :OUR CUSTOMERS</h5>
<?php
$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Customer_Table LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
$i=1;
?>
    <div class="table100 ver2 m-b-110">
        <table data-vertable="ver2" class="table table-responsive">
        <thead class="">
        <tr class="row100 head">
            <th>#</th>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>EMAIL</th>
            <th>CONTACT</th>
            <th>ADDRESS</th>
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
                <td><?php echo $row["Customer_Id"]; ?></td>
                <td><?php echo $row["Customer_Name"]; ?></td>
                <td><?php echo $row["Customer_Email"]; ?></td>
                <td><?php echo $row["Customer_Number"]; ?></td>
                <td><?php echo $row["Customer_Address"]; ?></td>
                <td><a href="del.php?del=<?php echo $row["Customer_Id"]; ?>" class="btn btn-primary btn-xs fa fa-pencil"></a></td>
                <td><a href="del.php?del=<?php echo $row["Customer_Id"]; ?>" class="btn btn-danger btn-xs fa fa-trash-o"></a></td>
            </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr class="">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>EMAIL</th>
            <th>CONTACT</th>
            <th>ADDRESS</th>
            <th>EDIT</th>
            <th>DEL</th>
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
    $pagLink .= "<li><a href='customers.php?page=".$i."'>".$i."</a> </li>";
};
echo $pagLink . "</ul></nav>";
?>
<button type="button" class="btn btn-dark fa fa-print">Print</button>
<?php include "post_cont.php";
include "footer.php";?>