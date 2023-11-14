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
        padding: 7px;
        margin-bottom: 12px;
    }

    form input[type="text"],:focus
    form input[type="password"]:focus{
        outline: none;
    } 
       
    #admin_login_container small {
        color: red;
        font-size: 14px;
    
    }
    
    form input[type="submit"] {
        display: block;
        margin: 10px 0px 15px 0px;
        width: 100%;
        background-color: #000;
        color: #ffff;
        padding: 7px;
    
    }

    form input[type="submit"]:hover{
        background-color: blue;
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
                <label for="admin_login">Username</label>
                <input type="text" name="admin_login" id="admin_login" placeholder="Username" required="required">
                <label for="admin_password">Password</label>
                <input type="password" name="admin_password" id="admin_password" placeholder="Password" required="required">
                <a href="#"><small>Forgot Password?</small></a>
                <input type="submit" value="Login" name>
            </form>

        </div>

    </div>
</body>

</html>