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
          <li><a href="shop.php">Shop</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="account.php">Account</a></li>
          <li>
            <a class="active" href="cart.php" id="lg-cart"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <a href="#"><i class="fas fa-times" id="close"></i></a>
        </ul>
      </div>
      <div id="mobile">
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>  
        <i class="fas fa-outdent" id="menu-open"></i>
      </div>
    </section>  

    <section id="page-header" class="about-header">
      <h2>#LetsTalk</h2>
      <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    
    <section id="cart">
      <table width="100%">
        <thead>
          <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td><i class="far fa-times-circle"></i></td>
                <td><img src="img/products/f1.jpg" alt=""></td>
                <td>Cartoon Astronaut T-shirt</td>
                <td>$118.19</td>
                <td><input type="number" value="1"></td>
                <td>$118.19</td>
            </tr>
            <tr>
                <td><i class="far fa-times-circle"></i></td>
                <td><img src="img/products/f2.jpg" alt=""></td>
                <td>Cartoon Astronaut T-shirt</td>
                <td>$118.19</td>
                <td><input type="number" value="1"></td>
                <td>$118.19</td>
            </tr>
            <tr>
                <td><i class="far fa-times-circle"></i></td>
                <td><img src="img/products/f3.jpg" alt=""></td>
                <td>Cartoon Astronaut T-shirt</td>
                <td>$118.19</td>
                <td><input type="number" value="1"></td>
                <td>$118.19</td>
            </tr>
        </tbody>
      </table>
    </section>

    <section id="cart-add">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <input type="text" placeholder="Enter Your Coupon">
            <button>Apply</button>
        </div>
        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$ 335</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$ 335</td>
                </tr>
            </table>
            <button>Proceed to checkout</button>
        </div>
    </section>
    
    <?php include("partials/footer.php");?>
    <script src="script.js"></script>
  </body>
</html>
