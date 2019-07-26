
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

        <h2>Departmental Clubs Announcement</h2>
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
              <th scope="col">Departmental Club Name</th>
              <th scope="col">Announcement Date</th>
              <th scope="col">to</th>
              <th scope="col">Approved</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $qrycscann = mysqli_query($connection, "select * from departmental_club_announcement_view where isApproved = 'No' ");
            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr>
              <td scope="row"><?php echo $rescscann['departmentClubName']; ?></td> 
              <td><?php echo $rescscann['dateSubmit']; ?></td>
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['isApproved']; ?></td> 
              <td><a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm<?php echo $rescscann['DannouncementID']; ?>">View</a></td>

            </tr>

            <div class="modal fade" id="modalContactForm<?php echo $rescscann['DannouncementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                <div class="md-form mb-5">
                  <i class="fas fa-tag prefix grey-text"></i>
                  <input type="text" name="to" class="form-control " readonly="" value="<?php echo $rescscann['toWhom']; ?>">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control " readonly="" value="<?php echo $rescscann['subjectann']; ?>">
                  <label data-error="wrong" data-success="right" for="form32">Subject: </label>
                </div>

                 <div class="md-form mx-5 my-5">
                    <input type="text" name="timestart" class="form-control" value="<?php echo date('F d, Y h:i A', strtotime($rescscann['timeStart'])); ?>">
                    <label for="inputMDEx">Choose your date and time Start</label>
                  </div>
          
                  <div class="md-form mx-5 my-5">
                    <input type="text" name="timeend" class="form-control" value="<?php echo date('F d, Y h:i A', strtotime($rescscann['timeEnd'])); ?>">
                    <label for="inputMDEx">Choose your date and time End</label>
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

                <ul>

                <?php 


                $timestart =  $rescscann['timeStart'];
                $timeend =  $rescscann['timeEnd'];
                $timeStartSubmitted = date('Y-m-d H:i:s', strtotime($timestart));
                $timeEndSubmitted = date('Y-m-d H:i:s', strtotime($timeend));


                $qry123 = mysqli_query($connection, "select * from dsa_announcement_table where isApproved = 'Yes' and dsaAnnouncementID <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");

                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>

                <?php 
               



                $qry123 = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' and csc_announcementID <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");
                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>

                 <?php 


                $qry123 = mysqli_query($connection, "select * from council_announcement_table where isApproved = 'Yes' and council_announcementID  <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");

                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>

                <?php 


                $qry123 = mysqli_query($connection, "select * from departmental_club_announcement_view where isApproved = 'Yes' and DannouncementID <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");

                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>

                 <?php 


                $qry123 = mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes' and social_announcementID <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");

                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>
                  
                </ul>
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <!-- <a href="controller.php?from=approve-dpclub-announcement&DannouncementID=<?php echo $rescscann['DannouncementID']; ?>"><button type="button" class="btn btn-unique">Approve <i class="fas fa-paper-plane-o ml-1"></i></button></a> -->
                
                <?php if (strtotime(date('Y-m-d H:i:s'))>strtotime($timeStartSubmitted)): ?>
                <button type="button" class="btn btn-unique" data-toggle="modal" data-target="#exampleModalCenter<?php echo $rescscann['DannouncementID']; ?>">Approve <i class="fas fa-paper-plane-o ml-1"></i></button>  
                <?php endif ?>

                <?php if (strtotime(date('Y-m-d H:i:s'))<strtotime($timeStartSubmitted)): ?>
                <p>Date is Expired</p>
                <button type="button" class="btn btn-unique" data-toggle="tooltip" data-placement="top" title="Date is expired" disabled="">Approve <i class="fas fa-paper-plane-o ml-1"></i></button>  
                <?php endif ?>

                

                <button type="button" class="btn btn-unique" data-toggle="modal" data-target="#rejectmodal<?php echo $rescscann['DannouncementID']; ?>">Reject <i class="fas fa-paper-plane-o ml-1"></i></button>
              </div>
            </form> 
          </div>
          </div>
        </div>
      
      </div>

       <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter<?php echo $rescscann['DannouncementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                <a href="controller.php?from=approve-dpclub-announcement&DannouncementID=<?php echo $rescscann['DannouncementID']; ?>"><button type="button" class="btn btn-unique">Yes</button></a>
                <button type="button" class="btn btn-unique" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>

          <!-- Modal -->
        <div class="modal fade" id="rejectmodal<?php echo $rescscann['DannouncementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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

              <input type="text" name="DannouncementID" value="<?php echo $rescscann['DannouncementID']; ?>" hidden>
              <input type="text" name="from" value="reject-dpclub-announcement" hidden>

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