<?php
include_once("./includes/function.php");
if (isset($_POST["submit"])) {
    require_once("includes/db.php");
    $name = mysqli_preparation($_POST["username"]);
    $email =  mysqli_preparation($_POST["email"]);
    $password1 =  mysqli_preparation($_POST["password1"]);
    $password2 =  mysqli_preparation($_POST["password2"]);
    //TODO: Implement Validations
    if ($password1 !== $password2) {
        $_SESSION["message"] = "Password in not same";
        redirect();
    }


    if ($_POST["type"] == "freelancer") {

        $dob = mysqli_preparation($_POST["dob"]);
        $phone = mysqli_preparation($_POST["phone"]);
        $address = mysqli_preparation($_POST["address"]);

        $query_insert = "INSERT INTO `freelancer`(`name`, `email`, `password`,`dob`, `phone`, `address`) VALUES ('$name','$email','$password1','$dob','$phone','$address')";
    } else {
        $query_insert = "INSERT INTO `client` (";
        $query_insert .= " name, email, password) values (";
        $query_insert .= "'$name','$email','$password1')";
    }




echo $query_insert;

    if (mysqli_query($connection, $query_insert)) {

        if ($_POST["type"] == "freelancer") {
            $_SESSION["h_id"] = mysqli_insert_id($connection);
        } else {
            $_SESSION["m_id"] = mysqli_insert_id($connection);
        }

        $_SESSION["name"] = $name;
        $_SESSION["message"] = "$name Registered & Signed In Successfully";
        redirect("index.php");
    } else {
        $_SESSION["message"] = "Email Already exist Try Again!";
        redirect();
    }
} else {
    $_SESSION["message"] = "Can't access this page";
    redirect("index.php");
}
