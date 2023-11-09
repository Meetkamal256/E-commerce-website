<?php
include("../partials/connect.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (isset($_POST['insert_cat'])) {
  $category_title = $_POST['cat_title'];

  // select data from database
  $select_query = "SELECT * from categories WHERE category_title ='$category_title'";
  $result_select = mysqli_query($conn, $select_query);
  $num_rows = mysqli_num_rows($result_select);
  if ($num_rows > 0) {
    echo "<script>alert('This Category is already present inside the database')</script>";
  } else {

    $sql = "INSERT INTO categories (category_title) VALUES ('$category_title')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      // echo "<script>alert('Categories has been inserted successfully')</script>";
      echo "<script>window.open('adminindex.php?view_categories', '_self')</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Categories</title>
</head>

<style>
  .pro-category {
    margin: 50px auto;
    max-width: 650px;
  }
  
  
  input[type='text'] {
    width: 100%;
    padding: 7px;
    border: 1px solid #cccc;
    margin-bottom: 15px;
  }
  
  input[type='text']:focus{
    outline: none;
    border: 2px solid lightblue;
  }
  
  
  input[type='submit'] {
    background-color: blue;
    padding: 7px 25px;
    border: none;
    color: #ffff;
    cursor: pointer;
  }
  
  input[type='submit']:hover{
    background-color: #010729;
  }
  
  
  /* Responsive Design */
  
  @media(max-width: 899px) {
    .pro-category {
      margin: 50px 30px 600px 30px;
    }
  }
</style>

<body>
  <div class="pro-category">
    <form action="" method="POST">
      <h1>Insert Categories</h1>
      <div>
        <input type="text" name="cat_title" placeholder="Insert Categories" required="required">
      </div>
      <div>
        <input type="submit" name="insert_cat" value="Insert Category">
      </div>
    </form>
  </div>

</body>

</html>