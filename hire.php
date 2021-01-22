<?php
include_once("includes/function.php");
if (!isset($_SESSION["m_id"])) {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}
echo message();
