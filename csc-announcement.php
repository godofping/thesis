
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
        $qryposition = mysqli_query($connection, "select * from csc_mem_view where stprofID = '" .$_SESSION['stprofID']. "' and position = 'Mayor' ");

        if (mysqli_num_rows($qryposition)>0): ?>
                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i> Create Announcement</a>
                   <a href="csc-status-announcement.php" class="btn btn-default btn-rounded mb-4">Pending Announcement</a>
        <?php endif ?>

        <?php

        $qryformayorandsec = mysqli_query($connection, "select * from csc_mem_view where stprofID = '" .$_SESSION['stprofID']. "' and position = 'Secrectary' ");

        if (mysqli_num_rows($qryformayorandsec)>0): ?>
                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i> Create Announcement</a>
                   <a href="csc-status-announcement.php" class="btn btn-default btn-rounded mb-4">Pending Announcement</a>
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
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
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
                    <input type="datetime-local" name="timestart" class="form-control" required="">
                    <label for="inputMDEx">Choose your date and time Start</label>
                  </div>

                  <div class="md-form mx-5 my-5">
                    <input type="datetime-local" name="timeend" class="form-control" required="">
                    <label for="inputMDEx">Choose your date and time End</label>
                  </div>

                 <div class="md-form mb-5">  
                   <p class="text-center">Select Venue</p>
                    <select class="form-control" name="venueID"title="hi" required="">

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

                  <input type="text" name="from" value="csc-announcement" hidden>
            
              <div class="modal-footer d-flex justify-content-center">
                  
                <button type="submit" class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                  <button type="button" class="btn btn-unique" data-toggle="modal" data-target="#exampleModalCenter">Check Conflict<i class="fas fa-paper-plane-o ml-1"></i></button>
                
              </div>
            </form> 
          </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->

      <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                
                <button type="button" class="btn btn-unique" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>


      
        </div>
      </div>

  <!-- Material form contact -->
 <?php 

              $qrycsc = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' order by csc_announcementID desc  ");
              $rescsc = mysqli_fetch_assoc($qrycsc);
              if (mysqli_num_rows($qrycsc )>0): ?>

               <div class="container">
    <div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Central Student Council</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

           

            <div class="md-form mt-3">
                <input align="middle" type="text" readonly="" class="form-control" value="<?php echo date('F d, Y h:i A', strtotime($rescsc['timeStart'])); ?>-<?php echo date('F d, Y h:i A', strtotime($rescsc['timeEnd'])); ?>">
                <label>Date Announced</label>
            </div>

            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $rescsc['toWhom']; ?>">
                <label>To:</label>
            </div>

            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $rescsc['subjectann']; ?>">
                <label>Subject:</label>
            </div>   

             <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $rescsc['venueName']; ?>">
                <label>Venue:</label>
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
              <?php endif ?>
             
             


  
<!-- Material form contact -->
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


