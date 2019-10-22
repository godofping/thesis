
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
                    <small>Name: <?php echo ucfirst($res['lname']).", ". ucfirst($res['fname'])." ". ucfirst($res['mname']) ?><br></small>
                    <small>Course & Year: <?php echo $res['CourseName'] .", ". $res['styear'] ?></small> 
                    </div> 

                    <div class="md-form mt-3" style="text-align: left;">
                      <small>Semester: <?php echo $res['sem']; ?>, School Year: <?php echo $res['schoolyr']; ?></small>
                    <p style="color: black"> </p>
                    </div>
                    <p class="h5 mb-4 mt-4 text-left">A.] Activities joined/participated</p>

                    <div class="md-form mt-3">
                    <?php if ($res['act1'] != "" && $res['rank1']): ?> 
                      <small><?php echo $res['act1'] ?>, <?php echo $res['rank1']?><br></small>
                    <?php endif ?>  
                    <?php if ($res['act2'] != "" && $res['rank2']): ?> 
                      <small><?php echo $res['act2'] ?>, <?php echo $res['rank2']?><br></small>
                    <?php endif ?>
                    <?php if ($res['act3'] != "" && $res['rank3']): ?>
                      <small><?php echo $res['act3'] ?>, <?php echo $res['rank3']?><br></small>
                    <?php endif ?>  
                    <?php if ($res['act4'] != "" && $res['rank4']): ?> 
                      <small><?php echo $res['act4'] ?>, <?php echo $res['rank4']?></small>
                    <?php endif ?>  
                    </div> 
                    <p class="h5 mb-4 mt-4 text-left">B.] Community Involvement</p>
                    <div class="md-form mt-3">
                    <?php if ($res['comm1'] != ""): ?>
                      <small><?php echo $res['comm1'] ?></small>
                    <?php endif ?>  
                    <?php if ($res['comm2'] != ""): ?>
                      <small><?php echo $res['act2'] ?></small>
                    <?php endif ?>
                    <?php if ($res['comm3'] != ""): ?> 
                      <small><?php echo $res['comm3'] ?></small>
                    <?php endif ?>  
                    <?php if ($res['comm4'] != ""): ?>
                      <small><?php echo $res['comm4'] ?></small> 
                    <?php endif ?>  
                    </div>
                    <p class="h5 mb-4 mt-4 text-left">Club Membership</p>
                     <div class="md-form mt-3">

                      <?php 

                        $qrydp = mysqli_query($connection,"select * from departmental_officersandmembers_view where stprofID = ".$res['stprofID']." ");
                        $resuldp = mysqli_fetch_assoc($qrydp);
                       ?>
                      <small><?php echo $res['departmentClubName'] ?>, <?php echo $resuldp['positionNameDP']?><br></small>
                    <?php 

                      $qrysocialposition = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = '".$res['stprofID']."' ");
                      $resultsocialposition = mysqli_fetch_assoc($qrysocialposition);

                      $qrysocial = mysqli_query($connection,"select * from student_social_club_view where stprofID = ".$res['stprofID']."");
                        while ($resultsocial = mysqli_fetch_assoc($qrysocial)) {?>
                          
                          <small><?php echo $resultsocial['socialClubName']; ?>, <?php echo $resultsocialposition['positionNameSocial']; ?></small>

                      <?php } ?>

                    </div>
                    <p class="h5 mb-4 mt-4 text-left">Seminar attended</p>
                    <div class="md-form mt-3">
                    <?php if ($res['seminar1'] != ""): ?>
                      <small><?php echo $res['seminar1'] ?></small>
                    <?php endif ?>  
                    <?php if ($res['seminar2'] != ""): ?>
                      <small><?php echo $res['seminar2'] ?></small>
                    <?php endif ?>
                    <?php if ($res['seminar3'] != ""): ?> 
                      <small><?php echo $res['seminar3'] ?></small>
                    <?php endif ?>  
                    <?php if ($res['seminar4'] != ""): ?>
                      <small><?php echo $res['seminar4'] ?></small> 
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