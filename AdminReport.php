
<?php include('header.php');
$currentpage = "reports";
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

        <h2><b>Official Reports</b></h2>
        <hr>

      </div>
    </div>


  <div class="row">
      <div class="col-md-12">

    
  
    <div class="row mt-5 z-depth-2">
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
              <td scope="row">Student's Profile Data</td>
              <td><a href="studentdata.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row">List of Members of Departmental Councils</td>
              <td><a href="councilReport.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row">List of Members of Departmental Clubs</td>
              <td><a href="departmentReport.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>
           
           <tr>
              <td scope="row">List of Members of Social Clubs</td>
              <td><a href="socialmemReport.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row">Posted Announcement</td>
              <td><a href="approveannouncement.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
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
<!-- id="dtBasicExample" -->
<!-- <script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script> -->

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
  width: 150px;
  }

 .table-radius{
  border-radius: 12px;
 }

</style>