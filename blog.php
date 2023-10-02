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
          <li><a href="display_all.php">Shop</a></li>
          <li><a class="active" href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="register.php">Register</a></li>
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
    
    <section id="page-header" class="blog-header">
        <h2>#readmore</h2>
        <p>Read all case studies about our products!</p>
    </section>
    
    <section id="blog">
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b1.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-up Hoodie</h4>
                <p>
                Kickstarter man braid godard coloring book. Racelette waistcoat selfies yr
                wolf chartreuse hexagon irony, godard....   
            </p>
                <a href="#">Continue reading</a>
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b2.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>How to Style a Quiff</h4>
                <p>
                Kickstarter man braid godard coloring book. Racelette waistcoat selfies yr
                wolf chartreuse hexagon irony, godard....   
            </p>
                <a href="#">Continue reading</a>
            </div>
            <h1>12/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b3.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Must-Have Skater  Girl Items </h4>
                <p>
                Kickstarter man braid godard coloring book. Racelette waistcoat selfies yr
                wolf chartreuse hexagon irony, godard....   
            </p>
                <a href="#">Continue reading</a>
            </div>
            <h1>16/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b4.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Runaway Inspired Trends</h4>
                <p>
                Kickstarter man braid godard coloring book. Racelette waistcoat selfies yr
                wolf chartreuse hexagon irony, godard....   
            </p>
                <a href="#">Continue reading</a>
            </div>
            <h1>10/05</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b6.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-up Hoodie</h4>
                <p>
                Kickstarter man braid godard coloring book. Racelette waistcoat selfies yr
                wolf chartreuse hexagon irony, godard....   
            </p>
                <a href="#">Continue reading</a>
            </div>
            <h1>09/01</h1>
        </div>
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