<?php 
// connect to database
include("../partials/connect.php"); 

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];
    
    // select data from database
    $select_query = "SELECT * from categories WHERE category_title ='$category_title'";
    $result_select = mysqli_query($conn, $select_query);
    $num_rows = mysqli_num_rows($result_select);
    if ($num_rows > 0){
        die("Record is already present in database");
    }else {
    
    $sql = "INSERT INTO categories (category_title) VALUES ('$category_title')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . mysqli_error($conn). '<br>';   
    }
}
}
// header("location: products-show.php");

// Close the database connection
mysqli_close($conn);
?>
