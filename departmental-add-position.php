
<?php include('header.php');
$currentpage = "venue";
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

        <h2><b>Departmental Club</b></h2>
        <h5>Position</h5>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient itogglebutton" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD Departmental Position</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                 <div class="row">
                  <div class="col-12">
                      
                  <small>Position Name</small>
                  <input type="text" name="positionNameDP" class="form-control mb-4" required="">

                </div>
                </div>
                  <input type="text" name="from" value="add-deparmental-position" hidden>
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
  


    <div class="row mt-5">
      <div class="col-md-12 z-depth-5">

        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample" >
          <thead>
            <tr>
              <th scope="col">Position Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from departmental_position_table ");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo $res['positionNameDP']; ?></th> 
              <td><button class="btn aqua-gradient itogglebutton" data-toggle="modal" data-target="#editModal<?php echo $res['positionIDdepartmental'] ?>"><i class="far fa-edit"></i></button> <button class="btn btn-danger itogglebutton" data-toggle="modal" data-target="#deleteModal<?php echo $res['positionIDdepartmental'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['positionIDdepartmental'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

               
                      <small>Position Name</small>
                      <input type="text" name="positionNameDP" class="form-control mb-4" required="" value="<?php echo $res['positionNameDP'] ?>">
                      <input type="text" name="positionIDdepartmental" value="<?php echo $res['positionIDdepartmental'] ?>" hidden>
                      <input type="text" name="from" value="edit-deparmental-position-name" hidden>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn aqua-gradient itogglebutton"><i class="far fa-edit"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['positionIDdepartmental'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                    <div class="row">
                      <div class="col-12">
                        <h5 align="Center">Do you want to remove <?php echo $res['positionNameDP'] ?> ?</h5>
                      </div>
                    </div>
                    <input type="text" name="positionIDdepartmental" value="<?php echo $res['positionIDdepartmental'] ?>" hidden>
                    <input type="text" name="from" value="delete-deparmental-position" hidden>


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