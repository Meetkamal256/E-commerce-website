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
          <div class="col-sm-3">
          </div>
          <div class="col-sm-6">
            <?php
               $newId = $_GET['up_id'];
               include("../partials/connect.php"); 
               $sql = "SELECT * from products WHERE id ='$newId'";
               $results = mysqli_query($conn, $sql);
               $final = mysqli_fetch_assoc($results)
            ?>
            <form role="form" action="pro-updatehandler.php" method="post" enctype="multipart/form-data">
              <h1>Products</h1>
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" value="<?php echo $final['name'] ?>">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="<?php echo $final['price'] ?>">
                </div>
                <div class="form-group">
                  <label for="picture">File input</label>
                  <input type="file" id="picture" name="file" value="<?php echo $final['picture'] ?>">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control" rows="10" placeholder="Enter Description" name="description" value="<?php echo $final['description'] ?>"></textarea>
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="category" value="<?php echo $final['category'] ?>">
                    <?php
                    $cat = "SELECT * from categories";
                    $results = mysqli_query($conn, $cat);
                    while ($row = mysqli_fetch_assoc($results)) {
                      echo "<option value=" . $row['category_id'] . ">" . $row['category_title'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
                <input type="hidden" name="form_id" value="<?php echo $final['product_id'] ?>">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
              </div>
            </form>
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