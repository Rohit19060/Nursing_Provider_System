<!DOCTYPE html>
<html>

<head>
    <title>Nursing Provider System</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <header>
        <nav class="Header">
            <a href="index.php">
                <h1>Nursing Provider System</h1>
            </a>
            <?php
            if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
            ?>
                <div class="Header__logged-in">
                    <?php
                    if (isset($_SESSION["m_id"])) {
                        echo '<a href="hire.php">Profile</a>';
                    } else {
                        echo
                        '<a href="getHired.php">Profile</a>';
                    }
                    ?>
                    <a href="logout.php">
                        Logout
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div class="Header__not-logged-in">
                    <a href="register.php">
                        Register
                    </a>
                    <a href="login.php">
                        Login
                    </a>
                </div>
            <?php
            }
            ?>
        </nav>
    </header>