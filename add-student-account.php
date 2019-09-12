
<?php include('header.php');
$currentpage = "students";
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

        <h2><i class="fas fa-user-graduate"></i> Student Account</h2>
        <hr>

      </div>
    </div>

    
<div class="container-fluid ">
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4">
    <div class="mt-2 z-depth-5">
      
      <!-- Default form login -->
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <div class="row">
            <div class="col-12">
              <h2><i class="fas fa-user-plus"></i> Student Account</h2>
              <hr>
              <?php if (isset($_GET['status']) and $_GET['status'] == 'register-failed'): ?>
                    <div class="alert alert-danger" role="alert">
                    Account already Exist!
                  </div>
                  <?php endif ?>
              <div class="md-form">
            <input type="text" name="StudentID" id="inputMDEx" class="form-control md-4" required="">
            <label for="inputMDEx">Student ID</label>
            </div>
            </div> 

          </div>
           
          <button type="submit" class="btn aqua-gradient"><i class="fas fa-plus"></i> Add</button>

          <input type="text" name="from" value="add-student-account" hidden>   
      </form>
      <!-- Default form login -->

    </div>
    </div>
  </div>
<div class="col-md-4"></div>

      <div class="col-md-12">
        <div class="mt-2">
        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Student ID</th>
              <th scope="col">Student Password</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from student_account_view where isDeleted = 0");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['StudentID']; ?></td>
              <td><?php echo $res['StudentPassword']; ?></td>
              <td><button class="btn blue-gradient" data-toggle="modal" data-target="#editModal<?php echo $res['accID'] ?>"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['accID'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['accID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

               
                      <label>Student ID</label>
                      <input type="text" name="StudentID" class="form-control mb-4" required="" value="<?php echo $res['StudentID'] ?>">

                      <label>Student Password</label>
                      <input type="text" name="StudentPassword" class="form-control mb-4" required="" value="<?php echo $res['StudentPassword'] ?>">
            

                      <input type="text" name="accID" value="<?php echo $res['accID'] ?>" hidden>
                      <input type="text" name="from" value="edit-student-account" hidden>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn aqua-gradient"><i class="far fa-edit"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->


            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['accID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                    <div class="row">
                      <div class="col-12">
                        <h5>Are you sure to delete student ID <?php echo $res['StudentID']; ?> ?</h5>
                      </div>
                    </div>

                    <input type="text" name="accID" value="<?php echo $res['accID'] ?>" hidden>
                    <input type="text" name="from" value="delete-student-account" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->





            <?php } ?>
           
          </tbody>
        </table>

      </div>
    </div>
      </div>
    </div>
  
    <!-- div container fluid last div -->
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
