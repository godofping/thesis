
<?php include('header.php');
$currentpage = "adminannouncement";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>

 <body>
   <div class="db">
<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">
        <h2><i class="fas fa-file"></i> <b>Announcements</b></h2>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
  
    <div class="row mt-5">
      <div class="col-md-12 z-depth-2 table-radius">

        <div class="table-responsive text-nowrap">

        <table class="table">

          <thead>
            <tr>
              <th scope="col"><b>Name</b></th>
              <th scope="col"><b>Actions</b></th>
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
              <td scope="row"><b>Central Student Council</b></td>
              <td><a href="view-csc-announcement.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a><?php if ($resultreject1['cnt1'] != 0 ):?><span id="awcsc" class="badge badge-danger ml-1"></span><?php endif ?>
            </tr>
            
            <tr>
              <td scope="row"><b>Departmental Council</b></td>
              <td><a href="view-council-announcement.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a><?php if ( $resultreject['cnt'] != 0 ):?><span id="awcouncil" class="badge badge-danger ml-1"></span><?php endif ?>
            </tr>

            <tr>
              <td scope="row"><b>Departmental Clubs</b></td>
              <td><a href="view-departmental-club-announcement.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a><?php if ($resultreject3['cnt3'] != 0 ):?><span id="awdp" class="badge badge-danger ml-1"></span><?php endif ?>
            </tr>

             <tr>
              <td scope="row"><b>Social Clubs</b></td>
              <td><a href="view-social-club-announcement.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a><?php if ($resultreject4['cnt4'] != 0):?><span id="awsocial" class="badge badge-danger ml-1"></span><?php endif ?>
            </tr>
           
          
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>

</main>
<!--Main Layout-->

 </div>
</body>

<?php include('footer.php'); ?>

<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{totalsumofannouncementsadminheader
$('#awcsc').load('check-total-ann-dashboard-admin.php');
$('#awcouncil').load('check-council-badge.php');
$('#awdp').load('check-dp-badge.php');
$('#awsocial').load('check-social-badge.php');
},

 500); // refresh every 10000 milliseconds

</script>

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


  .btn-rad{
  border-radius: 12px;
  width: 120px;
  }

 .table-radius{
  border-radius: 12px;
 }

</style>