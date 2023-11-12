<?php
if(isset($_GET['delete_payment'])){
    $payment_id = $_GET['delete_payment'];
    $delete_payment = "DELETE FROM user_payment WHERE payment_id = $payment_id";
    $result_query = mysqli_query($conn, $delete_payment);
    if($result_query){
        // echo "<script>alert('User payment has been deleted successfully from database')</script>";
        echo "<script>window.open('adminindex.php?all_payment', '_self')</script>";
    }
}
?>