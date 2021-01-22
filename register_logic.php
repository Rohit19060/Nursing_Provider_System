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
    $query_insert = "INSERT INTO {$_POST["type"]} (";
    $query_insert .= " name, email, password) values (";
    $query_insert .= "'$name','$email','$password1')";

    if (mysqli_query($connection, $query_insert)) {
        $_SESSION["h_id"] = mysqli_insert_id($connection);
        $_SESSION["name"] = $name;
        $_SESSION["message"] = "$name Registered & Logged In Successfully";
        redirect("index.php");
    } else {
        $_SESSION["message"] = "Email Already exist Try Again!";
        redirect();
    }
} else {
    $_SESSION["message"] = "Can't access this page";
    redirect("index.php");
}
