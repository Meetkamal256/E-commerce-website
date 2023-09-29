<?php
include("../partials/connect.php");


if(isset($_POST['update'])){
    $newId = $_POST['form_id'];
    $newName = $_POST['name'];
    $newPrice = $_POST['price'];
    $newDesc = $_POST['description'];
    $newCat = $_POST['category'];
    
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
          move_uploaded_file($temp_image1, "./product_images/$product_image1");
          move_uploaded_file($temp_image2, "./product_images/$product_image2");
          move_uploaded_file($temp_image3, "./product_images/$product_image3");
          move_uploaded_file($temp_image4, "./product_images/$product_image4");           
      }
    
    $sql = "UPDATE products set product_title='$newName', product_price='$newPrice', product_description='$newDesc', category_id='$newCat', WHERE id='$newId'";
    
    if(mysqli_query($conn, $sql)){
        header("location: products-show.php");
    }else{
        echo "query did'nt run ";
    }
}
?>