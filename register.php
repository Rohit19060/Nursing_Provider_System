<!DOCTYPE html>
<html>

<head>
    <title>Nursing Provider System</title>
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
        $_SESSION["message"] = "Your can't go back to login page";
        redirect();
    }
    ?>
    <form method="POST" class="RegistrationForm" action="register_logic.php">
        <h2 class="mb-3 mt-3">
            <a href="index.php">Nursing Provider System</a>
        </h2>
        <h1 class=" mt-3 col_theme">Register</h1>
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
            <label for="password1">Password</label>
            <input type="password" name="password1" required />
        </div>
        <div class="inputDiv">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" required />
        </div>
        <div>As
            <input type="radio" name="type" id="freelancer" value="freelancer" required />
            <label for="freelancer">Freelancer</label>
            <input type="radio" name="type" id="management" value="management" required />
            <label for="management">Management</label>
        </div>
        <div class="text-center mb-3 mt-3">
            <a href="login.php" class="col_theme">
                Log In Instead
            </a>
        </div>
        <div class="text-center mb-2">
            <input type="submit" value="Submit" name="submit" />
        </div>
    </form>
</body>

</html>