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
    include_once("includes/function.php");
    if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
        $_SESSION["message"] = "You can't access this page";
        redirect();
    }
    ?>
    <form method="post" class="RegistrationForm" action="login_logic.php">
        <h2 class="mb-3 mt-3">
            <a href="index.php">Nursing Care</a>
        </h2>
        <h1 class="mb-3 mt-3 col_theme">Sign In</h1>
        <?php echo message(); ?>
        <div class="inputDiv">
            <label for="email">Email</label>
            <input type="email" name="email" required />
        </div>
        <div class="inputDiv">
            <label for="password">Password</label>
            <input type="password" name="password" required />
        </div>
        <div>As
            <input type="radio" name="type" id="freelancer" value="freelancer" required />
            <label for="freelancer">Care Giver</label>
            <input type="radio" name="type" id="client" value="client" required />
            <label for="client">Client</label>
        </div>
        <div class="text-center mb-3 mt-3">
            <a href="register.php" class="col_theme">
                Sign Up Instead
            </a>
        </div>
        <div class="text-center mb-2">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
</body>

</html>