<?php
if(isset($_GET['delete_category']))
$delete_cat = $_GET['delete_category'];
echo $delete_cat;
// delete query
$delete_cat_query = "DELETE from categories WHERE category_id= $delete_cat";
$result_delete = mysqli_query($conn, $delete_cat_query);
if($result_delete){
    // echo "<script>alert('Category has been deleted successfully')</script>";
    echo "<script>window.open('adminindex.php?view_categories', '_self')</script>";
}

?>