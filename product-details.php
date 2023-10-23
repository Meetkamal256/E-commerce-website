<?php
include("partials/connect.php");
include_once("functions/common_functions.php");
session_start();
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
    <a href="index.php" class="logo">LeisureWears</a>
    <div>
      <ul id="navbar">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="display_all.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="./users_area/user_registration.php">Register</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php
        if (!isset($_SESSION['username'])) {
          echo "<li><a href='#'>Welcome Guest</a></li>";
        } else {
          echo "<li><a href='#'>Welcome " . $_SESSION['username'] .  "</a></li>";
        }
        if (!isset($_SESSION['username'])) {
          echo " <li><a href='users_area/user_login.php'>Login</a></li>";
        } else {
          echo " <li><a href='users_area/logout.php'>Logout</a></li>";
        }
        ?>
        <li>
          <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
        </li>
        <a href="#"><i class="fas fa-times" id="close"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items(); ?></sup></a>
      <i class="fas fa-outdent" id="menu-open"></i>
    </div>
  </section>

  <?php
  cart();
  ?>
  <section id="prodetails">
    <?php
    // view_more();
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

        echo "<div class='single-pro-image'>
        <div class='mainImage-pro-container'>
        <img src='product_images/$product_image1' alt='' id='main-img' width='100%'>
   </div>
          <div class='small-img-group'>
            <div class='smallImage-pro-container'>
              <img
                src='product_images/$product_image1'
                width='100%'
                class='small-img'
                alt=''
              />
            </div>
            <div class='smallImage-pro-container'>
              <img
                src='product_images/$product_image2'
                width='100%'
                class='small-img'
                alt=''
              />
            </div>
            <div class='smallImage-pro-container'>
            <img
              src='product_images/$product_image3'
              width='100%'
              class='small-img'
              alt=''
            />
          </div>
          <div class='smallImage-pro-container'>
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
    ?>


  </section>

  <!-- <section id="product1">
    <h2>Featured Products</h2>
    <p>Summer collection New modern Design</p>
    <div class="pro-container">
      <div class="pro">
        <img src="img/products/n1.jpg" alt="">
        <div class="des">
          <span>Adidas</span>
          <h5>Cartoon Astronaut T-shirts</h5>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h4>$78</h4>
          </div>
          <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>
      </div>
      <div class="pro">
        <img src="img/products/n2.jpg" alt="">
        <div class="des">
          <span>Adidas</span>
          <h5>Cartoon Astronaut T-shirts</h5>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h4>$78</h4>
          </div>
          <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>
      </div>
      <div class="pro">
        <img src="img/products/n3.jpg" alt="">
        <div class="des">
          <span>Adidas</span>
          <h5>Cartoon Astronaut T-shirts</h5>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h4>$78</h4>
          </div>
          <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>
      </div>
      <div class="pro">
        <img src="img/products/n4.jpg" alt="">
        <div class="des">
          <span>Adidas</span>
          <h5>Cartoon Astronaut T-shirts</h5>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h4>$78</h4>
          </div>
          <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>
      </div>
    </div>
  </section> -->

  <section id="newsletter">
    <div class="newstext">
      <h4>Sign Up For Newsletters</h4>
      <p>
        Get E-mail updates about our latest shop and
        <span>special offers</span>
      </p>
    </div>
    <div class="form">
      <input type="email" name="email" id="email" placeholder="Your Email Address" />
      <button type="submit">Sign Up</button>
    </div>
  </section>

  <?php include("partials/footer.php"); ?>

  <script>
    var mainImage = document.getElementById("main-img")
    var smallImage = document.getElementsByClassName("small-img")

    smallImage[0].onclick = function() {
      mainImage.src = smallImage[0].src;
    }
    smallImage[1].onclick = function() {
      mainImage.src = smallImage[1].src;
    }
    smallImage[2].onclick = function() {
      mainImage.src = smallImage[2].src;
    }
    smallImage[3].onclick = function() {
      mainImage.src = smallImage[3].src;
    }
  </script>
  <script src="script.js"></script>
</body>

</html>