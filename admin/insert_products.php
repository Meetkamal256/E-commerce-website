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




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Products</title>
</head>
<style>
  
  .pro-container{
    max-width: 650px;
    margin: 50px auto;
  }
  form h1 {
    margin-top: 50px;
  }
  
  label {
    display: block;
    text-align: left;
    margin-bottom: 10px;
  }
  
  input[type="text"], input[type="file"], select, textarea{
    width: 100%;
    padding: 7px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
  }
  
  input[type="text"]:focus, select:focus, textarea:focus{
    outline: none;
    border: 2px solid lightblue;
  }
  
  input[type="submit"]{
    width: 100%;
    background-color: blue;
    color: #fff;
    padding: 7px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover{
    background-color: rgba(0,0,0,0.5);
  }
  
  /* form select{
    display: block;
    text-align: left;
    width: 100%;
    padding: 7px;
    margin-bottom: 15px;
  } */
  
  /* Responsive design */
  
  @media(max-width: 899px){
    .pro-container{
      margin: 50px 30px;
    }
  }

</style>

<body>
  <div class="pro-container">
    <form  method="POST" enctype="multipart/form-data">
      <h1>Insert Products</h1>
      <div>
        <label for="product_title">Product Title</label>
        <input type="text" id="product_title" name="product_title" placeholder="Enter Product Title" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_price">Product price</label>
        <input type="text" id="product_price" name="product_price" placeholder="Enter Product Price" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image1">Product Image 1</label>
        <input type="file" id="product_image1" name="product_image1" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image2">Product Image 2</label>
        <input type="file" id="product_image2" name="product_image2" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image3">Product Image 3</label>
        <input type="file" id="product_image3" name="product_image3" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image4">Product Image 4</label>
        <input type="file" id="product_image4" name="product_image 4" autocomplete="off" required="required">
      </div>
      <div>
        <select name="product_category">
          <option value="">Select Category</option>
          <?php
          include("../partials/connect.php"); 
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
            $select_query = "SELECT * from `categories`";
            $result = mysqli_query($conn, $select_query);
            if (!$result) {
              die("Error: " . mysqli_error($conn));
          }
            while($row = mysqli_fetch_assoc($result)){
              $category_title = $row['category_title'];
              $category_id = $row['category_id'];
              echo "<option value='$category_id'>$category_title</option>";
            }
          ?>
        </select>
      </div>
      <div>
        <label for="product_description">Product Description</label>
        <textarea name="product_description" cols="30" rows="10"></textarea>
      </div>
      <div>
        <input type="submit" name="insert_products" value="Insert Products">
      </div>
    
    
    </form>
  </div>


</body>

</html>