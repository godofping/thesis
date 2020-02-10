
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
  
  $qrydisable = mysqli_query($connection, "select * from  membershiptoggle_table ");
  $resdisable = mysqli_fetch_assoc($qrydisable);
  if ($resdisable['toggleonoroff'] == 'OFF') {
   header("Location: index.php");
  }

  include("student-header.php");
 ?>

<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2><i class="fas fa-theater-masks"></i> <b>Edit My Social Club</b></h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

         <?php 

            $qry = mysqli_query($connection, "select * from list_student_view where accID = '".$_SESSION['accID']."'");    
                $res = mysqli_fetch_assoc($qry);           
             ?>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-3">

      <div class="card">

         <h5 class="card-header blue lighten-1 white-text text-center py-4"><img src="logo/download.png" width="50" height="50" class="rounded-circle img-responsive">
            <strong>Notre Dame of Tacurong College</strong><br>
            <small>City of Tacurong</small>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

         
          <div class="text-center" style="color: #757575;">
              <p class="h4 mt-3" style="color: black; text-align: left;">Course </p>
              <h4 style="color: black; text-align: left;"><?php echo $res['CourseName'] ?> <u><a class="h5 itogglebutton" style="color: #33b5e5" data-toggle="modal" data-target="#courseModal"> <i class="fas fa-sync"></i> Change</a></u></h4>
              <p class="h4 mt-3" style="color: black; text-align: left;">Social Clubs <u><a class="h5 itogglebutton" style="color: #33b5e5" data-toggle="modal" data-target="#addModal"> <i class="fas fa-plus"></i> Add</a></u></p>
              <?php 
              $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");
              while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>

              <div class="md-form" style="text-align: left;">
                <h4 style="color: black"><?php echo $ressocialclub['socialClubName'] ?></h4></<br>
                <button class="btn blue-gradient itogglebutton" data-toggle="modal" data-target="#editModal<?php echo $ressocialclub['socialClubId'] ?>"><i class="far fa-edit"></i> Edit Club</button>   
                <button class="btn btn-danger itogglebutton" data-toggle="modal" data-target="#deleteModal<?php echo $ressocialclub['socialClubId'] ?>">Remove Club</button>
              
             
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
        <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                  <small>Select Course</small>
                  <select class="form-control" name="CourseID" required="">
                    <option selected="" value="<?php echo $res['CourseID']?>"><?php echo $res['CourseName']?></option>
                      <?php $qry1 = mysqli_query($connection, "select * from course_table order by CourseName asc");
                      while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                        <option value="<?php echo $res1['CourseID']?>"><?php echo $res1['CourseName']?></option>
                      <?php } ?>
                    </select>          
                    <small>Reminder: when you change your course will requerd you to log off and log in again!</small>
                    <input type="text" name="from" value="change-course" hidden>
                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn blue-gradient itogglebutton">Change</button> 
               </form> 
              </div>
            </div>
          </div>
        </div>

<!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Social Club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                  <small>Select social Club</small>
                  <select class="form-control" name="socialClubId" required="">
                    <option selected="" ></option>
                      <?php $qry1 = mysqli_query($connection, "select * from social_club_view order by socialClubName asc");
                      while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                        <option value="<?php echo $res1['socialClubId']?>"><?php echo $res1['socialClubName']?></option>
                      <?php } ?>
                    </select>          

                    <input type="text" name="from" value="addnew-social-club" hidden>
                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn blue-gradient itogglebutton">add</button> 
               </form> 
              </div>
            </div>
          </div>
        </div>


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
        <h5 class="modal-title" id="exampleModalLabel">Remove Social Club</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" method="POST" action="controller.php?stdsocialID=<?php echo $ressocialclub['stdsocialID']?>" autocomplete="false">
          <div class="row">
              <div class="col-12">
                  <div class="form-group">
          
                    <p style="text-align: center;">Are you sure to remove your social club <br> <?php echo $ressocialclub[
                      'socialClubName']; ?>?</p>

                    </div>
              </div>
          </div>

   
  
        <input type="text" name="from" value="delete-social-club" hidden>

       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<?php include('footer.php'); ?>

<style type="text/css">

.itogglebutton{
  border-radius: 12px;
}

</style>