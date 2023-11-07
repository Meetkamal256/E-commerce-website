<?php
$session_username = $_SESSION['username'];
$select_query = "SELECT * from user_table WHERE username = '$session_username'";
$result = mysqli_query($conn, $select_query);
while ($row = mysqli_fetch_array($result)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_address = $row['user_address'];
    $user_mobile = $row['user_mobile'];
}

if (isset($_POST['update_user'])) {
    $update_id = $user_id;
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_img = $_FILES['user_image']['name'];
    $user_img_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_img_tmp, "../product_images/$user_img");

    $update_query = "UPDATE user_table SET username = '$username', user_email = '$user_email', user_image = '$user_img', user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = $update_id";
    $result_update = mysqli_query($conn, $update_query);
    if ($result_update) {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>window.open('logout.php', '_self')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    #edit_account_container {
        max-width: 450px;
        margin: 50px auto;
        min-height: 100vh;
        
    }

    label{
        display:block;
        text-align: left;
        margin-bottom: 5px;
        color:#041E42;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="file"] {
        width: 100%;
        padding: 7px;
        border: 1px solid darkgray;
        border-radius: 5px;
        margin-bottom: 15px;
        
    }
    
    input[type="text"]:focus,
    input[type="email"]:focus,  input[type="file"]:focus {
        outline: none;
        border: 2px solid #cccc;
    }
    
    input[type="submit"] {
        background-color: #041E42;
        color: #fff;
        padding: 10px 25px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }
    
    input[type="submit"]:hover {
        background-color: black;
    }
    
    .edit_image {
        width: 70px;
        height: 70px;
        object-fit: contain;
        margin-left: 10px;
    }
    
    @media(max-width: 576px) {
     #edit_account_container{
        margin: 50px 30px 0px 30px;
     }
    }
 
</style>

<body>
    <div id="edit_account_container">
        
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Edit Account</h3>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $username ?>">
            </div>
            <div>
            <label for="email">Email</label>
                <input type="email" id="email" name="user_email" value="<?php echo $user_email ?>">
            </div>
            <div style='display: flex;'>
            <label for="profile">Profile Photo</label>
                <input type="file" id="user_image" name="user_image">
                <img src="../product_images/<?php echo $user_img ?>" alt="" class="edit_image">
            </div>
            <div>
            <label for="address">Address</label>
                <input type="text" id="address" name="user_address" value="<?php echo $user_address ?>">
            </div>
            <div>
            <label for="user_mobile">Mobile Number</label>
                <input type="text" id="user_mobile" name="user_mobile" value="<?php echo $user_mobile ?>">
            </div>
            <div>
                <input type="submit" value="update" name="update_user">
            </div>
        </form>
    </div>
</body>

</html>