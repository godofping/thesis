
<?php include('header.php');
$currentpage = "reports";
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
         <h4><a id="print" style="color: #289DE5;" onclick="window.print();">Print Portfolio</a><a href="AdminReport.php" id="back" style="float: right"> Go back</a></h4>  
        <h5 class=" black-text text-center py-4 card-img">
            <strong style="font-family: Arial Black, Gadget, sans-serif; margin-right: 300px">Office of Student Affairs</strong><br>
            <strong style="font-family: Arial Black, Gadget, sans-serif; margin-right: 300px">NOTRE DAME OF TACURONG COLLEGE</strong><br>
            <small style="font-family: Alfa Slab One; margin-right: 300px">City of Tacurong</small>
        </h5>
        <div class="md-form mt-1" style="text-align: center;">
              <p style="color: black"><b><U>List of Officers of Central Student Council</U></p></b>
            </div>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap" >

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Student ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Position</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from csc_officers_view  ");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['StudentID']; ?></td> 
              <td scope="row"><?php echo $res['lname'] .", ". $res['fname'] ." ". $res['mname']; ?></td>
              <td scope="row"><?php echo $res['positionNamecsc']; ?></td>
            </tr>

            <?php } ?>
           
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>
  
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<style type="text/css">
  
  @media print {
  #print {
    display: none;
  }
  #back {
    display: none;
  }
}

  .card-img{

  background-image: url("logo/download.png");
  background-position: left;
  margin-left: 150px;
  background-repeat: no-repeat;
  background-size: 10%;
}

</style>