
<?php include('header.php');
$currentpage = "student";
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
}
// if ((time() - $_SESSION['last_time']) > 300) {
//       header("Location: controller.php?from=logout");
  
// }else{
//    $_SESSION['last_time'] = time(); 
// }


 include("student-header.php");
 ?>

<div class="container-fluid">

  <div class="row">

  <div class="col-md-4">

    <div class="mt-5">
      
      <!-- Default form login -->

           <div class="row">
        <div class="col-md-12">
          <!--Mask with wave-->
        <div class="view overlay">

        <?php 

          $qry = mysqli_query($connection, "select * from studentprofile_table where accID = '".$_SESSION['accID']."'");
            $res = mysqli_fetch_assoc($qry);

            $stdimg = $res['IMG'];

           ?>

          <center class="pt-4"><img src="<?php echo $stdimg ?>" height = "150vh" calt="avatar" class=" img-responsive z-depth-2"><br></center>
          <a>
            <div class="mask waves-effect waves-light rgba-white-slight"></div>
          </a>
        </div>

        </div>
    </div>
      
          <p class="h4 mb-4 text-center pt-4">My Account</p>
          
          <?php 

            $qry = mysqli_query($connection, "select * from student_account_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $username = $res['StudentID'];
              
             ?>
         <small>School ID</small>
         <div class="row">
          <div class="col-12">
            <div class="form-group">
           <input type="text" name="StudentID" class="form-control md-4" disabled="" required="" value="<?php echo "$username";?>">
           </div>
          </div>
         </div>

          <!--Modal: Login with Avatar Form-->
          <div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
<form class="border border-light p-3" method="POST" action="controller.php" autocomplete="false">
              <div class="modal-content">

                <!--Header-->
                <div class="modal-header">
                  <img src="<?php echo $stdimg ?>" alt="avatar" class="rounded-circle img-responsive">
                </div>

                <!--Body-->
                <div class="modal-body text-center mb-1">

                  <h7 class="mt-1 mb-2">Student ID: <?php echo "$username"?></h7>

                  <?php 

                  $qyrname = mysqli_query($connection, "select * from std_prof_view where accID = '".$_SESSION['accID']."'");
                  $resname = mysqli_fetch_assoc($qyrname);

                  $fnameview = $resname['fname'];
                  $mnameview = $resname['mname'];
                  $lnameview = $resname['lname'];
                   ?>
                   
                  <p class="mt-1 mb-2"><small><?php echo "$lnameview" ." ". "$fnameview" ." ". "$mnameview" ?></small></p>
                  <div class="md-form ml-0 mr-0">
                    <input type="password" name="StudentPassword"  onkeyup="check();" required="" type="text" id="StudentPassword" class="form-control form-control-sm validate ml-0" >
                    <label for="StudentPassword" class="ml-0">New password</label>
                  </div>
                <div class="md-form ml-0 mr-0"> 
                    <input type="password" onkeyup="check();" name="confirmPassword" required="" type="text" id="confirmPassword" class="form-control form-control-sm validate ml-0" >
                    <label data-error="wrong" data-success="right" for="confirmPassword" class="ml-0">Confirm password</label>
                  </div>

                  <input type="text" name="accID" value="<?php echo $res['accID'] ?>" hidden>
                  <input type="text" name="from" value="change-pass" hidden>

                  <div class="">
                    <button class="btn btn-cyan mt-1"><i class="fas fa-check"></i></button>
                    <button class="btn btn-cyan mt-1" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                </form>
              </div>
              
            </div>
          </div>
          <!--Modal: Login with Avatar Form-->
          
          <div class="text-center">
            <a href="" class="btn btn-info btn-block my-4" data-toggle="modal" data-target="#changepassModal">Change Password</a>
          </div>

      <!-- Default form login -->

    </div>
  </div>

  <div class="col-md-4">

    <div class="mt-5">
    
          <p class="h4 mb-4 text-center pt-4">My Profile</p>
          
          <?php 

            $qry = mysqli_query($connection, "select * from studentprofile_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $flname = $res['fname'];
                $mname = $res['mname'];
                $lname = $res['lname'];
                $addresses = $res['address'];
                $emails = $res['email'];
                $parandgar = $res['pandg'];
                $religion = $res['religion'];
                $tribe = $res['tribe'];
                $numbers = $res['contactnum'];
                $bday = $res['birthday'];
                $sex = $res['gender'];

             ?>               

        <small>Full Name</small>
         <div class="row">
          <div class="col-12">
            <div class="form-group">
           <input type="text" name="fname" disabled="" class="form-control md-4" required="" value="<?php echo $flname ." ".$mname ." ". $lname;?>">
           </div>
          </div>
         </div>
         <small>Address</small>
        <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="text" name="address" disabled="" class="form-control md-4" required="" value="<?php echo "$addresses";?>">
          </div>
          </div>
         </div>
         <small>Email Address</small>
         <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="email" name="email" disabled="" class="form-control md-4" required="" value="<?php echo "$emails";?>">
          </div>
          </div>
         </div>
          <small>Parents/Guardian Name</small>
         <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="text" name="pandg" disabled="" class="form-control md-4" required="" value="<?php echo "$parandgar";?>">
          </div>
          </div>
         </div>
          <div class="form-row mb-2">
          <div class="col">
            <small>Religion</small>
            <input type="text" name="religion" class="form-control md-4" disabled="" required="" value="<?php echo "$religion";?>">
          </div>
          <div class="Tribe">
             <small>Tribe</small>
            <input type="text" name="tribe" class="form-control md-4" disabled="" required="" value="<?php echo "$tribe";?>"> 
          </div>
            </div>
          <small>Contact Number</small>
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <input type="text" name="contractnum" disabled="" class="form-control md-4" required="" value="<?php echo "$numbers";?>">
          </div>
          </div>
         </div>
          
          <small>Your Date of Birth</small>
          
            <div class="row">
          
              <div class="col-12">
                
                <div class="form-group">
                  <input type="date" name="birthday" disabled="" class="form-control" required="" value="<?php echo "$bday";?>">
                </div>
              </div>
            
            </div>
            <small>Gender</small>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <input type="text" name="gender" disabled="" class="form-control md-4" required="" value="<?php echo "$sex";?>">
                </div>
              </div>
            </div>   
         

          <button class="btn btn-info btn-block my-4" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i>Edit</button>

          <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i>Edit My Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <div class="form-row mb-2">
                  <div class="col">
                  <small>Middle Name</small>
                  <input type="text" name="mname" class="form-control md-4" required="" value="<?php echo "$mname";?>">   
                  </div>
                  <div class="Tribe">                  
                  <small>First Name</small>
                  <input type="text" name="fname" class="form-control md-4" required="" value="<?php echo "$flname";?>">
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Last Name</small>
                  <input type="text" name="lname" class="form-control md-4" required="" value="<?php echo "$lname";?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Address</small>
                  <input type="text" name="address" class="form-control md-4" required="" value="<?php echo "$addresses";?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Email Address</small>
                  <input type="email" name="email" class="form-control md-4" required="" value="<?php echo "$emails";?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Parents/Guardian Name</small>
                  <input type="text" name="pandg" class="form-control md-4" required="" value="<?php echo "$parandgar";?>">
                  </div>
                  </div>
                  </div>

                  <div class="form-row mb-2">
                  <div class="col">
                  <small>Religion</small>
                  <input type="text" name="religion" class="form-control md-4" required="" value="<?php echo "$religion";?>">
                  </div>
                  <div class="Tribe">
                  <small>Tribe</small>
                  <input type="text" name="tribe" class="form-control md-4" required="" value="<?php echo "$tribe";?>"> 
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Contact Number</small>
                  <input type="text" name="contractnum" class="form-control md-4" required="" value="<?php echo "$numbers";?>">
                  </div>
                  </div>
                  </div>
                  
                  <small>Your Birthdate</small>
                  <div class="row">
                
                    <div class="col-12">
                      
                      <div class="form-group">
                        <input type="date" name="birthday" class="form-control" required="" value="<?php echo "$bday";?>">
                      </div>
                    </div>
                  
                  </div>
                  <small>Select you Sex</small>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <!-- <input type="text" name="gender" disabled="" class="form-control md-4" required="" value="<?php echo "$sex";?>"> -->
                      <select class="form-control" name="gender" required="">
                        <option selected="" ><?php  echo "$sex" ?></option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
               
                      </div>
                    </div>
                  </div>

                  <input type="text" name="accID" value="<?php echo $res['accID'] ?>" hidden>
                  <input type="text" name="from" value="edit-student-profile" hidden>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>


    </div>
  </div>

<div class="col-md-4">

    <div class="mt-5">
     
          <p class="h4 mb-4 text-center pt-4">Department Council</p>
          
          <?php 

            $qry = mysqli_query($connection, "select * from list_student_view where accID = '".$_SESSION['accID']."'");

            $res = mysqli_fetch_assoc($qry);

            $dpname = $res['departmentClubName'];
            $ccname = $res['CounName'];
           ?>


         <div class="row">
          <div class="col-12">
            <div class="form-group">
           <input type="text" readonly="" class="form-control md-4" value="<?php echo $ccname;?>">
           </div>
          </div>
         </div>

         <p class="h4 mb-4 text-center pt-4">Departmental Club</p>

        <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="text" readonly="" class="form-control md-4" value="<?php echo $dpname;?>">
          </div>
          </div>
         </div>

          <p class="h4 mb-4 text-center pt-4">Social Club/s</p>
          

            <?php 

              $qry1 = mysqli_query($connection, "select * from student_social_club_view where stprofID = '".$res['stprofID']."'");
              while($res1 = mysqli_fetch_assoc($qry1)){ ?>
              
         
                <div class="form-group">
               <input type="text" name="fname" disabled="" class="form-control md-4" readonly="" value="<?php echo $res1['socialClubName']; ?>">
               </div>
         
        
             <?php }

             ?>

          
  </div>
  </div>


</div>


<?php include('footer.php'); ?>

<script type="text/javascript">
  
var password = document.getElementById("StudentPassword")
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

 