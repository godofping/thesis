
<?php include('header.php');
$currentpage = "club";
if (!isset($_SESSION['stprofID'])) {
  header("Location: index.php");
}
if ((time() - $_SESSION['last_time']) > 300) {
      header("Location: controller.php?from=logout");
  
}else{
   $_SESSION['last_time'] = time(); 
}


 include("student-header.php");

  



 ?>

<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">
        <?php 

          $mi = $reshey['mname'];
          //Get the first character.
          $firstCharacter = $mi[0];

         ?>
        <!-- <h2><i class="fas fa-user-alt"></i><b><?php echo " ".ucfirst($reshey['lname'])." ". ucfirst($reshey['fname'])." ". ucfirst($firstCharacter)."."  ?></b></h2> -->
        <h2><b>My Account</b></h2>
        <hr>
          
      </div>
    </div>

<div class="row">
  <div class="col-md-12 mt-4">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true" style="color: black; font-family: Arial Black, Gadget, sans-serif">My Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false" style="color: black; font-family: Arial Black, Gadget, sans-serif">My Clubs</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
    <div class="row">
        <div class="col-md-12">
          <!--Mask with wave-->
        <div class="view overlay">

<div class="container-fluid">

  <div class="row">

  <div class="col-md-4">

    <div class="mt-3">
      
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

          <center class="pt-4"><img src="<?php echo $stdimg ?>" height = "150vh" calt="avatar" class="rounded img-responsive z-depth-2"><br></center>
          <a>
            <div class="mask waves-effect waves-light rgba-white-slight"></div>
          </a>
        </div>

        </div>
    </div>
      
          <?php 

            $qry = mysqli_query($connection, "select * from student_account_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $username = $res['StudentID'];
              
             ?>
         <h3 class="text-center"><b>School ID: <?php echo "$username";?></b></h3>

          <!--Modal: Login with Avatar Form-->
          <div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
              <div class="modal-content ">
                <form class="border border-light p-3" method="POST" action="controller.php" autocomplete="false">
              

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
                    <button class="btn blue-gradient mt-1"><i class="fas fa-check"></i></button>
                    <button class="btn btn-danger mt-1" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
                  
                </div>
                </form>
              </div>
              
            </div>
          </div>
          <!--Modal: Login with Avatar Form-->
          
          <div class="text-center">
            <a href="" class="btn aqua-gradient itogglebutton" data-toggle="modal" data-target="#changepassModal">Change Password</a>
          </div>

      <!-- Default form login -->

    </div>
  </div>

  <div class="col-md-4">

    <div class="mt-3">
    
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
 
    </div>
  </div>

  <div class="col-md-4">
          <div class="mt-3">

            <p class="h4 mb-4 text-center pt-5"></p>

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
          
          <small>Your Birthdate</small>
          
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

            <button class="btn aqua-gradient btn-block my-4 itogglebutton" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i>Edit</button> 

           <!-- Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">

            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog" role="document">


              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-user-edit"></i> Edit My Profile</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>First Name</small>
                  <input type="text" name="fname" class="form-control md-4" required="" value="<?php echo "$flname";?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Middle Name</small>
                  <input type="text" name="mname" class="form-control md-4" required="" value="<?php echo "$mname";?>">
                  </div>
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
                  <button type="submit" class="btn blue-gradient itogglebutton"><i class="fas fa-check"></i> Update</button>
                </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->

      </div>
    </div>

<!-- cointainer -->
 </div>
</div>


        </div>

        </div>
    </div>


  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
        <?php 

          $qryhey = mysqli_query($connection, "select * from std_prof_view where accID = ".$_SESSION['accID']." ");
          $reshey = mysqli_fetch_assoc($qryhey);

         ?>
         <?php 

            $qry = mysqli_query($connection, "select * from student_account_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $username = $res['StudentID'];
              
             ?>
          <?php 

              $qry = mysqli_query($connection, "select * from list_student_view where accID = '".$_SESSION['accID']."'");

              $res = mysqli_fetch_assoc($qry);

              $dpname = $res['departmentClubName'];
              $ccname = $res['CounName'];
             ?>   

             <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">
    <div class="card form-border mt-3">

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

          <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <b><p style="color: black"><?php echo " ".ucfirst($reshey['lname'])." ". ucfirst($reshey['fname'])." ".ucfirst($firstCharacter)."." ?></p></b>
            </div>

            <div class="row">
                <div class="col-md-12">
                  
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <small>Course</small>
                      <h5 style="color: black;text-align: left;"><?php echo $res['CourseName'] ; ?></h5>

                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Departmental Council Club</small>
                      <h5 style="color: black;text-align: left;"><?php echo $ccname ; ?></h5>
                      </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Departmental Club</small>
                      <h5 style="color: black;text-align: left;"><?php echo $dpname ; ?></h5>
                      </div>
                </div>
                </div>

                <small>Social Clubs</small>
                    <?php 
                    $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
                    while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>
                      <div class="md-form" style="text-align: left;">
                      
                      <h5 style="color: black"><?php echo $ressocialclub['socialClubName'] ?></h5>
                    </div>
                    <?php } ?>

                 <?php 

              $qry = mysqli_query($connection, "select * from membershiptoggle_table where toggleonoroff = 'ON'");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?>
              <a href="edit-socialclub.php"><button class="btn blue-gradient itogglebutton"><i class="fas fa-edit"></i> Edit Club Membership</button></a>
              <?php endif ?>
        
       
                    
                </div>
              </div>


    </div>

      </div>
<!-- Material form contact -->
   </div>
      </div>

  </div>

</div>
  </div>
</div>
        
    </div>

      </div>

   

        </div>
      </div>

  


</div>
</main>
<!--Main Layout-->

<?php include('footer.php'); ?>

<style type="text/css">

.itogglebutton{
  border-radius: 12px;
}

</style>

<style type="text/css">

  .form-border{
  border-radius: 12px;
  }

  .itogglebutton{
  border-radius: 12px;
  }

</style>