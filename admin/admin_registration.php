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
        form input[type="password"]:focus{
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
        
        small a{
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
                <input type="text" name="username" id="username" placeholder="Username" required="required">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required="required">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required="required">
                <label for="conf_password">Confirm Password</label>
                <input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password" required="required">
                <input type="submit" value="Register">
                <small>Already have an account? <a href="admin_login.php">login</a></small>
            </form>
        </div>
    </div>
</body>
</html>