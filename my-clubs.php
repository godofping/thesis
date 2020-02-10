
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

        <h2><i class="fas fa-theater-masks"></i> <b>My Club</b></h2>
        <hr>
        <?php 

              $qry = mysqli_query($connection, "select * from membershiptoggle_table where toggleonoroff = 'ON'");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?>
              <a href="edit-socialclub.php"><button class="btn blue-gradient itogglebutton"><i class="fas fa-edit"></i> Edit Club Membership</button></a>
        <?php endif ?>
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
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">
    <div class="card form-border">

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

          <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <b><p style="color: black"><?php echo " ".ucfirst($reshey['lname'])." ". ucfirst($reshey['fname'])." ".ucfirst($reshey['mname']) ?></p></b>
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

                 
        
       
                    
                </div>
              </div>


    </div>

      </div>
<!-- Material form contact -->
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