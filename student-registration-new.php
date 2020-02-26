 <?php include('header.php');
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
}
?> 

<div class="container-fluid">
 <form class="grey lighten-5 border border-light p-3 needs-validation" method="POST" action="controller.php" novalidate  autocomplete="false" enctype="multipart/form-data">
  <div class="row">
     
  <div class="col-md-4">

    <div class="mt-2">
          <p class="h4 mb-4 text-center pt-4">Please fill in your information</p>
          <p class="h4 mb-4 text-center pt-4">Please Change your current password</p>

            <div class="row">
            <div class="col-12">
            <div class="form-group">
              <small>New password</small>
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
              <small>Confirm password</small>
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

          <div class="d-flex justify-content-center">
                <div class="btn aqua-gradient btn-rounded float-left">
                  <span>Choose Picture</span>
                  <input type="file" id="IMG" name="IMG" required="">
                  <div class="invalid-feedback">Please select a picture</div>
                </div>
                
              </div>
               <div class="alert alert-danger" id="pictureselect" hidden="true" role="alert">
                Please Choose a <b>Picture</b>
              </div>

            <div class="row">
            <div class="col-12">
              <div class="form-group">
              <small>First Name</small>
             <input type="text" name="fname" pattern="[a-zA-Z][a-zA-Z\s\.-/']*" class="form-control md-4" id="fname" required="" placeholder="First Name">
              <div class="invalid-feedback">
              Please enter your First name Letters Only no Numbers.
              </div>
             </div>
            </div>
           </div>

            <div class="row">
            <div class="col-12">
              <div class="form-group">
                <small>Middle Name</small>
             <input type="text" name="mname" pattern="[a-zA-Z][a-zA-Z\s\.-/']*" class="form-control md-4" id="mname" required="" placeholder="MIddle Name">
              <div class="invalid-feedback">
              Please enter your Middle name Letters Only no Numbers.
              </div>
             </div>
            </div>
           </div>

            <div class="row">
            <div class="col-12">
              <div class="form-group">
                <small>Last Name</small>
             <input type="text" name="lname" pattern="[a-zA-Z][a-zA-Z\s\.-/']*" class="form-control md-4" id="lname" required="" placeholder="Last Name">
              <div class="invalid-feedback">
              Please enter your Last name Letters Only no Numbers.
              </div>
             </div>
            </div>
           </div>

            <div class="row">
            <div class="col-12">
            <div class="form-group">
              <small>Address</small>
            <input type="text" name="address" pattern="[a-zA-Z][a-zA-Z\s\.-/']*" id="address" class="form-control md-4" required="" placeholder="Address">
             <div class="invalid-feedback">
              Please provide a valid Permament Address Letters Only no Numbers.
              </div>
            </div>
            </div>
           </div>

           <div class="row">
          <div class="col-12">
          <div class="form-group">
            <small>Email</small>
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
            <small>Parents/Guardian Name</small>
          <input type="text" name="pandg" pattern="[a-zA-Z][a-zA-Z\s\.-/']*" class="form-control md-4" id="email" required="" placeholder="Parents/Guardian Name">
          <div class="invalid-feedback">
          Please provide a Parents/Guardian Name Letters Only no Numbers.
          </div>
          </div>
          </div>
         </div>

           <div class="form-row mb-2">
          <div class="col">
              <div class="form-group">
                <small>Religion</small>
            <input type="text" name="religion" pattern="[a-zA-Z][a-zA-Z\s\.-/']**" class="form-control md-4" id="religion" required="" placeholder="Religion">
            <div class="invalid-feedback">
            Please provide a Religion Letters Only no Numbers.
            </div>
            </div>
          </div>
          <div class="col">
              <div class="form-group">
                <small>Tribe</small>
            <input type="text" name="tribe" pattern="[a-zA-Z][a-zA-Z\s\.-/']*" class="form-control md-4" id="tribe" required="" placeholder="Tribe">
            <div class="invalid-feedback">
            Please provide a Tribe Letters Only no Numbers.
            </div>
            </div>
          </div>
            </div>

         <div class="row">
          <div class="col-12">
          <div class="form-group">
            <small>Contact Number</small>
            <input type="Number" name="contractnum" class="form-control md-4" required="" placeholder="Contact Number">
            <div class="invalid-feedback">
          Please provide a Contact Number.
          </div>
          </div>
          </div>
         </div>

         <small>Birthdate</small>
            <div class="row">
          
              <div class="col-12">
                
                <div class="form-group">
                  <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Month" required="">
                  <div class="invalid-feedback">
                   Please enter your birthday.
                  </div>
                  <div class="alert alert-danger" id="datecheck" hidden="true" role="alert">Age restriction you must be atleast 15yrs old.</div>
                </div>
              </div>
            </div>

            <small>Select Sex</small>
             <div class="row">
              <div class="col-12">
                <div class="form-group">
                <select class="form-control" name="gender" required="">
                  <option selected="" disabled=""></option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <div class="invalid-feedback">
                   Please enter your Gender.
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
                 <small>Select Course</small>
                <select class="form-control" name="CourseID" required="">
                  <option selected="" disabled=""></option>
                  <?php $qry = mysqli_query($connection, "select * from course_table");
                  while ($res = mysqli_fetch_assoc($qry)) { ?>
                    <option value="<?php echo $res['CourseID']; ?>"><?php echo $res['CourseName']; ?></option>
                  <?php } ?>

                </select>
                 <div class="invalid-feedback">
                   Please select your Course.
                  </div>
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
                <div class="alert alert-danger" id="alerttest" hidden="true" role="alert">
                Please select <b>atleast 1 Social Club</b>
              </div>
                </div>

          </div>
          </div>



    </div>
    <!-- <small>*By clicking Submit, you are indicating that you have read, understood, and agree to <small style="color: blue;">User Agreement</small> and <small style="color: blue;">Privacy Policy</small> </small><br> -->
    <a href="" data-toggle="modal" data-target="#changepassModal" ><button id="testingbutton" class="btn aqua-gradient itogglebutton">Submit</button></a>
    <!-- <button class="btn aqua-gradient itogglebutton"  data-toggle="modal" data-target="#changepassModal" >submit</button>  -->

      

          <div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-m" role="document">
              <div class="modal-content">
                <form class="border border-light p-3" method="POST" action="controller.php" autocomplete="false">
                <div class="modal-header">
                  <strong class="modal-title w-100" id="myModalLabel" style="font-family: Arial Black, Gadget, sans-serif">Terms & Conditions</strong>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <small>By clicking Proceed, you agree to our <a href="privacy-policy.php" target="_newtab">Privacy Policy</a> and <a href="data-policy.php" target="_newtab">Data Policy</a>.</small><br>
                  <small id="ageapper" hidden="true" style="text-align: left;color: red;">Age restriction you must be atleast 15yrs old.</small>
                  <small id="socialclub" hidden="true" style="text-align: left;color: red;">Please select <b>atleast 1 Social Club</b></small>
                </div>
                <input type="text" name="from" value="register_student_information" hidden>
                <div class="modal-footer">
                  <button type="submit" id="test" class="btn success-color itogglebutton">Proceed</button>
                  <button class="btn btn-info mt-1 itogglebutton" id="backbutton" hidden="true" data-dismiss="modal">Back</button>
                  <!-- <button type="submit" class="btn success-color">No</button> -->
                </div>
              </form>
              </div>
            </div>
          </div>

      

      

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

<!-- <script type="text/javascript">
  
  $("input:checkbox").change(function () {
      var st = this.checked;
      if (st) {
        $("#testingbutton").attr("disabled",false);
      }
      else {
        $("#testingbutton").attr("disabled",true);
      }
  });


</script> -->

<script type="text/javascript">
  
  $("#testingbutton").click(function(){
  
    function getAge(){
      var datestring = document.getElementById("birthday").value;
  
    if (datestring != "") {
        var today = new Date();
        var birthDate = new Date(datestring); //format is mm.dd.yyyy
        var age = today.getFullYear() - birthDate.getFullYear();

        if(age < 15 || age > 100)
        {
            $("#datecheck").attr("hidden",false);
            $("#test").attr("hidden",true);
            $("#backbutton").attr("hidden",false);
            // $("#ageapper").attr("hidden",false);
        }
         else 
        {
           $("#datecheck").attr("hidden",true); 
           $("#test").attr("disabled",false);
           $("#backbutton").attr("hidden",true);
           $("#test").attr("hidden",false);
           // $("#ageapper").attr("hidden",true);
         }
    } 
    }

    getAge();

    picture = $("#IMG").val();

    if (picture != "" || picture != null) {
      $("#pictureselect").attr("hidden",true);
      }else {
        $("#test").attr("hidden",false);
      }

      if ($("input:checkbox").is(':checked')) {
        $("#alerttest").attr("hidden",true);
      }else {
        $("#backbutton").attr("hidden",false);
      }

    if (!$("input:checkbox").is(':checked') && picture == "" || picture == null) {
      $("#alerttest").attr("hidden",false);
      $("#pictureselect").attr("hidden",false);
      // $("#agreebutton").attr("disabled",false);
    }else if (!$("input:checkbox").is(':checked')) {
      $("#alerttest").attr("hidden",false);
       $("#backbutton").attr("hidden",false);
      $("#test").attr("hidden",true);
      // return false;
    }else if (picture == "" || picture == null) {
      $("#pictureselect").attr("hidden",false);
      // return false ;
      } 

  });

</script>

<!-- <script type="text/javascript">
  
  $("input:checkbox").click(function(){
    var st = this.checked;
     if (st) {
        $("#testingbutton").attr("disabled",false);
      }
  });

</script> -->

<style type="text/css">
  .itogglebutton{
  border-radius: 12px;
}
</style>