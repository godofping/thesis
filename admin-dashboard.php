
<?php include('header.php');
$currentpage = "adminhomepage";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>

 <body>

    <div class=" py-4 mt-1"></div>

    <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="1" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
   
    <div class="carousel-item active">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="http://localhost:8080/thesis/logo/bnn.jpg"
          alt="Second slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="http://localhost:8080/thesis/logo/NNDTC.png"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->


</body>


<!--Main Layout-->



<?php include('footer.php'); ?>

<style type="text/css">
 
 body {
  background-color: #4fc3f7   ; 
}

 body, html {
  height: 100%;
}
.bg {
  /* The image used */
  background-image: url("http://localhost:8080/thesis/logo/student.png");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center right;
  background-repeat: no-repeat;
  background-size: 75%;
}

</style>