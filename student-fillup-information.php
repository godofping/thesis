<?php include('header.php');

?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <form class=" border border-light p-3"  method="POST" action="controller.php" autocomplete="false" enctype="multipart/form-data">

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
         <!--     <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            </div> -->
           <input type="password" name="newpassword" onkeyup="check();" aria-describedby="inputGroupPrepend" id="newpassword" class="form-control md-4" required placeholder="New Password">
           <!-- <div class="invalid-feedback">
          Please choose a username.
          </div> -->
           </div>
          </div>
         </div>

         <div class="row">
         <div class="col-12">
           <div class="form-group">
             
             <input type="password" onkeyup="check();" placeholder="Confirm Password"  data-success="right" name="confirmPassword"  id="confirmPassword" class="form-control form-control md-4" >
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

 <script type="text/javascript">
  
var password = document.getElementById("newpassword")
  , confirm_password = document.getElementById("confirmPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


</script>

<script type="text/javascript">

(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>