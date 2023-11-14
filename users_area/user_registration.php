<!-- php code -->
<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_conf_password = $_POST['user_conf_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    
    $select_query = "SELECT * from user_table WHERE username = '$username' OR user_email = '$user_email'";
    $result = mysqli_query($conn, $select_query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        echo "<script>alert('Username and Email already exists in database')</script>";
    } else if ($user_password != $user_conf_password) {
        echo "<script>alert('passwords do not match')</script>";
    } else {
        // insert query
        move_uploaded_file($user_image_tmp, "../product_images/$user_image");
        $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
            VALUES('$username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($conn, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Data successfully added to database')</script>";
        } else {
            echo "Error: .mysqli_error($conn)";
        }
    }
    // selecting cart items
    $select_cart_items = "SELECT * from cart_details WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn, $select_cart_items);
    $num_rows = mysqli_num_rows($result_cart);
    if ($num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('../checkout.php', '_self')</script>";
    } else {
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="../styles.css" />
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
    

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        
        }

        #container {
            max-width: 550px;
            margin: 20px auto;
            min-height: 100vh;

        }
        
        h1 {
            text-align: center;
            color:  #088178;
            font-size: 28px;
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
        
        .reg-btn input:hover{
            background-color: #041E42;
        }
        .small {
            font-weight: bold;
            font-size: smaller;
            color: red;
        }
        
        /* Responsive styles */
        
        @media (max-width: 576px) {
            #container {
                margin: 20px 30px;
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
    <div id="container">
        <!-- Username field  -->
        <form action="" method="post" enctype="multipart/form-data">
            <h1>User Registration</h1>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required">
            </div>
            <!-- Email field -->
            <div>
                <label for="user_email">Email</label>
                <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Enter Your Email Address" autocomplete="off" required="required">
            </div>
            <!-- Image field -->
            <div>
                <label for="user_image">User Image</label>
                <input type="file" id="user_image" name="user_image" required="required">
            </div>
            <div>
                <!-- Password Field -->
                <label for="user_password">Password</label>
                <input type="password" id="user_password" name="user_password" placeholder="Enter Your Password" autocomplete="off" required="required">
            </div>
            <!-- Confirm Password Field -->
            <div>
                <label for="conf_password">Confirm Password</label>
                <input type="password" id="conf_password" name="user_conf_password" placeholder="Confirm Your Password" autocomplete="off" required="required">
            </div>
            <!-- Address field -->
            <div>
                <label for="user_address">Address</label>
                <input type="text" id="user_address" name="user_address" placeholder="Enter Your Address" autocomplete="off" required="required">
            </div>
            <!-- Contact field -->
            <div>
                <label for="user_contact">Contact</label>
                <input type="text" id="user_contact" name="user_contact" placeholder="Enter Your Mobile Number" autocomplete="off" required="required">
            </div>
            <div class="reg-btn">
                <input type="submit" value="Register" name="user_register">
            </div>
            <p>Already have an account?<a href="user_login.php" class="small"> Login</a></p>
    </div>
    </form>
    <footer>
        <div class="col">
            <a href="index.php" class="logo">LeisureWears</a>
            <h4>Contact</h4>
            <p> <strong>Address: </strong> 352 Leisurewear Road street 25 Abuja</p>
            <p><strong>Phone:</strong> +2340001236789 0123456789</p>
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