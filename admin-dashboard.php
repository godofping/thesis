
<?php include('header.php');
$currentpage = "adminhomepage";
if (!isset($_SESSION['adminId'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>



<!--Main Layout-->
<main class="text-center py-5 mt-5">

  <div class="container">
    <div class="row">
      <div class="col-md-12">

      <!--Mask with wave-->
      <!-- <div class="view overlay">
        <center><img src="img_forest.jpg" class="img-fluid" alt="Sample image with waves effect."></center>
        <a  href="img_forest.jpg">
          <div class="mask waves-effect waves-light rgba-white-slight"></div>
        </a>
      </div> -->


      </div>
    </div>
  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>
