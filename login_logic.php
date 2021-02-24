<?php
include_once("./includes/function.php");
if (isset($_POST["submit"])) {
    require_once("includes/db.php");
    $type = $_POST["type"];
    $email =  mysqli_preparation($_POST["email"]);
    $password =  mysqli_preparation($_POST["password"]);
    $query_login = "SELECT * from $type where email = '$email'";
    $result = mysqli_query($connection, $query_login);
    $num = mysqli_num_rows($result);
    if ($num) {
        $user = mysqli_fetch_assoc($result);
        if ($user["password"] == $password) {
            if ($type == "freelancer") {
                $_SESSION["h_id"] = $user["h_id"];
            } else {
                $_SESSION["m_id"] = $user["m_id"];
            }
            $_SESSION["name"] = $user["name"];
            $_SESSION["message"] = "Signed In Successfully";
            redirect("index.php");
        } else {
            $_SESSION["message"] = "Credentials not right try again";
            redirect("login.php");
        }
    } else {
        $_SESSION["message"] = "Credentials not right try again";
        redirect("login.php");
    }
} else {
    $_SESSION["message"] = "Can't access this page";
    redirect("index.php");
}
