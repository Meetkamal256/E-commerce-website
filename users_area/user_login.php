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
        
        @media (max-width: 576px){
            #container{
                margin: 20px 30px;
            }
        }
    </style>
</head>

<body>
    <div id="container">
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
    </div>
    </form>
</body>
</html>

<!-- php code -->
<?php
    if(isset($_POST['user_login'])){
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
        if($row_count > 0){
            $_SESSION['username'] = $username;
            if(password_verify($user_password, $row_data['user_password'])){
                // echo "<script>alert('Log in Successful')</script>";
                if($row_count == 1 and $row_count_cart == 0){
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Log in Successful')</script>";
                    echo "<script>window.open('profile.php', '_self')</script>";
                
                }else{
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Log in Successful')</script>";
                    echo "<script>window.open('../payment.php', '_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
           
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>

