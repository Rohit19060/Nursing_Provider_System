<?php
session_start();
function message()
{
    if (isset($_SESSION["message"])) {
        $output = "<h2 class='mb-3 mt-3 error-message text-center'>";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</h2>";
        $_SESSION["message"] = null;
        return $output;
    }
}

function username()
{
    if (isset($_SESSION["name"])) {
        $output = "<h3 class='mb-3 mt-3 error-message text-center'>";
        $output .= htmlentities($_SESSION["name"]);
        $output .= "</h3>";
        return $output;
    }
}

function redirect($new_location = "")
{
    if (empty($new_location)) {
        $new_location = $_SERVER["HTTP_REFERER"];
    }
    header("Location:" . $new_location);
    exit;
}

function mysqli_preparation($string)
{
    global $connection;
    $escaped_string = mysqli_real_escape_string($connection, $string);
    return $escaped_string;
}
