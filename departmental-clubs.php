
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

        <h2>Departmental Clubs</h2>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD DEPARTMENT CLUB</button>
       
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn aqua-gradient">Add</button>
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
              <td><!-- <a href="list-of-officers-departmental.php?from=checkIDfordepartmentofficer&departmentClubId=<?php echo $res['departmentClubId']; ?>"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> --><a href="list-of-members-departmental.php?from=checkIDfordepartmentmember&departmentClubId=<?php echo $res['departmentClubId']; ?>"><button type="button" class="btn peach-gradient"><i class="fas fa-users"></i> Members</button></a></td> 
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