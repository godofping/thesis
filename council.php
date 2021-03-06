
<?php include('header.php');
$currentpage = "clubs";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>

 <body>
    <div class="db">
<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2><b>Departmental Council</b></h2>
        <h5>Clubs</h5>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

    <div class="row mt-5">
      <div class="col-md-12 z-depth-2 table-radius">

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
              <td><!-- <a href="cased.php"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> --><a href="cased-members.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-users"></i> Members</button></a></td>

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
              <td><!-- <a href="business.php"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> --><a href="business-members.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-users"></i> Members</button></a></td> 

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
              <td><!-- <a href="nursing.php"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> --><a href="nursing-members.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-users"></i> Members</button></a></td> 

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
    </div>
 </body>
    

<?php include('footer.php'); ?>

<style type="text/css">
 
 body {
  background-color: #f5f5f5; 
}

 body, html {
  height: 100%;
}

.db {
  /* The image used */
  background-image: url("logo/student.png");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center right;
  background-repeat: no-repeat;
  background-size: 75%;
}

/*.text-color-test{
  text-shadow: 3px 3px #000000;
}*/


  .btn-rad{
  border-radius: 12px;
  width: 150px;
  }

 .table-radius{
  border-radius: 12px;
 }

</style>
