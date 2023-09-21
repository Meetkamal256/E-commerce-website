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
            <a href="cart.php" id="lg-cart"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <a href="#"><i class="fas fa-times" id="close"></i></a>
        </ul>
      </div>
      <div id="mobile">
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>  
        <i class="fas fa-outdent" id="menu-open"></i>
      </div>
    </section>  
    
    <section id="prodetails">
      <div class="single-pro-image">
        <img src="img/products/f1.jpg" width="100%" id="main-img" alt="" />
        <div class="small-img-group">
          <div class="small-img-col">
            <img
              src="img/products/f1.jpg"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f2.jpg"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.jpg"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f4.jpg"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="single-pro-details">
        <h6>Home / T-shirt</h6>
        <h4>Men's Fashion T shirt</h4>
        <h2>$139.00</h2>
        <select>
          <option>Select Size</option>
          <option>XL</option>
          <option>XXL</option>
          <option>Small</option>
          <option>Large</option>
        </select>
        <input type="number" value="1" />
        <button>Add to Cart</button>
        <h4>Product details</h4>
        <span>
          The Gildan Ultra Cotton T-shirt is made from a substantial 6.0 oz. per
          sq.yrd fabric Constructed from 100% cotton, this classic fit
          pre-shrunk jersey knit provides an unmatched comfort with each wear.
          Featuring a taped v-necked shoulder and a seamless double-needle
          collar, and available in a range of colors. It offers it all in the
          ultimate neck turning package.
        </span>
      </div>
    </section>
    
    <section id="product1">
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
    
    <script>
        var mainImage = document.getElementById("main-img")
        var smallImage = document.getElementsByClassName("small-img")
        
        smallImage[0].onclick = function(){
            mainImage.src = smallImage[0].src;
        }
        smallImage[1].onclick = function(){
            mainImage.src = smallImage[1].src;
        }
        smallImage[2].onclick = function(){
            mainImage.src = smallImage[2].src;
        }
        smallImage[3].onclick = function(){
            mainImage.src = smallImage[3].src;
        }
    </script>
    <script src="script.js"></script>
  </body>
</html>
