<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    input[type="text"],
    input[type="email"]{
        width: 100%;
        max-width: 450px;
        padding: 7px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
    }
    
    input[type="file"]{
        width: 100%;
        max-width: 380px;
        padding: 7px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    } 
    
    input[type="text"]:focus,
    input[type="email"]:focus{
        outline: none;
        border: 2px solid lightgreen;
    }
    
    input[type="submit"]{
        background-color: #5bc0de;
        color: #fff;
        padding: 7px 25px;
        border: none;
    }
    
    .edit_image{
        width: 70px;
        height: 70px;
        object-fit: contain;
    }


</style>
<body>
  <h3>Edit Account</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div>
        <input type="text" id="username" name="user_username" >
    </div>
    <div>
        <input type="email" id="email" name="user_email">
    </div>
    <div class="file" >
        <input type="file" id="email" name="user_image">
        <img src="../product_images/<?php echo $user_img ?>" alt="" class="edit_image">
    </div>
    <div>
        <input type="text" id="address" name="user_address" >
    </div>
    <div>
        <input type="text" id="user_mobile" name="user_mobile" >
    </div>
    <div>
        <input type="submit" value="update" name="update_user" >
    </div>
  </form>
</body>
</html>