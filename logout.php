<?php
session_start();
if (isset($_SESSION["user_id"]) || isset($_SESSION["admin_id"])) {
    foreach ($_SESSION as $key => $value) {
        echo $_SESSION[$key] = null;
    }
    $_SESSION["message"] = "Logged Out Successfully";
    header("Location: index.php");
} else {
    // Logged out
    $_SESSION["message"] = "Your are not Authorized to access this page";
    header("Location: index.php");
}
