
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
          if (isset($_GET['from']) and $_GET['from'] == 'checkIDforsocialofficer') {
          $qryid = mysqli_query($connection, "select * from social_club_view where socialClubId = '".$_GET['socialClubId']."' ");
          $resid = mysqli_fetch_assoc($qryid);
          $socialID = $resid['socialClubId'];
          $socialName = $resid['socialClubName'];
          }         
         ?>
        <h2><?php echo $socialName; ?></h2>
        <h5>Officers</h5>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD officer</button>

        <?php 

                    $qrys = mysqli_query($connection, "select * from list_social_club_view where socialClubId = '".$resid['socialClubId']."' ");
                    $ress = mysqli_fetch_assoc($qrys);

                    $socID = $ress['socialClubId'];
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
              
                      <select class="form-control" name="stprofID" required="">
                        <option selected="" disabled="">Select Student Name</option>
                        <?php $qryname = mysqli_query($connection," select * from list_social_club_view where socialClubId = '".$resid['socialClubId']."' order by lname asc");
                        while ($resname = mysqli_fetch_assoc($qryname)) { ?>
                          <option value="<?php echo $resname['stprofID']; ?>"><?php echo $resname['lname'] ." ". $resname['mname'] ." ". $resname['fname']; ?></option>
                        <?php } ?>
                      </select>

                      </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
              
                      <select class="form-control" name="positionID" required="">
                        <option selected="" disabled="">Select Position</option>
                       <?php 

                          $qryposition = mysqli_query($connection, "select * from club_position_table order by (positionName +0) asc, positionName asc");

                          while ($resposition = mysqli_fetch_assoc($qryposition)) { ?>
                            <option value="<?php echo $resposition['positionID']; ?>"><?php echo $resposition['positionName']; ?></option>
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

                 <input type="text" name="socialClubId" value="<?php echo $socID;?>" hidden>
                  <input type="text" name="from" value="add-social-officer" hidden>

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
            $qry = mysqli_query($connection, "select * from social_officerandmembers_view where socialClubId = '".$resid['socialClubId']."' ");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo $res['positionName']; ?></th> 
              <th scope="row"><?php echo $res['lname'] ." ". $res['mname'] ." ". $res['fname']; ?></th>
              <th scope="row"><?php echo $res['perpost']; ?></th>
              <td><button class="btn aqua-gradient" data-toggle="modal" data-target="#editModal<?php echo $res['socialoffID'] ?>"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['stprofID'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

              <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['socialoffID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  
                          <select class="form-control" name="stprofID" required="">
                            <option selected="" readonly="" value="<?php echo $res['stprofID']; ?>"><?php echo $res['lname'] ." ". $res['mname'] ." ". $res['fname']; ?></option>
                            <?php $qry1 = mysqli_query($connection, " select * from list_social_club_view where socialClubId = '".$resid['socialClubId']."' order by lname asc");
                            while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                              <option value="<?php echo $res1['stprofID']; ?>"><?php echo $res1['lname'] ." ". $res1['mname'] ." ". $res1['fname'];  ?></option>
                            <?php } ?>
                          </select>

                          </div>
                    </div>
                    </div>

                    <div class="row">
                  <div class="col-12">
                      <div class="form-group">
              
                      <select class="form-control" name="positionID" required="">
                        <option selected="" readonly="" value="<?php echo $res['positionID']; ?>"><?php echo $res['positionName']; ?></option>
                        <?php 

                          $qry2 = mysqli_query($connection, "select * from club_position_table order by (positionName +0) asc, positionName asc");

                          while ($res2 = mysqli_fetch_assoc($qry2)) { ?>
                            <option value="<?php echo $res2['positionID']; ?>"><?php echo $res2['positionName']; ?></option>
                         <?php }

                         ?>
                      </select>

                      </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <select class="form-control" name="perpost" required="">
                        <option selected=""><?php echo $res['perpost']; ?></option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
               
                      </div>
                    </div>
                  </div>
                    <input type="text" name="socialoffID" value="<?php echo $res['socialoffID'] ?>" hidden>
                    <input type="text" name="socialClubId" value="<?php echo $socID;?>" hidden>
                    <input type="text" name="from" value="edit-social-position" hidden>                  
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
                        <h5 align="Center">Are you sure to Remove <?php echo "<br>". $res['lname'] ." ". $res['mname'] ." ". $res['fname'];  ?><br> from being a<br> <?php echo $res['positionName'] ?> ?</h5>
                      </div>
                    </div>

                    <input type="text" name="socialClubId" value="<?php echo $socID;?>" hidden>
                    <input type="text" name="stprofID" value="<?php echo $res['stprofID'] ?>" hidden>
                    <input type="text" name="from" value="delete-social-position" hidden> 
 
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


<!-- <style>
.addofficer {
addofficer
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style> -->