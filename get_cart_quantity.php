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