
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

        <h2>Nursing Council</h2>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

        <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD Nursing officer</button>

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
                <form class=" p-2" method="POST" action="controller.php" autocomplete="false">
           
                  <div class="row">
                  <div class="col-12">
                      <div class="form-group">
              
                      <select class="form-control" name="stprofID" required="">
                        <option selected="" disabled="">Select Student Name</option>
                        <?php $qry = mysqli_query($connection, "select * from list_student_view order by fname asc");
                        while ($res = mysqli_fetch_assoc($qry)) { ?>
                          <option value="<?php echo $res['stprofID']; ?>"><?php echo $res['fname']; ?></option>
                        <?php } ?>
                      </select>

                      </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
              
                      <select class="form-control" name="nursingposition" required="">
                        <option selected="" disabled="">Select Position</option>
                        <option>Mayor</option>
                        <option>Vice Mayor</option>
                        <option>Secrectary</option>
                        
                      </select>

                      </div>
                </div>
                </div>

                  <?php 

                    $qrys = mysqli_query($connection, "select * from council_table where CounID = '1' ");
                    $res1 = mysqli_fetch_assoc($qrys);

                    $councilID = $res1['CounID'];
                   ?>
                  <input type="text" name="CounID" value="<?php echo $councilID;?>" hidden>
                  <input type="text" name="from" value="add-cased-member" hidden>

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
              <th scope="col">Position</th>
              <th scope="col">Student Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
    
            <?php 
            $qry = mysqli_query($connection, "select * from council_view where CounID = '3'");
           $res = mysqli_fetch_assoc($qry);
            ?>
             <?php if ($res['fname'] != ""): ?>
            <tr>
              <td scope="row"><?php echo $res['position'];?></td>
              <td><?php echo $res['fname'];?></td>
              <td><button class="btn btn-secondary" >Edit</button> <button class="btn btn-secondary">Delete</button></td> 

            </tr>
          <?php endif ?> 

           
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


