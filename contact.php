<?php
include("partials/connect.php");
include("functions/common_functions.php");
?>

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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="display_all.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Welcome Guest</a></li>
                <li><a href="users_area/user_login.php">Login</a></li>
                <li>
                <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items();?></sup></a> 
                </li>
                <a href="#"><i class="fas fa-times" id="close"></i></a>
            </ul>
        </div>
        <div id="mobile">
        <a href='cart.php'><i class='fa-solid fa-cart-shopping cart'></i><sup><?php cart_items();?></sup></a> 
            <i class="fas fa-outdent" id="menu-open"></i>
        </div>
    </section>
  
    <section id="page-header" class="about-header">
      <h2>#LetsTalk</h2>
      <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    
    <section id="contact-details">
      <div class="details">
        <span>Get in touch</span>
        <h2>Visit one of our Agency locations or contact us today</h2>
        <h4>Head Office</h4>
        <div>
          <li>
            <i class="fas fa-map"></i>
            <p>56 Glassford Street Glasgow G1 1UL New York</p>
          </li>
          <li>
            <i class="fas fa-envelope"></i>
            <p>Contact@example.com</p>
          </li>
          <li>
            <i class="fas fa-phone"></i>
            <p>Contact@example.com</p>
          </li>
          <li>
            <i class="fas fa-clock"></i>
            <p>Monday-Saturday: 9:00am to 16pm</p>
          </li>
        </div>
      </div>
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.0953764139394!2d7.486967674298248!3d9.05506459100732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0ba5000f0bd5%3A0x3443a3ae32765e3f!2sCeddi%20Plaza!5e0!3m2!1sen!2sng!4v1694817183044!5m2!1sen!2sng"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    
    <section id="form-details">
      <form action="handler/contact.php" method="POST">
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" placeholder="Your Name" name="name"/>
        <input type="email" placeholder="E-mail" name="email" />
        <textarea
          name="msg"
          id=""
          cols="30"
          rows="10"
          placeholder="Your Message"
        ></textarea>
        <button>Submit</button>
      </form>
      <div class="people">
        <div>
            <img src="img/people/1.png" alt="">
            <p>
                <span>John Doe</span>
              Senior Marketing Manager <br />Phone: +0000000000000 <br />
              Email: email@example.com
            </p>
      </div>
      <div class="people">
            <img src="img/people/2.png" alt="">
            <p>
                <span>John Doe</span>
              Senior Marketing Manager <br />Phone: +0000000000000 <br />
              Email: email@example.com
            </p>
      </div>
      <div class="people">
            <img src="img/people/3.png" alt="">
            <p>
                <span>John Doe</span>
              Senior Marketing Manager <br />Phone: +0000000000000 <br />
              Email: email@example.com
            </p>
      </div>
      
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
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Your Email Address"
        />
        <button type="submit">Sign Up</button>
      </div>
    </section>
    
    <?php include("partials/footer.php");?>
    <script src="script.js"></script>
  </body>
</html>
