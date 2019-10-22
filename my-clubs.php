
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

        <h2><i class="fas fa-theater-masks"></i> My Club</h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

         <?php 

            $qry = mysqli_query($connection, "select * from student_account_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $username = $res['StudentID'];
              
             ?>


        <?php 

              $qry = mysqli_query($connection, "select * from membershiptoggle_table where toggleonoroff = 'ON'");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?>
              <a href="edit-socialclub.php"><button class="btn blue-gradient itogglebutton"><i class="fas fa-edit"></i> Edit Social Club</button><p>You can now Edit your Social Club</p></a>
        <?php endif ?>
       

      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-3">

        <div class="card">

     <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong>Notre Dame of Tacurong College</strong><br>
        <small>City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

              <?php 

              $qry = mysqli_query($connection, "select * from list_student_view where accID = '".$_SESSION['accID']."'");

              $res = mysqli_fetch_assoc($qry);

              $dpname = $res['departmentClubName'];
              $ccname = $res['CounName'];
             ?>

             <!-- To Whom -->
             <div class="md-form mt-3" style="text-align: left;">
              <p class="h4 mb-4" style="color: black">Course</p>
              <h5 style="color: black"><?php echo $res['CourseName'] ; ?></h5>
            </div>

              <!-- To Whom -->
             <div class="md-form mt-2" style="text-align: left;">
              <p class="h4 mb-4" style="color: black">Departmental Council Club</p>
              <h5 style="color: black"><?php echo $ccname ; ?></h5>
            </div>

            <div class="md-form mt-2" style="text-align: left;">
              <p class="h4 mb-4" style="color: black">Departmental Club</p>
              <h5 style="color: black"><?php echo $dpname ; ?></h5>
            </div>

            <p class="h4 mt-2" style="color: black; text-align: left;">Social Clubs</p>
            <?php 
            $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
            while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>
              <div class="md-form" style="text-align: left;">
              
              <h5 style="color: black"><?php echo $ressocialclub['socialClubName'] ?></h5>
            </div>
            <?php } ?>
        </form>
        <!-- Form -->

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