<?php
include_once("./includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need Sign In first";
    redirect("login.php");
}
echo message();
require_once("./includes/db.php");
$h_id = $_SESSION["h_id"];
$new_bio = $_POST["bio"];
$query_update = "UPDATE `freelancer` SET `bio`='$new_bio' WHERE `h_id` = $h_id";

$result = mysqli_query($connection, $query_update);
if ($result) {
    $_SESSION["message"] = "Bio Updated Successfully";
    redirect();
} else {
    $_SESSION["message"] = "There is some error in updating Bio";
    redirect();
}
