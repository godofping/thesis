
<?php include('header.php');
$currentpage = "clubs";
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

        <h2><b>Departmental Council</b></h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

    
  
    <div class="row mt-5 grey lighten-5 z-depth-2">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Council Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

          <!-- cased -->
          <?php 
            $qry = mysqli_query($connection, "select * from council_table where CounID = '1'");
           $res = mysqli_fetch_assoc($qry);
            ?>
            <?php if ($res['CounName'] != ""): ?>
            <tr>
              <td scope="row"><?php echo $res['CounName'];?></td>
              <td><a href="cased.php"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a></td>

            </tr>
            <?php endif ?>
            <!-- business -->
            <?php 
            $qry = mysqli_query($connection, "select * from council_table where CounID = '2'");
           $res = mysqli_fetch_assoc($qry);
            ?>
            <?php if ($res['CounName'] != ""): ?>
            <tr>
              <td scope="row"><?php echo $res['CounName'];?></td>
              <td><a href="business.php"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a></td> 

            </tr>
            <?php endif ?>
            <!-- nursing -->
            <?php 
            $qry = mysqli_query($connection, "select * from council_table where CounID = '3'");
           $res = mysqli_fetch_assoc($qry);
            ?>
            <?php if ($res['CounName'] != ""): ?>
            <tr>
              <td scope="row"><?php echo $res['CounName'];?></td>
              <td><a href="nursing.php"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> </td> 

            </tr>
            <?php endif ?>
          
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


