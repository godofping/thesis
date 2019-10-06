
<?php include('header.php');
$currentpage = "adminhomepage";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>

<main class=" py-5 mt-5">

  <div class="container">

      <div class="row">
      <div class="col-md-12">

        <h2 style="font-family: Times New Roman">Organizations</h2>
        <hr>

      </div>
    </div>

     <!-- Section: Pricing v.1 -->
    <section class="my-5">
    <!-- Grid row -->
    <div class="row text-center">

        <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold deep-orange-lighter-hover mb-3"> Manage Clubs</h2>
                    <a href="manage-clubs.php"><button class="btn aqua-gradient">View</button></a>
                </div>
            </div>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold pink-lighter-hover mb-3"> Officers</h2>

                    <a href="officers-clubs.php"><button class="btn aqua-gradient">View</button></a>
                </div>
            </div>

        </div>

        <!-- Grid column -->
    </div>
    <!-- Grid row -->
    </section>
    <!-- Section: Pricing v.1 -->

</div>
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>