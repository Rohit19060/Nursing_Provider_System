<?php
include_once("./includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need Sign In first";
    redirect("login.php");
}
echo message();
require_once("./includes/db.php");
$h_id = $_SESSION["h_id"];
$new_rate = $_POST["rate"];
$query_update = "UPDATE `freelancer` SET `rate`='$new_rate' WHERE `h_id` = $h_id";

$result = mysqli_query($connection, $query_update);
if ($result) {
    $_SESSION["message"] = "Rate Updated Successfully";
    redirect();
} else {
    $_SESSION["message"] = "There is some error in updating rate";
    redirect();
}
