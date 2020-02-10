
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
        <h2><i class="fas fa-users-cog"></i><b> Club Officers</b></h2>
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
              <th scope="col">Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td scope="row"><b>Central Student Council</b></td>
              <td><a href="csc-new.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a>
            </tr>

            <tr>
              <td scope="row"><b>Departmental Council Clubs</b></td>
              <td><a href="council-officers.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a>
            </tr>

             <tr>
              <td scope="row"><b>Departmental Clubs</b></td>
              <td><a href="departmental-clubs-officers.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a>
            </tr>

            <tr>
              <td scope="row"><b>Social Clubs</b></td>
              <td><a href="social-club-officers.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-search"></i> View</button></a>
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
