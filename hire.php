<?php
include_once("./includes/function.php");
if (!isset($_SESSION["m_id"])) {
    $_SESSION["message"] = "You need to login first";
    redirect("login.php");
}

include_once("./includes/header.php");
echo message();
require_once("./includes/db.php");
?>
<div class="text-center search">
    <h2 class='mb-2 mt-3'>Search Freelancers</h2>
    <input type="search" id="search" placeholder="Search by Name" onkeyup="load(this.value)" class="form-control">
    <div id="output" class="mt-3 mb-2"></div>
</div>
<script>
    function load(str) {
        if (str.length == 0) {
            document.getElementById("output").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("output").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "search.php?q=" + str );
            xmlhttp.send();
        }
    }
</script>
<?php



$q = "SELECT * FROM freelancer";

$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
if ($num) {
?>
    <div class="mt-3">&nbsp;</div>
    <h2 class="text-center mb-3">Freelancers</h2>
    <div class="hire_table">
        <table class='freelancers'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Hire</th>
            </tr>
        <?php
        while ($user = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $user["name"] . "</td>";
            echo "<td>" . $user["email"] . "</td>";
            if ($user["hired"] == 0) {
                echo "<td><a href='hireFreelancer.php?id=" . $user["h_id"] . "'> Hire Me! </a> </td>";
            } else {
                echo "<td>Already Hired</td>";
            }

            echo "</tr>";
        }
    }
        ?>
        </table>
    </div>






    <?php include_once("includes/footer.php"); ?>