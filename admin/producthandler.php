<?php 
// connect to database
include("../partials/connect.php"); 
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    
    
    $target = "../uploads/";
    $file_path = $target.basename($_FILES['file']['name']);
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_store = "../uploads/". $file_name;
    
    move_uploaded_file($file_tmp, $file_store);
      
    $sql = "INSERT INTO products (name, price, picture, description, category_id) VALUES ('$name', '$price', '$file_path', '$description', '$category')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . mysqli_error($conn). '<br>';   
    }
}

// Close the database connection
mysqli_close($conn);
?>
