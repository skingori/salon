<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/02/2018
 * Time: 01:48
 */

session_start();

include "sess_ctrl.php";

if(isset($_POST['update']))
{
    $Login_Username=($_POST['Login_Username']);
    $Login_Id=($_POST['Login_Id']);
    $Login_Password=($_POST['Login_Password2']);

    $enc= md5($Login_Password);
    //$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    //updating the table
    $result = mysqli_query($con, "UPDATE Login_Table SET Login_Username='$Login_Username' ,Login_Password='$enc' WHERE Login_Id=$Login_Id");

    //redirectig to the display page. In our case, it is index.php
    $msg = "<div class='loader'></div>";

    ?>
    <p align="center">
        <meta content="5;../logout.php?logout" http-equiv="refresh" />
    </p>

<?php
}
?>

    <!-- add content here -->
<?php
//add header
include "header.php";
include "menu.php";
include "sidebar.php";
include "pre_cont.php";
?>

    <form method="post" id="form-register">
            <?php
            $sql = "SELECT * FROM Login_Table WHERE Login_Username= '$username'";
            $rs_result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <!--<div class="body bg-gray">-->
            <div class="form-group" hidden>
                <input type="text" name="Login_Id" required class="form-control" value="<?php echo $row["Login_Id"]; ?>">
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="Login_Username" value="<?php echo $row["Login_Username"]; ?>" required class="form-control"
                       placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" id="Login_Password" name="Login_Password" value="" required class="form-control" placeholder="xxxxxx">
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" id="Login_Password2" name="Login_Password2" value="" required class="form-control" placeholder="xxxxxx">
            </div>


            <?php
            }
            ?>
        <!--</div>-->
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-success">Update Profile</button>
        </div>
        <?php
        echo 'Note: System will log you out on update';
        if (isset($msg)) {
            echo $msg;
        }
        ?>
    </form>


<?php
//adding footer
include 'post_cont.php';
include 'footer.php';
?>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #69db66;
        width: 90px;
        height: 90px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    var password = document.getElementById("Login_Password")
        , confirm_password = document.getElementById("Login_Password2");

    function validatePassword(){
        if(password.value != confirm_password.value) {

            confirm_password.setCustomValidity("Passwords Don't Match");

        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>



