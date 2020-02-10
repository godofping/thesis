<?php include('header.php');
$currentpage = "venue";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 ?>
 
 <body>
<!--Main Layout-->
<main class=" py-5">



  <div class="container">

  <div class="row">
      <div class="col-md-12">

          <?php 

          if (isset($_GET['from']) and $_GET['from'] == 'checkidforstudentportfolio') {

          $qryid = mysqli_query($connection, "select * from student_portfolio_view where stportfolioID = '".$_GET['stportfolioID']."' ");
          $resid = mysqli_fetch_assoc($qryid);

          $studentID = $resid['stprofID'];
          $dpname = $resid['departmentClubName'];
          }         

         ?>

     <h4><a id="print" style="color: #289DE5;" onclick="window.print();">Print Portfolio</a><a href="student-portfolio-admin.php" id="back" style="float: right"> Go back</a></h4>     
     
              <!-- Material form contact -->
    <div class="card">

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0 ">

        <!-- Form -->
        <div class="text-center">
            <small style="color: black; float: right; font-size: 13px;"><i>OSA FORM 3</i></small>
            <h5 class=" black-text text-center py-4 card-img">
            <strong style="font-family: Arial Black, Gadget, sans-serif; margin-right: 300px">Office of Student Affairs</strong><br>
            <strong style="font-family: Arial Black, Gadget, sans-serif; margin-right: 300px">NOTRE DAME OF TACURONG COLLEGE</strong><br>
            <small style="font-family: Alfa Slab One; margin-right: 300px">City of Tacurong</small>
            </h5>
              <!-- To Whom -->
             <div class="md-form mt-1" style="text-align: center;">
              <p style="color: black"><b><U>STUDENT'S PORTFOLIO<br></U><b><?php echo $resid['sem']; ?>, A.Y. <?php echo $resid['schoolyr']; ?></b></p></b>
            </div>
            
              
              <p style="color: black; float: left;"><u>Name: <b><?php echo $resid['lname'] ." ". $resid['fname'] ." ". $resid['mname'] ?></b></u></p>
              <p style="color: black; text-align: right;"><u>Course & Year: <b><?php echo $resid['CourseName'] ?></b></u></p> 
              <p style="color: black; text-align: right; margin-right: 305px; "><u>Year: <b><?php echo $resid['styear'] ?></b></u></p>
              <p class="h5 mb-4 mt-4 text-left ">A] Activities joined/participated:</p>

              <p style="color: black; float: left; margin-left: 170px;"><b>Name of Event/ Activity</b></p>
              <p style="color: black; text-align: right; margin-right: 200px;"><b>Place/Rank</b></p>
        
              <div class="row">           
                       <div class="col">      
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['act1'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['act2'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['act3'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['act4'] ?>">
                        </div>
                      </div>           
        
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['rank1'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['rank2'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['rank3'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['rank4'] ?>">
                        </div>
                      </div>
                    </div>
            
              <p class="h5 mb-1 mt-2 text-left">B] Community Involvement:</p>
              <div class="row">           
                       <div class="col">      
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['comm1'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['comm3'] ?>">
                        </div>
                      </div>           
        
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['comm2'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['comm4'] ?>">
                        </div>
                      </div>
                    </div>
              
            <p class="h5 mb-1 mt-1 text-left">Club Memberships</p>

            <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <label style="color: black;"><b>Departmental Club</b></label>
                          <input type="text" disabled="" type="text" style="color: black;" class="form-control" value="<?php echo $dpname ?>">
                        </div>
                      </div>
                      
                      <?php 

                        $qrydppos = mysqli_query($connection, "select * from departmental_officersandmembers_view where stprofID = ".$studentID." ");
                        $resultdp = mysqli_fetch_assoc($qrydppos);
                        $posname = $resultdp['positionNameDP'];
                       ?>

                      <div class="col">      
                        <div class="md-form">
                          <label style="color: black;">Position:</label>
                          <?php if (mysqli_num_rows($qrydppos)>0): ?>
                             <input type="text" type="text" style="color: black; text-align: center;" name="dpposition" disabled="" required="" class="form-control" value="<?php echo $posname ?>">
                              <?php else: ?> 
                              <input type="text" type="text" style="color: black; text-align: center;" name="dpposition" disabled="" required="" class="form-control" value="Member">
                                    
                          <?php endif ?>

                         
                        </div>
                      </div>
                      
                    </div>  

             <?php 
            $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$studentID." ");

            while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>

                <div class="row">                  
                              <div class="col">      
                                <div class="md-form">
                                  <label style="color: black;"><b>Social Club</b></label>
                                  <input type="text" required="" type="text" style="color: black;"  name="dpname" disabled="" class="form-control" value="<?php echo $ressocialclub['socialClubName'] ?>">
                                </div>
                              </div>
                            
                              <div class="col">      
                                <div class="md-form">
                      
                                  <?php 

                                    $qrysocialpos = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = ".$studentID." ");
                                    $resultID = mysqli_fetch_assoc($qrysocialpos);

                                    $socID = $resultID['socialClubId'];
                                    $socpos = $resultID['positionNameSocial'];
                                   ?>

                                  <label style="color: black;">Position:</label>
                                  <?php if ($ressocialclub['socialClubId'] == $socID): ?>

                                     <input type="text" type="text" style="color: black; text-align: center;" name="dpposition" disabled="" required="" class="form-control" value="<?php echo $socpos ?>">
                                      <?php else: ?> 
                                      <input type="text" type="text" style="color: black; text-align: center;" name="dpposition" disabled="" required="" class="form-control" value="Member">
                                            
                                  <?php endif ?>
                 
                                </div>
                              </div>
                              
                            </div>  
                            <?php } ?>

              <p class="h5 mb-1 mt-1 text-left">Seminar/s Attended</p>

              <div class="row">           
                       <div class="col">      
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['seminar1'] ?>">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['seminar3'] ?>">
                        </div>
                      </div>           
        
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['seminar2'] ?>">
                           <input type="text" style="color: black; text-align: center;" class="form-control" disabled="" value="<?php echo $resid['seminar4'] ?>">
                        </div>
                      </div>
                    </div>

          <p class="h5 mb-1 mt-5 text-left">Remarks:</p>  
                        <div class="md-form">
                          <input type="text" style="color: black; text-align: center;" class="form-control"  disabled="">
                          <input type="text" style="color: black; text-align: center;" class="form-control"  disabled="">
                        </div>
                  
        </div>
        <!-- Form -->



    </div>

      </div>
<!-- Material form contact -->
  
        </div>

      </div>


</main>
<!--Main Layout-->
</body>


<?php include('footer.php'); ?>

<style type="text/css">
  
  @media print {
  #print {
    display: none;
  }
  #back {
    display: none;
  }
}

  .card-img{

  background-image: url("http://localhost:8080/thesis/logo/download.png");
  background-position: left;
  margin-left: 150px;
  background-repeat: no-repeat;
  background-size: 10%;
}

</style>

