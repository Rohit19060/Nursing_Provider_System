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
        $status = "Available";
        $upto = "";
        $order_id = $user["order_id"];
        $query = "SELECT * FROM `orders` WHERE `Order_id`='$order_id'";
        $res = mysqli_query($connection, $query);
        if (mysqli_num_rows($res)) {
            $data = mysqli_fetch_assoc($res);
            $upto = $data["date_upto"];
            $date = new DateTime($upto);
            $now = new DateTime();
            if ($date < $now) {
                $status == "Available";
            } else {
                $status = "Not Available";
            }
        }
        $q_client = "SELECT * FROM client WHERE `m_id`=$hirer_id";
        $result_manage = mysqli_query($connection, $q_client);
        $num_manage = mysqli_num_rows($result_manage);
        if ($num_manage && $status == "Available") {
            $manager = mysqli_fetch_assoc($result_manage);
            $hirer = $manager["name"];
            $_SESSION["message2"] = "You are Hired by $hirer";
        }
    }
    $age = date_diff(date_create($user["dob"]), date_create('today'))->y;

?>
    <?php echo message2(); ?>
    <img src="./images/2.png" alt=".." class="zindeximg" width="60%">
<?php
}
?>



<?php if ($user["profile"] == null) {
?><div class="text-center"><img src="./images/profile.png" alt=".." width="150px"></div>
    <form action="updateProfile.php" method="post" style="min-width:40%" enctype="multipart/form-data">
        <h1 class="mb-3 mt-3 col_theme">Your Professional Details</h1>
        <?php echo message(); ?>
        <div class="inputDiv">
            <label for="profile">Profile Picture</label>
            <input type="file" name="profile" required />
        </div>
        <div class="inputDiv">
            <label for="ic">Identity Card</label>
            <input type="file" name="ic" required />
        </div>
        <div class="inputDiv">
            <label for="certificate">Certificate</label>
            <input type="file" name="certificate" required />
        </div>

        <div class="text-center mb-2">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
<?php
} else {
?>
    <div class="text-center"><img src="./images/<?php echo $user["profile"]; ?>" alt=".." width="150px"></div>
<?php
}


$q = "SELECT * FROM services where id = '$h_id'";
$result = mysqli_query($connection, $q);
if (mysqli_num_rows($result)) {
    $user_services = mysqli_fetch_assoc($result)
?>
    <form action="AddServices.php" method="post">
        <h1 class="mb-3 mt-3 col_theme">Choose Your Services</h1>
        <?php echo message(); ?>
        <div class="inputDiv">
            <input type="checkbox" name="PN" value="PN" <?php if ($user_services["PN"] == "1") {
                                                            echo "checked";
                                                        } ?>>
            <label for="PN">Private Nurses</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="HP" value="HP" <?php if ($user_services["HP"] == "1") {
                                                            echo "checked";
                                                        } ?>>
            <label for="HP">Home Physiotherapy</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="WM" value="WM" <?php if ($user_services["WM"] == "1") {
                                                            echo "checked";
                                                        } ?>>
            <label for="WM">Wound Management</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="MET" value="MET" <?php if ($user_services["MET"] == "1") {
                                                                echo "checked";
                                                            } ?>>
            <label for="MET">Mobility Emergency Transportation</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="BAQ" value="BAQ" <?php if ($user_services["BAQ"] == "1") {
                                                                echo "checked";
                                                            } ?>>
            <label for="BAQ">Bended and Qualified Caregivers</label><br>
        </div>

        <div class="text-center mb-2">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>

<?php
} else {
?>


    <form action="AddServices.php" method="post">
        <h1 class="mb-3 mt-3 col_theme">Choose Your Services</h1>
        <?php echo message(); ?>
        <div class="inputDiv">
            <input type="checkbox" name="PN" value="PN">
            <label for="PN">Private Nurses</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="HP" value="HP">
            <label for="HP">Home Physiotherapy</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="WM" value="WM">
            <label for="WM">Wound Management</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="MET" value="MET">
            <label for="MET">Mobility Emergency Transportation</label><br>
        </div>
        <div class="inputDiv">
            <input type="checkbox" name="BAQ" value="BAQ">
            <label for="BAQ">Bended and Qualified Caregivers</label><br>
        </div>

        <div class="text-center mb-2">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
<?php
}



$q = "SELECT * FROM orders where h_id =  '$h_id'";
$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
if ($num) {
?>
    <div class="main_orders">
        <br>
        <h2 class="text-center">Order History</h2>
        <br>
        <?php
        $Sno = 1;
        echo "<div class='hire_table'><table class='freelancers'>
            <tr>
                <th>S No.</th>
                <th>Date Hired</th>
                <th>Date Hired Upto</th>
                <th>Amount</th>
                <th>Hired By</th>
            </tr>";
        while ($user_orders = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $current = "";
            if ($user["order_id"] == $user_orders["Order_id"]) {
                $upto = $user_orders["date_upto"];
                $date = new DateTime($upto);
                $now = new DateTime();
                if ($date < $now) {
                    $current = "";
                } else {
                    $current = "=> ";
                }
            }
            echo "<td>" . $current . $Sno++ .  " </td>";
            echo "<td>" . $user_orders["date_hired"] . "</td>";
            echo "<td>" . $user_orders["date_upto"] . "</td>";
            echo "<td>" . $user_orders["amount"] . " RM</td>";
            $m_id = $user_orders['m_id'];

            $q_client = "SELECT * FROM client WHERE `m_id`='$m_id'";
            $result_manage = mysqli_query($connection, $q_client);
            $num_manage = mysqli_num_rows($result_manage);
            if ($num_manage) {
                $manager = mysqli_fetch_assoc($result_manage);
                echo "<td>" .  ucwords($manager["name"]) . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";

        ?>
    </div>
<?php
}



?>







<?php include_once("includes/footer.php"); ?>