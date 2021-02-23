<?php
include_once("./includes/function.php");
require_once("./includes/db.php");
if (isset($_POST['submit']) && isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
    if ($_GET["table"] == 2) {
        $m_id = $_SESSION["m_id"];
        $q = "SELECT * FROM `management` where m_id = $m_id";
        $query_delete = "DELETE FROM `management` WHERE m_id = $m_id";
    } else {
        $h_id = $_SESSION["h_id"];
        $q = "SELECT * FROM `freelancer` where h_id = $h_id";
        $query_delete = "DELETE FROM `freelancer` WHERE h_id = $h_id";
    }

    $cur_password = mysqli_preparation($_POST["password"]);

    $result = mysqli_query($connection, $q);
    $user = mysqli_fetch_assoc($result);

    if ($cur_password == $user["password"]) {
        if (mysqli_query($connection, $query_delete)) {
            $_SESSION["message"] = "Data Deleted Successfully";
            redirect("logout.php");
        } else {
            $_SESSION["message"] = "There is some error";
            redirect();
        }
    } else {
        $_SESSION["message"] = "Your Current password is not matching";
        redirect();
    }
} else {
    $_SESSION["message"] = "You need to Sign In to access this page";
    redirect("login.php");
}
echo message();
