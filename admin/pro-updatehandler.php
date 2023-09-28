<?php
include("../partials/connect.php");


if(isset($_POST['update'])){
    $newId = $_POST['form_id'];
    $newName = $_POST['name'];
    $newPrice = $_POST['price'];
    $newDesc = $_POST['description'];
    $newCat = $_POST['category'];
    
    $target = "uploads/";
    $file_path = $target.basename($_FILES['file']['name']);
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_store = "uploads/". $file_name;
    
    move_uploaded_file($file_tmp, $file_store);
    
    $sql = "UPDATE products set name='$newName', price='$newPrice', description='$newDesc', category_id='$newCat', picture='$file_path' WHERE id='$newId'";
    if(mysqli_query($conn, $sql)){
        header("location: products-show.php");
    }else{
        echo "query did'nt run ";
    }
}
?>