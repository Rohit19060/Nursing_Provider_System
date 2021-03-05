<?php
include_once("./includes/function.php");
if (!isset($_SESSION["m_id"])) {
    $_SESSION["message"] = "You can't access this page";
    redirect("hire.php");
}
$h_id = $_GET['id'];
require_once("./includes/db.php");
$query_update = "UPDATE `freelancer` SET `order_id`='0',`hired`='0' WHERE `h_id` = $h_id";
if (mysqli_query($connection, $query_update)) {
    $_SESSION["message"] = "Hiring cancel, Refund Initiated and you will be notified within 24 hours";
    redirect();
} else {
    $_SESSION["message"] = "There is some error";
    redirect();
}
