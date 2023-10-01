<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce website</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/dacccb715c.js"
      crossorigin="anonymous"></script>
  </head>
  <body>
  <section id="header">
      <a href="#"><img src="img/logo.png" alt="" /></a>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a class="active" href="display_all.php">Shop</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="account.php">Account</a></li>
          <li>
          <a href='index.php?add_to_cart=$product_id'><i class='fa-solid fa-cart-shopping cart'></i></a>
          </li>
          <a href="#"><i class="fas fa-times" id="close"></i></a>
        </ul>
      </div>
      <div id="mobile">
      <a href='index.php?add_to_cart=$product_id'><i class='fa-solid fa-cart-shopping cart'></i></a>
        <i class="fas fa-outdent" id="menu-open"></i>
      </div>
    </section>  
    
    <section id="page-header">
        <h2>#Stayhome</h2>
        <p>Save more on coupons & up to 70% off!</p>
    </section>
    
    <section id='product1'>
        <h2>Featured Products</h2>
        <p>Summer collection New modern Design</p>
        <?php
            getProducts();
        ?>
    </section>
    
    <section id="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa fa-long-arrow-alt-right"></i></a>
    </section>
    
    <section id="newsletter">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers</span></p>
        </div>
        <div class="form">
            <input type="email" name="email" id="email" placeholder="Your Email Address">
            <button type="submit">Sign Up</button>
        </div>
    </section>
    
    <?php include("partials/footer.php");?>
    <script src="script.js"></script>
  
  </body>
</html>