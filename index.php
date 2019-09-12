
<?php include('header.php'); 



if (isset($_SESSION['adminID'])) {
  header("Location: admin-dashboard.php");
}

if (isset($_SESSION['accID'])) {
  header("Location: students-dashboard.php");
}

?>

<div class="container-fluid">
<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5 peach-gradient z-depth-2">
      
      <!-- Default form login -->
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <img src="http://localhost:8080/thesis/logo/download.png" alt="avatar" class="rounded-circle img-responsive">
          <p class="h6 mb-3">NDTC Student Activity Management Information System</p>

          <?php if (isset($_GET['status']) and $_GET['status'] == 'login-failed'): ?>
            <div class="alert alert-danger" role="alert">
            Login Failed!
          </div>
          <?php endif ?>

          <div class="row">
            <div class="col-12">
               <input type="text" name="username" class="form-control mb-4" required="" placeholder="Username">
            </div>           
          </div>
          <div class="row">
          <div class="col-12">
              <input type="password" name="password" class="form-control mb-4" required="" placeholder="Password">
          </div>
          </div>
  
          <button class="btn btn-info btn-block my-4 aqua-gradient" type="submit">Sign in</button>

          <input type="text" name="from" value="login" hidden>




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>

<?php include('footer.php'); ?>
