
<?php include('header.php');
$currentpage = "students";
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
<main class="text-center py-5 mt-5">

  <div class="container">
    <div class="row">
      <div class="col-md-12">

      <!-- <h3 class="pb-3"><b>Calendar of Activity</b></h3> -->

      <?php 

          $qry = mysqli_query($connection, "select * from calendar_table");
            $res = mysqli_fetch_assoc($qry);

            $imgname = $res['calendarIMGname'];

           ?>

        <!--Mask with wave-->
      <div class="view overlay">
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
