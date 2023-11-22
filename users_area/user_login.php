<?php
include(__DIR__ . "/../partials/connect.php");
include_once(__DIR__ . "/../functions/common_functions.php");
@session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../styles.css" />
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 550px;
            margin: 20px auto;

        }

        h1 {
            text-align: center;
            color: #088178;
            font-size: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #088178;
        }

        input[type='text'],
        input[type='password'],
        input[type='file'] {
            width: 100%;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;

        }

        input[type='text']:focus,
        input[type='password']:focus {
            outline: none;
            border: 2px solid lightblue;
        }



        .reg-btn input {
            background-color: #088178;
            border: none;
            padding: 7px 25px;
            color: #ffff;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .reg-btn input:hover {
            background-color: #041E42;
        }

        .small {
            font-weight: bold;
            font-size: smaller;
            color: red;
        }

        /* Responsive styles */
        @media (min-width: 576px) and (max-width: 1024px){
            footer{
                margin-bottom: 800px;
            }
        } 
        
        
        
        @media (max-width: 576px) {
            .container {
                margin: 20px 30px;
            }
            
            footer{
                margin-bottom: 300px;
            }
        }
    </style>
</head>

<body>
    <section id="header">
        <a href="../index.php" class="logo">LeisureWears...</a>
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
    <div class="container">
        <!-- Username field  -->
        <form action="" method="post">
            <h1>User Login</h1>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required">
            </div>


            <div>
                <!-- Password Field -->
                <label for="user_password">Password</label>
                <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
            </div>
            
            <div class="reg-btn">
                <input type="submit" value="Login" name="user_login">
            </div>
            <p>Don't have an account Register?<a href="user_registration.php" class="small"> Register</a></p>
        </form>
    </div>

    <footer>
        <div class="col">
            <a href="index.php" class="logo">LeisureWears...</a>
            <h4>Contact</h4>
            <p> <strong>Address: </strong> 562 Wellington Road Street 32 San Francisco </p>
            <p><strong>Phone:</strong> +012222 365/(+91) 0123456789</p>
            <p><strong>Hours:</strong> 10:00 - 18:00 Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icons">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-pinterest"></i>
                    <i class="fa fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Terms and Conditions</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install</h4>
            <p>From App Store or Google Store</p>
            <div class="row">
                <img src="../img/pay/app.jpg" alt="">
                <img src="../img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateway</p>
            <img src="../img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p> &copy Copyright 2023</p>
        </div>
    </footer>
    <script src="../script.js"></script>

</body>

</html>

<!-- php code -->
<?php
if (isset($_POST['user_login'])) {
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    
    $select_query = "SELECT * from user_table WHERE username = '$username'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
    
    // cart items
    $select_query_cart = "SELECT * from cart_details WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn, $select_query_cart);
    $row_count_cart = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Log in Successful')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $username;
                // echo "<script>alert('Log in Successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            } else {
                $_SESSION['username'] = $username;
                // echo "<script>alert('Log in Successful')</script>";
                echo "<script>window.open('payment.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>