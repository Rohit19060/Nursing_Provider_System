<!DOCTYPE html>
<html>

<head>
    <title>Nursing Care</title>
    <link rel="stylesheet" href="./styles/styles.css" />
    <style>
        body {
            background-image: url("./images/1.png");
        }
    </style>
</head>

<body>
    <?php
    include_once("./includes/function.php");
    if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
        $_SESSION["message"] = "Your can't go back to Sign In page";
        redirect();
    }
    ?>
    <form method="POST" class="RegistrationForm" action="register_logic.php">
        <h2 class="mb-3 mt-3">
            <a href="index.php">Nursing Care</a>
        </h2>
        <h1 class=" mt-3 col_theme">Sign Up</h1>
        <?php echo message(); ?>
        <div class="inputDiv">
            <label for="username">Name</label>
            <input type="text" name="username" required />
        </div>
        <div class="inputDiv">
            <label for="email">Email</label>
            <input type="email" name="email" required />
        </div>
        <div class="inputDiv">
            <label for="Dob">Dob</label>
            <input type="date" name="dob" required />
        </div>
        <div class="inputDiv">
            <label for="address">Address</label>
            <input type="text" name="address" required />
        </div>
        <div class="inputDiv">
            <label for="phone">Phone</label>
            <input type="number" name="phone" required minlength="10" maxlength="11" />
        </div>
        <div class="inputDiv">
            <label for="password1">Password</label>
            <input type="password" name="password1" required />
        </div>
        <div class="inputDiv">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" required />
        </div>
        <div>As
            <input type="radio" name="type" id="freelancer" value="freelancer" required />
            <label for="freelancer">Care Giver</label>
            <input type="radio" name="type" id="client" value="client" required />
            <label for="client">Client</label>
        </div>
        <div class="text-center mb-3 mt-3">
            <a href="login.php" class="col_theme">
                Sign In Instead
            </a>
        </div>
        <div class="text-center mb-2">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
</body>

</html>