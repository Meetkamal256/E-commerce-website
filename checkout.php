<?php
include("partials/connect.php");
include_once("functions/common_functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce Checkout</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="header">
        <a href="index.php" class="logo">LeisureWears</a>
        <div>
            <ul id="navbar">

                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="display_all.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<li><a href='./users_area/profile.php'>My Account</a></li>";
                } else {
                    echo "<li><a href='./users_area/user_registration.php'>Register</a></li>";
                }
                ?>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Welcome Guest</a></li>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li><a href='#'>Welcome Guest</a></li>";
                } else {
                    echo "<li><a href='#'>Welcome " . $_SESSION['username'] . "</a></li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo " <li><a href='users_area/user_login.php'>Login</a></li>";
                } else {
                    echo " <li><a href='users_area/logout.php'>Logout</a></li>";
                }
                ?>
                <li>
                    <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
                </li>
                <a href="#"><i class="fas fa-times" id="close"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
            <i class="fas fa-outdent" id="menu-open"></i>
        </div>
    </section>

    <?php
    if (!isset($_SESSION['username'])) {
        include("users_area/user_login.php");
    } else {
        include("payment.php");
    }
    ?>







    <?php include("partials/footer.php"); ?>
    <script src="script.js"></script>

</body>

</html>