
<?php include('header.php');
$currentpage = "club";
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

        <h2><i class="fas fa-theater-masks"></i> Edit My Social Club</h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

         <?php 

            $qry = mysqli_query($connection, "select * from student_account_table where accID = '".$_SESSION['accID']."'");
              
                $res = mysqli_fetch_assoc($qry);

                $username = $res['StudentID'];
              
             ?>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-3">

      <div class="card">

         <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
            <strong>Notre Dame of Tacurong College</strong><br>
            <small>City of Tacurong</small>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

         
          <div class="text-center" style="color: #757575;">

              <p class="h4 mt-5" style="color: black; text-align: left;">Social Clubs</p>
              <?php 
              $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
              while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>

              <div class="md-form" style="text-align: left;">
                <h4 style="color: black"><?php echo $ressocialclub['socialClubName'] ?></h4></<br>
                <button class="btn blue-gradient" data-toggle="modal" data-target="#editModal<?php echo $ressocialclub['socialClubId'] ?>"><i class="far fa-edit"></i> Edit Club</button>   
                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $ressocialclub['socialClubId'] ?>">Delete Club</button>
              
             
              </div> 

              <?php } ?>

          </div>

      </div> <!-- end card -->
        
    </div>
  </div> <!-- end row -->

</div>
</main>
<!--Main Layout-->


<?php 
$qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {
?>


<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $ressocialclub['socialClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Social Club</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" method="POST" action="controller.php?stdsocialID=<?php echo $ressocialclub['stdsocialID']?>" autocomplete="false">
          <div class="row">
              <div class="col-12">
                  <div class="form-group">
          
                    <select class="form-control" name="socialClubId" required="">
                      <option value="<?php echo $ressocialclub['socialClubId']; ?>"><?php echo $ressocialclub['socialClubName']?></option>
                      <?php $qry1 = mysqli_query($connection, "select * from social_club_view order by socialClubName asc");
                      while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                        <option value="<?php echo $res1['socialClubId']?>"><?php echo $res1['socialClubName']?></option>
                      <?php } ?>
                    </select>

                    </div>
              </div>
          </div>

   
  
        <input type="text" name="from" value="edit-social-club" hidden>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn blue-gradient"><i class="fas fa-check"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $ressocialclub['socialClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Social Club</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" method="POST" action="controller.php?stdsocialID=<?php echo $ressocialclub['stdsocialID']?>" autocomplete="false">
          <div class="row">
              <div class="col-12">
                  <div class="form-group">
          
                    <p style="text-align: center;">Are you sure to delete your social Club <br> <?php echo $ressocialclub[
                      'socialClubName']; ?>?</p>

                    </div>
              </div>
          </div>

   
  
        <input type="text" name="from" value="delete-social-club" hidden>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn blue-gradient">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<?php include('footer.php'); ?>
