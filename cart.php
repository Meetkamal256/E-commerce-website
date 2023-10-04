<?php
include("partials/connect.php");
include("functions/common_functions.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce website</title>
    <link rel="stylesheet" href="styles.css" />
    <script
      src="https://kit.fontawesome.com/dacccb715c.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
  <section id="header">
      <a href="#"><img src="img/logo.png" alt="" /></a>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a href="display_all.php">Shop</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="account.php">Register</a></li>
          <li>
          <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i></a>
          </li>
          <a href="#"><i class="fas fa-times" id="close"></i></a>
        </ul>
      </div>
      <div id="mobile">
      <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i></a>
        <i class="fas fa-outdent" id="menu-open"></i>
      </div>
    </section>  
    
    <section id="page-header" class="about-header">
      <h2>#LetsTalk</h2>
      <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    
    <section id="cart">
      <table width="100%">
        <thead>
          <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product Title</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Operations</td>
          </tr>
        </thead>
        <tbody>
          <!-- php code to display dynamic data -->
          <?php
              global $conn;
              $get_ip_address = getIPAddress();
              $total = 0;
              $cart_query = "SELECT * from cart_details WHERE ip_address = '$get_ip_address'";
              $result = mysqli_query($conn, $cart_query);
              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];
                $select_products = "SELECT * from products WHERE product_id = '$product_id'";
                $result_products = mysqli_query($conn, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price_with_currency = $row_product_price['product_price'];
                  // Remove the currency symbol and any non-numeric characters
                  $product_price = preg_replace("/[^0-9.]/", "", $product_price_with_currency); 
                  // Convert the cleaned value to a float
                  $product_price = floatval($product_price);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $total += $product_price;
                }
                 echo "<tr>
                 <td><input type='checkbox'></td>
                 <td><img src='product_images/$product_image1' alt=''></td>
                 <td>$product_title</td>
                 <td>$price_table</td>
                 <td><input type='number' value='1'></td>
                 <td><button>Update</button></td>
                 <td><button>Remove</button></td>
             </tr>";
               }
              
          ?>
        </tbody>
      </table>
    </section>
    
    <section id="cart-add">`
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <input type="text" placeholder="Enter Your Coupon">
            <button>Apply</button>
        </div>
        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
              <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$<?php echo $total; ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$<?php echo $total; ?></td>
                </tr>
            </table>
            <button>Proceed to checkout</button>
        </div>
  
    </section>
    
    <?php include("partials/footer.php");?>
    <script src="script.js"></script>
  </body>
</html>
