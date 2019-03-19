
<?php include('header.php');
$currentpage = "students";
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
}

 include("student-header.php");
 ?>



<!--Main Layout-->
<main class="text-center py-5 mt-5">

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <p align="justify">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
          anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
          ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
          voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      </div>
    </div>
  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>
