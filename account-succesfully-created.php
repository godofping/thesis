<?php include('header.php'); ?>

<div class="container-fluid ">
<div class="row ">

  <div class="col-md-4 "></div>

  <div class="col-md-4 ">
    <div class="mt-5">
      
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">
        
          <strong class="h2">Awesome!</strong>
           <p class="h5 mb-4 text-center p-3">Your account has been successfully created</p>
           	<small>Please Click the button to Login your Account.</small>
          <button class="btn btn-info btn-block my-4 green darken-2" type="submit">ok</button>

          <input type="text" name="from" value="success-created" hidden>

       




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>

<?php include('footer.php'); ?>

<style type="text/css">
  
  .btn-block{
  border-radius: 12px;
}
  
</style>