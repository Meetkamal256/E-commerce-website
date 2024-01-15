<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_ip = getIPAddress();
$username = $user_email = $user_password = $user_conf_password = $user_image = $user_address = $user_contact = ""; // initialize each input field to an empty string
$errors = array('username' => "", 'user_email' => "", 'user_password' => "", 'user_conf_password' => "", 'user_image' => "", 'user_address' => "", 'user_contact' => ""); // store them in the errors array

if (isset($_POST['user_register'])) { // check if the register button is clicked
    // validate username
    if (empty($_POST['username'])) {
        $errors['username'] = "A username is required <br>";
    } else {
        $username = $_POST['username'];
    }
    
    // validate email
    if (empty($_POST['user_email'])) {
        $errors['user_email'] = "An email address is required <br>";
    } else {
        $user_email = $_POST['user_email'];
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_email'] = "Email must be a valid address <br>";
        }
    }
    
    // validate password
    if (empty($_POST['user_password'])) {
        $errors['user_password'] = "A password is required <br>";
    } else {
        $user_password = $_POST['user_password'];
    }
    
    // validate confirm password
    if (empty($_POST['user_conf_password'])) {
        $errors['user_conf_password'] = "A password confirmation is required <br>";
    } else {
        $user_conf_password = $_POST['user_conf_password'];
        if ($user_password != $user_conf_password) {
            $errors['user_conf_password'] = "Passwords do not match <br>";
        }
    }
    
    // validate user_image
    $user_image_tmp = '';
    if ($_FILES['user_image']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['user_image'] = "An image is required <br>";
    } else {
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        
        // move uploaded file
        if (!move_uploaded_file($user_image_tmp, "../product_images/$user_image")) {
            $errors['user_image'] = "Failed to move uploaded file <br>";
        }
    }
    
    // validate address
    if (empty($_POST['user_address'])) {
        $errors['user_address'] = "An address is required <br>";
    } else {
        $user_address = $_POST['user_address'];
    }

    // validate contact
    if (empty($_POST['user_contact'])) {
        $errors['user_contact'] = "A mobile number is required <br>";
    } else {
        $user_contact = $_POST['user_contact'];
    }

    // check if there are no errors before inserting into the database
    if (empty(array_filter($errors))) {
        $username = mysqli_real_escape_string($conn, $username);
        $user_email = mysqli_real_escape_string($conn, $user_email);
        $user_password = mysqli_real_escape_string($conn, $user_password);
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT); // hash password
        $user_address = mysqli_real_escape_string($conn, $user_address);
        $user_contact = mysqli_real_escape_string($conn, $user_contact);
        $user_image = mysqli_real_escape_string($conn, $user_image);

        // insert query
        $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
            VALUES('$username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($conn, $insert_query);
        
        if ($sql_execute) {
            echo "<script>alert('Data successfully added to the database')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    
    // selecting cart items
    $select_cart_items = "SELECT * from cart_details WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn, $select_cart_items);
    $num_rows = mysqli_num_rows($result_cart);
    if ($num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    } else {    
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}
?>
