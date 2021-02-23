<?php
include_once("./includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need Sign In first";
    redirect("login.php");
}
echo message();
require_once("./includes/db.php");

$h_id = $_SESSION["h_id"];
$q = "SELECT * FROM services where id = '$h_id'";
$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
$PN = '0';
$HP = '0';
$WM = '0';
$MET = '0';
$BAQ = '0';
$submit = '0';
if (isset($_POST["PN"])) {
    $PN = '1';
}
if (isset($_POST["HP"])) {
    $HP = '1';
}
if (isset($_POST["WM"])) {
    $WM = '1';
}
if (isset($_POST["MET"])) {
    $MET = '1';
}
if (isset($_POST["BAQ"])) {
    $BAQ = '1';
}
if ($num) {
    $query =  "UPDATE `services` SET `PN`='$PN',`HP`='$HP',`WM`='$WM',`MET`='$MET',`BAQ`='$BAQ' where `id`='$h_id'";
    $_SESSION["message"] = "Services Updated Successfully";
} else {
    $query = "INSERT INTO `services`(`id`, `PN`, `HP`, `WM`, `MET`, `BAQ`) VALUES ('$h_id','$PN','$HP','$WM','$MET','$BAQ')";
    $_SESSION["message"] = "Services Inserted Successfully";
}
if (mysqli_query($connection, $query)) {
    redirect();
} else {
    $_SESSION["message"] = "Operation Failed";
    redirect();
}
