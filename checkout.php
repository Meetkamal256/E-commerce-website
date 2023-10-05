<?php
include("partials/connect.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce website Checkout</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="header">
        <a href="#"><img src="img/logo.png" alt="" /></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="display_all.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="register.php">Register</a></li>
                <li>
                <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items();?></sup></a> 
                </li>
                <a href="#"><i class="fas fa-times" id="close"></i></a>
            </ul>
        </div>
        <div id="mobile">
        <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items();?></sup></a> 
            <i class="fas fa-outdent" id="menu-open"></i>
        </div>
    </section>

    <?php
        if(!isset($_SESSION['username'])){
            include("users_area/user_login.php");
        }else{
            include("payment.php");
        }
    ?>
    
    
  
    
    

   
    <?php include("partials/footer.php"); ?>
    <script src="script.js"></script>

</body>

</html>