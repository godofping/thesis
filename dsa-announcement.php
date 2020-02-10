
<?php include('header.php');
$currentpage = "announcement";
if (!isset($_SESSION['accID'])) {
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

        <h2>Announcement</h2>
        <hr>

      </div>
    </div>

        <div class="row">
      <div class="col-md-12">

         <?php 

              $qry = mysqli_query($connection, "select * from dsa_announcement_view order by dsaAnnouncementID desc");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?>
               
              <!-- Material form contact -->
    <div class="card">

     <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong>Office of The Director Student Affairs</strong><br>
        <small style="font-size: ">Notre Dame of Tacurong College</small><br>
        <small>City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <div class="text-center" style="color: #757575;">

           
              <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><?php echo $res['toWhom']; ?></p>
            </div>

            <!-- To Whom -->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $res['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Date: <?php echo date('F d, Y h:i A', strtotime($res['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($res['timeEnd'])); ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black">Venue: <?php echo $res['venueName']; ?></p>
            </div>

            <!--Message-->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black">Message: <br><br><?php echo $res['message']; ?></p>
            </div>

        </div>
        <!-- Form -->

    </div>

      </div>
<!-- Material form contact -->

              <?php endif ?>
             
   

        </div>
      </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


