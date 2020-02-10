 <header>

  <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark">
    <a class="navbar-brand" href="students-dashboard.php"><img src="logo/download.png" height="30" alt="mdb logo"><b style="color: black; font-family: Arial Black, Gadget, sans-serif"> |</b><b style="color: black; font-family: Arial Black, Gadget, sans-serif"> Samis</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars" style="color: black"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
       
        <li class="nav-item dropdown <?php if ($currentpage == 'student'): ?>
          active
        <?php endif ?>">

        <?php 

            $qryhey = mysqli_query($connection, "select * from std_prof_view where accID = ".$_SESSION['accID']." ");
            $reshey = mysqli_fetch_assoc($qryhey);

            $qryhey1 = mysqli_query($connection, "select * from list_student_view where accID = ".$_SESSION['accID']." ");
            $reshey1 = mysqli_fetch_assoc($qryhey1);

            $qrysocialcode = mysqli_query($connection, "select * from student_social_club_view where stprofID = '".$_SESSION['stprofID']."' ");
            $ressocailcode = mysqli_fetch_assoc($qrysocialcode);

            $qry = mysqli_query($connection, "select * from studentprofile_table where accID = '".$_SESSION['accID']."'");
            $res = mysqli_fetch_assoc($qry);

            $stdimg = $res['IMG'];

             ?>
 
            <!--  <img src="<?php echo $stdimg ?>" class="rounded-circle"
            alt="avatar image" height="35"> -->

        <a class="nav-link dropdown-toggle" href="#" id="MyaccountDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="color: black;">
            <i class="fas fa-user-alt"></i><b><?php echo " ".ucfirst($reshey['lname'])." ". ucfirst($reshey['fname']) ?></b>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="MyaccountDropDown">
            <a class="dropdown-item" href="manage-acc-new.php"><i class="fas fa-user-cog"></i><b><?php echo " ".ucfirst($reshey['lname'])." ". ucfirst($reshey['fname']) ?></b></a>
            <a class="nav-link" href="controller.php?from=logout" style="color: black"><i class="fas fa-sign-out-alt"></i> <b>Logout</b></a>
          </div>

        </li>

       <!--  <li class="nav-item dropdown <?php if ($currentpage == 'club'): ?>
          active
        <?php endif ?>">
        <a class="nav-link"  href="my-clubs.php" style="color: black;">
            <i class="fas fa-theater-masks"></i> <b>My Clubs</b>
          </a>
        </li> -->

        <?php 

            $qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
            $rescode = mysqli_fetch_assoc($qrycode);
            
            $dpclubcode = $rescode['departmentClubId'];

            $qryhey = mysqli_query($connection, "select * from std_prof_view where accID = ".$_SESSION['accID']." ");
            $reshey = mysqli_fetch_assoc($qryhey);

            $qrycscpos = mysqli_query($connection, "select * from csc_members_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
            $rescscpo = mysqli_fetch_assoc($qrycscpos);

            $makeapostcsc = true;

            if (mysqli_num_rows($qrycscpos) > 0) {
              $makeapostcsc = false;
            }

            $qyrcouncilpos = mysqli_query($connection,"select * from council_officers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
            $rescouncilpos = mysqli_fetch_assoc($qyrcouncilpos);

     
            $makapost = true;

            if (mysqli_num_rows($qyrcouncilpos) > 0)
            {

              $makapost = false;
            }



            $qyrdepartpos = mysqli_query($connection,"select * from departmental_officersandmembers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
            $resdepartpos = mysqli_fetch_assoc($qyrdepartpos);

            $qyrsocialpos = mysqli_query($connection,"select * from social_officerandmembers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
            $ressocialpos = mysqli_fetch_assoc($qyrsocialpos);

            $qrycscreject = mysqli_query($connection,"select count(*) as cntcsc from csc_announcement_table where isApproved = 'Reject' ");
            $rescscreject = mysqli_fetch_assoc($qrycscreject);

           
            $qyrcouncilposcheck = mysqli_query($connection,"select * from council_officers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
            $rescouncilposcheck = mysqli_num_rows($qyrcouncilposcheck);

          
            $qrycouncilreject = mysqli_query($connection,"select count(*) as cntcouncil from council_announcement_table where CounID = '".$rescode['CounID']."' and isApproved = 'Reject' ");
              
            $rescouncilreject = mysqli_fetch_assoc($qrycouncilreject);
            
            
            $qrydpreject = mysqli_query($connection,"select count(*) as cntdp from department_announcement_table where isApproved = 'Reject' and departmentClubId = '".$dpclubcode."' ");
            $resdpreject = mysqli_fetch_assoc($qrydpreject);

            $qryssocial = mysqli_query($connection, "select * from list_social_club_view where stprofID = ".$_SESSION['accID']." ");
            $ressocial = mysqli_fetch_assoc($qryssocial);

            $qrysocialreject = mysqli_query($connection,"select count(*) as cntsocial from social_announcement_table where isApproved = 'Reject' and socialClubId = '".$ressocial['socialClubId']."' ");
            $ressocialreject = mysqli_fetch_assoc($qrysocialreject);

            $rejectkaputa=array($rescscreject['cntcsc'],$rescouncilreject['cntcouncil'],$resdpreject['cntdp'],$ressocialreject['cntsocial']);


            if (mysqli_num_rows($qrycscpos)>0 || mysqli_num_rows($qyrcouncilposcheck)>0 || mysqli_num_rows($qyrdepartpos)>0 || mysqli_num_rows($qyrsocialpos)>0 ):?>



        <li class="nav-item dropdown <?php if ($currentpage == 'creatclub'): ?>
          active
        <?php endif ?>">

        <a class="nav-link dropdown-toggle" href="#" id="MyaccountDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="color: black;">
            <i class="far fa-newspaper"></i><b> Create Announcement</b><?php if ( $rescscreject['cntcsc'] != 0 || $rescouncilreject['cntcouncil'] != 0 || $resdpreject['cntdp'] != 0 || $ressocialreject['cntsocial'] != 0) : ?><span <?php if($makapost){ ?> hidden<?php } ?>  id="totalofreject" class="badge badge-danger ml-1"></span><?php endif ?>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="MyaccountDropDown">
            <?php if (mysqli_num_rows($qrycscpos)>0 ): ?>
            <a class="dropdown-item" href="csc-announcement.php">
              <b>CSC Announcement <?php if ( $rescscreject['cntcsc'] != 0): ?><span id="cscofreject" class="badge badge-danger ml-1"></span><?php endif ?></b>
            <?php endif ?></a>
            <?php if (mysqli_num_rows($qyrcouncilpos)>0): ?>
            <a class="dropdown-item" href="departmental-council-announce.php"><b><?php echo $reshey1['CounName']; ?> Announcement<?php if ( $rescouncilreject['cntcouncil'] != 0): ?><span id="councilofreject" class="badge badge-danger ml-1"></span><?php endif ?></b></a>
            <?php endif ?>
            <?php if (mysqli_num_rows($qyrdepartpos)>0): ?>
            <a class="dropdown-item" href="departmental-clubs-announcement.php"><b><?php echo $reshey1['departmentcode']; ?> Announcement<?php if ( $resdpreject['cntdp'] != 0): ?><span id="dpofreject" class="badge badge-danger ml-1"></span><?php endif ?>
              </b></a>
            <?php endif ?>
            <?php if (mysqli_num_rows($qyrsocialpos)>0): ?>
            <a class="dropdown-item" href="social-clubs-announcement-new.php"><b><?php echo $ressocailcode['socialClubcode']; ?> Announcement<?php if ( $ressocialreject['cntsocial'] != 0): ?><span id="scofreject" class="badge badge-danger ml-1"></span><?php endif ?></b></a>
            <?php endif ?>
          </div>

        </li>

        <?php endif ?>
       <!--  <li class="nav-item dropdown <?php if ($currentpage == 'announcement'): ?>
          active
        <?php endif ?>">
        <?php

        $qrystID1 = mysqli_query($connection, "select * from list_student_view where accID = ".$_SESSION['accID']." ");
        $resstID1 = mysqli_fetch_assoc($qrystID1);

        $qryrejctbadge = mysqli_query($connection,"select count(*) as cnt from dsa_announcement_table where isApproved = 'Yes'");
        $resultreject = mysqli_fetch_assoc($qryrejctbadge);
        $qryrejctbadge1 = mysqli_query($connection,"select count(*) as cnt1 from csc_announcement_table where isApproved = 'Yes'");
        $resultreject1 = mysqli_fetch_assoc($qryrejctbadge1);
        $qryrejctbadge2 = mysqli_query($connection,"select count(*) as cnt2 from council_announcement_table where isApproved = 'Yes' and CounID ='".$resstID1['CounID']."' ");
        $resultreject2 = mysqli_fetch_assoc($qryrejctbadge2);
        $qryrejctbadge3 = mysqli_query($connection,"select count(*) as cnt3 from department_announcement_table where isApproved = 'Yes' and departmentClubId = '".$resstID1['departmentClubId']."' ");
        $resultreject3 = mysqli_fetch_assoc($qryrejctbadge3);

         $qryssocial = mysqli_query($connection, "select * from list_social_club_view where stprofID = ".$_SESSION['accID']." ");
        $ressocial = mysqli_fetch_assoc($qryssocial);

        $qryrejctbadge4 = mysqli_query($connection,"select count(*) as cnt4 from social_announcement_table where isApproved = 'Yes' and socialClubId = '".$ressocial['socialClubId']."' ");
    
        $resultreject4 = mysqli_fetch_assoc($qryrejctbadge4);

        $a=array($resultreject['cnt'],$resultreject1['cnt1'],$resultreject2['cnt2'],$resultreject3['cnt3'],$resultreject4['cnt4']);

         ?>
        <a class="nav-link dropdown-toggle" href="#" id="stclubDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="color: black; font-family: Times New Roman">
            <i class="far fa-newspaper"></i> Announcement <?php if ( $resultreject['cnt'] != 0 || $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="stclubDropDown">
            <a class="dropdown-item" href="dsa-announcement.php">OSA Announcement<?php if ( $resultreject['cnt'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject['cnt']; ?><?php endif ?></a>
            <a class="dropdown-item" href="csc-announcement.php">CSC Announcement<?php if ( $resultreject1['cnt1'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject1['cnt1']; ?><?php endif ?></a>
            <a class="dropdown-item" href="departmental-council-announce.php">Departmental Council Announcement<?php if ( $resultreject2['cnt2'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject2['cnt2']; ?><?php endif ?></a>
            <a class="dropdown-item" href="departmental-clubs-announcement.php">Departmental Club Announcement<?php if ( $resultreject3['cnt3'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject3['cnt3']; ?><?php endif ?></a>
            <a class="dropdown-item" href="social-clubs-announcement-new.php">Social Club Announcement<?php if ( $resultreject4['cnt4'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject4['cnt4']; ?><?php endif ?></a>
          </div>

        </li> -->
<!-- <?php 

              $qry = mysqli_query($connection, "select * from buttontoggle_table where toggleonoroff = 'ON'");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?> -->
        <li class="nav-item dropdown <?php if ($currentpage == 'stportfolio'): ?>
          active
        <?php endif ?>">

        <a class="nav-link"  href="student-portfolio.php" style="color: black;">
            <i class="far fa-folder"></i> <b>My Portfolio</b>
          </a>
        </li>
 <!-- <?php endif ?> -->
      </ul>
      <!-- <ul class="navbar-nav ml-auto nav-flex-icons">
      
      <li class="nav-item dropdown ">
          <div  class="dropdown-menu-right">
          <a class="nav-link" href="controller.php?from=logout" style="color: black"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      
    </ul> -->
    </div>


  </nav>

  <div class="view intro-2">
    <div class="full-bg-img">
      <div class="mask rgba-black-light flex-center">
        <div class="container text-center white-text">
          <div class="white-text text-center wow fadeInUp">
            <h2>This Navbar is fixed</h2>
            <h5>It will always stay visible on the top, even when you scroll down</h5>
            <br>
            <p>Full page intro with background image will be always displayed in full screen mode, regardless
              of device </p>
          </div>
        </div>
      </div>
    </div>
  </div>



</header>
<!--Main Navigation-->

<script type="text/javascript">


var auto_refresh = setInterval(
function ()
{
$('#totalofreject').load('check-total-reject.php');
$('#cscofreject').load('check-csc-reject.php');
$('#councilofreject').load('check-council-reject.php');
$('#dpofreject').load('check-departmental-reject.php');
$('#scofreject').load('check-social-reject.php');
},

 3000); // refresh every 10000 milliseconds

</script>

<style type="text/css">
  
  .navbar { background-color: #fafafa ; } 

</style>