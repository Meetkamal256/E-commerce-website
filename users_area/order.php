<?php
include("../partials/connect.php");
include_once("../functions/common_functions.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// getting total items and total price of all items
$ip_address = getIPAddress();
$subtotals = array(); // Create an array to store subtotals

$select_cart = "SELECT * from cart_details WHERE ip_address = '$ip_address'";
$result_cart_query = mysqli_query($conn, $select_cart);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_query);

while ($row = mysqli_fetch_array($result_cart_query)) {
    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $select_products = "SELECT * from products WHERE product_id = $product_id";
    $result_product_query = mysqli_query($conn, $select_products);
        
    // Initialize subtotal for the current product
    $product_subtotal = 0;
    
    while ($row_product_price = mysqli_fetch_array($result_product_query)) {
        // Extract the price as a string with currency symbol
    $product_price_with_currency = $row_product_price['product_price'];
    
    // Remove currency symbol and any other non-numeric characters
    $product_price_clean = preg_replace("/[^0-9.]/", "", $product_price_with_currency);
    
    // Convert to a floating-point number
    $product_price = (float) $product_price_clean;
    
    $product_subtotal = $product_price * $quantity;
    $subtotals[] = $product_subtotal; // Store the subtotal for each product
    }
    
}

// Calculate the total subtotal by summing all subtotals
$subtotal = array_sum($subtotals);


// Insert the order into the database
$insert_orders = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status)
VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($conn, $insert_orders);
if($result_query){
    echo "<script>alert('orders have been submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// echo $count_products .'<br>';
// echo $subtotal .'<br>';
?>
