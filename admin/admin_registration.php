<?php
include("../partials/connect.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

$admin_username = $admin_email = $admin_password = $admin_conf_password = "";
$errors = array('admin_username' => "", 'admin_email' => "", 'admin_password' => "", 'admin_conf_password' => "");

if (isset($_POST["admin_register"])) {
    // validate username
    if (empty($_POST["admin_username"])) {
        $errors["admin_username"] = "A username is required <br/>";
    } else {
        $admin_username = $_POST["admin_username"];
        if (!preg_match("/^[a-zA-Z\s]+$/", $admin_username)) {
            $errors["admin_username"] = "Username must be letters and spaces only";
        }
    }

    // validate email
    if (empty($_POST["admin_email"])) {
        $errors["admin_email"] = "An email address is required <br/>";
    } else {
        $admin_email = $_POST["admin_email"];
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $errors["admin_email"] = "Email must be a valid address";
        }
    }
    
    // validate password
    if (empty($_POST["admin_password"])) {
        $errors["admin_password"] = "A password is required <br/>";
    } else {
        $admin_password = $_POST["admin_password"];
    }
    
    // validate confirm password
    if (empty($_POST["admin_conf_password"])) {
        $errors["admin_conf_password"] = "A password confirmation is required<br/>";
    } else {
        $admin_conf_password = $_POST["admin_conf_password"];
        if ($admin_password != $admin_conf_password) {
            $errors["admin_conf_password"] = "Passwords do not match <br/>";
        } else { // no errors
            $admin_username = mysqli_real_escape_string($conn, $admin_username);
            $admin_email = mysqli_real_escape_string($conn, $admin_email);
            $admin_password = mysqli_real_escape_string($conn, $admin_password);
            // hash password
            $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
            
            // select query
            $select_query = "SELECT * FROM admin_table WHERE admin_username = '$admin_username' OR admin_email = '$admin_email'";
            $result = mysqli_query($conn, $select_query);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                echo "<script>alert('Username or email already present in database')</script>";
                echo "<script>window.location.href='admin_registration.php';</script>";
                exit();
            }
            
            // insert query
            $insert_admin = "INSERT INTO admin_table (admin_username, admin_email, admin_password)
            VALUES('$admin_username', '$admin_email', '$hash_password')";
            $result_insert = mysqli_query($conn, $insert_admin);
            if ($result_insert) {
                echo "<script>alert('Registration successful')</script>";
                // Redirect to adminindex.php after successful registration
                echo "<script>window.location.href='admin_login.php';</script>";
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
        }

        #registration_container {
            display: flex;
            max-width: 850px;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
            background-color: #000;
            color: #ffff;
            font-size: 25px;
        }
        
        .left {
            flex-basis: 50%;
        
        }
        
        .left img {
            width: 100%;
            min-height: 100%;
            display: block;
        }
        
        .right {
            flex-basis: 50%;
            padding: 20px;
        }
        
        form label {
            margin-bottom: 5px;
            display: block;
            font-size: 14px;
        }
        
        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid lightgrey;
        }
        
        form input[type="text"]:focus,
        form input[type="email"]:focus,
        form input[type="password"]:focus {
            outline: none;
        }
        
        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 7px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 15px;
            margin-bottom: 7px;
            border-radius: 5px;
        }
        
        form input[type="submit"]:hover {
            background-color: blue;
        }
        
        small a {
            color: red;
        }
        
        .red-text {
            color: red;
            font-size: 12px;
            margin-bottom: 3px;
        }
        
        
        /* Responsive design */
        
        @media (max-width: 600px) {
            #registration_container {
                flex-direction: column;
                margin: 50px 30px 700px 30px;
            }
            
            h1 {
                font-size: 22px;
            }
            
            
            form input[type="text"],
            form input[type="email"],
            form input[type="password"] {
                padding: 5px;
            
            }
            
            form input[type="submit"] {
                padding: 7px;
            }
        }
    </style>
</head>

<body>
    <h1>Admin Registration</h1>
    <div id="registration_container">
        <div class="left">
            <img src="../img/register2.jpg" alt="reg">
        </div>
        <div class="right">
            <form action="" method="POST" onsubmit="return validateAdminRegisterForm()" autocomplete="off">
                <label for="username">Username</label>
                <input type="text" name="admin_username" id="admin_username" placeholder="Username" value="<?php echo htmlspecialchars($admin_username) ?>" minlength="8" maxlength="15" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$" title="Username must be 8-15 characters containing at least one letter and one number">
                <div class="red-text" id="usernameError"><?php echo $errors["admin_username"] ?></div>
                <label for="admin_email">Email</label>
                <input type="email" name="admin_email" id="admin_email" placeholder="Email" value="<?php echo htmlspecialchars($admin_email) ?>">
                <div class="red-text" id="emailError"><?php echo $errors["admin_email"] ?></div>
                <label for="password">Password</label>
                <input type="password" name="admin_password" id="admin_password" placeholder="Password" value="<?php echo ($admin_password) ?>" minlength="8" maxlength="15" pattern="^(?=.*[A-Z])(?=.*\d).{8,12}$" title="Password must be 8-12 characters with at least one capital letter and one number">
                <div class="red-text" id="passwordError"><?php echo $errors["admin_password"] ?></div>
                <label for="conf_password">Confirm Password</label>
                <input type="password" name="admin_conf_password" id="admin_conf_password" placeholder="Confirm Password" value="<?php echo ($admin_conf_password) ?>">
                <div class="red-text" id="confPasswordError"><?php echo $errors["admin_conf_password"] ?></div>
                <input type="submit" value="Register" name="admin_register">
                <small>Already have an account? <a href="admin_login.php">login</a></small>
            </form>
        </div>
    </div>
    <script>
        function validateAdminRegisterForm() {
            var username = document.getElementById('admin_username').value;
            var email = document.getElementById('admin_email').value;
            var password = document.getElementById('admin_password').value;
            var confPassword = document.getElementById('admin_conf_password').value;
            
            var isValid = true;
            
            // Validate Username
            if (username.trim() === "") {
                document.getElementById('usernameError').innerHTML = "Please provide your username";
                isValid = false;
            } else {
                document.getElementById('usernameError').innerHTML = "";
            }
            
            // Validate Email
            if (email.trim() === "") {
                document.getElementById('emailError').innerHTML = "Please provide your email address";
                isValid = false;
            } else if (!isValidEmail(email)) {
                document.getElementById('emailError').innerHTML = "Please provide a valid email address";
                isValid = false;
            } else {
                document.getElementById('emailError').innerHTML = "";
            }
            
            // Validate Password
            if (password.trim() === "") {
                document.getElementById('passwordError').innerHTML = "please provide your password";
                isValid = false;
            } else {
                document.getElementById('passwordError').innerHTML = "";
            }
            
            // Validate Confirm Password
            if (confPassword.trim() === "") {
                document.getElementById('confPasswordError').innerHTML = "Please confirm your password";
                isValid = false;
            } else if (password !== confPassword) {
                document.getElementById('confPasswordError').innerHTML = "Passwords do not match";
                isValid = false;
            } else {
                document.getElementById('confPasswordError').innerHTML = "";
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