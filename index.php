
<?php include('header.php'); 



if (isset($_SESSION['adminId'])) {
  header("Location: admin-dashboard.php");
}

?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <p class="h4 mb-4">Title of system</p>

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
          

  
          <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

          <input type="text" name="from" value="login" hidden>




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>

<?php include('footer.php'); ?>
