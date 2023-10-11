<?php
session_start();
include("partials/connect.php");
include_once("functions/common_functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-commerce website</title>
  <link rel="stylesheet" href="styles.css" />
  <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
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
        <li><a href="#">Welcome Guest</a></li>
        <?php
        if (!isset($_SESSION['username'])) {
          echo "<li><a href='#'>Welcome Guest</a></li>";
        } else {
          echo "<li><a href='#'>Welcome " . $_SESSION['username'] . "</a></li>";
        }
        if (!isset($_SESSION['username'])) {
          echo " <li><a href='users_area/user_login.php'>Login</a></li>";
        } else {
          echo " <li><a href='users_area/logout.php'>Logout</a></li>";
        }
        ?>
        <li>
          <a href='cart.php' class="active"><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
        </li>
        <a href="#"><i class="fas fa-times" id="close"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
      <i class="fas fa-outdent" id="menu-open"></i>
    </div>
  </section>


  <section id="page-header" class="about-header">
    <h2>#LetsTalk</h2>
    <p>LEAVE A MESSAGE, We love to hear from you!</p>
  </section>

  <?php
  global $conn;
  $get_ip_address = getIPAddress();
  $total = 0;

  if (isset($_POST['update_cart'])) {
    foreach ($_POST['qty'] as $product_id => $quantity) {
      $quantity = intval($quantity);

      // Update the cart_details table for the specific product and IP address
      $update_cart = "UPDATE cart_details SET quantity = $quantity WHERE product_id = $product_id AND ip_address ='$get_ip_address'";
      $result_product_cart = mysqli_query($conn, $update_cart);
    }
  }

  $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
  $result = mysqli_query($conn, $cart_query);

  // Check if any "Remove" button was clicked
  if (isset($_POST['remove_cart'])) {
    foreach ($_POST['remove_cart'] as $product_id => $remove_button) {
      // Remove the specific item from the cart
      $remove_item_query = "DELETE FROM cart_details WHERE product_id = $product_id AND ip_address = '$get_ip_address'";
      mysqli_query($conn, $remove_item_query);
    }
    // Redirect to the cart page after removing an item
    header("Location: cart.php");
    exit();
  }

  ?>

  <section id="cart">
    <form method="POST">
      <table width="100%">
        <thead>
          <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Operations</td>
          </tr>
        </thead>
        <tbody>
          <!-- php code to display dynamic data -->
          <?php
          while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $select_products = "SELECT * FROM products WHERE product_id = '$product_id'";
            $result_products = mysqli_query($conn, $select_products);
            while ($row_product_price = mysqli_fetch_array($result_products)) {
              $product_price_with_currency = $row_product_price['product_price'];
              // Remove the currency symbol and any non-numeric characters
              $product_price = preg_replace("/[^0-9.]/", "", $product_price_with_currency);
              // Convert the cleaned value to a float
              $product_price = floatval($product_price);
              $product_title = $row_product_price['product_title'];
              $product_image1 = $row_product_price['product_image1'];
              $total += $product_price * $row['quantity'];
          ?>
              <tr>
                <td><input type="checkbox"></td>
                <td><img src="product_images/<?php echo $product_image1 ?>" alt=""></td>
                <td><?php echo $product_title ?></td>
                <td>$<?php echo $product_price ?></td>
                <td><input type="number" name='qty[<?php echo $product_id ?>]' value='<?php echo $row['quantity'] ?>'></td>
                <td><input type="submit" value='Update Cart' name='update_cart'></td>
                <td><input type="submit" value='Remove' name='remove_cart[<?php echo $product_id ?>]'></td>

              </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </form>
  </section>


  <section id="cart-add">
    <div id="coupon">
      <h3>Apply Coupon</h3>
      <input type="text" placeholder="Enter Your Coupon">
      <button>Apply</button>
    </div>
    <div id="subtotal">
      <h3><?php echo $total ?></h3>
      <table>
        <tr>
          <td>Cart Subtotal</td>
          <td><?php echo $total ?></td>
        </tr>
        <tr>
          <td>Shipping</td>
          <td>Free</td>
        </tr>
        <tr>
          <td>Total</td>
          <td><?php echo $total ?></td>
        </tr>
      </table>
      <button><a href="checkout.php">Proceed to checkout</a></button>
    </div>
  </section>

  <?php include("partials/footer.php"); ?>
  <script src="script.js"></script>
</body>

</html>