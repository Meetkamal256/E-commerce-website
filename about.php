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
          <li><a class="active" href="about.php">About</a></li>
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
  
    <section id="page-header" class="about-header">
      <h2>#DiscoverUs</h2>
      <p>Welcome to our Story!</p>
    </section>
    
    <section id="about">
      <img src="img/about/a6.jpg" alt="" />
      <div>
        <h2>Who we are?</h2>
        <p>
          We are an e-commerce store dedicated to providing our customers with
          the best products and shopping experience. Our team is passionate
          about curating a selection of high-quality items that cater to your
          needs and desires. Whether you're looking for fashion, electronics,
          home decor, or anything in between, we've got you covered.
        </p>
        <br />
        <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%"
          >Create stunning images with as much and as little control as you like
          thanks to a choice of basic and creative modes</marquee>
        
      </div>
    </section>
    <section id="choose">
      <h2>Why Choose Us</h2>
      <p>Discover the reasons to shop with us!</p>
      <div class="options-1">
        <div class="free-shipping">
          <div class="img">
                <img src="img/truck.svg" alt="" />
          </div>
          <h5>Free Shipping</h5>
          <p>
            Enjoy free and fast shipping on all your orders. We make sure your
            items reach you in no time, so you can start using them sooner.
          </p>
        </div>
        <div class="free-shipping">
          <img src="img/bag.svg" alt="" />
          <h5>Easy to Shop</h5>
          <p>
            Our user-friendly website makes shopping a breeze. Find the products
            you love, add them to your cart, and check out in just a few clicks.
          </p>
        </div>
      </div>
      <div class="options-2">
        <div class="Support">
          <img src="img/support.svg" alt="" />
          <h5>24/7 Support</h5>
          <p>
            Need assistance? Our support team is available 24/7 to help you with
            any questions or concerns. We're here whenever you need us.
          </p>
        </div>
        <div class="support">
          <img src="img/return.svg" alt="" />
          <h5>Hassle Free Returns</h5>
          <p>
            Not satisfied with your purchase? No worries! We offer hassle-free
            returns, making the process quick and easy for your peace of mind.
          </p>
        </div>
      </div>
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
