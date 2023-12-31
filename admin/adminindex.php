<?php
include("../partials/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_username = $_SESSION['admin_username'];


$select_query = "SELECT * from admin_table WHERE admin_username='$admin_username'";
$execute = mysqli_query($conn, $select_query);
$row_data = mysqli_fetch_assoc($execute);
$admin_username = $row_data['admin_username'];
$admin_image = $row_data['admin_image'];

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
        width: 100%;
        position: relative;
        min-height: 100vh;
    }

    header {
        background-color: blue;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
    }

    header ul li {
        list-style: none;
    }

    header ul li a {
        text-decoration: none;
        margin-right: 50px;
        color: #fff;
    }

    .logo {
        width: 70px;
        height: 50px;
        object-fit: contain;
        background-color: blue;
    }

    h1 {
        color: blue;
        text-align: center;
        margin: 20px 0px;
        font-size: 25px;
        margin-top: 70px;
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

    .button-link {
        display: inline-block;
        padding: 7px 25px;
        font-size: 16px;
        background-color: blue;
        color: #fff;
        text-decoration: none;
        border: 2px solid #fff;
        margin-right: 7px;
        margin-top: 7px;
        cursor: pointer;
        text-align: center;
    }

    .button-link:hover {
        background-color: #010729;
    }

    #content {
        margin: 0 auto;
    }

    @media(min-width: 576px) and (max-width: 768px) {

        h1 {
            font-size: 23px;
        }

        .button-link {
            display: inline-block;
            padding: 5px 20px;
            font-size: 15px;
        }
    }

    @media(min-width: 375px) and (max-width: 575px) {

        h1 {
            font-size: 22px;
        }

        .button-link {
            display: inline-block;
            padding: 5px 15px;
            font-size: 14px;
        }
    }

    @media(max-width: 374px) {

        h1 {
            font-size: 20px;
        }

        .button-link {
            display: inline-block;
            padding: 5px 12px;
            font-size: 14px;
        }
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
                    <?php
                    if (!isset($_SESSION['admin_username'])) {
                        echo "<li><a href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li><a href='#'>Welcome " . $_SESSION['admin_username'] . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </header>
        <h1>Manage Details</h1>

        <div class="admin_dashboard">
            <div class="image-container">
                <img src="../product_images/<?php echo $admin_image ?>" alt="">
                <p><?php echo $admin_username ?></p>
            </div>
            <div class="buttons">
                <a href="adminindex.php?insert_products" class="button-link">Insert Products</a>
                <a href="adminindex.php?view_products" class="button-link">View Products</a>
                <a href="adminindex.php?insert_category" class="button-link">Insert Categories</a>
                <a href="adminindex.php?view_categories" class="button-link">View Categories</a>
                <a href="adminindex.php?all_orders" class="button-link">All Orders</a>
                <a href="adminindex.php?all_payment" class="button-link">All Payments</a>
                <a href="adminindex.php?list_users" class="button-link">List Users</a>
                <a href="admin_logout.php" class="button-link">Logout</a>
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
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['edit_categories'])) {
                include('edit_categories.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['all_orders'])) {
                include('all_orders.php');
            }
            if (isset($_GET['delete_orders'])) {
                include('delete_orders.php');
            }
            if (isset($_GET['all_payment'])) {
                include('all_payment.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_users'])) {
                include('delete_users.php');
            }
            ?>
        </div>
    </div>
</body>

</html>