<?php
if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    $delete_query = "DELETE from products WHERE product_id=$delete_id";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete){
        // echo "<script>alert('Product deleted successfully from database')</script>";
        echo "<script>window.open('adminindex.php?view_products.php', '_self')</script>";
    }

}

?>