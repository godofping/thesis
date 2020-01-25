
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
          <main class="text-center py-5 mt-4">

          <h2 class="font-weight-bold text-left text-color-test" style="color: black;">Welcome to</h2>
          <h3 class="font-weight-bold text-left text-color-test" style="color: black; padding-bottom: 20px; ">Student Activity Management Information System</h3>

  <div class="container">

    <?php 

      $qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
      $rescode = mysqli_fetch_assoc($qrycode);

      $councilName = $rescode['CounName'];
      $dpclubcode = $rescode['departmentcode'];
      $dpclubName = $rescode['departmentClubName'];

      $qryosaann = mysqli_query($connection, "select * from dsa_announcement_view order by dsaAnnouncementID desc");
      $resosaann = mysqli_fetch_assoc($qryosaann);

      $timestartosa =  $resosaann['timeStart'];
      $timeendosa =  $resosaann['timeEnd'];
      $timeStartSubmittedosa = date('Y-m-d h:i:s', strtotime($timestartosa));
      $timeEndSubmittedosa = date('Y-m-d h:i:s', strtotime($timeendosa));


      $qrycscann = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes'");
      $rescsc = mysqli_fetch_assoc($qrycscann);

      $timestartcsc =  $resosaann['timeStart'];
      $timeendcsc =  $resosaann['timeEnd'];
      $timeStartSubmittedcsc = date('Y-m-d h:i:s', strtotime($timestartcsc));
      $timeEndSubmittedcsc = date('Y-m-d h:i:s', strtotime($timeendcsc));

      $qrycouncilann = mysqli_query($connection, "select * from council_club_announcement_view where isApproved = 'Yes'");
      $rescouncil = mysqli_fetch_assoc($qrycouncilann);

      $timestartcouncil =  $rescouncil['timeStart'];
      $timeendcouncil =  $rescouncil['timeEnd'];
      $timeStartSubmittedcouncil = date('Y-m-d h:i:s', strtotime($timestartcouncil));
      $timeEndSubmittedcouncil = date('Y-m-d h:i:s', strtotime($timeendcouncil));

      $qrydpann = mysqli_query($connection, "select * from departmental_club_announcement_view where isApproved = 'Yes'");
      $resdpann = mysqli_fetch_assoc($qrydpann);

      $timestartdp =  $resdpann['timeStart'];
      $timeenddpd =  $resdpann['timeEnd'];
      $timeStartSubmitteddp = date('Y-m-d h:i:s', strtotime($timestartdp));
      $timeEndSubmitteddp = date('Y-m-d h:i:s', strtotime($timeenddpd));

      $qrysocialann = mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes'");
      $ressocial = mysqli_fetch_assoc($qrysocialann);

      $timestartsocial =  $ressocial['timeStart'];
      $timeendsocial =  $ressocial['timeEnd'];
      $timeStartSubmittedsocial = date('Y-m-d h:i:s', strtotime($timestartsocial));
      $timeEndSubmittedsocial = date('Y-m-d h:i:s', strtotime($timeendsocial));

     ?>

    <div class="row">
      <div class="col-md-12">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="osa-tab" data-toggle="tab" href="#osa" role="tab" aria-controls="osa"
      aria-selected="true" style="color: black; font-family: Arial Black, Gadget, sans-serif">OSA<?php if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedosa)):?> 
        <span class="badge badge-danger ml-1">New</span>
      <?php endif ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="csc-tab" data-toggle="tab" href="#csc" role="tab" aria-controls="csc"
      aria-selected="false" style="color: black; font-family: Arial Black, Gadget, sans-serif">CSC<?php if (strtotime(date('Y-m-d h:i:s'))>strtotime($timeEndSubmittedcsc)):?> 
        <span class="badge badge-danger ml-1">New</span>
      <?php endif ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="council-tab" data-toggle="tab" href="#council" role="tab" aria-controls="council"
      aria-selected="false" style="color: black; font-family: Arial Black, Gadget, sans-serif"><?php echo $councilName; ?><?php if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedcouncil)):?> 
        <span class="badge badge-danger ml-1">New</span>
      <?php endif ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="departmental-tab" data-toggle="tab" href="#departmental" role="tab" aria-controls="departmental"
      aria-selected="false" style="color: black; font-family: Arial Black, Gadget, sans-serif"><?php echo $dpclubcode; ?> Club<?php if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmitteddp)):?> 
        <span class="badge badge-danger ml-1">New</span>
      <?php endif ?></a>
  </li>
  <li class="nav-item">
  
      <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social"
      aria-selected="false" style="color: black; font-family: Arial Black, Gadget, sans-serif"><?php 

      $qrysocialcode = mysqli_query($connection, "select * from student_social_club_view where stprofID = '".$_SESSION['stprofID']."' ");
       while ($ressocailcode = mysqli_fetch_assoc($qrysocialcode)) {?>
        <?php echo $ressocailcode['socialClubcode'] ." Club " ?><?php if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedsocial)):?> 
        <span class="badge badge-danger ml-1">New</span>
      <?php endif ?>
      <?php } ?>
       </a>
    
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

     <h5 class="card-header green accent-4 white-text text-center py-4 card-img">
        <strong style="font-family: Arial Black, Gadget, sans-serif;">Office of Student Affairs</strong><br>
        <small style="font-family: Alfa Slab One">Notre Dame of Tacurong College</small><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body  px-lg-5 pt-0">

        <!-- Form -->   
        <div class="text-center" style="color: #757575;">

           
              <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $res['toWhom']; ?></p>
            </div>

            <!-- To Whom -->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black; font-family: Arial Black, Gadget, sans-serif"><?php echo $res['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> Start: <?php echo date('F d, Y h:i A', strtotime($res['timeStart'])); ?></p>
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> End: <?php echo date('F d, Y h:i A', strtotime($res['timeEnd'])); ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: red;font-family: Arial Black, Gadget, sans-serif">Venue: <?php echo $res['venueName']; ?></p>
            </div>

            <!--Message-->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $res['message']; ?></p>
            </div>

        </div>
        <!-- Form -->

    </div>

      </div>
<!-- Material form contact -->
              <?php else: ?> 
              <h5 class="mt-5" style="text-align: center;color: black; font-family: Times New Roman">No Announcement<br>from<br>Office of Student Affairs</h5>
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

    <h5 class="card-header green accent-4 white-text text-center py-4 card-img">
        <strong style="font-family: Arial Black, Gadget, sans-serif;">Central Student Council</strong><br>
        <small style="font-family: Alfa Slab One">Notre Dame of Tacurong College</small><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <div class="text-center" style="color: #757575;">
  
            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $rescsc['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $rescsc['subjectann']; ?></p>
            </div> 

             <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> Start: <?php echo date('F d, Y h:i A', strtotime($rescsc['timeStart'])); ?></p>
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif">  End: <?php echo date('F d, Y h:i A', strtotime($rescsc['timeEnd'])); ?></p>
            </div>   

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: red;font-family: Arial Black, Gadget, sans-serif">Venue: <?php echo $rescsc['venueName']; ?></p>
            </div>        

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $rescsc['message']; ?></p>
            </div>

        </div>
        <!-- Form -->
          </div>
      </div>
    <?php else: ?> 
      <h5 class="mt-5" style="text-align: center;color: black; font-family: Times New Roman">No Announcement<br>from<br>Central Student Council</h5>
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

    <h5 class="card-header green accent-4 white-text text-center py-4 card-img">
        <strong style="font-family: Arial Black, Gadget, sans-serif;"><?php echo $resname['CounName']; ?></strong><br>
        <small style="font-family: Alfa Slab One">Notre Dame of Tacurong College</small><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resdpc['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resdpc['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> Date: <?php echo date('F d, Y h:i A', strtotime($resdpc['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($resdpc['timeEnd'])); ?></p>
            </div>
            <!-- To Whom -->
            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: red;font-family: Arial Black, Gadget, sans-serif">Venue: <?php echo $resdpc['venueName']; ?></p>
            </div>

            <!--Message-->
            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resdpc['message']; ?></p>
            </div>

        </form>
        <!-- Form -->
          </div>
      </div>
<!-- Material form contact -->
              <?php else: ?> 
              <h5 class="mt-5" style="text-align: center;color: black; font-family: Times New Roman">No Announcement<br>from<br><?php echo $councilName; ?></h5>
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

    <h5 class="card-header green accent-4 white-text text-center py-4 card-img">
        <strong style="font-family: Arial Black, Gadget, sans-serif;"><?php echo $resname['departmentClubName']; ?></strong><br>
        <small style="font-family: Alfa Slab One">Notre Dame of Tacurong College</small><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            

             <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resdp['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resdp['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> Date: <?php echo date('F d, Y h:i A', strtotime($resdp['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($resdp['timeEnd'])); ?></p>
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> Date: <?php echo date('F d, Y h:i A', strtotime($resdp['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($resdp['timeEnd'])); ?></p>
            </div>

             <div class="md-form mt-3" style="text-align: left;">
              <p style="color: red;font-family: Arial Black, Gadget, sans-serif">Venue: <?php echo $resdp['venueName']; ?></p>
            </div>
            <!--Message-->
           <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resdp['message']; ?></p>
            </div>

          

        </form>
        <!-- Form -->
          </div>
      </div>
<!-- Material form contact -->
              <?php else: ?> 
              <h5 class="mt-5" style="text-align: center;color: black; font-family: Times New Roman">No Announcement<br>from<br><?php echo $dpclubName; ?></h5>
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
    
    <h5 class="card-header green accent-4 white-text text-center py-4 card-img">
        <strong style="font-family: Arial Black, Gadget, sans-serif;"><?php echo $resocial['socialClubName']; ?></strong><br>
        <small style="font-family: Alfa Slab One">Notre Dame of Tacurong College</small><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small>
    </h5>

    <div class="card-body px-lg-5 pt-0">
        <div class="text-center" style="color: #757575;">

            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resocial['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resocial['subjectann']; ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> Start: <?php echo date('F d, Y h:i A', strtotime($resocial['timeStart'])); ?></p>
               <p style="color: black;font-family: Arial Black, Gadget, sans-serif"> End: <?php echo date('F d, Y h:i A', strtotime($resocial['timeEnd'])); ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: red;font-family: Arial Black, Gadget, sans-serif">Venue: <?php echo $resocial['venueName']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black;font-family: Arial Black, Gadget, sans-serif"><?php echo $resocial['message']; ?></p>
            </div>
        </div>
          </div>
       </div>
      <?php else: ?> 
       <h5 class="mt-5" style="text-align: center;color: black; font-family: Times New Roman">No Announcement<br>from<br><?php echo $ressocialclub['socialClubName']; ?></h5>  
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
  background-color: #f5f5f5; 
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

/*.text-color-test{
  text-shadow: 3px 3px #000000;
}*/

.card-img{

  background-image: url("http://localhost:8080/thesis/logo/download.png");
  background-position: left;
  background-repeat: no-repeat;
  background-size: 13%;
}

</style>