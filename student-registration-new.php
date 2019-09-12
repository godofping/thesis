<?php include('header.php');
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
}
?>


<div class="container-fluid">
 <form class="grey lighten-5 border border-light p-3 needs-validation" novalidate method="POST" action="controller.php" autocomplete="false" enctype="multipart/form-data">
  <div class="row">
     
  <div class="col-md-4">

    <div class="mt-2">
          <p class="h4 mb-4 text-center pt-4">Please fill in your information</p>
          <p class="h4 mb-4 text-center pt-4">Please Change your current password</p>

            <div class="row">
            <div class="col-12">
            <div class="form-group">
           <input type="password" name="newpassword" onkeyup="check();" id="newpassword" class="form-control md-4" required placeholder="New Password">
           <div class="invalid-feedback">
          Please enter a new password.
          </div>
           </div>
          </div>
          </div>

           <div class="row">
           <div class="col-12">
             <div class="form-group">
             <input type="password" onkeyup="check();" placeholder="Confirm Password" name="confirmPassword"  id="confirmPassword" required=""  class="form-control md-4" >
              <div class="invalid-feedback">
              Please confirm your password.
              </div>
               </div>
             </div>  
            </div>

    </div>
  </div>

        <div class="col-md-4">

    <div class="mt-2">
          
          <p class="h4 mb-4 text-center pt-4">Register your Information</p>

           <div class="row">
              <div class="col-12">
                <div class="form-group">
                <div class="d-flex justify-content-center">
                <div class="btn aqua-gradient btn-rounded float-left">
                  <span>Choose Picture</span>
                  <input type="file" name="IMG" required="">
                  <div class="invalid-feedback">Please select a picture</div>
                </div>
              </div>
              </div>
              </div>
            </div>

            <div class="row">
            <div class="col-12">
              <div class="form-group">
             <input type="text" name="fname" class="form-control md-4" id="fname" required="" placeholder="First Name">
              <div class="invalid-feedback">
              Please enter your First name.
              </div>
             </div>
            </div>
           </div>

            <div class="row">
            <div class="col-12">
              <div class="form-group">
             <input type="text" name="mname" class="form-control md-4" id="mname" required="" placeholder="MIddle Name">
              <div class="invalid-feedback">
              Please enter your Middle name.
              </div>
             </div>
            </div>
           </div>

            <div class="row">
            <div class="col-12">
              <div class="form-group">
             <input type="text" name="lname" class="form-control md-4" id="lname" required="" placeholder="Last Name">
              <div class="invalid-feedback">
              Please enter your Last name.
              </div>
             </div>
            </div>
           </div>

            <div class="row">
            <div class="col-12">
            <div class="form-group">
            <input type="text" name="address" id="address" class="form-control md-4" required="" placeholder="Address">
             <div class="invalid-feedback">
              Please provide a valid Permament Address.
              </div>
            </div>
            </div>
           </div>

           <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="email" name="email" class="form-control md-4" id="email" required="" placeholder="Email">
          <div class="invalid-feedback">
          Please provide a valid Email Address.
          </div>
          </div>
          </div>
         </div>

         <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="text" name="pandg" class="form-control md-4" id="email" required="" placeholder="Parents/Guardian Name">
          <div class="invalid-feedback">
          Please provide a Parents/Guardian Name.
          </div>
          </div>
          </div>
         </div>

           <div class="form-row mb-2">
          <div class="col">
              <div class="form-group">
            <input type="text" name="religion" class="form-control md-4" id="religion" required="" placeholder="Religion">
            <div class="invalid-feedback">
            Please provide a Religion.
            </div>
            </div>
          </div>
          <div class="col">
              <div class="form-group">
            <input type="text" name="tribe" class="form-control md-4" id="tribe" required="" placeholder="Tribe">
            <div class="invalid-feedback">
            Please provide a Tribe.
            </div>
            </div>
          </div>
            </div>

         <div class="row">
          <div class="col-12">
          <div class="form-group">
            <input type="text" name="contractnum" class="form-control md-4" required="" placeholder="Contact Number">
            <div class="invalid-feedback">
          Please provide a Contact Number.
          </div>
          </div>
          </div>
         </div>

         <label>Your Date of Birth</label>
            <div class="row">
          
              <div class="col-12">
                
                <div class="form-group">
                  <input type="date" name="birthday" class="form-control" placeholder="Month" required="">
                  <div class="invalid-feedback">
                   Please enter your birthday.
                  </div>
                </div>
              </div>
            </div>

            <label>Select Sex</label>
             <div class="row">
              <div class="col-12">
                <div class="form-group">
                <select class="form-control" name="gender" required="">
                  <option selected="" disabled=""></option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <div class="invalid-feedback">
                   Please enter your birthday.
                  </div>
                </div>
              </div>
            </div>
      

     </div>      
    </div>

    <div class="col-md-4">

    <div class="mt-2">
    
          <p class="h4 mb-4 text-center pt-4">Choose Course</p>

          <div class="row">
            <div class="col-12">
                <div class="form-group">
                 <label>Select Course</label>
                <select class="form-control" name="CourseID" required="">
                  <option selected="" disabled=""></option>
                  <?php $qry = mysqli_query($connection, "select * from course_table");
                  while ($res = mysqli_fetch_assoc($qry)) { ?>
                    <option value="<?php echo $res['CourseID']; ?>"><?php echo $res['CourseName']; ?></option>
                  <?php } ?>

                </select>

                </div>


          </div>
          </div>

          <p class="h4 mb-4 text-center">Choose Social Club</p>
          
          <div class="row">
            <div class="col-12">
              <p ><b>Please select atleast 1 Social Club</b></p>
                <div class="form-group">
                
                <!-- Material checked -->
                <div class="form-check">
                  <?php 
                    $qry = mysqli_query($connection,"select * from social_club_table order by socialClubName asc");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                    <br>
                      <input type="checkbox" name="socialClubName[]" class="form-check-input" value="<?php echo  $res['socialClubId']; ?>" id="c<?php echo $res['socialClubId']; ?>">
                      <label class="form-check-label" for="c<?php echo $res['socialClubId']; ?>"><?php echo $res['socialClubName']; ?></label>
                    <?php }
                   ?>
                  
                </div>

                </div>
          </div>
          </div>



    </div>

    <button class="btn aqua-gradient" id="testingbutton" type="submit" disabled="true">submit</button>

      <input type="text" name="from" value="register_student_information" hidden>

      

  </div>

</div>
 
</form>
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

<script type="text/javascript">



var limit = 3;
$('.form-check-input').on('change', function(evt) {
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
});


</script>

<script type="text/javascript">
  
  $("input:checkbox").change(function () {
      $("#testingbutton").attr("disabled",false);
  });


</script>