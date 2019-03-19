
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

        <h2>Add Admin Announcement</h2>
        <hr>

      </div>
    </div>

        <div class="row">
      <div class="col-md-12">

        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i> Create Announcement</a>

       <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write an Announcement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <?php 

                $qryadmin = mysqli_query($connection, "select * from admin_view where adminId = ".$_SESSION['adminId']." ");
                $resadmin = mysqli_fetch_assoc($qryadmin);


               ?>

              <div class="modal-body mx-3">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">
                   
                

                <!-- Default form grid -->
                  <form>
                    <!-- Grid row -->
                    <div class="row">
                      <!-- Grid column -->
                      <div class="col">
                        <!-- Default input -->
                       <!-- <i class="fas fa-user prefix grey-text"></i> -->
                        <input type="text" readonly="" class="form-control" value="<?php echo $resadmin['username'] ?>">
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col">
                       
                        <input name="date" type="date" class="form-control" >
                      </div>

                      <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                  </form>
                  <!-- Default form grid -->

                <div class="md-form mb-5">
                  <i class="fas fa-tag prefix grey-text"></i>
                  <input type="text" name="to" class="form-control ">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="message" class="md-textarea form-control" rows="4"></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

                  <input type="text" name="from" value="dsa-announcement" hidden>
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <button type="submit" class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
              
              </div>
        </form>    </div>
          </div>
        </div>
      
      </div>
    </div>
     
      </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


