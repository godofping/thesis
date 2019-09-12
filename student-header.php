 <header>

  <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark primary-color">
    <a class="navbar-brand" href="students-dashboard.php">
    <img src="http://localhost:8080/thesis/logo/download.png" height="30" alt="mdb logo"><small> Student Dashboard</small></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
       
        <li class="nav-item dropdown <?php if ($currentpage == 'student'): ?>
          active
        <?php endif ?>">

        <?php 

            $qryhey = mysqli_query($connection, "select * from std_prof_view where accID = ".$_SESSION['accID']." ");
            $reshey = mysqli_fetch_assoc($qryhey);
             ?>

        <a class="nav-link dropdown-toggle" href="#" id="MyaccountDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i><?php echo " ".$reshey['lname']." ". $reshey['fname']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="MyaccountDropDown">
            <a class="dropdown-item" href="manage-acc.php"><i class="fas fa-user-cog"></i><?php echo " ".$reshey['lname']." ". $reshey['fname']; ?></a>
            <a class="dropdown-item" href="controller.php?from=logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
          </div>

        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'club'): ?>
          active
        <?php endif ?>">
        <a class="nav-link"  href="my-clubs.php">
            <i class="fas fa-theater-masks"></i> My Clubs
          </a>
        </li>


        <li class="nav-item dropdown <?php if ($currentpage == 'announcement'): ?>
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
            aria-haspopup="true" aria-expanded="false">
            <i class="far fa-newspaper"></i> Announcement <?php if ( $resultreject['cnt'] != 0 || $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="stclubDropDown">
            <a class="dropdown-item" href="dsa-announcement.php">OSA Announcement<?php if ( $resultreject['cnt'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject['cnt']; ?><?php endif ?></a>
            <a class="dropdown-item" href="csc-announcement.php">CSC Announcement<?php if ( $resultreject1['cnt1'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject1['cnt1']; ?><?php endif ?></a>
            <a class="dropdown-item" href="departmental-council-announce.php">Departmental Council Announcement<?php if ( $resultreject2['cnt2'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject2['cnt2']; ?><?php endif ?></a>
            <a class="dropdown-item" href="departmental-clubs-announcement.php">Departmental Club Announcement<?php if ( $resultreject3['cnt3'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject3['cnt3']; ?><?php endif ?></a>
            <a class="dropdown-item" href="social-clubs-announcement-new.php">Social Club Announcement<?php if ( $resultreject4['cnt4'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject4['cnt4']; ?><?php endif ?></a>
          </div>

        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'stportfolio'): ?>
          active
        <?php endif ?>">
        <a class="nav-link"  href="student-portfolio.php">
            <i class="far fa-folder"></i> My Portfolio
          </a>
        </li>

      </ul>
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
