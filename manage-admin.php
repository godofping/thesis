
<?php include('header.php');
$currentpage = "dsa";
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

        <h2 style="font-family: Times New Roman"><i class="fas fa-user-tie"></i> ADMIN ACCOUNT</h2>
        <hr>

      </div>
    </div>
    
<div class="container-fluid ">
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4">

    <div class="mt-2 z-depth-5">
      
      <!-- Default form login -->
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <div class="row">
            <div class="col-12">
              <h2><i class="fas fa-user-plus"></i> ADMIN ACCOUNT</h2>
              <hr>
              <?php if (isset($_GET['status']) and $_GET['status'] == 'register-admin-failed'): ?>
                    <div class="alert alert-danger" role="alert">
                    Username already Exist!
                  </div>
                  <?php endif ?>
              <div class="md-form">
              <input type="text" name="username" id="inputMDEx" class="form-control md-4" required="">
              <label for="inputMDEx">Admin Username</label>
              </div>
               <div class="md-form">
              <input type="text" name="password" id="inputMDEx2" class="form-control md-4" required="">
              <label for="inputMDEx2">Admin Password</label>
              </div>
            </div> 

          </div>
           
          <button type="submit" class="btn aqua-gradient"><i class="fas fa-plus"></i> Add</button>

          <input type="text" name="from" value="add-admin-account" hidden>   
      </form>
      <!-- Default form login -->

    </div>
    </div>
  </div>
<div class="col-md-4"></div>

      <div class="col-md-12">
        <div class="mt-5">
        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Admin Username</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from admin_account_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['username']; ?></td>
              <td><button class="btn blue-gradient" data-toggle="modal" data-target="#editModal<?php echo $res['adminID'] ?>"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['adminID'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

             <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['adminID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><ELEMENT></ELEMENT>Edit Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

               
                      <small>Username</small>
                      <input type="text" name="username" class="form-control mb-2" required="" value="<?php echo $res['username'] ?>">

                      <small>Password</small>
                      <input type="text" name="password" class="form-control mb-4" required="" value="<?php echo $res['password'] ?>">
            

                      <input type="text" name="adminID" value="<?php echo $res['adminID'] ?>" hidden>
                      <input type="text" name="from" value="edit-admin-account" hidden>


                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn aqua-gradient"><i class="far fa-edit"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <?php 

              $qryaccount =  mysqli_query($connection, "select * from admin_account_table where adminID = '".$_SESSION['adminID']."' ");
              $resultaccount = mysqli_fetch_assoc($qryaccount);

              $adminid = $resultaccount['adminID'];
             ?>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['adminID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" id="deleteform" method="POST" action="controller.php" autocomplete="false">

                    <div class="row">
                      <div class="col-12">
                        <h5 style="text-align: center;">Are you sure to delete <br><?php echo $res['username'];?><br>from being Admin ?</h5>
                      </div>
                    </div>
                    
                    <small style="text-align: center;">Reminder: You can't delete your own Account</small>

                    <input type="text" name="adminID" value="<?php echo $res['adminID'] ?>" hidden>
                    <input type="text" name="from" value="delete-admin-account" hidden>

                  </div>
                  <div class="modal-footer">
                    <?php 
                       if ($adminid == $res['adminID']): ?>
                        <button type="submit" class="btn btn-danger" disabled="">Yes</button>
                      <?php endif ?>
                    <?php 
                       if ($adminid != $res['adminID']): ?>
                        <button type="submit" class="btn btn-danger">Yes</button>
                      <?php endif ?>
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
  
    <!-- div container fluid last div -->
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