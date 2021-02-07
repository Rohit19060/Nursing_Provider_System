<!DOCTYPE html>
<html>

<head>
    <title> Nursing Provider System</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <header class="pb-2">
        <div class="text-center mb-3">
            <a href="index.php">
                <h1>Nursing Provider System</h1>
            </a>
        </div>

        <div class="logged-in">
            <?php
            if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
            ?>
                <?php
                if (isset($_SESSION["m_id"])) {
                    echo '<a href="managementProfile.php">Profile</a>';
                    echo '<a href="hire.php">Home</a>';
                } else {
                    echo
                    '<a href="freelancerProfile.php">Profile</a>
                    <a href="getHired.php">Home</a>';
                }
                ?>

            <?php
            } else {
            ?>
                <a href="register.php">
                    Register
                </a>
                <a href="login.php">
                    Login
                </a>
            <?php
            }
            ?> <a href="about.php">
                About Us
            </a>
            <a href="contact.php">
                Contact Us
            </a>

            <?php if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
            ?>
                <a href="logout.php">
                    Logout
                </a><?php
                } ?>
        </div>
    </header>