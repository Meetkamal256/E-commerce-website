<!-- php code -->
<?php
include("../partials/connect.php");
include("../functions/common_functions.php");
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
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
            VALUES('$username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($conn, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Data successfully added to database')</script>";
        } else {
            echo "Error: mysqli_error($conn)";
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
         
    }else{
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
    <link rel="stylesheet" href="styles.css" />
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        
        }
        
        #container {
            max-width: 550px;
            margin: 20px auto;
        
        }
        
        h1 {
            text-align: center;
            color: blue;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
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
            background-color: blue;
            border: none;
            padding: 7px 25px;
            color: #ffff;
            margin-bottom: 10px;
            cursor: pointer;
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
</body>

</html>