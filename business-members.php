
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

        <h2>CBTV Council</h2>
        <h5>Members</h5>
        <hr>

      </div>
    </div>


    
  
    <div class="row mt-5 indigo lighten-5">
      <div class="col-md-12 z-depth-2">

        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <!-- <th scope="col">Position</th> -->
              <th scope="col">Student Name</th>
              <th scope="col">Course</th>

            </tr>
          </thead>
          <tbody>
              
                <?php 
            $qry = mysqli_query($connection, "select * from list_student_view where CounID = '2'");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <!-- <th scope="row"><?php echo $res['positionName']; ?></th>  -->
              <th scope="row"><?php echo $res['lname'] ." ". $res['mname'] ." ". $res['fname']; ?></th>
              <th scope="row"><?php echo $res['CourseName']; ?></th> 
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

<script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>


