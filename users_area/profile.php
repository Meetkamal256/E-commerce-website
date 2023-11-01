<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce website</title>
    <link rel="stylesheet" href="../styles.css" />
</head>
<script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
<style>
    #user_dashboard {
        color: #fff;
        text-align: center;
    
    }
    
    #sidebar {
        background-color: gray;
        color: #fff;
        width: 150px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        padding: 20px;
        margin-top: 120px;
        height: 100vh;
    }
    
    .sidebar-heading {
        background-color: blue;
        width: 100%;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
    }
    
    #sidebar h1 {
        font-size: 1.2em;
        margin-bottom: 15px;
        color: #fff;
        width: 100%;
    }
    
    #sidebar li {
        list-style: none;
    }
    
    #sidebar a {
        color: #fff;
        text-decoration: none;
        display: block;
        margin-bottom: 15px;
    }
    
    .profile-img {
        width: 80%;
        height: 100%;
        margin-bottom: 15px;
        margin-top: 150px;
    }
    
    #container {
        /* display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center; */
        text-align: center;
    }
    
    #container h3 {
        margin-top: 100px;
        margin-bottom: 15px;
        color: green;
        font-size: 20px;
        font-weight: 500;
    }
    
    #container p {
        margin-top: 20px;
    }
    
    #container span {
        color: red;
    }
    
    #mobile-toggle{
        display: none;
    }
    
    /* Responsive design */
    @media (max-width: 1280px){
        
        #sidebar {
        background-color: gray;
        color: #fff;
        width: 150px;
        position: fixed;
        top: 0;
        left: -150px;
        height: 100vh;
        padding: 20px;
        margin-top: 120px;
        height: 100%;
        transition: 0.3s;
    }
        #mobile-toggle{
            display: block;
        }
        
        #mobile-toggle i{
            color: blue;
            font-size: 20px;
            padding-left: 15px;
            padding-top: 7px;
            cursor: pointer;
        }
    }
    
    #sidebar.active{
        left: 0;
    }
    
</style>

<body>
    <section id="header">
        <a href="index.php" class="logo">LeisureWears</a>
        <div>
            <ul id="navbar">
                <li><a href="../index.php" class="active">Home</a></li>
                <li><a href="../display_all.php">Shop</a></li>
                <li><a href="../blog.php">Blog</a></li>
                <li><a href="../about.php">About</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<li><a href='profile.php'>My Account</a></li>";
                } else {
                    echo "<li><a href='./users_area/user_registration.php'>Register</a></li>";
                }
                ?>
                <li><a href="../contact.php">Contact</a></li>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li><a href='#'>Welcome Guest</a></li>";
                } else {
                    echo "<li><a href='#'>Welcome " . $_SESSION['username'] . "</a></li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo " <li><a href='user_login.php'>Login</a></li>";
                } else {
                    echo " <li><a href='logout.php'>Logout</a></li>";
                }
                ?>
                <li>
                    <a href='../cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
                </li>
                <a href="#"><i class="fas fa-times" id="close"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href='../cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
            <i class="fas fa-outdent" id="menu-open"></i>
        </div>
    </section>
    
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <div id="user_dashboard">
        <div id="sidebar">
            <div class="sidebar-heading">
                <h1>Your Profile</h1>
            </div>
            <ul>
                <?php
                $username = $_SESSION['username'];
                $select_query = "SELECT * from user_table WHERE username = '$username'";
                $result = mysqli_query($conn, $select_query);
                $row_img = mysqli_fetch_assoc($result);
                $user_img = $row_img['user_image'];
                echo "<li><img src='../product_images/$user_img' class='profile-img' alt=''></li>";
                ?>
                <li><a href="profile.php">Pending Orders</a></li>
                <li> <a href="profile.php?edit_account">Edit Account</a></li>
                <li><a href="profile.php?my_orders">My Orders</a></li>
                <li><a href="profile.php?delete_account">Delete Account</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div id="mobile-toggle">
        <i class="fas fa-outdent" id="sidebar-toggle"></i>
    </div>
    
    <div id="container">
        <?php
        get_user_order_details();
        if (isset($_GET['edit_account'])) {
            include('edit_account.php');
        }
        if (isset($_GET['my_orders'])) {
            include("user_orders.php");
        }
        ?>
    </div>
    
    <!-- Update your JavaScript to toggle the correct class -->
    <script src="../script.js"></script>


</body>

</html>