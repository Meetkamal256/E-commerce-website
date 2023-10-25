<?php
include("../partials/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area</title>
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #container {
        text-align: center;
    }

    header {
        background-color: lightblue;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header ul li {
        list-style: none;
    }

    header ul li a {
        text-decoration: none;
        margin-right: 30px;
    }

    .logo {
        width: 70px;
        height: 50px;
        object-fit: contain;
        background-color: lightblue;
    }

    h1 {
        color: gray;
        text-align: center;
        margin: 20px 0px;
        font-size: 25px;
    }

    .admin_dashboard {
        background-color: gray;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        padding: 20px;

    }

    .image-container {
        width: 100px;
        /* height: 100px; */
        object-fit: contain;
        margin-right: 20px;
    }

    .image-container img {
        width: 100%;
    }

    .admin_dashboard p {
        color: #ffff;
        margin-bottom: 20px;

    }

    .admin_dashboard button a {
        text-decoration: none;
        color: #ffff;


    }

    .admin_dashboard button {
        background-color: blue;
        padding: 7px 25px;
        color: #ffff;
        text-decoration: none;
        border: 3px solid #fff;
        margin-right: 7px;
        margin-top: 7px;
        cursor: pointer;
    }

    #content {
        text-align: center;
    }
</style>

<body>
    <div id="container">
        <header>
            <div>
                <img src="../img/shopping-cart-supermarket-generative-ai.jpg" alt="" class="logo">
            </div>
            <div>
                <ul>
                    <li><a href="#">Welcome Guest</a></li>
                </ul>
            </div>
        </header>
        <h1>Manage Details</h1>
        
        <div class="admin_dashboard">
            <div class="image-container">
                <img src="../img/profile.jpg" alt="">
                <p>Admin Name</p>
            </div>
            <div class="buttons">
                <div>
                    <button><a href="adminindex.php?insert_products">Insert Products</a></button>
                    <button><a href="">View Products</a></button>
                    <button><a href="adminindex.php?insert_category">Insert Categories</a></button>
                    <button><a href="">View Categories</a></button>
                    <button><a href="">All Orders</a></button>
                    <button><a href="">All Payments</a></button>
                    <button><a href="">List Users</a></button>
                    <button><a href="admin-partials/logout.php">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <div id="content">
    <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_products'])) {
            include('insert_products.php');
        }
        ?>
    </div>


</body>

</html>