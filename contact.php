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
  @media(max-width: 900px) {
    #form-details {
      flex-direction: column-reverse;
      padding: 40px;
    }
    
    
    #form-details .contact-left {
      flex-basis: 100%;
      padding: 40px;
    }
    
    #form-details .contact_row {
      display: flex;
      flex-direction: column;
    }
    
    .contact_row .input-group {
      width: 100%;
    }
    
    .contact_row .input-group input {
      width: 100%;
    }
  
  }
  
  @media(max-width: 576px) {
      
      #form-details {
        display: flex;
        flex-direction: column-reverse;
        padding: 20px;
      }
      
      #form-details .contact-left {
    background-color: #fff;
    flex-basis: 100%;
    padding: 40px 20px;
}
    }
  
</style>

<body>
  
  <div id="container">
    <section id="header">
      <a href="index.php" class="logo">LeisureWears...</a>
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
          <li><a href="contact.php" class="active">Contact</a></li>
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
    
    <section id="page-header" class="about-header">
      <h2>#LetsTalk</h2>
      <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    
    <section id="contact-location">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.0953764139394!2d7.486967674298248!3d9.05506459100732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0ba5000f0bd5%3A0x3443a3ae32765e3f!2sCeddi%20Plaza!5e0!3m2!1sen!2sng!4v1694817183044!5m2!1sen!2sng" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    
    <section id="form-details">
      <div class="contact-left">
        <h2>Send your Request</h2>
        <form action="" method="POST">
          <div class="contact_row">
            <div class="input-group">
              <label for="name">Name</label>
              <input type="text" name="contact_name" id="name" placeholder="Enter your name" autocomplete="off">
            </div>
            <div class="input-group">
              <label for="email">Email</label>
              <input type="email" name="contact_email" id="name" placeholder="Enter your email address" autocomplete="off">
            </div>
          </div>
          <div class="contact_row">
            <div class="input-group">
              <label for="mobile">Mobile number</label>
              <input type="tel" name="contact_mobile" id="name" placeholder="Enter your mobile number" autocomplete="off">
            </div>
            <div class="input-group">
              <label for="subject">Subject</label>
              <input type="text" name="contact_subject" id="name" placeholder="Enter your message subject" autocomplete="off">
            </div>
          </div>
          <textarea name="" id="" cols="30" rows="10" placeholder="Enter your message" autocomplete="off"></textarea>
          <input type="submit" name="send" id="send" value="Send message">
        </form>
      </div>
      <div class="contact-right">
        <span>Get in touch</span>
        <h2>Visit one of our Agency locations or contact us today</h2>
        <h4>Head Office</h4>
        <div>
          <li>
            <i class="fas fa-map"></i>
            <p>264 Tafawa Balewa Rd, Phase 1 901002, Abuja, Federal Capital Territory</p>
          </li>
          <li>
            <i class="fas fa-envelope"></i>
            <p>leisurewears@store.com</p>
          </li>
          <li>
            <i class="fas fa-phone"></i>
            <p>+234123456789</p>
          </li>
          <li>
            <i class="fas fa-clock"></i>
            <p>Monday-Saturday: 9:00am to 16pm</p>
          </li>
        </div>
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
        <input type="email" name="email" id="email" placeholder="Your Email Address" />
        <button type="submit">Sign Up</button>
      </div>
    </section>
    
    <?php include("partials/footer.php"); ?>
  </div>
  <script src="script.js"></script>
</body>

</html>