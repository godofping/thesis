<?php include('header.php'); ?>

<div class="container-fluid ">
<div class="row ">

  <div class="col-md-4 "></div>

  <div class="col-md-4 ">
    <div class="mt-5">
      
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">
        
           <p class="h4 mb-4 text-center">Your account has been successfully created</p>
         <img src="http://localhost:8080/thesis/icon/check.png" alt="avatar" class=" img-responsive">   
           	<p><b>Please Click the button to Login your Account.</b></p>
          <button class="btn btn-info btn-block my-4 green darken-4" type="submit">ok</button>

          <input type="text" name="from" value="success-created" hidden>

       




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>

<?php include('footer.php'); ?>