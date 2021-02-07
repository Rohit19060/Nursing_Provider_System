<?php
include_once("./includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}

include_once("./includes/header.php");
echo message();
require_once("./includes/db.php");
$h_id = $_SESSION["h_id"];
$q = "SELECT * FROM freelancer where h_id = '$h_id'";
$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
if ($num) {
    $user = mysqli_fetch_assoc($result);
    if ($user["hired"] != 0) {
        $hirer_id = $user["hired"];
        $q_management = "SELECT * FROM management WHERE `m_id`=$hirer_id";
        $result_manage = mysqli_query($connection, $q_management);
        $num_manage = mysqli_num_rows($result_manage);
        if ($num_manage) {
            $manager = mysqli_fetch_assoc($result_manage);
            $hirer = $manager["name"];
            $_SESSION["message2"] = "You are Hired by $hirer";
        }
    }
?>
    <?php echo message2(); ?>
    <img src="./images/2.png" alt=".." class="zindeximg" width="60%">

    <form class="Registration">
        <h2 class='mt-3 mb-2'>Select Your skills</h2>
        <div>
            <input type="checkbox" id="skill1" name="skill1" value="Nursing">
            <label for="skill1"> Nursing</label><br>
        </div>
        <div>
            <input type="checkbox" id="skill2" name="skill2" value="Dressing">
            <label for="skill2"> Dressing</label><br>
        </div>

        <div class="text-center mb-2 mt-3">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
<?php
}
?>





<?php include_once("includes/footer.php"); ?>