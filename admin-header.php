<header>

  <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark">
  <a class="navbar-brand" href="admin-dashboard.php"><img src="http://localhost:8080/thesis/logo/download.png" height="30" alt="mdb logo"><b style="color: black; font-family: Arial Black, Gadget, sans-serif"> |</b><b style="color: #6DAC4FFF; font-family: Arial Black, Gadget, sans-serif"> SAMIS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars" style="color: black"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
         <?php 

            $qryhey = mysqli_query($connection, "select * from admin_account_view where adminID = ".$_SESSION['adminID']." ");
            $reshey = mysqli_fetch_assoc($qryhey);

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
            
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; ">
          <i class="far fa-user"></i><b><?php echo " ".ucfirst($reshey['username'])?></b><?php if ( $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="manage-admin.php"><i class="fas fa-user-cog"></i> <b>Manage Account</b></a></li>
          <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-user-graduate"></i> Students</a></li> -->
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"><i class="fas fa-user-graduate"></i> <b>Students</b></a></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add-student-account.php"><i class="fas fa-users-cog"></i> <b>Account</b></a></li>
              <li><a class="dropdown-item" href="student-portfolio-admin.php"><i class="fas fa-folder-open"></i> <b>Portfolio</b></a></li>
              <!-- <li><a class="dropdown-item" href="student-club-membership.php"><i class="fas fa-user-friends"></i>  Membership</a></li> -->
              <li><a class="dropdown-item" href="list-student.php"><i class="far fa-id-card"></i> <b>Masters List</b></a></li>
            </ul>
          </li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"><i class="fas fa-users"></i> <b>Organizations</b></a></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add-club-position.php"><i class="fas fa-male"></i> <b>Add Club Positions</b></a></li>
              <li><a class="dropdown-item" href="officers-clubs.php"><i class="fas fa-users-cog"></i> <b>Club Officers</b></a></li>
              <li><a class="dropdown-item" href="manage-clubs.php"><i class="fas fa-cog"></i> <b>Manage Clubs</b></a></li>
            </ul>
          </li>
          <a class="dropdown-item" href="add-course.php"><i class="fas fa-graduation-cap"></i> <b>Course</b></a>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"><i class="far fa-newspaper"></i> <b>Announcement</b><?php if ( $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?></a></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="venue.php"><i class="fas fa-map-marker-alt"></i> <b>Add Venue</b></a></li>
              <li><a class="dropdown-item" href="creat-announcement.php"><i class="fas fa-file-import"></i> <b>Add Announcement</b></a></li>
              <li><a class="dropdown-item" href="view-all-announcement.php"><i class="fas fa-file"></i> <b>View Announcement</b><?php if ( $resultreject1['cnt1'] != 0 || $resultreject2['cnt2'] != 0 || $resultreject3['cnt3'] != 0 || $resultreject4['cnt4'] != 0) : ?><span class="badge badge-danger ml-1"><?php echo array_sum($a) ?></span><?php endif ?></a></li>
              <li><a class="dropdown-item" href="history-of-announcement.php"><i class="fas fa-file-alt"></i>  <b>History of Announcement</b></a></li>
            </ul>
          </li>

        </ul>
      </li>



       <li class="nav-item dropdown <?php if ($currentpage == 'reports'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="AdminReport.php" style="color: black; "><i class="far fa-file-alt"></i>  <b>Reports</b></a>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      
      <li class="nav-item dropdown ">
          <div  class="dropdown-menu-right">
          <a class="nav-link" href="controller.php?from=logout" style="color: black"><i class="fas fa-sign-out-alt"></i> <b>Logout</b></a>
          </div>
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
<style type="text/css">
  
  .navbar-nav li:hover > ul.dropdown-menu {
    display: block;
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
    top:0;
    left:100%;
    margin-top:-6px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
} 

  .navbar { background-color: #fafafa ; } 

</style>