<?php
//  connect to database
include("partials/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// getting products

function getProducts()
{
  global $conn;
  $select_query = "SELECT * from products ORDER BY rand() limit 0,8";
  $result_query = mysqli_query($conn, $select_query);
  while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_price = number_format($row['product_price']);
    $product_image1 = $row['product_image1'];
    $category_id = $row['category_id'];
    
    
    echo "<div class='pro product-link' data-id ='$product_id'>
        <div class='img-container'>
        <img src='product_images/$product_image1' alt=''>
   </div>
        <div class='des'>
            <h5>$product_title</h5>
            <div class='stars'>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i> 
                <h4>&#x20A6; $product_price</h4>
            </div>
            <a href='index.php?add_to_cart=$product_id'><i class='fa-solid fa-cart-shopping cart'></i></a>
        </div>       
    </div>";
  }
}

// getting all products

function get_all_products()
{
  global $conn;
  $select_query = "SELECT * from products ORDER BY rand()";
  $result_query = mysqli_query($conn, $select_query);
  while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_price = number_format($row['product_price']);
    $product_image1 = $row['product_image1'];
    $category_id = $row['category_id'];
    
    
    echo "<div class='pro'>
        <div class='img-container'>
        <img src='product_images/$product_image1' alt=''>
  </div>
        <div class='des'>
      
            <h5>$product_title</h5>
            <div class='stars'>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i> 
                <h4>&#x20A6; $product_price</h4>
            </div>
            <a href='index.php?add_to_cart=$product_id'><i class='fa-solid fa-cart-shopping cart'></i></a>
            <a href='product-details.php?product_id=$product_id'><button>View more</button></a>
        </div>               
    </div>";
  }
}

// view more details

function view_more()
{
  global $conn;
  if (isset($_GET['product_id'])) {
    $new_id = $_GET['product_id'];
    $select_query = "SELECT * from products WHERE product_id='$new_id'";
    $result_query = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_price = number_format($row['product_price']);
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_image4 = $row['product_image4'];
      $product_description = $row['product_description'];
      $category_id = $row['category_id'];

      echo "<div class='single-pro-image'>
          <div class='img-container'>
          <img src='product_images/$product_image1' width='100%' alt='' id='main-img'>
     </div>
            <div class='small-img-group'>
              <div class='small-img-col'>
                <img
                  src='product_images/$product_image1'
                  width='100%'
                  class='small-img'
                  alt=''
                />
              </div>
              <div class='small-img-col'>
                <img
                  src='product_images/$product_image2'
                  width='100%'
                  class='small-img'
                  alt=''
                />
              </div>
              <div class='small-img-col'>
                <img
                  src='product_images/$product_image3'
                  width='100%'
                  class='small-img'
                  alt=''
                />
              </div>
              <div class='small-img-col'>
                <img
                  src='product_images/$product_image4'
                  width='100%'
                  class='small-img'
                  alt=''
                />
              </div>
            </div>
          </div>
          <div class='single-pro-details'>
            <h4>$product_title</h4>
            <h2>&#x20A6; $product_price</h2>
            <select>
              <option>Select Size</option>
              <option>XL</option>
              <option>XXL</option>
              <option>Small</option>
              <option>Large</option>
            </select>
            <input type='number' value='1' />
            <a href='index.php?add_to_cart=$product_id'><button>Add To Cart</button></a>
            <h4>Product details</h4>
            <span>
           $product_description
            </span>
          </div>";
    }
  }
}

// get ip address function
function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart function
function cart()
{
  if (isset($_GET['add_to_cart']) && is_numeric($_GET['add_to_cart'])) {
    global $conn;
    $get_ip_address = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];

    // Check if the product is already in the cart
    $select_query = "SELECT * from cart_details WHERE ip_address = '$get_ip_address' AND product_id = $get_product_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_rows = mysqli_num_rows($result_query);

    if ($num_rows > 0) {
      // Product is already in the cart; update the quantity
      $update_query = "UPDATE cart_details SET quantity = quantity + 1 WHERE ip_address = '$get_ip_address' AND product_id = $get_product_id";
      $result_query = mysqli_query($conn, $update_query);
      echo "<script>alert('Item quantity updated in cart')</script>";
      echo "<script>window.open('cart.php', '_self')</script>";
    } else {
      // Product is not in the cart; insert a new entry
      $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 1)";
      $result_query = mysqli_query($conn, $insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}

// function to get cart item numbers

function cart_items()
{
  if (isset($_GET['add_to_cart']) && is_numeric($_GET['add_to_cart'])) {
    global $conn;
    $get_ip_address = getIPAddress();
    $select_query = "SELECT * from cart_details WHERE ip_address = '$get_ip_address'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $conn;
    $get_ip_address = getIPAddress();
    $select_query = "SELECT * from cart_details WHERE ip_address = '$get_ip_address'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

// total price function

function cart_total()
{
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

      $total += $product_price;
    }
  }
  echo $total;
}

// get user order details
function get_user_order_details()
{
  global $conn;
  $username = $_SESSION['username'];
  $get_details =  "SELECT * from user_table WHERE username = '$username'";
  $result_query = mysqli_query($conn, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders = "SELECT * from user_orders WHERE user_id = $user_id AND order_status = 'pending'";
          $result_order_query = mysqli_query($conn, $get_orders);
          $row_count = mysqli_num_rows($result_order_query);
          if ($row_count > 0) {
            echo "<h3> You have <span>$row_count</span> Pending orders</h3>
                        <p><a href='profile.php?my_orders'>Order Details</a></p>";
          } else {
            echo "<h3>You have Zero pending orders</h3>
                        <p><a href='../index.php?my_orders'>Explore Products</a></p>";
          }
        }
      }
    }
  }
}
