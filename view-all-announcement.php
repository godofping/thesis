
<?php include('header.php');
$currentpage = "adminannouncement";
if (!isset($_SESSION['adminId'])) {
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
      <div class="col-md-12">

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
              <td><a class="btn btn-secondary" href="view-csc-announcement.php">View</a>
            </tr>
            
            <tr>
              <td scope="row">Departmental Council</td>
              <td><a class="btn btn-secondary" href="view-council-announcement.php">View</a>
            </tr>

            <tr>
              <td scope="row">Departmental Clubs</td>
              <td><a class="btn btn-secondary" href="view-departmental-club-announcement.php">View</a>
            </tr>

             <tr>
              <td scope="row">Social Clubs</td>
              <td><a class="btn btn-secondary" href="cased.php">View</a>
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


