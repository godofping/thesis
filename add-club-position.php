
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
        <h2> Add Club Position</h2>
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
              <td><a href="cscposition.php"><button class="btn blue-gradient">View</button></a>
            </tr>

            <tr>
              <td scope="row">Departmental Council Clubs</td>
              <td><a href="council-add-position.php"><button class="btn blue-gradient">View</button></a>
            </tr>

             <tr>
              <td scope="row">Departmental Clubs</td>
              <td><a href="departmental-add-position.php"><button class="btn blue-gradient">View</button></a>
            </tr>

            <tr>
              <td scope="row">Social Clubs</td>
              <td><a href="social-add-position.php"><button class="btn blue-gradient">View</button></a>
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


