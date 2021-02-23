<?php
include_once("includes/function.php");
if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
    foreach ($_SESSION as $key => $value) {
        $_SESSION[$key] = null;
    }
    $_SESSION["message"] = "Signed Out Successfully";
    redirect("index.php");
} else {
    // Logged out
    $_SESSION["message"] = "Your are not Authorized to access this page";
    redirect("index.php");
}
