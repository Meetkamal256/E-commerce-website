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
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-9">
            <a href="products.php">
                <button style="color: green">Add New</button>
            </a>
          <?php
          include('../partials/connect.php');
          
          $sql = "SELECT * from products";
          $results = mysqli_query($conn, $sql);
          while($final = mysqli_fetch_assoc($results)){ ?>
          
          <a href="proshow.php?pro_id=<?php echo $final['id'] ?>">
           <h3><?php echo $final['id'] ?>: <?php echo $final['name'] ?></h3>
          </a>
          
          <a href="pro-update.php?up_id=<?php echo $final['id'] ?>">
            <button>Update</button>
        </a>
        <a href="pro-delete.php?del_id=<?php echo $final['id'] ?>">
            <button style="color: red;">Delete</button>
        </a><hr>
        <?php }
          ?>
          </div>
      
          <div class="col-sm-3">
          </div>
        </div>
      
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("admin-partials/footer"); ?>
</body>

</html>