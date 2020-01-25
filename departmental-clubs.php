
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

        <h2><b>Departmental Clubs</b></h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient itogglebutton" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD DEPARTMENT CLUB</button>
       
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Departmental Club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
           
                  <label>Department Club Name</label>
                  <input type="text" name="departmentClubName" class="form-control mb-4" required="">

                  <label>Department Club Code</label>
                  <input type="text" name="departmentcode" class="form-control mb-4" required="">

                  <input type="text" name="from" value="add-department-club" hidden>


              </div>
              <div class="modal-footer">
                <button type="submit" class="btn aqua-gradient itogglebutton">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  
    <div class="row mt-5 grey lighten-5 z-depth-2">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Department Club Code</th>
              <th scope="col">Department Club Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from departmental_club_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['departmentcode']; ?></td>
              <td scope="row"><?php echo $res['departmentClubName']; ?></td>
              <td><!-- <a href="list-of-officers-departmental.php?from=checkIDfordepartmentofficer&departmentClubId=<?php echo $res['departmentClubId']; ?>"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> --><!-- <a href="list-of-members-departmental.php?from=checkIDfordepartmentmember&departmentClubId=<?php echo $res['departmentClubId']; ?>"><button type="button" class="btn peach-gradient"><i class="fas fa-users"></i> Members</button></a> --><button class="btn aqua-gradient itogglebutton" data-toggle="modal" data-target="#editModal<?php echo $res['departmentClubId'] ?>"><i class="far fa-edit"></i></button><button class="btn btn-danger itogglebutton" data-toggle="modal" data-target="#deleteModal<?php echo $res['departmentClubId'] ?>"><i class="far fa-trash-alt"></i></button></td> 
            </tr>   

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['departmentClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit <?php echo $res['departmentcode']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <label>Department Club Name</label>
                  <input type="text" name="departmentClubName" class="form-control mb-4" required="" value="<?php echo $res['departmentClubName'] ?>">

                  <label>Department Club Code</label>
                  <input type="text" name="departmentcode" class="form-control mb-4" required="" value="<?php echo $res['departmentcode'] ?>">

                  <input type="text" name="departmentClubId" value="<?php echo $res['departmentClubId'] ?>" hidden>
                  <input type="text" name="from" value="edit-dp-name" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn aqua-gradient itogglebutton"><i class="fas fa-check"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['departmentClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                      <div class="row">
                      <div class="col-12">
                        <h5 style="text-align: center;">Do you want to remove<br><?php echo $res['departmentClubName']; ?></h5>
                      </div>
                    </div>

                  <input type="text" name="departmentClubId" value="<?php echo $res['departmentClubId'] ?>" hidden>
                  <input type="text" name="from" value="delete-dp-name" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger itogglebutton">Yes</button>
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

<style type="text/css">
  .itogglebutton{
  border-radius: 12px;
}
</style>