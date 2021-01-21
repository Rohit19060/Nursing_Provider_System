<?php


if (!isset($_SESSION["m_id"])) {
    $_SESSION["message"] = "You need to login to access this page";
    header("Location: login.php");
}

if (isset($_SESSION["m_id"]) && isset($_SESSION["message"])) {
    echo "<h2 style='color: red'>" . $_SESSION["message"] . "</h2>";
    $_SESSION["message"] = null;
}
