<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    #container {
        margin: 0 0px 0px 100px;
    }
    
    h1 {
        text-align: center;
        color: #041E42;
        font-size: 25px;
        margin-top: 50px;
    
    }
    
    h2 {
        font-size: 25px;
    }
    
    
    
    .payment {
        display: flex;
        align-items: center;
    }
    
    .img-container {
        width: 450px;
        margin-top: 50px;
    }
    
    img {
        width: 100%;
        /* margin: auto; */
    
    }
    
    .pay-offline {
        margin-left: 40px;
    }
    
    
    /* Responsive styles */
    
    @media (max-width: 576px) {
        #container {
            margin: 0 0px 0px 20px;
        }
        
        .img-container {
            width: 350px;
        }
        
        .pay-offline {
            margin-left: 20px;
        }
    
    }
</style>

<body>
    <section id="header">
        <a href="../index.php" class="logo">LeisureWears</a>
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
                    echo "<li><a href='user_registration.php'>Register</a></li>";
                }
                ?>
                <li><a href="contact.php">Contact</a></li>
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
    <?php
    
    $user_ip = getIpAddress();
    $get_user = "SELECT * from user_table WHERE user_ip = '$user_ip'";
    $result = mysqli_query($conn, $get_user);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    echo $user_id;
    ?>
    
    <h1>Payment Options</h1>
    <div id="container">
        <div class="payment">
            <div class="img-container">
                <img src="../img/payment.jpg" alt="">
            </div>
            <div class="pay-offline">
                <a href="order.php?user_id=<?php echo $user_id ?>">
                    <h2>Pay Offline</h2>
                </a>
            </div>
        </div>
    </div>
    <?php include_once("../partials/footer.php"); ?> 
    <script src="../script.js"></script>
</body>

</html>