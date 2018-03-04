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
    <div class="table100 ver4 m-b-110">
    <table data-vertable="ver4" class="table table-responsive">
        <thead class="">
        <tr class="row100 head">
            <th>#</th>
            <th>SALON ID</th>
            <th>SALON NAME</th>
            <th>LOCATION</th>
            <th>OPEN TIME</th>
            <th>CLOSE TIME</th>

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
<?php include "post_cont.php";
include "footer.php";?>