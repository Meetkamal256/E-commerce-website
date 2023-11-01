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
    input[type="text"],
    input[type="email"] {
        width: 100%;
        max-width: 450px;
        padding: 7px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    input[type="file"] {
        width: 100%;
        max-width: 380px;
        padding: 7px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
        outline: none;
        border: 2px solid lightgreen;
    }

    input[type="submit"] {
        background-color: #041E42;
        color: #fff;
        padding: 10px 25px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        width: 25%;
    }
    
    input[type="submit"]:hover {
        background-color: black;
    }
    
    .edit_image {
        width: 70px;
        height: 70px;
        object-fit: contain;
    }
    
    @media(max-width: 576px) {
        #edit_container{
            margin: 0 30px;
        }
        
        input[type="submit"] {
        padding: 7px 20px;
        width: 80%;
    }
    }
</style>

<body>
    <div id="edit_container">
        <h3>Edit Account</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <input type="text" id="username" name="username" value="<?php echo $username ?>">
            </div>
            <div>
                <input type="email" id="email" name="user_email" value="<?php echo $user_email ?>">
            </div>
            <div class="file">
                <input type="file" id="email" name="user_image">
                <img src="../product_images/<?php echo $user_img ?>" alt="" class="edit_image">
            </div>
            <div>
                <input type="text" id="address" name="user_address" value="<?php echo $user_address ?>">
            </div>
            <div>
                <input type="text" id="user_mobile" name="user_mobile" value="<?php echo $user_mobile ?>">
            </div>
            <div>
                <input type="submit" value="update" name="update_user">
            </div>
        </form>
    </div>
</body>

</html>