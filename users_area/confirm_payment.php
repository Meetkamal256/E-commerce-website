<?php
include("../partials/connect.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    $select_query = "SELECT * from user_orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
    
    if (isset($_POST['comfirm_payment'])) {
        $invoice_number = $_POST['invoice_number'];
        $amount = (int) preg_replace('/[^\d]/', '', $_POST['amount']);  // Remove non-numeric characters and cast to integer
        
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "INSERT INTO user_payment (order_id, invoice_number, amount, payment_mode) VALUES($order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Successfully completed payment')</script>";
            echo "<script>window.open('profile.php?my_orders', '_self')</script>";
        }
    }
    $update_orders = "UPDATE user_orders SET order_status = 'Complete' WHERE order_id = $order_id";
    $result_orders = mysqli_query($conn, $update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comfirm Payment</title>
</head>
<style>
    body {
        background-color: gray;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    #container h1 {
        color: #ffff;
    }
    
    label {
        color: #ffff;
        text-align: center;
    }
    
    select {
        width: 107%;
        padding: 7px;
        margin-bottom: 15px;
    }
    
    input[type='text'] {
        width: 100%;
        padding: 7px;
        margin-bottom: 15px;
    }
    
    input[type='submit'] {
        background-color: blue;
        color: #ffff;
        border: none;
        padding: 7px 15px;
        cursor: pointer;
    }
    
    input[type='submit']:hover {
        background-color: lightskyblue;
    }
    
    .payment {
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <div id="container">
        <h1>Comfirm Payment</h1>
        <form action="" method="POST">
            <div>
                <input type="text" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div>
                <label for="amount">Amount</label>
                <input type="text" name="amount" value="&#x20A6; <?php echo number_format($amount_due) ?>">
            </div>
            <div>
                <select name="payment_mode" id="payment_mode">
                    <option value="">Select Payment Mode</option>
                    <option value="UPI">UPI</option>
                    <option value="Netbanking">Netbanking</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay Offline">Pay Offline</option>
                </select>
            </div>
            <div class="payment">
                <input type="submit" value="Comfirm" name="comfirm_payment">
            </div>
        </form>
    </div>
</body>

</html>