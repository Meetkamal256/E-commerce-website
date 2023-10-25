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
    background-color: blue;
    color: #fff;
    padding: 7px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    /* display: block; */
    /* text-align: left; */
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
    <form action="" method="POST" enctype="multipart/form-data">
      <h1>Insert Products</h1>
      <div>
        <label for="product_title">Product Title</label>
        <input type="text" id="product_title" name="product_title" placeholder="Enter Product Title" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image 1">Product Image1</label>
        <input type="file" id="product_image1" name="product_image1" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image 2">Product Image2</label>
        <input type="file" id="product_image2" name="product_image2" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image 3">Product Image3</label>
        <input type="file" id="product_image3" name="product_image3" autocomplete="off" required="required">
      </div>
      <div>
        <label for="product_image4">Product Image 4</label>
        <input type="file" id="product_image 4" name="product_image 4" autocomplete="off" required="required">
      </div>
      <div>
        <select name="product_category" id="">
          <option value="">Select a Category</option>
          <option value="">Shoes</option>
          <option value="">Shirts</option>
          <option value="">Trousers</option>
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