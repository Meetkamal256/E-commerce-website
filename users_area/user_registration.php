<!-- php code -->
<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_ip = getIPAddress();
$username = $user_email = $user_password = $user_conf_password = $user_image = $user_address = $user_contact = ""; // initialize each input field to an empty string
$errors = array('username' => "", 'user_email' => "", 'user_password' => "", 'user_conf_password' => "", 'user_image' => "", 'user_address' => "", 'user_contact' => ""); // store them in the errors array
if (isset($_POST['user_register'])) {
    $user_ip = getIPAddress();
    // validate username
    if (empty($_POST['username'])) {
        $errors['username'] = "A username is required <br>";
    } else {
        $username = $_POST['username'];
    }
    
    // validate email
    if (empty($_POST['user_email'])) {
        $errors['user_email'] = "An email address is required <br>";
    } else {
        $user_email = $_POST['user_email'];
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_email'] = "Email must be a valid address <br>";
        }
    }
    
    // validate password
    if (empty($_POST['user_password'])) {
        $errors['user_password'] = "A password is required <br>";
    } else {
        $user_password = $_POST['user_password'];
    }
    
    // validate confirm password
    if (empty($_POST['user_conf_password'])) {
        $errors['user_conf_password'] = "A password confirmation is required <br>";
    } else {
        $user_conf_password = $_POST['user_conf_password'];
        if ($user_password != $user_conf_password) {
            $errors['user_conf_password'] = "Passwords do not match <br>";
        }
    }
    
    // validate user_image
    $user_image_tmp = '';
    if ($_FILES['user_image']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['user_image'] = "An image is required <br>";
    } else {
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        
        // move uploaded file
        if (!move_uploaded_file($user_image_tmp, "user_images/$user_image")) {
            $errors['user_image'] = "Failed to move uploaded file <br>";
        }
    }
    
    // validate address
    if (empty($_POST['user_address'])) {
        $errors['user_address'] = "An address is required <br>";
    } else {
        $user_address = $_POST['user_address'];
    }
    
    // validate contact
    if (empty($_POST['user_contact'])) {
        $errors['user_contact'] = "A mobile number is required <br>";
    } else {
        $user_contact = $_POST['user_contact'];
    }
    
    
    // check if there are no errors before inserting into the database
    if (empty(array_filter($errors))) {
        $username = mysqli_real_escape_string($conn, $username);
        $user_email = mysqli_real_escape_string($conn, $user_email);
        $user_password = mysqli_real_escape_string($conn, $user_password);
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT); // hash password
        $user_address = mysqli_real_escape_string($conn, $user_address);
        $user_contact = mysqli_real_escape_string($conn, $user_contact);
        $user_image = mysqli_real_escape_string($conn, $user_image);

        move_uploaded_file($user_image_tmp, "../product_images/$user_image");
        
        // insert query
        $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
            VALUES('$username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($conn, $insert_query);
        
        if ($sql_execute) {
            // selecting cart items
            $select_cart_items = "SELECT * from cart_details WHERE ip_address = '$user_ip'";
            $result_cart = mysqli_query($conn, $select_cart_items);
            $num_rows = mysqli_num_rows($result_cart);
            if ($num_rows > 0) {
                $_SESSION['username'] = $username;
                echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php', '_self')</script>";
            } else {
                echo "<script>window.open('../index.php', '_self')</script>";
            }
            echo "<script>alert('Data successfully added to the database')</script>";
            echo "<script>window.open('user_login.php', '_self')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
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

        .container {
            max-width: 550px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #088178;
            font-size: 28px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #088178;
            font-size: 15px;
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

        .red-text {
            color: red;
            font-size: 13px;
            margin-bottom: 5px;
        }

        input:focus:invalid{
            border: 1px solid red;
        }
        
        /* Responsive styles */
        
        @media (min-width: 576px) and (max-width: 1024px) {
            footer {
                margin-bottom: 800px;
            }
        }
        

        @media (max-width: 576px) {
            .container {
                margin: 20px 30px;
            }

            footer {
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
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <h1>User Registration</h1>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Your Username" autocomplete="off" value="<?php echo $username ?>" minlength="8" maxlength="15" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$" title="Username must be 8-15 characters containing at least one letter and one number">
                <div class="red-text" id="username_error"><?php echo $errors['username'] ?></div>
            </div>
            <!-- Email field -->
            <div>
                <label for="user_email">Email</label>
                <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Enter Your Email Address" autocomplete="off" value="<?php echo $user_email ?>">
                <div class="red-text" id="user_email_error"><?php echo $errors['user_email'] ?></div>
            </div>
            <!-- Image field -->
            <div>
                <label for="user_image">User Image</label>
                <input type="file" id="user_image" name="user_image" value="<?php echo $user_image ?>">
                <div class="red-text" id="user_image_error"><?php echo $errors['user_image'] ?></div>
            </div>
            <div>
                <!-- Password Field -->
                <label for="user_password">Password</label>
                <input type="password" id="user_password" name="user_password" placeholder="Enter Your Password" autocomplete="off" value="<?php echo $user_password ?>" minlength="8" maxlength="15" pattern="^(?=.*[A-Z])(?=.*\d).{8,12}$" title="Password must be 8-12 characters with at least one capital letter and one number">
                <div class="red-text" id="user_password_error"><?php echo $errors['user_password'] ?></div>
            </div>
            <!-- Confirm Password Field -->
            <div>
                <label for="conf_password">Confirm Password</label>
                <input type="password" id="conf_password" name="user_conf_password" placeholder="Confirm Your Password" autocomplete="off" value="<?php echo $user_conf_password ?>">
                <div class="red-text" id="user_conf_password_error"><?php echo $errors['user_conf_password'] ?></div>
            </div>
            <!-- Address field -->
            <div>
                <label for="user_address">Address</label>
                <input type="text" id="user_address" name="user_address" placeholder="Enter Your Address" autocomplete="off" value="<?php echo $user_address ?>">
                <div class="red-text" id="user_address_error"><?php echo $errors['user_address'] ?></div>
            </div>
            <!-- Contact field -->
            <div>
                <label for="user_contact">Contact</label>
                <input type="text" id="user_contact" name="user_contact" placeholder="Enter Your Mobile Number" autocomplete="off" value="<?php echo $user_contact ?>">
                <div class="red-text" id="user_contact_error"><?php echo $errors['user_contact'] ?></div>
            </div>
            <div class="reg-btn">
                <input type="submit" value="Register" name="user_register">
            </div>
            <p>Already have an account?<a href="user_login.php" class="small"> Login</a></p>
        </form>
    </div>
    
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
    <script src="../script.js"> </script>
    <script>
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Allow only jpg, jpeg, and png
        var maxSizeInBytes = 3 * 1024 * 1024;
        
        function validateForm() {
            // retrieve all values from input field
            var username = document.getElementById("username").value;
            var userEmail = document.getElementById("user_email").value;
            var userImage = document.getElementById("user_image").value;
            var userPassword = document.getElementById("user_password").value;
            var userConfPassword = document.getElementById("conf_password").value;
            var userAddress = document.getElementById("user_address").value;
            var userContact = document.getElementById("user_contact").value;
            // a variable to track form validity
            var isValid = true;
            
            // check for empty input fields
            if (username.trim() == '') {
                document.getElementById('username_error').innerHTML = "A username is required";
                isValid = false; // set isValid to false
            } else {
                document.getElementById('username_error').innerHTML = "";
            
            }
            
            if (userEmail.trim() == '') {
                document.getElementById('user_email_error').innerHTML = "An email address is required";
                isValid = false;
            } else if (!isValidEmail(userEmail)) {
                document.getElementById('user_email_error').innerHTML = "Please provide a valid email address";
                isValid = false;
            } else {
                document.getElementById('user_email_error').innerHTML = "";
            }
            
            if (userPassword.trim() == '') {
                document.getElementById('user_password_error').innerHTML = "A password is required";
                isValid = false; // set isValid to false
            } else {
                document.getElementById('user_password_error').innerHTML = "";
            }
            
            if (userConfPassword.trim() == '') {
                document.getElementById('user_conf_password_error').innerHTML = "A password confirmation is required";
                isValid = false; // set isValid to false
            } else if (userPassword != userConfPassword) {
                document.getElementById('user_conf_password_error').innerHTML = "Passwords do not match";
                isValid = false;
            } else {
                document.getElementById('user_conf_password_error').innerHTML = "";
            }
            
            if (userAddress.trim() == '') {
                document.getElementById('user_address_error').innerHTML = "An address is required";
                isValid = false;
            } else {
                document.getElementById('user_address_error').innerHTML = "";
            }
            
            if (userContact.trim() == '') {
                document.getElementById('user_contact_error').innerHTML = "A mobile number is required";
                isValid = false;
            } else {
                document.getElementById('user_contact_error').innerHTML = "";
            }
            
            if (userImage.trim() == '') {
                document.getElementById('user_image_error').innerHTML = "An image is required";
                isValid = false;
            } else if (document.getElementById("user_image").files.length > 0 && document.getElementById("user_image").files[0].size > maxSizeInBytes) {
                document.getElementById('user_image_error').innerHTML = "Please select an image file smaller than 3MB";
                isValid = false;
            } else if (!userImage.match(allowedExtensions)) {
                document.getElementById('user_image_error').innerHTML = "Please select a valid image file (jpg, jpeg, png)";
                isValid = false;
            } else {
                document.getElementById('user_image_error').innerHTML = "";
            }
            return isValid;
        }
        
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>


</body>

</html>