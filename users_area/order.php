<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    // echo $user_id;
}

// getting total items and total price of all items
$ip_address = getIPAddress();

// Initialize total price outside the loop
$total_price = 0;

$select_cart = "SELECT * from cart_details WHERE ip_address = '" . mysqli_real_escape_string($conn, $ip_address) . "'";
$result_cart_query = mysqli_query($conn, $select_cart);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_query);

while ($row = mysqli_fetch_array($result_cart_query)) {
    $product_id = $row['product_id'];

    $select_products = "SELECT * from products WHERE product_id = " . (int)$product_id;
    $result_product_query = mysqli_query($conn, $select_products);

    while ($row_product_price = mysqli_fetch_array($result_product_query)) {
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price; // Accumulate the product prices
    }
}

// getting quantity from cart
$get_cart = "SELECT * FROM cart_details";
$run_cart = mysqli_query($conn, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];

if ($quantity == 0) {
    $quantity = 1;
}

$subtotal = $total_price * $quantity;

$insert_orders = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status)
VALUES ('$user_id', '$subtotal', '$invoice_number', '$count_products', NOW(), '$status')";

$result_query = mysqli_query($conn, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders have been submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// orders pending
$insert_pending_orders = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status)
VALUES ($user_id, $invoice_number, $product_id, $count_products, '$status')";
$result_pending = mysqli_query($conn, $insert_pending_orders);

// empty cart
$empty_cart = "DELETE from cart_details WHERE ip_address = '$ip_address'";
$result_empty_cart = mysqli_query($conn, $empty_cart);

?>
