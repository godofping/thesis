
<?php include('header.php');
$currentpage = "club";
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
}

 include("student-header.php");
 ?>

<div class="container-fluid">

  <div class="row">

    <div class="row">
      <div class="col-md-12">

        <h2><i class="far fa-folder-open"></i> My Club</h2>
        <hr>

      </div>
    </div>

  </div>
  </div>
<!--Main Layout-->



<?php include('footer.php'); ?>
