
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
              <td><a href="list-of-officers-social.php?from=checkIDforsocialofficer&socialClubId=<?php echo $res['socialClubId']; ?>"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a><a href="list-of-members-social.php?from=checkIDforsocialmember&socialClubId=<?php echo $res['socialClubId']; ?>"><button type="button" class="btn peach-gradient"><i class="fas fa-users"></i> Members</button></a></td>

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
