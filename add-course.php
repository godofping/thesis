
<?php include('header.php');
$currentpage = "courses";
if (!isset($_SESSION['adminId'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>



<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2>Courses</h2>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

        <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD COURSE</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD COURSE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <?php if (isset($_GET['status']) and $_GET['status'] == 'login-failed'): ?>
                    <div class="alert alert-danger" role="alert">
                    Login Failed!
                  </div>
                  <?php endif ?>
           
                  <label>Course Name</label>
                  <input type="text" name="courseName" class="form-control mb-4" required="">

                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
              
                      <select class="form-control" name="CounID" required="">
                        <option selected="" disabled="">Select Council</option>
                        
                        <?php 

                          $qry = mysqli_query($connection, "select * from council_table");

                          while ($res = mysqli_fetch_assoc($qry)) { ?>
                            <option value="<?php echo $res['CounID']; ?>"><?php echo $res['CounName']; ?></option>
                         <?php }

                         ?>


                      </select>
               
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
              
                      <select class="form-control" name="departmentId" required="">
                        <option selected="" disabled="">Select Department</option>
                        
                        <?php 

                          $qry = mysqli_query($connection, "select * from departmental_club_table");

                          while ($res = mysqli_fetch_assoc($qry)) { ?>
                            <option value="<?php echo $res['departmentClubId']; ?>"><?php echo $res['departmentClubName']; ?></option>
                         <?php }

                         ?>

                      </select>
               
                      </div>
                    </div>
                  </div>

                  <input type="text" name="from" value="add-course" hidden>              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  


    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Course Name</th>
              <th scope="col">Council</th>
              <th scope="col">Department Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from course_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo $res['CourseName']; ?></th> 
              <th scope="row"><?php echo $res['CounName']; ?></th>
              <th scope="row"><?php echo $res['departmentClubName']; ?></th>
              <td><button class="btn btn-secondary" data-toggle="modal" data-target="#editModal<?php echo $res['CourseID'] ?>">Edit</button> <button class="btn btn-secondary" data-toggle="modal" data-target="#deleteModal<?php echo $res['CourseID'] ?>">Delete</button></td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['CourseID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

               
                      <label>Course Name</label>
                      <input type="text" name="courseName" class="form-control mb-4" required="" value="<?php echo $res['CourseName'] ?>">

                      <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                
                        <select class="form-control" name="CounID" required="">
                          <option selected="" readonly="" value="<?php echo $res['CounID'];?>"><?php echo $res['CounName']; ?></option>    
                          <?php 

                            $qry1 = mysqli_query($connection, "select * from council_table");

                            while ($res2 = mysqli_fetch_assoc($qry1)) { ?>
                              <option value="<?php echo $res2['CounID']; ?>"><?php echo $res2['CounName']; ?></option>
                           <?php }

                           ?>

                        </select>
                 
                        </div>
                      </div>
                    </div>

                    <select class="form-control" name="departmentId" required="">
                        <option selected="" value="<?php echo $res['departmentClubId']; ?>"><?php echo $res['departmentClubName']; ?></option>
                        
                        <?php 

                          $qry2 = mysqli_query($connection, "select * from departmental_club_table");

                          while ($res3 = mysqli_fetch_assoc($qry2)) { ?>
                            <option value="<?php echo $res3['departmentClubId']; ?>"><?php echo $res3['departmentClubName']; ?></option>
                         <?php }

                         ?>

                      </select>



                  <input type="text" name="courseID" value="<?php echo $res['CourseID'] ?>" hidden>
                  <input type="text" name="from" value="edit-course-name" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['CourseID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                    <label>Course Name</label>
                      <input type="text" name="courseName" class="form-control mb-4" required="" value="<?php echo $res['CourseName'] ?>">

                  <input type="text" name="courseID" value="<?php echo $res['CourseID'] ?>" hidden>
                  <input type="text" name="from" value="delete-course-name" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
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
  
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>
<!-- id="dtBasicExample" -->
<!-- <script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script> -->