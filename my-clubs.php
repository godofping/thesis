
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

    <?php 

            $qry = mysqli_query($connection, "select * from student_account_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $username = $res['StudentID'];
              
             ?>

    <div class="row">
      <div class="col-md-12">

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
             <div class="md-form mt-5" style="text-align: left;">
              <p class="h4 mb-4" style="color: black">Departmental Council Club</p>
              <h4 style="color: black"><?php echo $ccname ; ?></h3>
            </div>

            <div class="md-form mt-5" style="text-align: left;">
              <p class="h4 mb-4" style="color: black">Departmental Club</p>
              <h4 style="color: black"><?php echo $dpname ; ?></h3>
            </div>

            <p class="h4 mt-5" style="color: black; text-align: left;">Social Clubs</p>
            <?php 
            $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
            while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>
              <div class="md-form" style="text-align: left;">
              
              <h4 style="color: black"><?php echo $ressocialclub['socialClubName'] ?></h3>
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
