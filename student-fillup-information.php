
<?php include('header.php'); 
$qry = mysqli_query($connection,  "select * ");


/*if (isset($_SESSION['adminId'])) {
  header("Location: admin-dashboard.php");
}
*/
?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <form class=" border border-light p-3" method="POST" action="controller.php" autocomplete="false" enctype="multipart/form-data">

          <p class="h4 mb-4 text-center">Register your Information</p>
        
        <div class="row">
          <div class="col-12">

            <div class="form-group">
              <input type="file"  class="input-default-js" name="IMG" required="">
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group">
           <input type="password" name="newpassword" class="form-control md-4" required="" placeholder="New Password">
           </div>
          </div>
         </div>

   		   <div class="row">
          <div class="col-12">
            <div class="form-group">
           <input type="text" name="fname" class="form-control md-4" required="" placeholder="Full Name">
           </div>
          </div>
         </div>

        <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="text" name="address" class="form-control md-4" required="" placeholder="Address">
          </div>
          </div>
         </div>

         <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="email" name="email" class="form-control md-4" required="" placeholder="Email">
          </div>
          </div>
         </div>
          
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <input type="text" name="contractnum" class="form-control md-4" required="" placeholder="Contact Number">
          </div>
          </div>
         </div>
          
          <label>Your Date of Birth</label>
          
            <div class="row">
          
              <div class="col-12">
                
                <div class="form-group">
                  <input type="date" name="birthday" class="form-control" placeholder="Month" required="">
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
        
                <select class="form-control" name="gender" required="">
                  <option selected="" disabled="">Select Sex</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
         
                </div>
              </div>
            </div>
               

          <button class="btn btn-info btn-block my-4" type="submit">Next</button>

          <input type="text" name="from" value="register_student_info" hidden>

       




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>

<?php include('footer.php'); ?>

 