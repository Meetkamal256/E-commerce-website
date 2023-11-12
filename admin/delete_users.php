<?php
if(isset($_GET['delete_users'])){

    $user_id = $_GET['delete_users'];
    $delete_users = "DELETE FROM user_table WHERE user_id = $user_id";
    $result_users = mysqli_query($conn, $delete_users);
    if($result_users){
        echo "<script>alert('User has been deleted successfully from database')</script>";
        echo "<script>window.open('adminindex.php?list_users', '_self')</script>";
    }
}
?>
