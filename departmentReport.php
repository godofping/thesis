
<?php include('header.php');
$currentpage = "reports";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>



<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

    <?php 
          if (isset($_GET['from']) and $_GET['from'] == 'checkIDfordepartmentofficer') {
          $qryid = mysqli_query($connection, "select * from departmental_club_view where departmentClubId = '".$_GET['departmentClubId']."' ");
          $resid = mysqli_fetch_assoc($qryid);
          $departmentClubId = $resid['departmentClubId'];
          $departmentClubName = $resid['departmentClubName'];

          $title = "";

          if (isset($_GET['officer'])) {
            $title .= 'Officers';
          }else if (isset($_GET['member'])) {
            $title .= 'Members';
          }

          }         

         ?>

  <div class="row">
      <div class="col-md-12">
         <h4><a id="print" style="color: #289DE5;" onclick="window.print();">Print Portfolio</a><a href="AdminReport.php" id="back" style="float: right"> Go back</a></h4>  
        <h5 class=" black-text text-center py-4 card-img">
            <strong style="font-family: Arial Black, Gadget, sans-serif; margin-right: 300px">Office of Student Affairs</strong><br>
            <strong style="font-family: Arial Black, Gadget, sans-serif; margin-right: 300px">NOTRE DAME OF TACURONG COLLEGE</strong><br>
            <small style="font-family: Alfa Slab One; margin-right: 300px">City of Tacurong</small>
        </h5>
        <div class="md-form mt-1" style="text-align: center;">
              <p style="color: black"><b><U>List of Members of <?php echo $departmentClubName; ?> Clubs</U></p></b>
            </div>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap" >

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Student ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Departmental Club</th>
              <th scope="col">Position</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from list_student_view where departmentClubId = '".$departmentClubId."' ");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['StudentID']; ?></td> 
              <td scope="row"><?php echo $res['lname'] ." ". $res['fname'] ." ". $res['mname']; ?></td>
              <td scope="row"><?php echo $res['departmentClubName']; ?></td>
              <td scope="row">
                <ul>
                <?php 

                  $qrydppos = mysqli_query($connection, "select * from departmental_officersandmembers_view where stprofID = ".$res['stprofID']." ");
                        $resultdp = mysqli_fetch_assoc($qrydppos);
                        $posname = $resultdp['positionNameDP'];
                        ?>

                   <li>
                    <?php 

                           ?>
                      <?php if (mysqli_num_rows($qrydppos)>0){
                              echo $posname;
                              }else{
                                echo "Member";
                              } ?>
                  </li>

                </ul>
              </td>
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

<style type="text/css">
  
  @media print {
  #print {
    display: none;
  }
  #back {
    display: none;
  }
}

  .card-img{

  background-image: url("http://localhost:8080/thesis/logo/download.png");
  background-position: left;
  margin-left: 150px;
  background-repeat: no-repeat;
  background-size: 10%;
}

</style>