<?php
include_once("./includes/function.php");
if (isset($_POST['submit']) && isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
    require_once("./includes/db.php");
    $name = mysqli_preparation($_POST["username"]);
    $email = mysqli_preparation($_POST["email"]);
    $curr_password = mysqli_preparation($_POST["password1"]);
    $new_password = mysqli_preparation($_POST["password2"]) == mysqli_preparation($_POST["password3"]) ? mysqli_preparation($_POST["password2"]) : false;
    if ($_GET["table"] == 2) {
        $m_id = $_SESSION["m_id"];
        $q = "SELECT * FROM `client` where m_id = $m_id";
        $query_update = "UPDATE `client` SET `name`='$name',`email`='$email',`password`='$new_password' WHERE `m_id` = $m_id";
    } else {
        $h_id = $_SESSION["h_id"];
        $q = "SELECT * FROM `freelancer` where h_id = $h_id";
        $query_update = "UPDATE `freelancer` SET `name`='$name',`email`='$email',`password`='$new_password' WHERE `h_id` = $h_id";
    }
    if (!$new_password) {
        $_SESSION["message"] = "Your New password in not matching";
        redirect();
    }
    echo $q;
    $result = mysqli_query($connection, $q);
    $user = mysqli_fetch_assoc($result);
    if ($curr_password == $user["password"]) {
        echo $query_update;
        $result = mysqli_query($connection, $query_update);
        if ($result) {
            $_SESSION["message"] = "Data Updated Successfully";
            redirect();
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
echo $_SESSION["message"];
