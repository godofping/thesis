
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
        <h2><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive"> Student's Profile Data</h2>
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

            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from list_student_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['StudentID']; ?></td> 
              <td scope="row"><?php echo $res['lname'] ." ". $res['fname']; ?></td>
              <td scope="row"><?php echo $res['address']; ?></td>
              <td scope="row"><?php echo $res['email']; ?></td>
              <td scope="row"><?php echo $res['contactnum']; ?></td>
              <td scope="row"><?php echo $res['birthday']; ?></td>
              <td scope="row"><?php echo $res['gender']; ?></td>
              <td scope="row"><?php echo $res['CourseName']; ?></td>
           

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />


<script type="text/javascript">
  
  $(document).ready(function () {
    $('#dtBasicExample').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csv',
                className: 'btn btn-outline btn-sm',
                text: 'Save to CSV',
            },
            {
                extend: 'excel',
                className: 'btn btn-outline btn-sm',
                text: 'Save to Excel',
            },
            {
                extend: 'print',
                className: 'btn btn-outline btn-sm',
                text: 'Print Table',
            },
            {
                extend: 'pdf',
                className: 'btn btn-outline btn-sm',
                text: 'Save to PDF',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
                extend: 'copy',
                className: 'btn btn-outline btn-sm',
                text: 'Copy to clipboard',
            }
        ]
    });
    $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        $('input').attr("placeholder", "Search");
        $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
</script>