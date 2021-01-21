<header>
    <nav class="Header">
        <a href="index.php">
            <h1> Nursing Provider System</h1>
        </a>
        <?php
        session_start();
        if (isset($_SESSION["h_id"]) || isset($_SESSION["m_id"])) {
        ?>
            <div class="Header__logged-in">
                <?php
                if (isset($_SESSION["admin_id"])) {
                    echo '<a href="admin.php">Profile</a>';
                } else {
                    echo
                    '<a href="profile.php">Profile</a>';
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