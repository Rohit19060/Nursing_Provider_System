<?php
include_once("includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}

include_once("includes/header.php");
echo message();
