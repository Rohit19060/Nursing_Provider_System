<!DOCTYPE html>
<html>

<head>
    <title>Nursing Provider System</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION["h_id"]) && isset($_SESSION["m_id"])) {
        $_SESSION["message"] = "Your can't go back to login page";
        header("Location: index.php");
    }
    ?>
    <form method="post" class="RegistrationForm">
        <h2 class=" mb-3 mt-3">
            <a href="index.php">Nursing Provider System</a>
        </h2>
        <h1 class="mb-3 mt-3 col_theme">Register</h1>
        <div class="inputDiv">
            <label for="username">Name:</label>
            <input type="text" name="username" required />
        </div>
        <div class="inputDiv">
            <label for="email">Email:</label>
            <input type="email" name="email" required />
        </div>
        <div class="inputDiv">
            <label for="password1">Password:</label>
            <input type="password" name="password1" required />
        </div>
        <div class="inputDiv">
            <label for="password2">Confirm Password:</label>
            <input type="password" name="password2" required />
        </div>
        <div class="text-center mb-3 mt-3">
            <a href="login.php" class="col_theme">
                Log In Instead
            </a>
        </div>
        <div class="text-center mb-2">
            <input type="submit" value="Submit" />
        </div>
    </form>
</body>

</html>