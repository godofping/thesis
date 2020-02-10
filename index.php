
<?php include('header.php'); 



if (isset($_SESSION['adminID'])) {
  header("Location: admin-dashboard.php");
}

if (isset($_SESSION['accID'])) {
  header("Location: students-dashboard.php");
}

?>
<body>

<div class="container-fluid">
<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5 z-depth-3 form-border">
      
      <!-- Default form login -->
      <form class="text-center border form-border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <img src="logo/download.png" alt="avatar" class="rounded-circle img-responsive">
          <p class="h6 mb-3" style="font-family:">NDTC Student Activity Management Information System</p>

          <?php if (isset($_GET['status']) and $_GET['status'] == 'login-failed'): ?>
            <div class="alert alert-danger" role="alert">
            Login Failed!
          </div>
          <?php endif ?>

          <div class="row">
            <div class="col-12">
               <input type="text" name="username" class="form-control mb-4 input-fieldtest" required="" placeholder="Username">
            </div>           
          </div>
          <div class="row">
          <div class="col-12">
              <input type="password" name="password" class="form-control mb-4 input-fieldtest" required="" placeholder="Password">
          </div>
          </div>
  
          <button class="btn btn-info btn-block my-4 aqua-gradient" type="submit">Log in</button>

          <input type="text" name="from" value="login" hidden>

      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>

</div>
</body>

<?php include('footer.php'); ?>

<style type="text/css">
  
body {
  background-color: #f5f5f5 ; 
}

form{
  background-color: #FFFFFF;
}

.btn-block{
  border-radius: 12px;
}

.form-border{
  border-radius: 12px;
}

.input-fieldtest{
  border-radius: 12px;
}


</style>

