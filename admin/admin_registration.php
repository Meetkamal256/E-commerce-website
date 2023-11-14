 <?php
    include("../partials/connect.php");
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    
    $admin_username = $admin_email = $admin_password = $admin_conf_password = "";
    $errors = array('admin_username' => "", 'admin_email' => "", 'admin_password' => "", 'admin_conf_password' => "");
    
    if (isset($_POST["admin_register"])) {
        //validate username
        if (empty($_POST["admin_username"])) {
            $errors["admin_username"] = "A Username is required <br/>";
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
            $admin_password = $_POST["admin_password"];
            $errors["admin_password"] = "A password is required <br/>";
        } else {
            $admin_password = $_POST["admin_password"];
            $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
        }
        
        // validate confirm password
        if (empty($_POST["admin_conf_password"])) {
            $errors["admin_conf_password"] = "please confirm password <br/>";
        }else{
            $admin_conf_password = $_POST["admin_conf_password"];
            if($admin_password != $admin_conf_password){
                $errors["admin_conf_password"] = "Passwords do not match <br/>";
            }
        }
    }

    // if there is no errors
    if(array_filter($errors)){

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
             padding: 10px;
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

         .red-text {
             color: red;
             font-size: 13px;
             margin-bottom: 3px;

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
             <form action="" method="POST">
                 <label for="username">Username</label>
                 <input type="text" name="admin_username" id="admin_username" placeholder="Username" value="<?php echo htmlspecialchars($admin_username) ?>">
                 <div class="red-text"><?php echo $errors["admin_username"] ?></div>
                 <label for="admin_email">Email</label>
                 <input type="email" name="admin_email" id="admin_email" placeholder="Email" value="<?php echo htmlspecialchars($admin_email) ?>">
                 <div class="red-text"><?php echo $errors["admin_email"] ?></div>
                 <label for="password">Password</label>
                 <input type="password" name="admin_password" id="admin_password" placeholder="Password" value="<?php echo  htmlspecialchars($admin_password) ?>">
                 <div class="red-text"><?php echo $errors["admin_password"] ?></div>
                 <label for="conf_password">Confirm Password</label>
                 <input type="password" name="admin_conf_password" id="admin_conf_password" placeholder="Confirm Password" value="<?php echo htmlspecialchars($admin_conf_password)?>">
                 <div class="red-text"><?php echo $errors["admin_conf_password"] ?></div>
                 <input type="submit" value="Register" name="admin_register">
                 <small>Already have an account? <a href="admin_login.php">login</a></small>
             </form>
         </div>
     </div>
 </body>

 </html>