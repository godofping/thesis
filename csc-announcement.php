
<?php include('header.php');
$currentpage = "announcement";
if (!isset($_SESSION['accID'])) {
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
        <?php 

        $qryposition = mysqli_query($connection, "select * from csc_mem_view where stprofID = '" .$_SESSION['stprofID']. "' and perpost = 'Yes' ");

        $qryrejctbadge = mysqli_query($connection,"select count(*) as cnt from csc_announcement_table where isApproved = 'Reject'");
        $resultreject = mysqli_fetch_assoc($qryrejctbadge);

        if (mysqli_num_rows($qryposition)>0): ?>

                  <a  href="" class="btn aqua-gradient mb-4" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i> Create Announcement</a>
                   <a href="csc-status-announcement.php" class="btn peach-gradient mb-4"><i class="fas fa-spinner"></i>  Pending Announcement</a>
                   <a href="csc-reject-announcement.php" class="btn btn-outline-danger mb-4" ><i class="fas fa-exclamation"></i> Reject Announcement<?php if ( $resultreject['cnt'] != 0): ?><span class="badge badge-danger ml-1"><?php echo $resultreject['cnt']; ?></span>
          <?php endif ?></a>
        <?php endif ?>
        
        <!-- Creat Announcement Modal -->
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

              <div class="modal-body mx-3">
                <form class=" p-2" id="formdforsend" method="POST" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">

                  <div class="md-form mb-5">
                     <input type="text" readonly="" class="form-control " required="">
                     <label data-error="wrong" readonly="" data-success="right" for="form32">Central Stutdent Council</label>
                  </div>

                 <div class="md-form mb-5">
                  <input type="text" name="to" class="form-control " required="">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control " required="">
                  <label data-error="wrong" data-success="right" for="form32">Subject: </label>
                </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" id="timestart" name="timestart" class="form-control" required="">
                    <label for="inputMDEx">Date and time Start</label>
                  </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" id="timeend" name="timeend" class="form-control" required="">
                    <label for="inputMDEx">Date and time End</label>
                  </div>

                 <div class="md-form mb-5">  
                   <p class="text-center">Select Venue</p>
                    <select class="form-control" id="venue" name="venueID"title="hi" required="">

                          <option selected="" readonly=""  disabled=""></option>    
                          <?php 

                            $qry1 = mysqli_query($connection, "select * from venue_table");

                            while ($res2 = mysqli_fetch_assoc($qry1)) { ?>
                              <option value="<?php echo $res2['venueID']; ?>" ><?php echo $res2['venueName']; ?></option>
                           <?php }

                           ?>

                        </select>
                </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="message" class="md-textarea form-control" rows="4" required=""></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

                <p id="errors" class="text-danger"></p>

                  <input type="text" name="from" value="csc-announcement" hidden>
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <button id="sendButton" type="button" class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                
                
              </div>
            </form> 
          </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->
      
        </div>
      </div>

  <!-- Material form contact -->
 <?php 

              $qrycsc = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' order by csc_announcementID desc  ");
              $rescsc = mysqli_fetch_assoc($qrycsc);
              if (mysqli_num_rows($qrycsc )>0): ?>

               <div class="container">
    <div class="card">

    <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
        <strong>Central Student Council</strong><br>
        <small style="font-size: ">Notre Dame of Tacurong College</small><br>
        <small>City of Tacurong</small>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

           

            <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><?php echo $rescsc['toWhom']; ?></p>
            </div>

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black"><?php echo $rescsc['subjectann']; ?></p>
            </div> 

             <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Date: <?php echo date('F d, Y h:i A', strtotime($rescsc['timeStart'])); ?>, until <?php echo date('F d, Y h:i A', strtotime($rescsc['timeEnd'])); ?></p>
            </div>   

            <div class="md-form mt-3" style="text-align: left;">
              <p style="color: black">Venue: <?php echo $rescsc['venueName']; ?></p>
            </div>        

            <div class="md-form mt-3" style="text-align: center;">
              <p style="color: black">Message: <br><br><?php echo $rescsc['message']; ?></p>
            </div>

        </form>
        <!-- Form -->
          </div>
      </div>
    </div>
              <?php endif ?>
             
<!-- Material form contact -->
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




  $.post("check-csc-announcement.php",
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



