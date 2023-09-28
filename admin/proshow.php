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
          
          <?php
          include('../partials/connect.php');
          
          $id= $_GET['pro_id'];
          $sql = "SELECT * from products WHERE id='$id'";
          $results = mysqli_query($conn, $sql);
          
          $final = mysqli_fetch_assoc($results);
          ?>
          
          <h3>Name: <?php echo $final['name'] ?></h3><hr><br>
          <h3>Price: <?php echo $final['price'] ?></h3><hr><br>
          <h3>Description: <?php echo $final['description'] ?></h3><hr><br>
          <img src="../<?php echo $final['picture']?>" alt="No file" style="height: 300px; width: 300px background: cover;">
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