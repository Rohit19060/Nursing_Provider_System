<!DOCTYPE html>
<html>

<head>
    <title> Nursing Care</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <header class="pb-2">
        <div class="text-center mb-3 logo">
            <a href="index.php">
                <img src="images/logo.png" alt="logo" width="100px" />
                <h1 style="color:rgb(41, 115, 226);">Nursing Care</h1>
            </a>
        </div>
        <div class="logged-in">
            <?php
            if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
                if (isset($_SESSION["m_id"])) {
                    echo '<a href="hire.php">Home</a>';
                } else {
                    echo '<a href="getHired.php">Home</a>';
                }
            } ?>
            <a href="services.php">
                Services
            </a>
            <a href="about.php">
                AboutUs
            </a>
            <a href="contact.php">
                ContactUs
            </a>
            <?php
            if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
                if (isset($_SESSION["m_id"])) {
                    echo '<a href="client.php">Setting</a>';
                } else {
                    echo '<a href="freelancerProfile.php">Setting</a>';
                }
            } else {
            ?>
                <a href="register.php">
                    SignUp
                </a>
                <a href="login.php">
                    SignIn
                </a>
            <?php
            }
            ?>
            <?php if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
            ?>
                <a href="logout.php">
                    SignOut
                </a><?php
                }
                if (!isset($_SESSION["h_id"])) {
                    echo ' <a href="hire.php">
           BookNow!
       </a>';
                }
                    ?>
        </div>
    </header>