
<?php include('header.php');
$currentpage = "clubs";
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

        <h2>Social Clubs</h2>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

        <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD SOCIAL CLUB</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Modal</h5>
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
           
                  <label>Social Club Name</label>
                  <input type="text" name="socialClubName" class="form-control mb-4" required="">

                  <input type="text" name="from" value="add-social-club" hidden>              

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
              <th scope="col">Club Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from social_club_view order by socialClubName asc");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['socialClubName']; ?></td>
              <td><a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#lisoofficer<?php echo $res['socialClubId'] ?>">List of Officers</a> <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#registernewofficer<?php echo $res['socialClubId'] ?>">Register Officers</a> <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#registernewofficer<?php echo $res['socialClubId'] ?>">List of Members</a></td>

            </tr>

            <div class="modal fade" id="lisoofficer<?php echo $res['socialClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">          
          <div class="modal-content">
            <div class="modal-c-tabs">
              <ul class="nav nav-tabs md-tabs tabs-2 white" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                    List of Officers</a>
                </li>
              </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            
            <!--Body-->
            <div class="modal-body mb-1">
              <h10><?php echo $res['socialClubName'] ?></h10>

              <?php 
               $qry1 = mysqli_query($connection, "select * from social_officerandmembers_view where socialClubId = '". $res['socialClubId'] ."' and position = 'Mayor'");
               $res1 = mysqli_fetch_assoc($qry1);
               ?>
              <?php if ($res1['fname'] != "");?>    
              <div class="md-form">
              <input type="text" id="inputDisabledEx" class="form-control" disabled value="<?php echo $res1['fname'] ?>">
              <label for="inputDisabledEx" class="disabled">Mayor</label>
              </div>

              <?php 
               $qry1 = mysqli_query($connection, "select * from social_officerandmembers_view where socialClubId = '". $res['socialClubId'] ."' and position = 'Vice Mayor'");
               $res1 = mysqli_fetch_assoc($qry1);
               ?>
              <?php if ($res1['fname'] != "");?> 
              <div class="md-form">
              <input type="text" id="inputDisabledEx" class="form-control" disabled value="<?php echo $res1['fname'] ?>">
              <label for="inputDisabledEx" class="disabled">Vice Mayor</label>
              </div>

              <?php 
               $qry1 = mysqli_query($connection, "select * from social_officerandmembers_view where socialClubId = '". $res['socialClubId'] ."' and position = 'Treasurer'");
               $res1 = mysqli_fetch_assoc($qry1);
               ?>
              <?php if ($res1['fname'] != "");?> 
              <div class="md-form">
              <input type="text" id="inputDisabledEx" class="form-control" disabled value="<?php echo $res1['fname'] ?>">
              <label for="inputDisabledEx" class="disabled">Treasurer</label>
              </div>

              <?php 
               $qry1 = mysqli_query($connection, "select * from social_officerandmembers_view where socialClubId = '". $res['socialClubId'] ."' and position = 'Secrectary'");
               $res1 = mysqli_fetch_assoc($qry1);
               ?>
              <?php if ($res1['fname'] != "");?> 
              <div class="md-form">
              <input type="text" id="inputDisabledEx" class="form-control" disabled value="<?php echo $res1['fname'] ?>">
              <label for="inputDisabledEx" class="disabled">Secrectary</label>
              </div>
             
            </div>
            <!--Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
          <!--/.Panel 7-->

          
              </div>

              </div>
          </div>
    <!--/.Content-->
          </div>
          </div>

           <div class="modal fade" id="registernewofficer<?php echo $res['socialClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog cascading-modal" role="document">          
          <div class="modal-content">
            <div class="modal-c-tabs">
              <ul class="nav nav-tabs md-tabs tabs-2 white" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user-plus mr-1"></i>
                    Register Officers</a>
                </li>
              </ul>

        <!-- Tab panels -->
          <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <!--Body-->
            <div class="modal-body mb-1">
            <label><?php echo $res['socialClubName'] ?></label>
             
              
              <div class="row">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
                  <div class="col-12">
                      <div class="form-group">

                      <div class="md-form">
                      <select class="form-control" name="stMayorIDsocial" required="">
                        <option selected="" disabled="">Select Mayor</option>
                        <?php $qryforRegister = mysqli_query($connection, "select * from list_social_club_view  where socialClubId = '".$res['socialClubId']."' order by fname asc");
                        while ($resforRegister = mysqli_fetch_assoc($qryforRegister)) { ?>
                          <option value="<?php echo $resforRegister['stprofID']; ?>"><?php echo $resforRegister['fname']; ?></option>
                        <?php } ?>
                      </select>
                      </div>

                       <div class="md-form">
                      <select class="form-control" name="stVMayorIDsocial" required="">
                        <option selected="" disabled="">Select Vice Mayor</option>
                        <?php $qryforRegister = mysqli_query($connection, "select * from list_social_club_view  where socialClubId = '".$res['socialClubId']."' order by fname asc");
                        while ($resforRegister = mysqli_fetch_assoc($qryforRegister)) { ?>
                          <option value="<?php echo $resforRegister['stprofID']; ?>"><?php echo $resforRegister['fname']; ?></option>
                        <?php } ?>
                      </select>
                      </div>

                       <div class="md-form">
                      <select class="form-control" name="stTreasurerIDsocial" required="">
                        <option selected="" disabled="">Select Treasurer</option>
                       <?php $qryforRegister = mysqli_query($connection, "select * from list_social_club_view  where socialClubId = '".$res['socialClubId']."' order by fname asc");
                        while ($resforRegister = mysqli_fetch_assoc($qryforRegister)) { ?>
                          <option value="<?php echo $resforRegister['stprofID']; ?>"><?php echo $resforRegister['fname']; ?></option>
                        <?php } ?>
                      </select>
                      </div>

                       <div class="md-form">
                      <select class="form-control" name="stSecrectaryIDsocial" required="">
                        <option selected="" disabled="">Select Secrectary</option>
                        <?php $qryforRegister = mysqli_query($connection, "select * from list_social_club_view  where socialClubId = '".$res['socialClubId']."' order by fname asc");
                        while ($resforRegister = mysqli_fetch_assoc($qryforRegister)) { ?>
                          <option value="<?php echo $resforRegister['stprofID']; ?>"><?php echo $resforRegister['fname']; ?></option>
                        <?php } ?>
                      </select>
                      </div>
             
                </div>
                </div>

                  <input type="text" name="socialClubId" value="<?php echo $res['socialClubId'] ?>" hidden>
                  <input type="text" name="from" value="register-social-officer" hidden>

             
            </div>
            <!--Footer-->
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-info">Register</button>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
          </form>
          <!--/.Panel 7-->

          
             </div>
            </div>
          </div>
    <!--/.Content-->
          </div>
          </div>
          </div>


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
