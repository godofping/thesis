
<?php include('header.php');
$currentpage = "adminhomepage";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>

<main class=" py-5 mt-5">

  <div class="container">

 <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient" data-toggle="modal" data-target="#addModal">Show Renew and Portfolio</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TOGGLE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                

                  <?php 

                    $qrytoggle = mysqli_query($connection,"select * from buttontoggle_table where showID = '1' ");
                    $resulttoggle = mysqli_fetch_assoc($qrytoggle);
                   ?>

                  <div class="modal-body">
                    <p style="text-align: center;">Currently its <?php echo $resulttoggle['toggleonoroff']; ?></p>
                  <p style="text-align: center;">Show the Edit Social Club and Portfolio ?</p>
                  </div>         

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <a href="controller.php?from=show-button&showID=<?php echo $resulttoggle['showID']; ?>"><button type="submit" class="btn blue-gradient"><i class="fas fa-eye"></i> Show</button></a> 
                <a href="controller.php?from=hide-button&showID=<?php echo $resulttoggle['showID']; ?>"><button type="submit" class="btn blue-gradient"><i class="fas fa-eye-slash"></i> Hide</button></a>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">

      <!-- <h3 class="pb-3"><b>Calendar of Activity</b></h3> -->

      <?php 

          $qry = mysqli_query($connection, "select * from calendar_table");
            $res = mysqli_fetch_assoc($qry);

            $imgname = $res['calendarIMGname'];

           ?>

        <!--Mask with wave-->
      <div class="view overlay">
        <center><img src="<?php echo $imgname ?>" class="img-fluid" alt="Sample image with waves effect."></center>
        <a>
          <div class="mask waves-effect waves-light rgba-white-slight"></div>
        </a>
      </div>

      </div>
    </div>
  </div>
</div>
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>
