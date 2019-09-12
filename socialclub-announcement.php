
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

        <h2>Announcement</h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        

        
  
      </div>
    </div>


          
  <?php 

    $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
    while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)){

        $qryposition = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = '" .$_SESSION['stprofID']. "' and position = 'Mayor' ");
        $resultsocial = mysqli_fetch_assoc($qryposition);

        $qryssocial = mysqli_query($connection, "select * from student_social_table where stprofID = ".$_SESSION['accID']." ");
        $ressocial = mysqli_fetch_assoc($qryssocial);

        $qryrejctbadge = mysqli_query($connection,"select count(*) as cnt from social_announcement_table where isApproved = 'Reject' and socialClubId = '".$ressocial['socialClubId']."'");
        $resultreject = mysqli_fetch_assoc($qryrejctbadge);

        if (mysqli_num_rows($qryposition)>0): ?>
                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm<?php echo $ressocialclub['socialClubId']; ?>"><i class="fas fa-plus"></i> Create Announcement</a>
                  <a href="social-clubs-status-announcement.php" class="btn btn-default btn-rounded mb-4">Pending Announcement</a>
                  <a href="social-clubs-reject-announcement.php" class="btn btn-default btn-rounded mb-4">Rejected Announcement <?php if ( $resultreject['cnt'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject['cnt']; ?></span>
          <?php endif ?> </a>
        <?php endif ?>

        <?php 

        $qryposition = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = '" .$_SESSION['stprofID']. "' and position = 'Secretary' ");
        $resultsocial = mysqli_fetch_assoc($qryposition);
        if (mysqli_num_rows($qryposition)>0): ?>
                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i> Create Announcement</a>
                  <a href="social-clubs-status-announcement.php" class="btn btn-default btn-rounded mb-4">Pending Announcement</a>
                  <a href="social-clubs-reject-announcement.php" class="btn btn-default btn-rounded mb-4">Rejected Announcement <?php if ( $resultreject['cnt'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject['cnt']; ?></span>
          <?php endif ?> </a>
        <?php endif ?>


  <div class="container">
    <div class="card">
        <?php 

            $qrycsc = mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes' and socialClubId = '".$ressocialclub['socialClubId']."' order by social_announcementID desc ");
              $resultann = mysqli_fetch_assoc($qrycsc);
              if (mysqli_num_rows($qrycsc )>0): ?>
    <h5 class="card-header info-color white-text text-center py-4">
        <strong><?php echo $ressocialclub['socialClubName'] ?></strong>
    </h5>

    <div class="card-body px-lg-5 pt-0">
        <form class="text-center" style="color: #757575;">

          

           

             <div class="md-form mt-3">
                <input align="middle" type="text" readonly="" class="form-control" value="<?php echo date('F d, Y h:i A', strtotime($resultann['timeStart'])); ?>-<?php echo date('F d, Y h:i A', strtotime($resultann['timeEnd'])); ?>">
                <label>Date Announced</label>
            </div>

            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $resultann['toWhom']; ?>">
                <label>To:</label>
            </div>

            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $resultann['subjectann']; ?>">
                <label>Subject:</label>
            </div> 

            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $resultann['venueName']; ?>">
                <label>Venue:</label>
            </div>

            <div class="md-form">
                <textarea  readonly="" class="form-control md-textarea" rows="3"><?php echo $resultann['message']; ?></textarea>
                <label>Message</label>
            </div>

        </form>

          </div>
          <?php endif ?>  
       </div>
    </div>
<!-- Material form contact --> 



<div class="modal fade" id="modalContactForm<?php echo $ressocialclub['socialClubId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                <form class=" p-2" id="formdforsend" method="POST" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">
                  
                   <?php 

                    $qrydpname = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
                    $resdpname = mysqli_fetch_assoc($qrydpname);
                   ?>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="form32">From </label>
                  <input type="text"readonly="" class="form-control "value="<?php echo $resdpname['socialClubName'] ?>">
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="to" class="form-control "  required="">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control "  required="">
                  <label data-error="wrong" data-success="right" for="form32">Subject: </label>
                </div>

                <div class="md-form mx-5 my-5">
                    <input type="datetime-local" id="timestart" name="timestart" class="form-control" required="">
                    <label for="inputMDEx">Choose your date and time Start</label>
                  </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" id="timeend" name="timeend" class="form-control" required="">
                    <label for="inputMDEx">Choose your date and time End</label>
                  </div>

                  <div class="md-form mb-5">  
                   <p class="text-center">Select Venue</p>
                   <select class="form-control" id="venue" name="venueID" required="" title="hi">
                          <option selected="" required=""  readonly="" disabled=""></option>    
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
                  <textarea type="text" name="message" class="md-textarea form-control" rows="4"  required=""></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

                  <p id="errors" class="text-danger"></p>

                  <input type="text" name="socialClubId" value="<?php echo $resdpname['socialClubId'] ?>" hidden>
                  <input type="text" name="from" value="social-clubs-announcement" hidden>
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <button id="sendButton" type="button" class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
              
              </div>
            </form> 
          </div>
          </div>
        </div>
      </div>
         <?php } ?>        

  
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<script type="text/javascript">
  $("#sendButton").click(function(){

    to = $("input[name=to]").val();
    subject =  $("input[name=subject]").val();
    timestart =  $("#timestart").val();
    timeend =  $("#timeend").val();
    venue = $("#venue").val();




  $.post("check-social-club-announcement.php",
  {
    to: to,
    subject: subject,
    timestart: timestart,
    timeend: timeend,
    venue: venue,
 
  },

  function(data){
    
 
  //  var obj = data;

  // $.each( obj, function( key, value ) {
  //     alert( key + ": " + value );
  // });

if (data == "") {
  $( "#formdforsend" ).submit();
}
else
{
  $("#errors").html(data);
}


  });


});
</script>
