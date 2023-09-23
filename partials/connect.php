<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "e-commerce_store";

// connect to database
$conn = mysqli_connect($host, $user, $password, $dbname);

// check connection
if (!$conn) {
    echo 'Unable to connect to database'. mysqli_connect_error().'<br>';
} else {
    echo "Connected successfully to database<br>";
}
?>