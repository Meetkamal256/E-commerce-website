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
<style>
  /* Responsive styles */
  
  @media (min-width: 576px) and (max-width: 1024px) {
    footer {
      margin-bottom: 800px;
    }
  }

  @media(max-width: 800px) {
    #prodetails {
      display: flex;
      flex-direction: column;
    }
    
    #prodetails .single-pro-image {
      width: 80%;
    }
    
    @media(max-width: 576px) {
      #prodetails {
        flex-direction: column;
        padding: 30px;
      }
      
      #prodetails .single-pro-image {
        width: 100%;
      }
      
      #prodetails .single-pro-details h4 {
        padding: 20px 0px 10px 0px;
        font-size: 20px;
      }
      
      #prodetails .single-pro-details h2 {
        font-size: 24px;
        margin-bottom: 5px;
      }
      
      #prodetails .single-pro-details input {
        width: 40px;
        height: 40px;
        font-size: 15px;
      }

      #prodetails .single-pro-details a button {
        padding: 12px 30px;
        font-size: 15px;
      }

      footer {
        margin-bottom: 300px;
      }

    }

    @media(max-width: 374px) {
      #prodetails {
        flex-direction: column;
        padding: 10px;
      }

    }

  }
</style>

<body>
  <section id="header">
    <a href="index.php" class="logo">LeisureWears...</a>
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
    view_more();
    ?>


  </section>


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