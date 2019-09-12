
<?php include('header.php');
$currentpage = "activitycalendar";
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

        <h2><i class="far fa-calendar-alt"></i> Calendar of Activity</h2>
        <hr>

      </div>
  </div>

  <form method="post" action="controller.php" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12">

        <div class="form-group">
          <input type="file"  class="input-default-js" name="calendarIMGname" required="">
        </div>

        <button type="submit" class="input-group-text mb-3" id="input2">Upload</button>
        
      </div>
    </div>

    <input type="text" name="from" value="add-calendar" hidden>

  </form>


    




    <div class="row">
        <div class="col-md-12">
          <!--Mask with wave-->
        <div class="view overlay">

        <?php 

          $qry = mysqli_query($connection, "select * from calendar_table");
            $res = mysqli_fetch_assoc($qry);

            $imgname = $res['calendarIMGname'];

           ?>

          <center><img src="<?php echo $imgname ?>" class="img-fluid" alt="Sample image with waves effect."></center>
          <a>
            <div class="mask waves-effect waves-light rgba-white-slight"></div>
          </a>
        </div>

        </div>
    </div>

  </div>



</main>
<!--Main Layout-->



<?php include('footer.php'); ?>
