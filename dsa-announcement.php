
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

          <!-- Material form contact -->
    <div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Director of Student Affairs</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            <?php 

              $qry = mysqli_query($connection, "select * from dsa_announcement_table");
              $res = mysqli_fetch_assoc($qry);
             ?>

              <!-- To Whom -->
            <div class="md-form mt-3">
                <input align="middle" type="text" readonly="" class="form-control" value="Time Start: <?php echo $res['dateAnnounced']; ?>">
                <label>Date Announced</label>
            </div>

            <!-- To Whom -->
            <div class="md-form mt-3">
                <input type="text" readonly="" class="form-control" value="<?php echo $res['toWhom']; ?>">
                <label>To:</label>
            </div>

            <!--Message-->
            <div class="md-form">
                <textarea  readonly="" class="form-control md-textarea" rows="3"><?php echo $res['message']; ?></textarea>
                <label>Message</label>
            </div>

        </form>
        <!-- Form -->

    </div>

      </div>
<!-- Material form contact -->

        </div>
      </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


