
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

        <h2>Departmental council Rejected Announcement</h2>
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

            $qrycscann = mysqli_query($connection, "select * from council_announcement_table where isApproved = 'Reject' and CounID = '".$resdpname['CounID']."'");
            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr> 
              <td><?php echo $rescscann['dateSubmit']; ?></td>
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['subjectann']; ?></td>
              <td><a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm<?php echo $rescscann['CounID']; ?>">View</a></td>

            </tr>

            <div class="modal fade" id="modalContactForm<?php echo $rescscann['CounID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                <form class=" p-2" method="GET" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">

                <?php 

                        $qrydpannname = mysqli_query($connection, " select * from council_announcement_table where CounID = '".$rescscann['CounID']."' ");
                        $resultann = mysqli_fetch_assoc($qrydpannname);

                        $qryvenue = mysqli_query($connection, " select * from council_club_announcement_view where CounID = '".$rescscann['CounID']."' ");
                        $resultvenue = mysqli_fetch_assoc($qryvenue);

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
                  <select class="form-control" name="venueID" required="" title="hi">
                          <option selected="" value="<?php echo $resultann['venueID']; ?>"><?php echo $resultvenue['venueName'] ?></option>    
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
                  <li class="text-danger font-weight-bold">Your Announcement was Rejected<br>due to this reasons <br>"<?php echo $resultann['annreason']; ?>".</li>
                </ul>

              <input type="text" name="CounID" value="<?php echo $rescscann['CounID']; ?>" hidden>
              <input type="text" name="from" value="resend-council-announcement" hidden>
            
              <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-unique">Resend</button></a>
                <button type="button" class="btn btn-unique" data-dismiss="modal">Cancel</button>
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