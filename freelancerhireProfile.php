<?php
include_once("./includes/function.php");
if (!isset($_SESSION["m_id"])) {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}
include_once("./includes/header.php");
echo message();
require_once("./includes/db.php");
$h_id = $_GET["id"];
$q = "SELECT * FROM freelancer where h_id = '$h_id'";
$available = "Available";
$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
if ($num) {
    $user = mysqli_fetch_assoc($result);
    if ($user["hired"] != 0) {
        $available = "Not Available";
    }
    $age = date_diff(date_create($user["dob"]), date_create('today'))->y;

?>
    <?php echo message2(); ?>
    <img src="./images/2.png" alt=".." class="zindeximg" width="60%">
    <div class="profile">
        <div class="myProfile text-center">
            <h1><?php echo ucwords($user["name"]); ?>'s Profile</h1>
            <br>
        </div>
        <div class="main_profile">
            <div class="dummy"></div>
            <div class="profile_image">
                <?php if ($user["profile"] == null) {
                    echo '<img src="images/profile.png" alt="profile" width="80%">';
                } else {
                    echo '<img src="images/' . $user["profile"] . '" alt="profile" width="80%">';
                } ?>
            </div>
            <div class="profile_bio">
                <?php if ($user["bio"] == null) {
                    echo 'I am Good as a Professional Nurse Should be';
                } else {
                    echo $user["bio"];
                } ?>
                <?php
                $q = "SELECT * FROM services where id = '$h_id'";
                $services = array();
                $result = mysqli_query($connection, $q);
                $num = mysqli_num_rows($result);
                if ($num) {
                    $serviceUser = mysqli_fetch_assoc($result);
                    foreach ($serviceUser as $key => $value) {
                        if ($value == "1") {
                            if ($key == "PN") {
                                array_push($services, "Private Nurses");
                            } else if ($key == "HP") {
                                array_push($services, "Home Physiotherapy");
                            } else if ($key == "WM") {
                                array_push($services, "Wound Management");
                            } else if ($key == "MET") {
                                array_push($services, "Mobility Emergency Transportation");
                            } else if ($key == "BAQ") {
                                array_push($services, "Bended and Qualified Caregivers");
                            }
                        }
                    }
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo 'Services By ' . $user["name"] . ": ";
                    echo "<br>";
                    echo "<br>";
                    $count = 1;
                    foreach ($services as $value) {
                        echo $count++ . ". " . $value;
                        echo "<br>";
                    }
                }
                ?>
            </div>
            <div class="profile_details">
                <div>
                    <span>Name</span>
                    <span><?php echo ucwords($user["name"]); ?></span>
                </div>
                <div>
                    <span>Age</span>
                    <span><?php echo $age; ?> Years</span>
                </div>
                <div>
                    <span>Address</span>
                    <span><?php echo $user["address"]; ?></span>
                </div>
                <div>
                    <span>Email</span>
                    <span><?php echo $user["email"]; ?></span>
                </div>
                <div>
                    <span>Phone</span>
                    <span><?php echo $user["phone"]; ?></span>
                </div>

                <?php if ($user["rate"] != 0) {
                    echo '<div>
                    <span>Rate</span>
                    <span>' . $user["rate"] . ' RM/Hour</span>
                </div>';
                } ?>

            </div>

        </div>
        <div class="text-center">
            <?php
            echo " <a href='uploads/" . $user["ic"] . "' target='_blank' ><button style='padding:6px 25px;' > IC</button> </a> ";
            echo " <a href='uploads/" . $user["certificate"] . "' target='_blank'> <button style='padding:6px 25px;' >Certificate</button> </a> ";
            ?>
        </div>
        <?php
        $q = "SELECT * FROM freelancer where `h_id` = '$h_id'";

        $result = mysqli_query($connection, $q);
        $num = mysqli_num_rows($result);
        if ($num) {
            $user = mysqli_fetch_assoc($result);
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
        }
        ?>


        <?php if ($status == "Available") {
            echo "<a href='hireFreelancer.php?id=" . $user["h_id"] . "' class='text-center'><button> Hire Me! </button></a> ";
        } else {
            echo "<h2 class='text-center mt-3'>Already Hired</h2>";
        } ?>
    </div>
<?php
}
?>