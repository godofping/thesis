<header>

  <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark primary-color">
    <a class="navbar-brand" href="admin-dashboard.php"><img src="http://localhost:8080/thesis/logo/download.png" height="30" alt="mdb logo"><small> Admin Dashboard</small></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown <?php if ($currentpage == 'dsa'): ?>
          active
        <?php endif ?>">
        <a class="nav-link dropdown-toggle" href="#" id="studentDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="far fa-user"></i> ADMIN
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropDown">
            <a class="dropdown-item" href="manage-admin.php"><i class="fas fa-user-cog"></i> Manage Account</a>
            <a class="dropdown-item" href="controller.php?from=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <!-- <a class="dropdown-item" href="#"> Add Officers</a> -->
          </div>

        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'students'): ?>
          active
        <?php endif ?>">
        <a class="nav-link dropdown-toggle" href="#" id="studentDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-graduate"></i> Students
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropDown">
            <a class="dropdown-item" href="add-student-account.php"><i class="fas fa-user-graduate"></i> Student Account</a>
            <a class="dropdown-item" href="list-student.php"><i class="fas fa-users"></i> List of Students</a>
            <!-- <a class="dropdown-item" href="#"> Add Officers</a> -->
          </div>

        </li>
  
        <li class="nav-item dropdown <?php if ($currentpage == 'clubs'): ?>
          active
        <?php endif ?>">
          <a class="nav-link dropdown-toggle" href="#" id="clubsDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-theater-masks"></i> Clubs
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="clubsDropDown">
            <a class="dropdown-item" href="csc.php">Central Student Council</a>
            <a class="dropdown-item" href="council.php">Councils</a>
            <a class="dropdown-item" href="departmental-clubs.php">Departmental Clubs</a>
            <a class="dropdown-item" href="social-clubs.php">Social Clubs</a> 
          </div>
        </li>

         <li class="nav-item dropdown <?php if ($currentpage == 'adminannouncement'): ?>
          active
        <?php endif ?>">
        <?php 
          $qryrejctbadge1 = mysqli_query($connection,"select count(*) as cnt1 from csc_announcement_table where isApproved = 'No'");
          $resultreject1 = mysqli_fetch_assoc($qryrejctbadge1);
          $qryrejctbadge2 = mysqli_query($connection,"select count(*) as cnt2 from council_announcement_table where isApproved = 'No'");
          $resultreject2 = mysqli_fetch_assoc($qryrejctbadge2);
          $qryrejctbadge3 = mysqli_query($connection,"select count(*) as cnt3 from department_announcement_table where isApproved = 'No'");
          $resultreject3 = mysqli_fetch_assoc($qryrejctbadge3);
          $qryrejctbadge4 = mysqli_query($connection,"select count(*) as cnt4 from social_announcement_table where isApproved = 'No'");
          $resultreject4 = mysqli_fetch_assoc($qryrejctbadge4);

        $a=array($resultreject1['cnt1'],$resultreject2['cnt2'],$resultreject3['cnt3'],$resultreject4['cnt4']);
         ?>
        <a class="nav-link dropdown-toggle" href="#" id="stclubDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="far fa-newspaper"></i> Announcement<?php if ( $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="stclubDropDown">
            <a class="dropdown-item" href="creat-announcement.php">Add Announcement</a>
            <a class="dropdown-item" href="view-all-announcement.php">View Announcement<?php if ( $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?></a>
            <a class="dropdown-item" href="history-of-announcement.php">History of Announcement</a>
          </div>

        </li>


        <li class="nav-item dropdown <?php if ($currentpage == 'courses'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="add-course.php"><i class="fas fa-graduation-cap"></i> Course</a>
        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'activitycalendar'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="activity-calendar.php"><i class="far fa-calendar"></i>  Calendar</a>
        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'venue'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="venue.php"><i class="fas fa-map-marker-alt"></i>  Venue</a>
        </li>
        
        <li class="nav-item dropdown <?php if ($currentpage == 'reports'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="AdminReport.php"><i class="fas fa-file-contract"></i>  Reports</a>
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
