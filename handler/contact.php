<?php 
// connect to database
include("../partials/connect.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    $sql = "INSERT INTO contact (name, email, msg) VALUES ('$name', '$email', '$msg')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . mysqli_error($conn). '<br>';   
    }
}

// Close the database connection
mysqli_close($conn);
?>
