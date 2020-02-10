
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
        <h2><b>Approve Announcements</b></h2>
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

            <tr>
              <td scope="row">Central Student Council</td>
              <td><a href="view-csc-announcement-approve.php"><button class="btn blue-gradient itogglebutton">View</button></a>
            </tr>

             <tr>
              <td scope="row">Departmental Council</td>
              <td><a href="view-council-announcement-approve.php"><button class="btn blue-gradient itogglebutton">View</button></a>
            </tr>

            <tr>
              <td scope="row">Departmental Clubs</td>
              <td><a href="view-departmental-club-announcement-approve.php"><button class="btn blue-gradient itogglebutton">View</button></a>
            </tr>

             <tr>
              <td scope="row">Social Clubs</td>
              <td><a href="view-social-club-announcement-approve.php"><button class="btn blue-gradient itogglebutton">View</button></a>
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
</boody>


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


  .itogglebutton{
  border-radius: 12px;
  }

 .table-radius{
  border-radius: 12px;
 }

</style>