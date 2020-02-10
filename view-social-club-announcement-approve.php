
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
        <h2><b>Social Clubs</b></h2>
        <h5>Approve Announcement</h5>
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
            $qrycscann = mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes'");
            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr>
              <td scope="row"><?php echo $rescscann['socialClubName']; ?></td> 
              <td><?php echo $rescscann['dateSubmit']; ?></td>
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['isApproved']; ?></td> 
              <td><a href="" class="btn btn-default blue-gradient mb-4 itogglebutton" data-toggle="modal" data-target="#modalContactForm<?php echo $rescscann['socialClubId']; ?>">View</a></td>

            </tr>

            <div class="modal fade" id="modalContactForm<?php echo $rescscann['socialClubId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
              
                <ul>

                <?php 


                $timestart =  $rescscann['timeStart'];
                $timeend =  $rescscann['timeEnd'];
                $timeStartSubmitted = date('Y-m-d h:i:s', strtotime($timestart));
                $timeEndSubmitted = date('Y-m-d h:i:s', strtotime($timeend));


                $qry123 = mysqli_query($connection, "select * from dsa_announcement_view where isApproved = 'Yes' and dsaAnnouncementID <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");

                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>

                <?php 
               



                $qry123 = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' and csc_announcementID <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");
                while ($res123 = mysqli_fetch_assoc($qry123)) { ?>
                 
                 <li class="text-danger font-weight-bold">You have a conflict with the "<?php echo $res123['subjectann']; ?>" <br> in this time schedule from "<?php echo date('F d, Y h:i A', strtotime($res123['timeStart'])); ?>" <br> until "<?php echo date('F d, Y h:i A', strtotime($res123['timeEnd'])); ?>" at <?php echo $res123['venueName']; ?>.</li>

                  
                <?php } ?>

                 <?php 


                $qry123 = mysqli_query($connection, "select * from council_club_announcement_view where isApproved = 'Yes' and council_announcementID  <> '" . $rescscann['DannouncementID'] . "' and timeStart between '" . $timeStartSubmitted . "' and '" . $timeEndSubmitted . "' and venueID = '" . $rescscann['venueID'] . "' ");

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
                <button type="button" class="btn btn-danger itogglebutton" data-dismiss="modal">Close</button>
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

<style type="text/css">
  .itogglebutton{
  border-radius: 12px;
  }
</style>