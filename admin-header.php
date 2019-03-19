<header>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
    <a class="navbar-brand" href="admin-dashboard.php"><strong>ADMIN Dashboard</strong></a>
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
            <i class="far fa-user"></i> My Account
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropDown">
            <a class="dropdown-item" href="add-student-account.php"><i class="fas fa-user-cog"></i> Manage Account</a>
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
            <a class="dropdown-item" href="add-student-account.php"><i class="fas fa-user-plus"></i> Add Student Account</a>
            <a class="dropdown-item" href="list-student.php"><i class="fas fa-users"></i> List of Students</a>
            <!-- <a class="dropdown-item" href="#"> Add Officers</a> -->
          </div>

        </li>
  
        <li class="nav-item dropdown <?php if ($currentpage == 'clubs'): ?>
          active
        <?php endif ?>">
          <a class="nav-link dropdown-toggle" href="#" id="clubsDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Clubs
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
        <a class="nav-link dropdown-toggle" href="#" id="stclubDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="far fa-newspaper"></i> Announcement
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="stclubDropDown">
            <a class="dropdown-item" href="creat-announcement.php">Add Announcement</a>
            <a class="dropdown-item" href="#">View Announcement</a>
            <a class="dropdown-item" href="#">History of Announcement</a>
          </div>

        </li>


        <li class="nav-item dropdown <?php if ($currentpage == 'courses'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="add-course.php">Course</a>
        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'activitycalendar'): ?>
          active
        <?php endif ?>">
          <a class="nav-link" href="activity-calendar.php"><i class="far fa-calendar"></i>  Calendar</a>
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
