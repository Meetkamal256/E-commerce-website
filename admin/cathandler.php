<?php 
// connect to database
include("../partials/connect.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['name'];
    
    $sql = "INSERT INTO categories (name) VALUES ('$category')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . mysqli_error($conn). '<br>';   
    }
}

// Close the database connection
mysqli_close($conn);
?>
