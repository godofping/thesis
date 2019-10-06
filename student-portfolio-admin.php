
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

        <h2>Students Portfolio</h2>
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

                  <p style="text-align: center;">Toggle for Portfolio to show or hide</p>
                  <p style="text-align: center;">Status: <?php echo $resulttoggle['toggleonoroff']; ?></p>             

              </div>
              <div class="modal-footer">
                <a href="controller.php?from=show-button&showID=<?php echo $resulttoggle['showID']; ?>"><button type="submit" class="btn btn-success itogglebutton"><i class="fas fa-eye"></i> ON</button></a> 
                <a href="controller.php?from=hide-button&showID=<?php echo $resulttoggle['showID']; ?>"><button type="submit" class="btn btn-danger itogglebutton"><i class="fas fa-eye-slash"></i> OFF</button></a>
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
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from student_portfolio_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo ucfirst($res['lname'])." ". ucfirst($res['fname'])  ?></th> 
              <td><button class="btn aqua-gradient" data-toggle="modal" data-target="#editModal<?php echo $res['stportfolioID'] ?>">View</button></td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['stportfolioID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Portfolio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                    <div class="md-form mt-3">
                    <p style="color: black; text-align: left;">Name: <?php echo ucfirst($res['lname'])." ". ucfirst($res['fname'])  ?></p>
                    <p style="color: black; text-align: left;">Course & Year: <?php echo $res['CourseName'] .", ". $res['styear'] ?></p>
                    </div> 

                    <div class="md-form mt-3" style="text-align: left;">
                    <p style="color: black"> Semester: <?php echo $res['sem']; ?>, School Year: <?php echo $res['schoolyr']; ?></p>
                    </div>
                    <p class="h5 mb-4 mt-4 text-left">A.] Activities joined/participated</p>

                    <div class="md-form mt-3">
                    <?php if ($res['act1'] != "" && $res['rank1']): ?> 
                       <p style="color: black; text-align: left;"><?php echo $res['act1'] ?>, <?php echo $res['rank1']?></p>
                    <p style="color: black; text-align: left;"></p>
                    <?php endif ?>  
                    <?php if ($res['act2'] != "" && $res['rank2']): ?> 
                       <p style="color: black; text-align: left;"><?php echo $res['act2'] ?>, <?php echo $res['rank2']?></p>
                    <p style="color: black; text-align: left;"></p>
                    <?php endif ?>
                    <?php if ($res['act3'] != "" && $res['rank3']): ?> 
                       <p style="color: black; text-align: left;"><?php echo $res['act3'] ?>, <?php echo $res['rank3']?></p>
                    <p style="color: black; text-align: left;"></p>
                    <?php endif ?>  
                    <?php if ($res['act4'] != "" && $res['rank4']): ?> 
                       <p style="color: black; text-align: left;"><?php echo $res['act4'] ?>, <?php echo $res['rank4']?></p>
                    <p style="color: black; text-align: left;"></p>
                    <?php endif ?>  
                    </div> 


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

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