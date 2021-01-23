<?php
include_once("./includes/function.php");
if (!isset($_SESSION["h_id"])) {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}

include_once("./includes/header.php");
echo message();
require_once("./includes/db.php");
$h_id = $_SESSION["h_id"];
$q = "SELECT * FROM freelancer where h_id = '$h_id'";
$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
if ($num) {
    $user = mysqli_fetch_assoc($result)
?>
    <form action="update.php?table=1" method="post">
        <h1>Update</h1>
        <?php echo message(); ?>
        <div class="inputDiv">
            <label for="username">Name</label>
            <input type="text" name="username" value="<?php echo $user["name"]; ?>" required />
        </div>
        <div class="inputDiv">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $user["email"]; ?>" required />
        </div>
        <div class="inputDiv">
            <label for="password1">Current Password</label>
            <input type="password" name="password1" required />
        </div>
        <div class="inputDiv">
            <label for="password2">New Password</label>
            <input type="password" name="password2" required />
        </div>
        <div class="inputDiv">
            <label for="password3">Confirm Password</label>
            <input type="password" name="password3" required />
        </div>
        <div class="text-center mb-2 mt-3">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
<?php
}
?>




<form action="delete.php?table=1" method="post">
    <h1>Delete</h1>
    <div class="inputDiv">
        <label for="password1">Current Password</label>
        <input type="password" name="password" required />
    </div>
    <div class="text-center mb-2 mt-3">
        <input type="submit" value="Submit" name="submit" />
    </div>
</form>

<?php include_once("includes/footer.php"); ?>