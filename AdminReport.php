
<?php include('header.php');
$currentpage = "reports";
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

        <h2>Reports</h2>
        <hr>

      </div>
    </div>


  <div class="row">
      <div class="col-md-12">

    
  
    <div class="row mt-5 grey lighten-5 z-depth-2">
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
              <td><a href="studentdata.php"><button type="button" class="btn aqua-gradient"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>
           
           <tr>
              <td scope="row">Student's Profile Data</td>
              <td><a href="cased.php"><button type="button" class="btn aqua-gradient"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row">Student's Profile Data</td>
              <td><a href="cased.php"><button type="button" class="btn aqua-gradient"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row">Student's Profile Data</td>
              <td><a href="cased.php"><button type="button" class="btn aqua-gradient"><i class="fas fa-file-export"></i> Report</button></a></td>
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
<!-- id="dtBasicExample" -->
<!-- <script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script> -->