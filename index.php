<!DOCTYPE html>
<html>

<head>
    <title>Nursing Provider System</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <?php include_once "./includes/header.php";
    if (isset($_SESSION["message"])) {
        echo "<h2 style='color: red'>" . $_SESSION["message"] . "</h2>";
        $_SESSION["message"] = null;
    }
    require_once("includes/db.php");
    ?>

    <div class="main_div">
        <h1 class="text-center title">Time to Get Working</h1>
        <h3 class="text-center sub">
            If you are unemployed or want to work as a side job then this is the place for you, here you can register your self to make your profile that attract management persons to hire you on job basis, and if you looking for people that can provide nursing then you can also get a list of the suitable people here.
        </h3>

        <div class="sub_buttons">
            <a href="gethired.php" class="getstarted text-center">
                Get Hired
            </a>
            <a href="hire.php" class="getstarted text-center">
                Hire Staff
            </a>
        </div>
    </div>


</body>

</html>