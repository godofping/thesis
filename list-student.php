
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
        <h2><i class="fas fa-users"></i> List of Students</h2>
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
              <th scope="col">Address</th>
              <th scope="col">Email</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Birthday</th>
              <th scope="col">Gender</th>
              <th scope="col">Course</th>
              <th scope="col">Council</th>
              <th scope="col">Departmental Club</th>
              <th scope="col">Social Club</th>
              <!-- <th scope="col">Actions</th> -->

            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from list_student_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['StudentID']; ?></td> 
              <td scope="row"><?php echo $res['lname'] ." ". $res['fname'] ." ". $res['mname']; ?></td>
              <td scope="row"><?php echo $res['address']; ?></td>
              <td scope="row"><?php echo $res['email']; ?></td>
              <td scope="row"><?php echo $res['contactnum']; ?></td>
              <td scope="row"><?php echo $res['birthday']; ?></td>
              <td scope="row"><?php echo $res['gender']; ?></td>
              <td scope="row"><?php echo $res['CourseName']; ?></td>
              <td scope="row"><?php echo $res['CounName']; ?></td>
              <td scope="row"><?php echo $res['departmentClubName']; ?></td>
              <td scope="row">
                <ul>
                <?php 

                  $qry1 = mysqli_query($connection, "select * from student_social_club_view where stprofID = '".$res['stprofID']."'");
                  while($res1 = mysqli_fetch_assoc($qry1)){ ?>
                   <li>
                    <?php echo $res1['socialClubName']; ?>
                  </li>

                 <?php }

                 ?>
                 
                </ul>

              </td>
              <!-- <td><button class="btn btn-secondary" data-toggle="modal" data-target="#editModal<?php echo $res['stprofID'] ?>">Edit</button> <button class="btn btn-secondary" data-toggle="modal" data-target="#deleteModal">Delete</button></td> -->

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['stprofID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                    <?php 

                        $qrystudent = mysqli_query($connection, " select * from studentprofile_table where stprofID = '".$res['stprofID']."' ");
                        $resultstudent = mysqli_fetch_assoc($qrystudent);
                     ?>

                  <div class="form-row mb-2">
                  <div class="col">
                  <small>First Name</small>
                  <input type="text" name="fname" class="form-control md-4" required="" value="<?php echo $resultstudent['fname'] ?>">
                  </div>
                  <div class="Tribe">
                  <small>Middle Name</small>
                  <input type="text" name="mname" class="form-control md-4" required="" value="<?php echo $resultstudent['mname'] ?>"> 
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Last Name</small>
                  <input type="text" name="lname" class="form-control md-4" required="" value="<?php echo $resultstudent['lname'] ?>">
                  </div>
                  </div>
                  </div>
                  
                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Address</small>
                  <input type="text" name="address" class="form-control md-4" required="" value="<?php echo $resultstudent['address'] ?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Email Address</small>
                  <input type="email" name="email" class="form-control md-4" required="" value="<?php echo $resultstudent['email'] ?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Parents/Guardian Name</small>
                  <input type="text" name="pandg" class="form-control md-4" required="" value="<?php echo $resultstudent['pandg'] ?>">
                  </div>
                  </div>
                  </div>

                  <div class="form-row mb-2">
                  <div class="col">
                  <small>Religion</small>
                  <input type="text" name="religion" class="form-control md-4" required="" value="<?php echo $resultstudent['religion'] ?>">
                  </div>
                  <div class="Tribe">
                  <small>Tribe</small>
                  <input type="text" name="tribe" class="form-control md-4" required="" value="<?php echo $resultstudent['tribe'] ?>"> 
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <div class="form-group">
                  <small>Contact Number</small>
                  <input type="text" name="contractnum" class="form-control md-4" required="" value="<?php echo $resultstudent['contactnum'] ?>">
                  </div>
                  </div>
                  </div>

                  <small>Your Birthdate</small>
                  <div class="row">
                
                    <div class="col-12">
                      
                      <div class="form-group">
                        <input type="date" name="birthday" class="form-control" required="" value="<?php echo $resultstudent['birthday'] ?>">
                      </div>
                    </div>
                  </div>
                 
                  <small>Select you Sex</small>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      
                      <select class="form-control" name="gender" required="">
                        <option selected="" disabled="" value="<?php echo $resultstudent['stprofID'] ?>"><?php echo $resultstudent['gender'] ?></option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
               
                      </div>
                    </div>
                  </div>

                  <div class="row">
                <div class="col-12">
                <div class="form-group">
                 <small>Select Course</small>
                <select class="form-control" name="CourseID" required="">
                  <option selected="" disabled="" value="<?php echo $res['CourseID'] ?>"><?php echo $res['CourseName']; ?></option>
                  <?php $qry3 = mysqli_query($connection, "select * from course_table");
                  while ($resultcourse = mysqli_fetch_assoc($qry3)) { ?>
                    <option value="<?php echo $resultcourse['CourseID']; ?>"><?php echo $resultcourse['CourseName']; ?></option>
                  <?php } ?>
                </select>
                </div>
                </div>
                </div>

                <input type="text" name="stprofID" value="<?php echo $res['stprofID'] ?>" hidden>
                  <input type="text" name="from" value="edit-studnet-admin" hidden>

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
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>