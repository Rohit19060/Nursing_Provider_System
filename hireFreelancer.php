<!DOCTYPE html>
<html>

<head>
    <title>Nursing Care</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <?php
    include_once("./includes/function.php");
    include_once("./includes/db.php");

    if (!isset($_SESSION["m_id"])) {
        $_SESSION["message"] = "You can't access this page";
        redirect("hire.php");
    }
    $h_id = $_GET['id'];
    $m_id = $_SESSION["m_id"];
    if (isset($_POST["submit"])) {
        $upto = mysqli_preparation($_POST["upto"]);
        $id = mysqli_preparation($h_id);
        $rate = mysqli_preparation($_POST["rate"]);
        $today = mysqli_preparation(date('Y-m-d'));

        $query = "INSERT INTO `orders`(`h_id`, `date_hired`, `date_upto`, `amount`,`m_id`) VALUES ('$id','$today','$upto','$rate','$m_id')";
        if ($result = mysqli_query($connection, $query)) {
            echo "<h2 class='inputDiv'>Hiring and Payment Successful</h2>";
            echo "<a href='hire.php' class='inputDiv text-center mb-2'><button>Go Back</button></a>";
            $order_id = mysqli_insert_id($connection);
            $query_update = "UPDATE `freelancer` SET `order_id`='$order_id',`hired`='$m_id' WHERE `h_id` = $id";
            mysqli_query($connection, $query_update);
        } else {
            echo "<h2 class='inputDiv'>Hiring and Payment UnSuccessful</h2>";
            echo "<a href='hire.php' class='inputDiv text-center mb-2'><button>Go Back</button></a>";
        }
    } else {
    ?>
        <form method="post" class="RegistrationForm">
            <h2 class="mb-3 mt-3">
                <a href="index.php">Nursing Care</a>
            </h2>
            <h1 class="mb-3 mt-3 col_theme">Enter Hiring Details</h1>
            <div class="inputDiv">
                <label for="upto">Hiring Upto</label>
                <input type="date" name="upto" id="upto" required onchange="calc()" />
            </div>
            <div class="inputDiv">
                <?php

                $q = "SELECT * FROM freelancer where h_id = '$h_id'";
                $result = mysqli_query($connection, $q);
                $num = mysqli_num_rows($result);
                if ($num) {
                    $user = mysqli_fetch_assoc($result);
                }

                ?>
                <label for="exp">Price <?php echo $user["rate"]; ?> RM/hour</label>
                <input type="text" name="rate" id="rate" required readonly />RM
            </div>
            <h1 class="mb-3 mt-3 col_theme">Payment Details</h1>
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
    <script>
        function calc() {
            let rate = Math.abs(parseInt((new Date(new Date().toISOString().slice(0, 10)) - new Date(document.getElementById("upto").value)) / (1000 * 60 * 60 * 24), 10) * 8 * <?php echo $user["rate"]; ?>);
            document.getElementById("rate").value = rate;
        }
    </script>
</body>

</html>