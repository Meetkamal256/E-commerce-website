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
    die("Record is already present in database");
  } else {
    
    $sql = "INSERT INTO categories (category_title) VALUES ('$category_title')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
      echo "<script>alert('Categories has been inserted successfully')</script>";
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
  form {
    /* display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; */
    text-align: center;
    margin: 0 30px 30px 30px;
  }



  input[type='text'] {
    width: 100%;
    max-width: 850px;
    padding: 5px;
    margin-bottom: 15px;
  }

  input[type='submit'] {
    background-color: blue;
    padding: 7px 25px;
    border: none;
    color: #ffff;
    cursor: pointer;
  }
</style>

<body>

  <form action="" method="POST">
    <div>
      <input type="text" name="cat_title" placeholder="Insert Categories">
    </div>
    <div>
      <input type="submit" name ="insert_cat" value = "Insert Category">
    </div>

  </form>


</body>

</html>