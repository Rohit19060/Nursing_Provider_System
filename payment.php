<!DOCTYPE html>
<html>

<head>
    <title>Nursing Care</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <?php
    include_once("./includes/function.php");
    if (!isset($_SESSION["m_id"])) {
        $_SESSION["message"] = "You can't access this page";
        redirect("hire.php");
    }
    if (isset($_POST["submit"])) {
        echo "<h2 class='inputDiv'>Payment Successful</h2>";
        echo "<a href='hire.php' class='inputDiv text-center mb-2'><button>Go Back</button></a>";
    } else {
    ?>
        <form method="post" class="RegistrationForm">
            <h2 class="mb-3 mt-3">
                <a href="index.php">Nursing Care</a>
            </h2>
            <h1 class="mb-3 mt-3 col_theme">Enter Hiring Details</h1>
            <div class="inputDiv">
                <label for="exp">Hiring Date</label>
                <input type="month" name="exp" required />
            </div>
            <div class="inputDiv">
                <label for="exp">Price 20 RM/hour</label>
                <input type="text" name="exp" required readonly />RM
            </div>
            <div class="inputDiv">
                <label for="name">Name on card</label>
                <input type="name" name="name" required />
            </div>
            <div class="inputDiv">
                <label for="card">Credit card number</label>
                <input type="number" name="card" required />
            </div>
            <div class="inputDiv">
                <label for="exp">Expiration</label>
                <input type="month" name="exp" required />
            </div>
            <div class="inputDiv">
                <label for="CVV">CVV</label>
                <input type="password" name="CVV" required maxlength="3" />
            </div>

            <div class="text-center mb-2">
                <input type="submit" value="Submit" name="submit" />
            </div>
        </form>
    <?php  } ?>
</body>

</html>