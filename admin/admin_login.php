<?php
include("../partials/connect.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

$admin_username = $admin_password = "";
$errors = array('admin_username' => "", 'admin_password' => "");

if (isset($_POST["admin_login"])) {
    // validate username
    if (empty($_POST["admin_username"])) {
        $errors['admin_username'] = "Please provide your username";
    } else {
        $admin_username = $_POST["admin_username"];
    }
    
    // validate password
    if (empty($_POST["admin_password"])) {
        $errors['admin_password'] = "Please provide your password";
    } else {
        $admin_password = $_POST["admin_password"];
    }
    
    
    // select query
    $select_query = "SELECT * from admin_table WHERE admin_username = '$admin_username'";
    $execute_query = mysqli_query($conn, $select_query);
    
    if ($execute_query) {
        $num_rows = mysqli_num_rows($execute_query);
        
        if ($num_rows == 1) {
            $row_data = mysqli_fetch_assoc($execute_query);
            
            // Verify password only if the row data is not null
            if ($row_data !== null && password_verify($admin_password, $row_data['admin_password'])) {
                $_SESSION['admin_username'] = $admin_username;
                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('adminindex.php', '_self')</script>";
            } else {
                $errors['admin_password'] = "Invalid password";
            }
        } else {
            $errors['admin_username'] = "Username not found";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Debugging statements
// echo "Username error: " . $errors['admin_username'] . "<br>";
// echo "Password error: " . $errors['admin_password'] . "<br>";
// echo $_SESSION['admin_username'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    h1 {
        text-align: center;
        background-color: #000;
        color: #fff;
        font-size: 25px;
    }

    #admin_login_container {
        display: flex;
        max-width: 850px;
        margin: 50px auto;
    }

    #admin_login_container .left_section img {
        width: 100%;
        min-height: 100%;
    }

    #admin_login_container .left_section {
        flex-basis: 50%;
    }

    #admin_login_container .right_section {
        flex-basis: 50%;
        padding: 20px;
        margin-top: 50px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input[type="text"],
    form input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        cursor: pointer;
    }

    form input[type="text"]:focus,
    form input[type="password"]:focus {
        outline: none;
    }

    #admin_login_container .reset {
        color: red;
        font-size: 14px;

    }


    form input[type="submit"] {
        display: block;
        margin: 10px 0px 10px 0px;
        width: 100%;
        background-color: #000;
        color: #ffff;
        padding: 7px;
        border: none;
        cursor: pointer;
        font-size: 15px;
        border-radius: 5px;
    }

    form input[type="submit"]:hover {
        background-color: blue;
    }

    #admin_login_container small {
        font-size: 14px;
    }

    #admin_login_container small a {
        color: red;
        font-size: 14px;
    }

    .red-text {
        color: red;
        font-size: 13px;
        margin-bottom: 3px;
    }

    /* Responsive Styles */

    @media(max-width: 600px) {
        #admin_login_container {
            flex-direction: column;
            margin: 50px 30px 200px 30px;
            min-height: 100vh;
        }

        form input[type="text"],
        form input[type="password"] {
            padding: 5px;
        }

        form input[type="submit"] {
            padding: 7px;

        }
    }
</style>

<body>
    <h1>Admin Login</h1>
    <div id="admin_login_container">
        <div class="left_section">
            <img src="../img/login2.jpg" alt="">
        </div>
        <div class="right_section">
            <form action="" method="POST">
                <label for="admin_username">Username</label>
                <input type="text" name="admin_username" id="admin_username" placeholder="Username" value="<?php echo htmlspecialchars($admin_username) ?>">
                <div class="red-text"><?php echo $errors["admin_username"]; ?></div>
                <label for="admin_password">Password</label>
                <input type="password" name="admin_password" id="admin_password" placeholder="Password" value="<?php echo htmlspecialchars($admin_password) ?>">
                <div class="red-text"><?php echo $errors["admin_password"]; ?></div>
                <a href="#"><small class="reset">Forgot Password?</small></a>
                <input type="submit" value="Login" name="admin_login">
                <small>Don't have an account?<a href="admin_registration.php">Register</a></small>
            </form>
        </div>
    </div>
</body>

</html>