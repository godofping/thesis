
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

        <h2>Social Clubs</h2>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus "></i> ADD SOCIAL CLUB</button>

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
           
                  <label>Social Club Name</label>
                  <input type="text" name="socialClubName" class="form-control mb-4" required="">

                  <label>Social Club Code</label>
                  <input type="text" name="socialClubcode" class="form-control mb-4" required="">

                  <input type="text" name="from" value="add-social-club" hidden>              

              </div>
              <div class="modal-footer">
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
              <th scope="col">Social Club Code</th>
              <th scope="col">Social Club Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from social_club_view order by socialClubName asc");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['socialClubcode']; ?></td>
              <td scope="row"><?php echo $res['socialClubName']; ?></td>
              <td><!-- <a href="list-of-officers-social.php?from=checkIDforsocialofficer&socialClubId=<?php echo $res['socialClubId']; ?>"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a> --><button class="btn aqua-gradient" data-toggle="modal" data-target="#editModal<?php echo $res['socialClubId'] ?>"><i class="far fa-edit"></i></button><!-- <a href="list-of-members-social.php?from=checkIDforsocialmember&socialClubId=<?php echo $res['socialClubId']; ?>"><button type="button" class="btn peach-gradient"><i class="fas fa-users"></i> Members</button></a> --><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['socialClubId'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['socialClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit <?php echo $res['socialClubcode']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <label>Social Club Name</label>
                  <input type="text" name="socialClubName" class="form-control mb-4" required="" value="<?php echo $res['socialClubName'] ?>">

                  <label>Social Club Code</label>
                  <input type="text" name="socialClubcode" class="form-control mb-4" required="" value="<?php echo $res['socialClubcode'] ?>">

                  <input type="text" name="socialClubId" value="<?php echo $res['socialClubId'] ?>" hidden>
                  <input type="text" name="from" value="edit-social-name" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn aqua-gradient"><i class="fas fa-check"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['socialClubId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <h5 style="text-align: center;">Do you want to remove<br><?php echo $res['socialClubName']; ?></h5>
                      </div>
                    </div>

                  <input type="text" name="socialClubId" value="<?php echo $res['socialClubId'] ?>" hidden>
                  <input type="text" name="from" value="delete-social-name" hidden>

                  </div>
                  <div class="modal-footer">
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
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>
