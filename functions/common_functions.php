<?php
//  connect to database
include("./partials/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// getting products

function getProducts(){
    global $conn;
    $select_query = "SELECT * from products ORDER BY rand() limit 0,4";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image1 = $row['product_image1'];
            $category_id = $row['category_id'];
            
            echo "
        <div class='pro-container'>
            <div class='pro'>
                <img src='product_images/$product_image1' alt=''>
                <div class='des'>
                    <span>Adidas</span>
                    <h5>$product_title</h5>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <h4>$product_price</h4>
                    </div>
                    <a href='cart.html'><i class='fa-solid fa-cart-shopping cart'></i></a>
                    <a href='product-details.php?product_id=$product_id'><button>View more</button></a>
                </div>               
            </div>
        </div>";
        } 
}

// getting all products

function get_all_products(){
    global $conn;
    $select_query = "SELECT * from products ORDER BY rand()";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image1 = $row['product_image1'];
            $category_id = $row['category_id'];
            
            echo "
        <div class='pro-container'>
            <div class='pro'>
                <img src='product_images/$product_image1' alt=''>
                <div class='des'>
                    <span>Adidas</span>
                    <h5>$product_title</h5>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i> 
                        <h4>$product_price</h4>
                    </div>
                    <a href='cart.html'><i class='fa-solid fa-cart-shopping cart'></i></a>
                    <a href='product-details.php?product_id=$product_id'><button>View more</button></a>
                </div>               
            </div>
        </div>";
        }     
}

// view more details

function view_more(){
    global $conn;
    if (isset($_GET['product_id'])) {
        $new_id = $_GET['product_id'];
        $select_query = "SELECT * from products WHERE product_id='$new_id'";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_price = $row['product_price'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $product_image4 = $row['product_image4'];
          $product_description = $row['product_description'];
          $category_id = $row['category_id'];
          
          echo "  <div class='single-pro-image'>
          <div class='img-container'>
          <img src='product_images/$product_image1' width='100%' alt=''>
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
            <h6>$product_title</h6>
            <h4>Men's Fashion T shirt</h4>
            <h2>$product_price</h2>
            <select>
              <option>Select Size</option>
              <option>XL</option>
              <option>XXL</option>
              <option>Small</option>
              <option>Large</option>
            </select>
            <input type='number' value='1' />
            <button>Add to Cart</button>
            <h4>Product details</h4>
            <span>
           $product_description
            </span>
          </div>";
        }
      }
}