
<?php include('header.php');
$currentpage = "reports";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>



<!--Main Layout-->
<main class=" py-5 mt-3">

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
              <p style="color: black"><b><U>Student's Profile Data</U></p></b>
            </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive" >

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Email</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Birthday</th>
              <th scope="col">Gender</th>
              <th scope="col">Course</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from list_student_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><b><?php echo $res['StudentID']; ?></b></td> 
              <td scope="row"><b><?php echo $res['lname'] .", ". $res['fname']." ".$res['mname'] ?></b></td>
              <td scope="row"><b><?php echo $res['address']; ?></b></td>
              <td scope="row"><b><?php echo $res['email']; ?></b></td>
              <td scope="row"><b><?php echo $res['contactnum']; ?></b></td>
              <td scope="row"><b><?php echo $res['birthday']; ?></b></td>
              <td scope="row"><b><?php echo $res['gender']; ?></b></td>
              <td scope="row"><b><?php echo $res['CourseName']; ?></b></td>
           
            </tr>

            <?php } ?>
           
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>
  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>

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