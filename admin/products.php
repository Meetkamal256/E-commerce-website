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
            <form role="form" action="producthandler.php" method="post" enctype="multipart/form-data">
              <h1 class="text-center">Products</h1>
              <div class="box-body">
              
              <!-- Product title -->
                <div class="form-group">
                  <label for="product_title">Name</label>
                  <input type="text" class="form-control" id="product_title" placeholder="Enter Product Title" name="product_title">
                </div>
                
                <!-- Product price -->
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                </div>
                
                <!-- Product image 1 -->
                <div class="form-group">
                  <label for="product_image1" class="form-label">Product Image 1</label>
                  <input type="file" id="product_image1" name="product_image1" class="form-control">
                </div>
                
                <!-- Product image 2 -->
                <div class="form-group">
                  <label for="product_image2" class="form-label">Product Image 2</label>
                  <input type="file" id="product_image2" name="product_image2" class="form-control">
                </div>
                
                <!-- Product image 3 -->
                <div class="form-group">
                  <label for="product_image3" class="form-label">Product Image 3</label>
                  <input type="file" id="product_image3" name="product_image3" class="form-control">
                </div>
                
                <!-- Product description -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control" rows="5" placeholder="Enter Description" name="description"></textarea>
                </div>
                
                <!-- Product category -->
                
                <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="product_category">
                    <?php
                    include("../partials/connect.php");
                    $cat = "SELECT * from categories";
                    $results = mysqli_query($conn, $cat);
                    while ($row = mysqli_fetch_assoc($results)) {
                      $category_title = $row['category_title'];
                      $category_id = $row['category_id'];
                      echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
                <input type="submit" class="btn btn-info" name="insert_product" value="Insert Product">
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