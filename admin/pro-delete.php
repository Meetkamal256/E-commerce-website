<?php
include("../partials/connect.php");

$newId = $_GET['del_id'];

$sql = "DELETE from products WHERE product_id='$newId'";
if(mysqli_query($conn, $sql)){
    header("location: products-show.php");
}else{
    echo "Could not delete product";
}
?>