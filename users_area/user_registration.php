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

      
        
        .reg-btn input{
            background-color: blue;
            border: none;
            padding: 7px 25px;
            color: #ffff;
            margin-bottom: 10px;
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
                <input type="password" id="user_password" name="username" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
            </div>
            <!-- Confirm Password Field -->
            <div>
                <label for="conf_password">Confirm Password</label>
                <input type="password" id="conf_password" name="conf_username" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required="required">
            </div>
            <!-- Address field -->
            <div>
                <label for="user_address">Address</label>
                <input type="text" id="user_address" name="user_address" placeholder="Enter Your Address" required="required" autocomplete="off" required="required">
            </div>
            <!-- Contact field -->
            <div>
                <label for="user_contact">Contact</label>
                <input type="text" id="user_contact" name="user_contact" placeholder="Enter Your Mobile Number" required="required" autocomplete="off" required="required">
            </div>
            <div class="reg-btn">
                <input type="submit" value="Register" name="user_register">
            </div>
            <p>Already have an account?<a href="user_login.php" class="small"> Login</a></p>
    </div>
    </form>

</body>

</html>