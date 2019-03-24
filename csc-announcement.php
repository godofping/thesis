
<?php include('header.php');
$currentpage = "announcement";
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
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
        $qryposition = mysqli_query($connection, "select * from csc_mem_view where stprofID = '" .$_SESSION['stprofID']. "' ");

        if (mysqli_num_rows($qryposition)>0): ?>
                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i> Create Announcement</a>
        <?php endif ?>
        
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
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                <div class="md-form mb-5">

                  <div class="md-form mb-5">
                     <input type="text" readonly="" class="form-control " required="">
                     <label data-error="wrong" readonly="" data-success="right" for="form32">Central Stutdent Council</label>
                  </div>

                 <div class="md-form mb-5">
                  <input type="text" name="to" class="form-control " required="" title="Please fill up this first">
                  <label data-error="wrong" data-success="right" for="form32">To: </label>
                </div>

                <div class="md-form mb-5">
                  <input type="text" name="subject" class="form-control " required="">
                  <label data-error="wrong" data-success="right" for="form32">Subject: </label>
                </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" name="timestart" inputMDEx" class="form-control">
                    <label for="inputMDEx">Choose your date and time Start</label>
                  </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" name="timeend" inputMDEx" class="form-control">
                    <label for="inputMDEx">Choose your date and time End</label>
                  </div>
                    
                    <select class="form-control" name="venueID" required="" title="hi">
                          <option selected="" readonly="" disabled="">Select Venue</option>    
                          <?php 

                            $qry1 = mysqli_query($connection, "select * from venue_table");

                            while ($res2 = mysqli_fetch_assoc($qry1)) { ?>
                              <option value="<?php echo $res2['venueID']; ?>"><?php echo $res2['venueName']; ?></option>
                           <?php }

                           ?>

                        </select>
                

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" name="message" class="md-textarea form-control" rows="4"></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

                  <input type="text" name="from" value="csc-announcement" hidden>
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <button type="submit" class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
              
              </div>
            </form> 
          </div>
          </div>
        </div>
      
      </div>
      
        </div>
      </div>

  <!-- Material form contact -->
  <div class="container">
    <div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Central Student Council</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            <?php 

              $qrycsc = mysqli_query($connection, "select * from csc_announcement_table where isApproved = 'Yes'  order by csc_announcementID desc");
              $rescsc = mysqli_fetch_assoc($qrycsc);
             ?>

            <div class="md-form mt-3">
                <input align="middle" type="text" readonly="" class="form-control" value="<?php echo $rescsc['dateAnnounced']; ?>">
                <label>Date Announced</label>
            </div>

            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $rescsc['toWhom']; ?>">
                <label>To:</label>
            </div>

            <div class="md-form">
                <textarea  readonly="" class="form-control md-textarea" rows="3"><?php echo $rescsc['message']; ?></textarea>
                <label>Message</label>
            </div>

        </form>
        <!-- Form -->
          </div>
      </div>
    </div>
<!-- Material form contact -->
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


