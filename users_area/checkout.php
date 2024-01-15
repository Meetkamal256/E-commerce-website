<?php
include("partials/connect.php");
include_once("functions/common_functions.php");
// Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();

  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce Checkout</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>

<body>
 
    <?php
    if (!isset($_SESSION['username'])) {
        include("user_login.php");
    } else {
        include("payment.php");
    }
    ?>
    
    <script src="script.js"></script>

</body>

</html>