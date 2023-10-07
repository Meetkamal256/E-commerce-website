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
        <a href="index.php"><img src="img/logo.png" alt="" /></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="display_all.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="./users_area/user_registration.php">Register</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                      if(!isset($_SESSION['username'])){
                        echo "<li><a href='#'>Welcome Guest</a></li>";
                    }else{
                        echo "<li><a href='#'>Welcome " . $_SESSION['username'] . "</a></li>";
                        
                    }
                    if(!isset($_SESSION['username'])){
                        echo " <li><a href='users_area/user_login.php'>Login</a></li>";
                    }else{
                        echo " <li><a href='users_area/logout.php'>Logout</a></li>";
                    }
                ?>
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
    
    <!-- calling cart function -->
    <?php
        cart();
    ?>
    
    <section id="hero">
        <h4>Trade in offers</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more on coupons & up to 70% off!</p>
        <button>Shop now</button>
    </section>
    
    <section id="feature">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>
    
    <section id='product1'>
        <h2>Featured Products</h2>
        <p>Summer collection New modern Design</p>
        <div class='pro-container'>
            <?php
                getProducts();
                $ip = getIPAddress();  
            ?>        
    </section>
    
    <section id="banner">
        <h4>Repair Services</h4>
        <h2>off to <span>70% off</span> -All t-shirts and Accessories</h2>
        <button>Explore more</button>
    </section>
    
     <!-- <section id="product1">
        <h2>New Arrivals</h2>
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
            <div class="pro">
                <img src="img/products/n5.jpg" alt="">
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
                <img src="img/products/n6.jpg" alt="">
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
                <img src="img/products/n7.jpg" alt="">
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
                <img src="img/products/n8.jpg" alt="">
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
    
    <section id="sm-banner">
        <div class="banner-box">
            <h5>Crazy deals</h5>
            <h2>buy 1 get 1 free</h2>
            <p>The best classic dress is on sale in cara</p>
            <button>Learn more</button>
        </div>
        <div class="banner-box banner-box2">
            <h5>spring/summer</h5>
            <h2>Upcoming season</h2>
            <p>The best classic dress is on sale in cara</p>
            <button>Collection</button>
        </div>
    </section>
    
    <section id="banner3">
        <div class="banner-box">
            <h2>Season Sale</h2>
            <h3>Winter collection -50% 0FF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>New footwear collection</h2>
            <h3>Spring/Summer 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-shirts</h2>
            <h3>New trendy prints</h3>
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
    
    <?php include("partials/footer.php"); ?>
    <script src="script.js"></script>

</body>

</html>