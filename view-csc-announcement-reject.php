  
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

        <h2><b>Central Student Council</b></h2>
        <h5>Reject Announcement</h5>
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
              <th scope="col">Date Submited</th>
              <th scope="col">to</th>
              <th scope="col">Subject</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $qrycscann = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Reject'");
            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr>
              <td scope="row"><?php echo date('F d, Y h:i A', strtotime($rescscann['dateSubmit'])); ?></td> 
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['subjectann']; ?></td>
              <td><a href="" class="btn btn-default blue-gradient mb-4 itogglebutton" data-toggle="modal" data-target="#modalContactForm<?php echo $rescscann['csc_announcementID']; ?>">View</a></td>

            </tr>

            <div class="modal fade" id="modalContactForm<?php echo $rescscann['csc_announcementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Announcement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body mx-3">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">
                  
                <div class="md-form mb-5">
                  <input type="text" name="to" class="form-control " readonly="" value="<?php echo $rescscann['toWhom']; ?>">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control " readonly="" value="<?php echo $rescscann['subjectann']; ?>">
                  <label data-error="wrong" data-success="right" for="form32">Subject: </label>
                </div>

                 <div class="md-form mx-5 my-5">
                    <input type="text" name="timestart" class="form-control" value="<?php echo date('F d, Y h:i A', strtotime($rescscann['timeStart'])); ?>">
                    <label for="inputMDEx">date and time Start</label>
                  </div>
          
                  <div class="md-form mx-5 my-5">
                    <input type="text" name="timeend" class="form-control" value="<?php echo date('F d, Y h:i A', strtotime($rescscann['timeEnd'])); ?>">
                    <label for="inputMDEx">date and time End</label>
                  </div>

                  <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control " readonly="" value="<?php echo $rescscann['venueName']; ?>">
                  <label data-error="wrong" data-success="right" for="form32">Venue: </label>
                </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="message" class="md-textarea form-control" rows="4" readonly=""><?php echo $rescscann['message']; ?></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

              <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-danger itogglebutton" data-dismiss="modal">Close</button>
              </div>
            </form> 
          </div>
          </div>
        </div>
      
      </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter<?php echo $rescscann['csc_announcementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">

          <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
          <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you Sure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Do you want to Approve the Announcement ?</p>
              </div>
              <div class="modal-footer">
                <a href="controller.php?from=approve-csc-announcement&csc_announcementID=<?php echo $rescscann['csc_announcementID']; ?>"><button type="button" class="btn btn-unique">Yes</button></a>
                <button type="button" class="btn btn-unique" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>

          <!-- Modal -->
        <div class="modal fade" id="rejectmodal<?php echo $rescscann['csc_announcementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">

          <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
          <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="text-center border border-light p-3" method="GET" action="controller.php" autocomplete="false"> 

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reject Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="annreason" class="md-textarea form-control" rows="4"></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Reason for Rejection</label>
                </div>
              </div>

              <input type="text" name="csc_announcementID" value="<?php echo $rescscann['csc_announcementID']; ?>" hidden>
              <input type="text" name="from" value="reject-csc-announcement" hidden>

              <div class="modal-footer">
                <button type="submit" class="btn btn-unique">Yes</button></a>
                <button type="button" class="btn btn-unique" data-dismiss="modal">No</button>
              </div>
              </form>
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

<style type="text/css">
  .itogglebutton{
  border-radius: 12px;
  }
</style>