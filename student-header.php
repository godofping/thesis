 <header>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
    <a class="navbar-brand" href="students-dashboard.php"><strong>Student Dashboard</strong></a>
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
            

            <i class="fas fa-user-alt"></i><?php echo $reshey['fname']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="MyaccountDropDown">
            <a class="dropdown-item" href="manage-acc.php"><i class="fas fa-user-cog"></i><?php echo $reshey['fname']; ?></a>
            <a class="dropdown-item" href="controller.php?from=logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
          </div>

        </li>

         <li class="nav-item dropdown <?php if ($currentpage == 'club'): ?>
          active
        <?php endif ?>">
        <a class="nav-link dropdown-toggle" href="#" id="stclubDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Clubs
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="stclubDropDown">
            <a class="dropdown-item" href="#">Renew Club</a>
            <a class="dropdown-item" href="#">Join Social Club</a>
          </div>

        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'announcement'): ?>
          active
        <?php endif ?>">
        <a class="nav-link dropdown-toggle" href="#" id="stclubDropDown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="far fa-newspaper"></i> Announcement
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="stclubDropDown">
            <a class="dropdown-item" href="dsa-announcement.php">DSA Announcement</a>
            <a class="dropdown-item" href="csc-announcement.php">CSC Announcement</a>
            <a class="dropdown-item" href="departmental-council-announce.php">Departmental Council Announcement</a>
            <a class="dropdown-item" href="departmental-clubs-announcement.php">Departmental Club Announcement</a>
            <a class="dropdown-item" href="social-clubs-announcement.php">Social Club Announcement</a>
          </div>

        </li>

        <li class="nav-item dropdown <?php if ($currentpage == 'stportfolio'): ?>
          active
        <?php endif ?>">
        <a class="nav-link"  href="#">
            Student Portfolio
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
