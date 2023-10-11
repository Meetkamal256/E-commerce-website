<!DOCTYPE html>
<html>
<?php 
    include("admin-partials/head.php"); 
    include("admin-partials/session.php");  
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        
        <?php include("admin-partials/header.php");
        include("admin-partials/aside.php");
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
               
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <a href="products.php">
                            <button style="color: green">Add Products</button>
                        </a><hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <a href="categories.php">
                            <button style="color: green">Add Categories</button>
                        </a><hr>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include("admin-partials/footer"); ?>
</body>
</html>