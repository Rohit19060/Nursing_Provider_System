<?php
include_once("./includes/function.php");
if (isset($_GET["id"]) && isset($_SESSION["m_id"])) {
    require_once("includes/db.php");

    $freelancer_id = $_GET["id"];
    $m_id = $_SESSION["m_id"];

    $query_update = "UPDATE `freelancer` SET `hired`=$m_id WHERE `h_id` = $freelancer_id";

    $result = mysqli_query($connection, $query_update);

    if ($result) {
        $q_freelancer = "SELECT * FROM freelancer WHERE `h_id`=$freelancer_id";
        $result_freelancer = mysqli_query($connection, $q_freelancer);
        $num_freelancer = mysqli_num_rows($result_freelancer);
        if ($num_freelancer) {
            $freelancer = mysqli_fetch_assoc($result_freelancer);
            $freelancer_name = $freelancer["name"];
            $_SESSION["message"] = "$freelancer_name hired Successfully";
        }

        redirect("payment.php");
    } else {
        $_SESSION["message"] = "$freelancer_id hire Unsuccessful";
        redirect("hire.php");
    }
} else {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}
