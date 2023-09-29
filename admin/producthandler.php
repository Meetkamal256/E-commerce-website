<?php 
// connect to database
include("../partials/connect.php"); 
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    
    // Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image4 = $_FILES['product_image4']['name'];
    
    // Accessing image tmp name  
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    $temp_image4 = $_FILES['product_image4']['tmp_name'];
        
    // checking empty condition
    if($product_title=='' or  $price=='' or $description=='' or $product_category=='' or  $product_image1=='' or  $product_image2=='' or  $product_image3=='' or $product_category==''){
        echo "Please fill all the available fields";
    } else{
        move_uploaded_file($temp_image1, "../product_images/$product_image1");
        move_uploaded_file($temp_image2, "../product_images/$product_image2");
        move_uploaded_file($temp_image3, "../product_images/$product_image3");
        move_uploaded_file($temp_image4, "../product_images/$product_image4");           
    }
      
    $insert_query = "INSERT INTO products (product_title, product_price, product_image1, product_image2, product_image3, product_image4, product_description, category_id) 
    VALUES ('$product_title', '$price', '$product_image1', '$product_image2', '$product_image3', '$product_image4', '$description', '$product_category')";    
    $results = mysqli_query($conn, $insert_query);
    if ($results) {
        echo "Successfully Inserted Products in database<br>";
    } else {
        echo "Error: " . mysqli_error($conn). '<br>';   
    }   
    // header("location: products-show.php");
}

// Close the database connection
mysqli_close($conn);
?>
