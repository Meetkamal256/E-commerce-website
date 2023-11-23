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
<style>
  /* Responsive styles */
  
  @media (min-width: 576px) and (max-width: 1024px) {
    footer {
      margin-bottom: 800px;
    }
  }
  
  @media(max-width: 900px) {
    #cart {
      padding: 40px;
    }
    
    #cart form table {
      max-width: 700px;
    }
    
    
    #cart form table thead tr th,
    #cart form table tbody tr td {
      padding: 5px 7px;
    }
    
    #cart-add {
      padding: 40px;
      flex-direction: column;
    }
    
    #coupon {
      width: 100%;
    }
    
    #subtotal {
      width: 100%;
    
    }
    
    @media(max-width: 576px) {
      #cart {
        padding: 15px;
  
      }
      
      #cart form table {
        max-width: 450px;
        margin: 0;
      }
      
      
      #cart form table thead tr th,
      #cart form table tbody tr td {
        padding: 5px;
        font-size: 15px;
      }
      
      #cart form table tbody td input[type="number"] {
        width: 30px;
        height: 25px;
      }
      
      #cart form table tbody td input[type="submit"] {
        padding: 7px 5px;
      }
      
      #cart-add {
        padding: 15px;
      }
      
      #coupon button,
      #subtotal button {
        padding: 7px 20px;
      
      }
      
      footer {
        margin-bottom: 300px;
      }
    
    }
  }
</style>

<body>
  <section id="header">
    <a href="index.php" class="logo">LeisureWears</a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="display_all.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo "<li><a href='./users_area/profile.php'>My Account</a></li>";
        } else {
          echo "<li><a href='./users_area/user_registration.php'>Register</a></li>";
        }
        ?>
        <li><a href="contact.php">Contact</a></li>
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
      
      // Ensure quantity is a positive number
      if ($quantity <= 0) {
        continue; // Skip invalid quantities
      }
      
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
        
        <!-- php code to display dynamic data -->
        <?php
        $get_ip_address = getIPAddress();
        $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
        $result = mysqli_query($conn, $cart_query);
        $result_count = mysqli_num_rows($result);
        if ($result_count > 0) {
          echo " <thead>
          <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Update cart</th>
            <th>Delete cart</th>
            </th>
          </tr>
        </thead>
        <tbody>";
        } else {
          echo "<h2 style='text-align: center; color: red; font-weight: 500; font-size: 28px; line-height: 1.3;'>You don't have any items in the cart!</h2>";
          echo "<div style='text-align: center; margin-top: 20px'>
          <a href='index.php' style='text-decoration: none; background-color:  #088178; padding: 7px 25px; color: #fff; display: inline-block; cursor: pointer;'>Continue Shopping</a>
          </div>";
        }
        while ($row = mysqli_fetch_array($result)) {
          $product_id = $row['product_id'];
          $select_products = "SELECT * FROM products WHERE product_id = '$product_id'";
          $result_products = mysqli_query($conn, $select_products);
          while ($row_product_price = mysqli_fetch_array($result_products)) {
            // $product_price_with_currency = $row_product_price['product_price'];
            // // Remove the currency symbol and any non-numeric characters
            // $product_price = preg_replace("/[^0-9.]/", "", $product_price_with_currency);
            // // Convert the cleaned value to a float
            $product_price = ($row_product_price['product_price']);
            // Format the price using number_format
            $formatted_price = number_format($product_price);
            $product_title = $row_product_price['product_title'];
            $product_image1 = $row_product_price['product_image1'];
            $total += ($product_price * $row['quantity']);
        
        ?>
            <tr>
              <td><img src="product_images/<?php echo $product_image1 ?>" alt=""></td>
              <td><?php echo $product_title ?></td>
              <td>&#x20A6;<?php echo $formatted_price ?></td>
              <td><input type="number" name='qty[<?php echo $product_id ?>]' value='<?php echo $row['quantity'] ?>' min="1" max="20"></td>
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
    <?php
    $get_ip_address = getIPAddress();
    $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
    $result = mysqli_query($conn, $cart_query);
    $result_count = mysqli_num_rows($result);
    if ($result_count > 0) {
      echo "<div id='coupon'>
          <h3>Apply Coupon</h3>
          <input type='text' placeholder='Enter Your Coupon'>
          <button>Apply</button>
        </div>
        <div id='subtotal'>
          <table>
            <tr>
              <td>Cart Subtotal</td>
              <td>&#x20A6; " . number_format($total) . "</td>
            </tr>
            <tr>
              <td>Shipping</td>
              <td>Free</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>&#x20A6; " . number_format($total) . "</td>
            </tr>
          </table>
          <button><a href='users_area/checkout.php'>Proceed to checkout</a></button>
        </div>";
    }
    ?>

  </section>

  <?php include("partials/footer.php"); ?>
  <script src="script.js"></script>
</body>

</html>