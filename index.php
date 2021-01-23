<?php
include_once("./includes/function.php");
require_once("./includes/db.php");
include_once("./includes/header.php");
echo message();
echo username();
?>
<div class="main_div">
    <h1 class="text-center title">Time to Get Working</h1>
    <h3 class="text-center sub">
        If you are unemployed or want to work as a side job then this is the place for you, here you can register your self to make your profile that attract management persons to hire you on job basis, and if you looking for people that can provide nursing then you can also get a list of the suitable people here.
    </h3>

    <div class="sub_buttons">
        <a href="getHired.php" class="getStarted text-center">
            Earn Money Freelancing
        </a>
        <a href="hire.php" class="getStarted text-center">
            Hire a Freelancer
        </a>
    </div>
</div>


<?php include_once("./includes/footer.php");
