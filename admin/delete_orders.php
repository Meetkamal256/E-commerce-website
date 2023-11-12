<?php
if(isset($_GET['delete_orders'])){
    $order_id = $_GET['delete_orders'];
echo $order_id;
// delete query
$delete_orders_query = "DELETE from user_orders WHERE order_id= $order_id";
$result_orders= mysqli_query($conn, $delete_orders_query);
if($result_orders){
     echo "<script>alert('order has been deleted successfully')</script>";
    echo "<script>window.open('adminindex.php?all_orders', '_self')</script>";
}
}
