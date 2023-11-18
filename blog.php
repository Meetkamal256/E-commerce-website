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
    @media(min-width: 939px) and (max-width: 1280px) {

        footer {
            margin-bottom: 800px;
        }

    }

    @media(max-width: 939px) {
        #blog-container {
            min-height: 100vh;
        }


        #blog {
            padding: 150px 50px 0px 50px;
        }

        #blog .blog-img img {
            height: 250px;
        }

        #blog .blog-box h1 {
            font-size: 60px;
        }

        footer {
            margin-bottom: 800px;
        }
    }

    @media(max-width: 700px) {
        #blog {
            padding: 150px 20px;
        }

        #blog .blog-box {
            flex-direction: column;
            align-items: flex-start;
        }

        #blog .blog-img {
            width: 100%;
            margin-right: 40px;
        }

        #blog .blog-details {
            width: 100%;
        }

        #blog .blog-img img {
            width: 100%;
            height: 300px;
        }
        
        #blog-details {
            width: 100%;
        }
    }

</style>

<body>
    <div id="blog-container">
        <section id="header">
            <a href="index.php" class="logo">LeisureWears...</a>
            <div>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="display_all.php">Shop</a></li>
                    <li><a href="blog.php" class="active">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="./users_area/user_registration.php">Register</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
                    <h4>Must-Have Skater Girl Items </h4>
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
    </div>

    <?php include("partials/footer.php"); ?>
    <script src="script.js"></script>

</body>

</html>