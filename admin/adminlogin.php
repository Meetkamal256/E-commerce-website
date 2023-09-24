<?php
session_start();
include("./admin-partials/head.php");

if(isset($_POST['login'])){
    include("../partials/connect.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * from admin where username='$email' AND password='$password'";
    $results = mysqli_query($conn, $sql);
    $final = mysqli_fetch_assoc($results); 
    
    $_SESSION['email'] = $final['username'];
    $_SESSION['password'] = $final['password'];
    
    // Check if a record was found and compare the email and password
    if($email = $final['username'] && $password === $final['password']){
        header('location: adminindex.php');
    }else{
        header('location: adminlogin.php');
    }
}
?>


<div class="row">
    <div class="col-sm-4">
    
    </div>
    
    <div class="col-sm-4">
           <!-- Horizontal Form -->
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Login</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="adminlogin.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="login">Login</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
    
    <div class="col-sm-4">
        
    </div>
</div>