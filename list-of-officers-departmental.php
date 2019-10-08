
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
        <?php 
          if (isset($_GET['from']) and $_GET['from'] == 'checkIDfordepartmentofficer') {
          $qryid = mysqli_query($connection, "select * from departmental_club_view where departmentClubId = '".$_GET['departmentClubId']."' ");
          $resid = mysqli_fetch_assoc($qryid);
          $departmentD = $resid['departmentClubId'];
          $departmentName = $resid['departmentClubName'];
          }         
         ?>
        <h2><?php echo $departmentName; ?></h2>
        <h5>Officers</h5>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <button  class="btn blue-gradient" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD officer</button>

        <?php 

                    $qrys = mysqli_query($connection, "select * from list_student_view where departmentClubId = '".$resid['departmentClubId']."' ");
                    $ress = mysqli_fetch_assoc($qrys);

                    $dpID = $ress['departmentClubId'];
                   ?>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class=" p-2" method="GET" action="controller.php" autocomplete="false">
           
                  <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Student Name</small>
                      <select class="form-control" name="stprofID" id="allstudent" required="">
                        <?php $qryname = mysqli_query($connection, "select * from list_student_view where departmentClubId = '".$resid['departmentClubId']."' order by lname asc");
                        while ($resname = mysqli_fetch_assoc($qryname)) { ?>
                          <?php echo '<option value="'.$resname['stprofID'].'">'.$resname['lname'] ." ". $resname['fname'] ." ". $resname['mname'].'</option>'; ?>
                        <?php } ?>
                      </select>

                      </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Position</small>
                      <select class="form-control" name="positionIDdepartmental" id="cscposition" required="">
                       <?php 

                          $qryposition = mysqli_query($connection, "select * from departmental_position_table order by (positionNameDP +0) asc, positionNameDP asc");

                          while ($resposition = mysqli_fetch_assoc($qryposition)) { ?>
                            <option value="<?php echo $resposition['positionIDdepartmental']; ?>"><?php echo $resposition['positionNameDP']; ?></option>
                         <?php }

                         ?>
                      </select>

                      </div>
                </div>
                </div>

                <small>Can Creat Announcement</small>
                <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <select class="form-control" name="perpost" required="">
                        <option selected="" disabled=""></option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
               
                      </div>
                    </div>
                  </div>

                  <input type="text" name="departmentClubId" value="<?php echo $dpID;?>" hidden>
                  <input type="text" name="from" value="add-departmental-officer" hidden>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn aqua-gradient">Add</button>
                </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5 indigo lighten-5">
      <div class="col-md-12 z-depth-2">

        <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Position</th>
              <th scope="col">Student Name</th>
              <th scope="col">Permission</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $qry = mysqli_query($connection, "select * from departmental_officersandmembers_view where departmentClubId = '".$resid['departmentClubId']."' ");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo $res['positionNameDP']; ?></th> 
              <th scope="row"><?php echo $res['lname'] ." ". $res['mname'] ." ". $res['fname']; ?></th>
              <th scope="row"><?php echo $res['perpost']; ?></th>
              <td><button class="btn aqua-gradient" data-toggle="modal" data-target="#editModal<?php echo $res['departmentmemID'] ?>"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['stprofID'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

          <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['departmentmemID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="GET" action="controller.php" autocomplete="false">

               
                        <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                          <small>Student Name</small>
                          <select class="form-control" name="stprofID" id="allstudentedit<?php echo $res['departmentmemID']?>" required="">
                            <?php $qry1 = mysqli_query($connection, "select * from list_student_view where departmentClubId = '".$resid['departmentClubId']."' order by lname asc");
                            while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                              <?php echo '<option value="'.$res1['stprofID'].'">'.$res1['lname'] ." ". $res1['fname'] ." ". $res1['mname'].'</option>'; ?>
                            <?php } ?>
                          </select>

                          </div>
                    </div>
                    </div>

                    <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Position</small>
                      <select class="form-control" name="positionIDdepartmental" id="cscpositionedit<?php echo $res['departmentmemID'] ?>" required="">
                        <?php 

                          $qry2 = mysqli_query($connection, "select * from departmental_position_table order by (positionNameDP +0) asc, positionNameDP asc");

                          while ($res2 = mysqli_fetch_assoc($qry2)) { ?>
                            <option value="<?php echo $res2['positionIDdepartmental']; ?>"><?php echo $res2['positionNameDP']; ?></option>
                         <?php }

                         ?>
                      </select>

                      </div>
                </div>
                </div>
                <small>Can Creat Announcement</small>
                <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <select class="form-control" name="perpost" required="">
                        <option selected="" disabled=""></option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
               
                      </div>
                    </div>
                  </div>
                    <input type="text" name="departmentmemID" value="<?php echo $res['departmentmemID'] ?>" hidden>
                    <input type="text" name="departmentClubId" value="<?php echo $dpID ?>" hidden>
                    <input type="text" name="from" value="edit-department-position" hidden>
                  
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn aqua-gradient"><i class="far fa-edit"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

              <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['stprofID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="GET" action="controller.php" autocomplete="false">

                    <div class="row">
                      <div class="col-12">
                        <h5 align="Center">Do you want to remove <?php echo "<br>". $res['lname'] ." ". $res['fname'] ." ". $res['mname'];  ?><br> from being <?php echo $res['positionNameDP'] ?> ?</h5>
                      </div>
                    </div>

                    <input type="text" name="departmentClubId" value="<?php echo $dpID ?>" hidden>
                    <input type="text" name="stprofID" value="<?php echo $res['stprofID'] ?>" hidden>
                    <input type="text" name="from" value="delete-department-position" hidden>
 
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


</main>
<!--Main Layout-->

<?php include('footer.php'); ?>

<script type="text/javascript">
  
$('#allstudent').editableSelect();

$('#cscposition').editableSelect();

<?php 
  $qry = mysqli_query($connection, "select * from departmental_officersandmembers_view where departmentClubId = '".$resid['departmentClubId']."'");
  while ($res = mysqli_fetch_assoc($qry)) { ?>
    $('#allstudentedit<?php echo $res['departmentmemID'] ?>').editableSelect();

    $('#cscpositionedit<?php echo $res['departmentmemID'] ?>').editableSelect();


<?php } ?>


</script>

