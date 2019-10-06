
<?php include('header.php');
$currentpage = "students";
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

<?php 

        $qryname = mysqli_query($connection, "select * from list_student_view where accID = ".$_SESSION['accID']." ");
        $resname = mysqli_fetch_assoc($qryname);

       ?>

<body>
    <div class="db">
      
      <div class="container">
        <!-- Section heading -->
          <main class="text-center py-5 mt-2">

          <h2 class="animated zoomIn font-weight-bold text-left text-color-test" style="color: white; font-family: Alfa Slab One">Welcome to</h2>
          <h3 class="animated shake font-weight-bold text-left text-color-test" style="color: white; padding-bottom: 20px; font-family: Alfa Slab One">Student Activity Management Information System</h3>

  <div class="container">

    

    <div class="row">
      <div class="col-md-12">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="osa-tab" data-toggle="tab" href="#osa" role="tab" aria-controls="osa"
      aria-selected="true" style="color: black; font-family: Alfa Slab One">OSA</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="csc-tab" data-toggle="tab" href="#csc" role="tab" aria-controls="csc"
      aria-selected="false" style="color: black; font-family: Times New Roman">CSC</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="council-tab" data-toggle="tab" href="#council" role="tab" aria-controls="council"
      aria-selected="false" style="color: black; font-family: Times New Roman">DEPARTMENTAL COUNCIL</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="departmental-tab" data-toggle="tab" href="#departmental" role="tab" aria-controls="departmental"
      aria-selected="false" style="color: black; font-family: Times New Roman">DEPARTMENTAL CLUB</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social"
      aria-selected="false" style="color: black; font-family: Times New Roman">SOCIAL CLUB</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="osa" role="tabpanel" aria-labelledby="osa-tab">
    <div class="row">
      <div class="col-md-12">

         <?php 

              $qry = mysqli_query($connection, "select * from dsa_announcement_view order by dsaAnnouncementID desc");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?>
               
              <!-- Material form contact -->
    <div class="card z-depth-2">

     <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong style="font-family: Alfa Slab One">Office of The Director Student Affairs</strong><br>
        <small style="font-family: Alfa Slab One">Notre Dame of Tacurong College</small><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->   
        <div class="text-center" style="color: #757575;">

           
              <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black;font-family: Alfa Slab One"><?php echo $res['toWhom']; ?></p>
            </div>

            <!-- To Whom -->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black; font-family: Alfa Slab One"><?php echo $res['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black;font-family: Alfa Slab One"> Date: <?php echo date('F d, Y h:i A', strtotime($res['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($res['timeEnd'])); ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black;font-family: Alfa Slab One">Venue: <?php echo $res['venueName']; ?></p>
            </div>

            <!--Message-->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Alfa Slab One"><?php echo $res['message']; ?></p>
            </div>

        </div>
        <!-- Form -->

    </div>

      </div>
<!-- Material form contact -->
              <?php else: ?> 
              <h3 class="mt-5" style="text-align: center;">No Announcement</h3>
              <?php endif ?>
        </div>
      </div>
</div>

  <div class="tab-pane fade" id="csc" role="tabpanel" aria-labelledby="csc-tab">
    <div class="row">
      <div class="col-md-12">
            <?php 

              $qrycsc = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' order by csc_announcementID desc  ");
              $rescsc = mysqli_fetch_assoc($qrycsc);
              if (mysqli_num_rows($qrycsc )>0): ?>

      <div class="card z-depth-2">

    <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong>Central Student Council</strong><br>
        <small style="font-size: ">Notre Dame of Tacurong College</small><br>
        <small>City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <div class="text-center" style="color: #757575;">

            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><?php echo $rescsc['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $rescsc['subjectann']; ?></p>
            </div> 

             <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Date: <?php echo date('F d, Y h:i A', strtotime($rescsc['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($rescsc['timeEnd'])); ?></p>
            </div>   

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black">Venue: <?php echo $rescsc['venueName']; ?></p>
            </div>        

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $rescsc['message']; ?></p>
            </div>

        </div>
        <!-- Form -->
          </div>
      </div>
    <?php else: ?> 
      <h3 class="mt-5" style="text-align: center;">No Announcement</h3>
    <?php endif ?>

      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="council" role="tabpanel" aria-labelledby="council-tab">
      
      <?php 

              $qrydpc = mysqli_query($connection, "select * from council_club_announcement_view where isApproved = 'Yes' and CounID = '".$resname['CounID']."' order by council_announcementID desc ");
              $resdpc = mysqli_fetch_assoc($qrydpc);
              if (mysqli_num_rows($qrydpc)>0):?>
                
                <!-- Material form contact -->
    <div class="card z-depth-2">

    <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong><?php echo $resname['CounName']; ?></strong><br>
        <small style="font-size: ">Notre Dame of Tacurong College</small><br>
        <small>City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><?php echo $resdpc['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $resdpc['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Date: <?php echo date('F d, Y h:i A', strtotime($resdpc['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($resdpc['timeEnd'])); ?></p>
            </div>
            <!-- To Whom -->
            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black">Venue: <?php echo $resdpc['venueName']; ?></p>
            </div>

            <!--Message-->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $resdpc['message']; ?></p>
            </div>

        </form>
        <!-- Form -->
          </div>
      </div>
<!-- Material form contact -->
              <?php else: ?> 
              <h3 class="mt-5" style="text-align: center;">No Announcement</h3>  
              <?php endif ?>

  </div>

    <div class="tab-pane fade" id="departmental" role="tabpanel" aria-labelledby="departmental-tab">
    
    <?php 

            $qrydpname = mysqli_query($connection, "select * from list_student_view where accID = ".$_SESSION['accID']." ");
            $resdpname = mysqli_fetch_assoc($qrydpname); 

              $qrydp = mysqli_query($connection, "select * from departmental_club_announcement_view where isApproved = 'Yes' and departmentClubId = '".$resdpname['departmentClubId']."' order by DannouncementID desc");
              $resdp = mysqli_fetch_assoc($qrydp);

              if (mysqli_num_rows($qrydp)>0):?>
                
              <!-- Material form contact -->
    <div class="card z-depth-2">

    <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong><?php echo $resname['departmentClubName']; ?></strong><br>
        <small style="font-size: ">Notre Dame of Tacurong College</small><br>
        <small>City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            

             <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><?php echo $resdp['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $resdp['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Date: <?php echo date('F d, Y h:i A', strtotime($resdp['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($resdp['timeEnd'])); ?></p>
            </div>

             <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black">Venue: <?php echo $resdp['venueName']; ?></p>
            </div>
            <!--Message-->
           <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $resdp['message']; ?></p>
            </div>

          

        </form>
        <!-- Form -->
          </div>
      </div>
<!-- Material form contact -->
              <?php else: ?> 
              <h3 class="mt-5" style="text-align: center;">No Announcement</h3>
             <?php endif ?>

    </div>

    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
       <?php 
    $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
    while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>
    
      <?php 

              $qrysocial = mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes' and socialClubId = '".$ressocialclub['socialClubId']."' ");
              $resocial = mysqli_fetch_assoc($qrysocial);
             if (mysqli_num_rows($qrysocial)>0): ?>

      <div class="card z-depth-2">
    
    <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong><?php echo $resocial['socialClubName']; ?></strong><br>
        <small style="font-size: ">Notre Dame of Tacurong College</small><br>
        <small>City of Tacurong</small>
    </h5>

    <div class="card-body px-lg-5 pt-0">
        <div class="text-center" style="color: #757575;">

            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><?php echo $resocial['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $resocial['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Date: <?php echo date('F d, Y h:i A', strtotime($resocial['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($resocial['timeEnd'])); ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black">Venue: <?php echo $resocial['venueName']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $resocial['message']; ?></p>
            </div>
        </div>
          </div>
       </div>
      <?php else: ?> 
       <h3 class="mt-5" style="text-align: center;">No Announcement</h3>   
      <?php endif ?>
<!-- Material form contact --> 

<?php } ?>
      
      
    </div>
</div>

      </div>
    </div>
  </div>

</main>
<!--Main Layout-->

          </div>

    </div>
    </body>  




<?php include('footer.php'); ?>

<style type="text/css">
 
 body {
  background-color: #4fc3f7   ; 
}

 body, html {
  height: 100%;
}
.db {
  /* The image used */
  background-image: url("http://localhost:8080/thesis/logo/student.png");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center right;
  background-repeat: no-repeat;
  background-size: 75%;
}

.text-color-test{
  text-shadow: 3px 3px #000000;
}

</style>