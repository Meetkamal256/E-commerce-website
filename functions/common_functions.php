<?php
//  connect to database
include("./partials/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


// getting products

function getProducts(){
    global $conn;
    $select_query = "SELECT * from products ORDER BY rand() limit 0,4";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image1 = $row['product_image1'];
            $category_id = $row['category_id'];
            
            echo "
        <div class='pro-container'>
            <div class='pro'>
                <img src='product_images/$product_image1' alt=''>
                <div class='des'>
                    <span>Adidas</span>
                    <h5>$product_title</h5>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <h4>$product_price</h4>
                    </div>
                    <a href='cart.html'><i class='fa-solid fa-cart-shopping cart'></i></a>
                </div>               
            </div>
        </div>";
        } 
}

// getting all products

function get_all_products(){
    global $conn;
    $select_query = "SELECT * from products ORDER BY rand()";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image1 = $row['product_image1'];
            $category_id = $row['category_id'];
            
            echo "
        <div class='pro-container'>
            <div class='pro'>
                <img src='product_images/$product_image1' alt=''>
                <div class='des'>
                    <span>Adidas</span>
                    <h5>$product_title</h5>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <h4>$product_price</h4>
                    </div>
                    <a href='cart.html'><i class='fa-solid fa-cart-shopping cart'></i></a>
                </div>               
            </div>
        </div>";
        }     
}

