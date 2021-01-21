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
    if (isset($_SESSION["message"])) {
        echo "<h2 style='color: red'>" . $_SESSION["message"] . "</h2>";
        $_SESSION["message"] = null;
    }
    if (isset($_POST["submit"])) {
        require_once("includes/db.php");
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query_login = "SELECT * from users where email = '$email'";

        $result = mysqli_query($connection, $query_login);
        while ($user = mysqli_fetch_assoc($result)) {
            if ($user["password"] == $password) {
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["message"] = "Logged In Successfully";
                header("Location: index.php");
            }
        }
    }
    ?>
    <form method="post" class="RegistrationForm">
        <h2 class=" mb-3 mt-3">
            <a href="index.php">Nursing Provider System</a>
        </h2>
        <h1 class="mb-3 mt-3 col_theme">Log In</h1>
        <div class="inputDiv">
            <label for="email">Email:</label>
            <input type="email" name="email" required />
        </div>
        <div class="inputDiv">
            <label for="password">Password:</label>
            <input type="password" name="password" required />
        </div>

        <div class="text-center mb-3 mt-3">
            <a href="register.php" class="col_theme">
                Register Instead
            </a>
        </div>
        <div class="text-center mb-2">
            <input type="submit" value="Submit" />
        </div>
    </form>
</body>

</html>