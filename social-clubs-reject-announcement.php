
<?php include('header.php');
$currentpage = "announcement";
if (!isset($_SESSION['stprofID'])) {
  header("Location: index.php");
}
if ((time() - $_SESSION['last_time']) > 300) {
      header("Location: controller.php?from=logout");
  
}else{
   $_SESSION['last_time'] = time(); 
}

 include("student-header.php");
 ?>



<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">
        <b><a href="social-clubs-announcement-new.php"><i class="fas fa-caret-left"></i> <u>Back</u></a></b>
        <h2>Social Clubs Rejected Announcement</h2>
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
              
              <th scope="col">Announcement Date</th>
              <th scope="col">to</th>
              <th scope="col">Subject</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            <?php 

            $qrydpname = mysqli_query($connection, "select * from list_student_view where accID = ".$_SESSION['accID']." ");
            $resdpname = mysqli_fetch_assoc($qrydpname); 

            $qryssocial = mysqli_query($connection, "select * from student_social_table where stprofID = ".$_SESSION['accID']." ");
            $ressocial = mysqli_fetch_assoc($qryssocial);

            $qrycscann = mysqli_query($connection, "select * from social_announcement_table where isApproved = 'Reject' and socialClubId = '".$ressocial['socialClubId']."' ");

            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr>
              <td><?php echo $rescscann['dateSubmit']; ?></td>
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['subjectann']; ?></td>
              <td><a href="" class="btn btn-info mb-4 itogglebutton" data-toggle="modal" data-target="#modalContactForm<?php echo $rescscann['social_announcementID']; ?>">View</a></td>

            </tr>

            <div class="modal fade" id="modalContactForm<?php echo $rescscann['social_announcementID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write an Announcement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body mx-3">
                <form class=" p-2" method="GET" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">

                <?php 

                        $qrydpannname = mysqli_query($connection, " select * from social_club_announcement_view where social_announcementID = '".$rescscann['social_announcementID']."' ");
                        $resultann = mysqli_fetch_assoc($qrydpannname);    

                     ?>  

                <div class="md-form mb-5">
                  <input type="text" name="to" class="form-control " required="" value="<?php  echo $resultann['toWhom'] ?>">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control " required="" value="<?php echo $resultann['subjectann'] ?>">
                  <label data-error="wrong" data-success="right" for="form32">Subject: </label>
                </div>

                <div class="md-form mx-5 my-5">
                    <input type="datetime-local" name="timestart" class="form-control" required="" value="<?php echo date('Y-m-d\TH:i:s', strtotime($resultann['timeStart'])) ?>">
                    <label for="inputMDEx">Choose your date and time Start</label>
                  </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" name="timeend" class="form-control" required="" value="<?php echo date('Y-m-d\TH:i:s', strtotime($resultann['timeEnd'])); ?>">
                    <label for="inputMDEx">Choose your date and time End</label>
                  </div>

                  <div class="md-form mb-5">  
                   <p class="text-center">Select Venue</p>
                  <select class="form-control" name="venueID" required="">
                          <option selected="" value="<?php echo $resultann['venueID']; ?>"><?php echo $resultann['venueName'] ?></option>    
                          <?php 

                            $qry1 = mysqli_query($connection, "select * from venue_table");

                            while ($res2 = mysqli_fetch_assoc($qry1)) { ?>
                              <option value="<?php echo $res2['venueID']; ?>"><?php echo $res2['venueName']; ?></option>
                           <?php }
                           ?>
                        </select>
                      </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="message" required="" class="md-textarea form-control" rows="4"><?php echo $resultann['message']; ?></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

                <ul>
                  <li class="text-danger font-weight-bold">Your announcement was REJECTED due to the following reason/s: <br>"<?php echo $resultann['annreason']; ?>".</li>
                </ul>
            
              <div class="modal-footer d-flex justify-content-center">
                <input type="text" name="social_announcementID" value="<?php echo $rescscann['social_announcementID']; ?>" hidden>
              <input type="text" name="from" value="resend-socialclub-announcement" hidden>

                <button type="submit" class="btn btn-success itogglebutton">Resend</button></a>
                <a href="controller.php?from=discard-sc-announcement&social_announcementID=<?php echo $rescscann['social_announcementID']; ?>"><button type="button" class="btn btn-danger itogglebutton">discard</button></a>
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