
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

    <div class="row mt-5 grey lighten-5 z-depth-2">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap">

        <table class="table" id="dtBasicExample">
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
              <td><a href="list-of-officers-social.php?from=checkIDforsocialofficer&socialClubId=<?php echo $res['socialClubId']; ?>"><button type="button" class="btn aqua-gradient"><i class="far fa-user"></i> Officers</button></a></td>

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
