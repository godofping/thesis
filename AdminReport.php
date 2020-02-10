
<?php include('header.php');
$currentpage = "reports";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>


<body>
  <div class="db">
<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2><b>Official Reports</b></h2>
        <hr>

      </div>
    </div>


  <div class="row">
      <div class="col-md-12">

    
  
    <div class="row mt-5 z-depth-2 table-radius">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          
            <tr>
              <td scope="row"><b>Student's Profile Data</b></td>
              <td><a href="studentdata.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row"><b>Central Student Council Officers</b></td>
              <td><a href="csc-officer-reports.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>

            <tr>
              <td scope="row"><b>Department Councils</b></td>
              <td><button class="btn  btn-info btn-rad" data-toggle="modal" data-target="#viewcouncil"><i class="fas fa-file-export"></i>  Report</button> <!-- Modal -->
              <div class="modal fade" id="viewcouncil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Select Department Councils</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <?php 
                      $qry = mysqli_query($connection, "select * from council_table where CounID = '1'");
                      $res = mysqli_fetch_assoc($qry);
                      $cased = $res['CounID'];
                      $qry1 = mysqli_query($connection, "select * from council_table where CounID = '2'");
                      $res1 = mysqli_fetch_assoc($qry1);
                      $business = $res1['CounID'];
                      $qry2 = mysqli_query($connection, "select * from council_table where CounID = '3'");
                      $res2 = mysqli_fetch_assoc($qry2);
                      $nursing = $res2['CounID'];
                      ?>
                      <label><b style="text-align: center;"> CAS-ED Council</b></label>
                      <div align="center">
                      <a href="councilReportOfficers.php?from=checkIDfordepartmentreportr&CounID=<?php echo $cased?>&officer"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Officers</button></a><a href="councilReport.php?from=checkIDfordepartmentreportr&CounID=<?php echo $cased?>&member"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Members</button></a>
                      </div>
                      <label><b style="text-align: center;"> CBTV Council</b></label>
                      <div align="center">
                      <a href="councilReportOfficers.php?from=checkIDfordepartmentreportr&CounID=<?php echo $business?>&officer"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Officers</button></a><a href="councilReport.php?from=checkIDfordepartmentreportr&CounID=<?php echo $business?>&member"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Members</button></a>
                      </div>
                      <label><b style="text-align: center;"> Nursing Council</b></label>
                      <div align="center">
                      <a href="councilReportOfficers.php?from=checkIDfordepartmentreportr&CounID=<?php echo $nursing?>&officer"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Officers</button></a><a href="councilReport.php?from=checkIDfordepartmentreportr&CounID=<?php echo $nursing?>&member"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Members</button></a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div></td>
            </tr>

            <tr>
              <td scope="row"><b>Departmental Clubs</b></td>
              <td><button type="button" class="btn btn-info btn-rad" data-toggle="modal" data-target="#viewdepartmental"><i class="fas fa-file-export"></i> Report</button><!-- Modal -->
              <div class="modal fade" id="viewdepartmental" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Select Departmental Culbs</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="table-responsive text-nowrap">

                      <table class="table" id="dtBasicExample1">
                        <thead>
                          <tr>
                            <th scope="col">Club Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $qry = mysqli_query($connection, "select * from departmental_club_view");
                          while ($res = mysqli_fetch_assoc($qry)) { ?>
                             <tr>
                            <td scope="row"><b><?php echo $res['departmentClubName']; ?></b></td>
                            <td><a href="departmentReportOfficers.php?from=checkIDfordepartmentofficer&departmentClubId=<?php echo $res['departmentClubId']; ?>&officer"><button type="button" class="btn btn-info btn-rad"><i class="far fa-user"></i> Officers</button></a><a href="departmentReport.php?from=checkIDfordepartmentofficer&departmentClubId=<?php echo $res['departmentClubId']; ?>&member"><button type="button" class="btn btn-info btn-rad"><i class="far fa-user"></i> Members</button></a></td> 
                          </tr>   

                          <?php } ?>
                         
                        </tbody>
                      </table>

                      </div>
                      
                    </div>
                  </div>
                </div>
              </div></td>
            </tr>
           
           <tr>
              <td scope="row"><b>Social Clubs</b></td>
              <td><button type="button" class="btn btn-info btn-rad" data-toggle="modal" data-target="#viewsocial"><i class="fas fa-file-export"></i> Report</button><!-- Modal -->
              <div class="modal fade" id="viewsocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Select Social Culbs</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
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
                            <td><a href="socialmemReportOfficers.php?from=checkIDforsocialofficer&socialClubId=<?php echo $res['socialClubId']; ?>&officer"><button type="button" class="btn btn-info btn-rad"><i class="far fa-user"></i> Officers</button></a><a href="socialmemReport.php?from=checkIDforsocialofficer&socialClubId=<?php echo $res['socialClubId']; ?>&member"><button type="button" class="btn btn-info btn-rad"><i class="far fa-user"></i> Members</button></a></td>

                          </tr>

                          <?php } ?>
                         
                        </tbody>
                      </table>

                    </div>
                      
                    </div>
                  </div>
                </div>
              </div></td>
            </tr>

            <tr>
              <td scope="row"><b>Posted Announcement</b></td>
              <td><a href="approveannouncement.php"><button type="button" class="btn btn-info btn-rad"><i class="fas fa-file-export"></i> Report</button></a></td>
            </tr>
          
          </tbody>
        </table>

      </div>

      </div>
    </div>


    
  </div>
  
</main>
<!--Main Layout-->
  </div>
</body>


<?php include('footer.php'); ?>
<!-- id="dtBasicExample" -->
<script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>

<script type="text/javascript">
  
  $(document).ready(function () {
$('#dtBasicExample1').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>

<style type="text/css">
 
 body {
  background-color: #f5f5f5; 
}

 body, html {
  height: 100%;
}

.db {
  /* The image used */
  background-image: url("logo/student.png");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center right;
  background-repeat: no-repeat;
  background-size: 75%;
}

/*.text-color-test{
  text-shadow: 3px 3px #000000;
}*/


  .btn-rad{
  border-radius: 12px;
  
  }

 .table-radius{
  border-radius: 12px;
 }

</style>