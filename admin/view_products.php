<?php
// connect to database

include("../partials/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>
<style>
 
    
    #all_products_table h1 {
        margin-top: 50px;
    }
    
    #all_products_table {
        display: flex;
        flex-direction: column;
        max-width: 650px;
        align-items: center;
        height: 100vh;
        margin: 0 auto;
    
    }
    
    #all_products_table table thead tr th {
        width: 100%;
        border-collapse: collapse;
        white-space: nowrap;
        background-color: blue;
        padding: 7px 25px;
        color: #fff;
    }
    
    #all_products_table table tbody tr td {
        background-color: grey;
        padding: 7px 25px;
        color: #fff
    }
    
    .product_img {
        width: 70px;
        height: 70px;
        object-fit: contain;
    }
    
    @media (min-width: 768px) and (max-width: 1024px) {
        
        /* Styles for screens with a maximum width of 768px */
        #all_products_table {
            max-width: 80%;
            margin: 0 auto 400px auto;
        }
        
        #all_products_table table thead tr th,
        #all_products_table table tbody tr td {
            padding: 5px 7px;
            /* Reduce padding for smaller screens */
        }
        
        .product_img {
            width: 50px;
            /* Adjust image size for smaller screens */
            height: 50px;
        }
    }
      
    /* Styles for screens with a maximum width of 768px */
    @media (min-width: 600px) and (max-width: 767px){
          
            #all_products_table {
            max-width: 15%;
            margin: 0 auto;
        }
        
        #all_products_table table thead tr th,
        #all_products_table table tbody tr td {
            padding: 2px 5px;
        }
        
        .product_img {
            width: 50px;
         
            height: 50px;
        }
    }
    
    @media (min-width: 375px) and (max-width: 600px){
        #all_products_table {
            max-width: 5%;
            margin: 0 0px 400px 320px;
            
        }
        
        #all_products_table h1{
            margin-right: 250px;
        
        }
        
        #all_products_table table thead tr th,
        #all_products_table table tbody tr td {
            padding: 2px 5px;
        }
        
        .product_img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    }
    
    
    @media (max-width: 374px){
        #all_products_table {
            max-width: 5%;
            margin: 0 0px 400px 320px;
            
        }
        
        #all_products_table h1{
            margin-right: 350px;
        
        }
        
        #all_products_table table thead tr th,
        #all_products_table table tbody tr td {
            padding: 2px 5px;
        }
        
        .product_img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    }
 
</style>

<body>
    <div id="pro-container">
        <div id="all_products_table">
            <h1>All Products</h1>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Total Sold</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                <tbody>
                    <?php
                    include("../partials/connect.php");
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    
                    $select_products = "SELECT * from products";
                    $result = mysqli_query($conn, $select_products);
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        echo "<tr>
                    <td>$number</td>
                    <td>$product_title</td>
                    <td><img src='../product_images/$product_image1' class='product_img'></td>
                    <td>&#x20A6; " . number_format($product_price) . "</td>
                    <td>0</td>
                    <td>true</td>
                    <td <a href=''><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td <a href=''><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                        $number++;
                    }
                ?>
                
                </tbody>
                </thead>
            </table>
        </div>
    
    </div>
</body>

</html>