
<?php include('header.php');
$currentpage = "adminannouncement";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>
<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">
        <h2>Announcements</h2>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
  
    <div class="row mt-5">
      <div class="col-md-12 z-depth-2">

        <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            
            <?php
          $qryrejctbadge = mysqli_query($connection,"select count(*) as cnt from council_announcement_table where isApproved = 'No'");
          $resultreject = mysqli_fetch_assoc($qryrejctbadge);
          $qryrejctbadge1 = mysqli_query($connection,"select count(*) as cnt1 from csc_announcement_table where isApproved = 'No'");
          $resultreject1 = mysqli_fetch_assoc($qryrejctbadge1);
          $qryrejctbadge2 = mysqli_query($connection,"select count(*) as cnt2 from council_announcement_table where isApproved = 'No'");
          $resultreject2 = mysqli_fetch_assoc($qryrejctbadge2);
          $qryrejctbadge3 = mysqli_query($connection,"select count(*) as cnt3 from department_announcement_table where isApproved = 'No'");
          $resultreject3 = mysqli_fetch_assoc($qryrejctbadge3);
          $qryrejctbadge4 = mysqli_query($connection,"select count(*) as cnt4 from social_announcement_table where isApproved = 'No'");
          $resultreject4 = mysqli_fetch_assoc($qryrejctbadge4);
            ?>

            <tr>
              <td scope="row">Central Student Council</td>
              <td><a href="view-csc-announcement.php"><button type="button" class="btn blue-gradient">View</button></a><?php if ($resultreject1['cnt1'] != 0 ):?><span class="badge badge-danger ml-1"><?php echo array_sum($resultreject1) ?></span><?php endif ?>
            </tr>
            
            <tr>
              <td scope="row">Departmental Council</td>
              <td><a href="view-council-announcement.php"><button type="button" class="btn blue-gradient">View</button></a><?php if ( $resultreject['cnt'] != 0 ):?><span class="badge badge-danger ml-1"><?php echo array_sum($resultreject) ?></span><?php endif ?>
            </tr>

            <tr>
              <td scope="row">Departmental Clubs</td>
              <td><a href="view-departmental-club-announcement.php"><button type="button" class="btn blue-gradient">View</button></a><?php if ($resultreject3['cnt3'] != 0 ):?><span class="badge badge-danger ml-1"><?php echo array_sum($resultreject3) ?></span><?php endif ?>
            </tr>

             <tr>
              <td scope="row">Social Clubs</td>
              <td><a href="view-social-club-announcement.php"><button type="button" class="btn blue-gradient">View</button></a><?php if ($resultreject4['cnt4'] != 0):?><span class="badge badge-danger ml-1"><?php echo array_sum($resultreject4) ?></span><?php endif ?>
            </tr>
           
          
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


