
<?php include('header.php');
$currentpage = "venue";
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

        <h2><i class="fas fa-folder-open"></i> <b>Students Portfolio</b></h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <label style="font-family: Times New Roman">Portfolio</label>
        <button class="btn blue-gradient itogglebutton" data-toggle="modal" data-target="#addModal">Toggle</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Toggle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                  <?php 

                    $qrytoggle = mysqli_query($connection,"select * from buttontoggle_table where showID = '1' ");
                    $resulttoggle = mysqli_fetch_assoc($qrytoggle);
                   ?>

                  

                  <?php if ($resulttoggle['toggleonoroff'] == 'ON' ): ?>
                    <p style="text-align: center;">Hide students portfolio</p>
                    <p style="text-align: center;">Status: <b style=" color: green;"><?php echo $resulttoggle['toggleonoroff']; ?></b></p>   
                  <?php endif ?>
                  <?php if ($resulttoggle['toggleonoroff'] == 'OFF' ): ?>
                    <p style="text-align: center;">Show students portfolio</p>
                    <p style="text-align: center; ">Status: <b style="color: red;"><?php echo $resulttoggle['toggleonoroff']; ?></b></p>   
                  <?php endif ?>

                            

              </div>
              <div class="modal-footer">
              <?php if ($resulttoggle['toggleonoroff'] == 'ON' ): ?>
               <a href="controller.php?from=hide-button&showID=<?php echo $resulttoggle['showID']; ?>"><button type="submit" class="btn btn-danger itogglebutton"><i class="fas fa-eye-slash"></i> OFF</button></a>
              <?php endif ?>
              <?php if ($resulttoggle['toggleonoroff'] == 'OFF'): ?>
              <a href="controller.php?from=show-button&showID=<?php echo $resulttoggle['showID']; ?>"><button type="submit" class="btn btn-success itogglebutton"><i class="fas fa-eye"></i> ON</button></a>
              <?php endif ?>    
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12 z-depth-5">

        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample" >
          <thead>
            <tr>
              <th scope="col">Student Name</th>
              <th scope="col">School Year</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from student_portfolio_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo ucfirst($res['lname']).", ". ucfirst($res['fname'])." ". ucfirst($res['mname'])  ?></th>
              <th scope="row"><?php echo ucfirst($res['schoolyr'])  ?></th>  
              <td><a href="print-portfolio.php?from=checkidforstudentportfolio&stportfolioID=<?php echo $res['stportfolioID'] ?>"><button type="button" class="btn aqua-gradient itogglebutton">View</button></a></td>

            </tr>

            

            <?php } ?>
           
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>
  
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>

<style type="text/css">
  .itogglebutton{
  border-radius: 12px;
}
</style>