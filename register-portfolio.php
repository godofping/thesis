
<?php include('header.php');
$currentpage = "stportfolio";
if (!isset($_SESSION['stprofID'])) {
  header("Location: index.php");
}
if ((time() - $_SESSION['last_time']) > 300) {
      header("Location: controller.php?from=logout");
  
}else{
   $_SESSION['last_time'] = time(); 
}

  $qrydisable = mysqli_query($connection, "select * from  buttontoggle_table ");
  $resdisable = mysqli_fetch_assoc($qrydisable);
  if ($resdisable['toggleonoroff'] == 'OFF') {
   header("Location: index.php");
  }


 include("student-header.php");
 ?>

<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2><i class="far fa-folder-open"></i> My Portfolio</h2>
        <hr>

      </div>
    </div>

    <?php 

                $qryname = mysqli_query($connection, "select * from list_student_view where accID = '".$_SESSION['accID']."'");
                $result = mysqli_fetch_assoc($qryname);

                $profID = $result['stprofID'];
                $fnameview = $result['fname'];
                $mnameview = $result['mname'];
                $lnameview = $result['lname'];
                $coursename = $result['CourseName'];

                $dpname = $result['departmentClubName']

             ?>

    <div class="row">
      <div class="col-md-12">
        <div class="mt-5 z-depth-2">

           <!-- Default form login -->
      <form class=" border border-light p-3"  method="POST" action="controller.php" autocomplete="false" enctype="multipart/form-data">

           <p class="h4 mb-4 text-center">Register your Information</p>

        <!-- Material input -->
          <div class="md-form">
            <input type="text" id="form1" disabled="" class="form-control" value="<?php echo "$lnameview" ." ". "$fnameview" ." ". "$mnameview" ?>">
            <label for="form1">Name:</label>
          </div>

  
          <div class="row">
            
            <div class="col">
              
               <div class="md-form">
                  <input type="text" id="form2" disabled="" class="form-control" value="<?php echo "$coursename"?>">
                  <label for="form2">Course:</label>
                </div>
            </div>
            
            <div class="col">
              <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <label>Year:</label>
                      <select class="form-control" name="styear" required="">
                        <option selected="" ></option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                        <option>5th Year</option>
                      </select>
               
                      </div>
                    </div>
                  </div>
            </div>
          </div>

                    <div class="row">                  
                      <div class="col">
                      <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                              <label>Semester:</label>
                              <select class="form-control" name="sem" required="">
                                <option selected="" ></option>
                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                                <option>Summer</option>
                              </select>
                       
                              </div>
                            </div>
                          </div>
                    </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="schoolyr" id="form5" class="form-control" placeholder="ex. 2019-2020" required="">
                          <label for="form5">School Year:</label>
                        </div>
                      </div>
                      
                    </div>

        <p class="h5 mb-4 mt-4 text-left">A.] Activities joined/participated</p>

         <div class="row ">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="act1" class="form-control" placeholder="ex. Intrams, Mass dance" required="">
                          <label >Name of Event/Activity:</label>
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="rank1" class="form-control" placeholder="ex. 1st place, Rank 1" required="">
                          <label>Place/Rank:</label>
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="act2" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="rank2" class="form-control">
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="act3" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="rank3" class="form-control">
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="act4" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="rank4" class="form-control">
                        </div>
                      </div>
                      
                    </div>          

        <p class="h5 mb-4 mt-4 text-left">B.] Community Involvement</p>
               
        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="comm1" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="comm2" class="form-control">
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="comm3" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="comm4" class="form-control">
                        </div>
                      </div>
                      
                    </div>    

        <p class="h5 mb-4 mt-4 text-left">Club Membership <small>( kindly indicate your position. e.g. PMC,Member, Catechetical Guild, Mayor)</small></p>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <label>Department</label>
                          <input type="text" disabled="" class="form-control" value="<?php echo $dpname ?>">
                        </div>
                      </div>
                      
                      <?php 

                        $qrydppos = mysqli_query($connection, "select * from departmental_officersandmembers_view where stprofID = ".$_SESSION['stprofID']." ");
                        $resultdp = mysqli_fetch_assoc($qrydppos);
                        $posname = $resultdp['positionName'];
                       ?>

                      <div class="col">      
                        <div class="md-form">
                          <label>Position:</label>
                          <?php if (mysqli_num_rows($qrydppos)>0): ?>
                             <input type="text" name="dpposition" disabled="" required="" class="form-control" value="<?php echo $posname ?>">
                              <?php else: ?> 
                              <input type="text" name="dpposition" disabled="" required="" class="form-control" value="Member">
                                    
                          <?php endif ?>

                         
                        </div>
                      </div>
                      
                    </div>
         <?php 
    $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");

    while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <label>Social Club</label>
                          <input type="text" required="" name="dpname" disabled="" class="form-control" value="<?php echo $ressocialclub['socialClubName'] ?>">
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
              
                          <?php 

                            $qrysocialpos = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = ".$_SESSION['stprofID']." ");
                            $resultID = mysqli_fetch_assoc($qrysocialpos);

                            $socID = $resultID['socialClubId'];
                            $socpos = $resultID['positionName'];
                           ?>

                          <label>Position:</label>
                          <?php if ($ressocialclub['socialClubId'] == $socID): ?>

                             <input type="text" name="dpposition" disabled="" required="" class="form-control" value="<?php echo $socpos ?>">
                              <?php else: ?> 
                              <input type="text" name="dpposition" disabled="" required="" class="form-control" value="Member">
                                    
                          <?php endif ?>
         
                        </div>
                      </div>
                      
                    </div>  
                    <?php } ?>



        <p class="h5 mb-4 mt-4 text-left">Seminar attended <small>( in and out of campus)</small></p>
               
        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="seminar1" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="seminar2" class="form-control">
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="seminar3" class="form-control" >
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" name="seminar4" class="form-control">
                        </div>
                      </div>
                      
                    </div> 

          <input type="text" name="stprofID" value="<?php echo $profID ?>" hidden>  
          <input type="text" name="from" value="register_student_portfolio" hidden>

          <button class="btn blue-gradient btn-block my-4" type="submit">Next</button>

          

       




      </form>

          </div>
      </div>
    </div>
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>
