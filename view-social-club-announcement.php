
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

        <h2>Social Clubs Announcement</h2>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap" >

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Social Club Name</th>
              <th scope="col">Announcement Date</th>
              <th scope="col">to</th>
              <th scope="col">Approved</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $qrycscann = mysqli_query($connection, "select * from social_club_announcement_view");
            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr>
              <td scope="row"><?php echo $rescscann['socialClubName']; ?></td> 
              <td><?php echo $rescscann['dateAnnounced']; ?></td>
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['isApproved']; ?></td> 
              <td><a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm<?php echo $rescscann['socialClubId']; ?>">View</a></td>

            </tr>

            <div class="modal fade" id="modalContactForm<?php echo $rescscann['socialClubId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write an Announcement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body mx-3">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">
                  
                <!-- Default form grid -->
                  <form>
                    <!-- Grid row -->
                    <div class="row">
                      <div class="col">
                       
                        <input name="date" type="date" class="form-control" readonly="" value="<?php echo $rescscann['dateAnnounced']; ?>">
                      </div>
                      <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                  </form>
                  <!-- Default form grid -->

                <div class="md-form mb-5">
                  <i class="fas fa-tag prefix grey-text"></i>
                  <input type="text" name="to" class="form-control " readonly="" value="<?php echo $rescscann['toWhom']; ?>">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="message" class="md-textarea form-control" rows="4" readonly=""><?php echo $rescscann['message']; ?></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

                
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <a href="controller.php?from=approve-socialclub-announcement&socialClubId=<?php echo $rescscann['socialClubId']; ?>"><button type="button" class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button></a>
                <button type="button" class="btn btn-unique">Reject <i class="fas fa-paper-plane-o ml-1"></i></button>
              </div>
            </form> 
          </div>
          </div>
        </div>
      
      </div>



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