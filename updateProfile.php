<?php
include_once("./includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need Sign In first";
    redirect("login.php");
}
echo message();
require_once("./includes/db.php");
$id = $_SESSION["h_id"];
if (isset($_POST["submit"])) {
    $Profile = $_FILES["profile"];
    $ProfileName = $Profile['name'];
    $ProfiletmpName = $Profile['tmp_name'];
    $ProfileError = $Profile['error'];
    $ProfileType = $Profile['type'];
    $ProfileExt = explode('.', $ProfileName);
    $ProfileActualExt = strtolower(end($ProfileExt));
    $allow = ['jpg', 'png'];
    if (!in_array($ProfileActualExt, $allow)) {
        $_SESSION["message"] = "You can not upload file of $ProfileType type";
    } else if ($ProfileError !== 0) {
        $_SESSION["message"] = "There was an error uploading your pdf!";
    } else {
        $ProfileNewName = $id . "profile" . $ProfileName;
        $Profiledestination = "images/$ProfileNewName";
        move_uploaded_file($ProfiletmpName, $Profiledestination);
    }
    $IC = $_FILES["ic"];
    $ICName = $IC['name'];
    $ICtmpName = $IC['tmp_name'];
    $ICError = $IC['error'];
    $ICType = $IC['type'];
    $ICExt = explode('.', $ICName);
    $ICActualExt = strtolower(end($ICExt));
    $allow = ['pdf'];
    if (!in_array($ICActualExt, $allow)) {
        $_SESSION["message"] = "You can not upload file of $ICType type";
    } else if ($ICError !== 0) {
        $_SESSION["message"] = "There was an error uploading your pdf!";
    } else {
        $ICNewName = $id . "ic" .  $ICName;
        $ICdestination = "uploads/$ICNewName";
        move_uploaded_file($ICtmpName, $ICdestination);
    }
    $Certificate = $_FILES["certificate"];
    $CertificateName = $Certificate['name'];
    $CertificatetmpName = $Certificate['tmp_name'];
    $CertificateError = $Certificate['error'];
    $CertificateType = $Certificate['type'];
    $CertificateExt = explode('.', $CertificateName);
    $CertificateActualExt = strtolower(end($CertificateExt));
    $allow = ['pdf'];
    if (!in_array($CertificateActualExt, $allow)) {
        $_SESSION["message"] = "You can not upload pdf of this $CertificateType type";
    } else if ($CertificateError !== 0) {
        $_SESSION["message"] = "There was an error uploading your pdf!";
    } else {
        $CertificateNewName = $id . "certificate" . $CertificateName;
        $Certificatedestination = "uploads/$CertificateNewName";
        move_uploaded_file($CertificatetmpName, $Certificatedestination);
    }
    $query_update = "UPDATE `freelancer` SET `profile`='$ProfileNewName',`ic`='$ICNewName',`certificate`='$CertificateNewName' WHERE `h_id` = $id";
    $result = mysqli_query($connection, $query_update);
    if ($result) {
        $_SESSION["message"] = "Rate Updated Successfully";
        redirect();
    } else {
        $_SESSION["message"] = "There is some error in updating rate";
        redirect();
    }
}
