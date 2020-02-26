
<?php include('header.php');
$currentpage = "stportfolio";
if (!isset($_SESSION['stprofID'])) {
  header("Location: index.php");
}
if ((time() - $_SESSION['last_time']) > 300) {
      header("Location: controller.php?from=logout");
  
}else{
   $_SESSION['last_time'] = time(); 
}

  $qrydisable = mysqli_query($connection, "select * from  buttontoggle_table ");
  $resdisable = mysqli_fetch_assoc($qrydisable);
  if ($resdisable['toggleonoroff'] == 'OFF') {
   header("Location: index.php");
  }

 include("student-header.php");
 ?>

<!--Main Layout-->
<main class=" py-5 mt-5" id="testrefresh">

  <div class="container">

  <div class="row">
      <div class="col-md-12">
        
        <h2><i class="far fa-folder-open"></i> <b>My Portfolio</b></h2>
        <hr>

      </div>
    </div>

    <?php 

                $qryname = mysqli_query($connection, "select * from student_portfolio_view where stprofID = '".$_SESSION['stprofID']."' order by stportfolioID desc");
                $result = mysqli_fetch_assoc($qryname);

                $profID = $result['stprofID'];
                $fnameview = $result['fname'];
                $mnameview = $result['mname'];
                $lnameview = $result['lname'];
                $coursename = $result['CourseName'];

                $dpname = $result['departmentClubName']

             ?>

    <div class="row">
      <div class="col-md-12">
          <a href="register-portfolio.php" id="createportfolio" class="btn blue-gradient mb-4 itogglebutton"><i class="fas fa-plus"></i> Create portfolio</a><a href="edit-myportfolio.php" class="btn peach-gradient mb-4 itogglebutton"> <i class="far fa-edit"></i> Edit portfolio</a>
    </div>
  </div>

  <div class="row">
      <div class="col-md-12">

         <?php 

              $qry = mysqli_query($connection, "select * from student_portfolio_view where stprofID = '".$profID."'");
              $res = mysqli_fetch_assoc($qry);

              if (mysqli_num_rows($qry)>0):?>
               
              <!-- Material form contact -->
    <div class="card">

     <h5 class="card-header green accent-4 white-text text-center py-4 card-img">
        <strong style="font-family: Arial Black, Gadget, sans-serif;">Notre Dame of Tacurong College</strong><br>
        <small style="font-family: Alfa Slab One">City of Tacurong</small><br>
        <strong style="font-family: Arial Black, Gadget, sans-serif;">Office of Student Affairs</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

           
              <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <p style="color: black"><U>STUDENT'S PORTFOLIO</U></p>
            </div>

            <!-- To Whom -->
            <div class="md-form mt-3">
              <p style="color: black; text-align: left;">Name: <?php echo "$lnameview" .", ". "$fnameview" ." ". "$mnameview" ?></p>
              <p style="color: black; text-align: left;">Course & Year: <?php echo "$coursename" .", ". $result['styear'] ?></p>
            </div> 

            <div class="md-form mt-3" style="text-align: left;">
               <p style="color: black"> Semester: <?php echo $result['sem']; ?>, School Year: <?php echo $result['schoolyr']; ?></p>
            </div>

<div class="row">
  <div class="col-md-12">
    <p class="h5 mb-4 mt-4 text-left">A.] Activities joined/participated</p>
    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap" >

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Name of Event/ Activity</th>
              <th scope="col">Place/Rank</th>
            </tr>
          </thead>
          <tbody>
               
               <?php if ($result['act1'] != "" && $result['rank1']): ?> 
                <tr>
                  <td scope="row"><?php echo $result['act1'] ?></td> 
                  <td scope="row"><?php echo $result['rank1']?></td>
                </tr>
                 <?php endif ?>  
                <?php if ($result['act2'] != "" && $result['rank2']): ?>
                  <tr>
                  <td scope="row"><?php echo $result['act2'] ?></td> 
                  <td scope="row"><?php echo $result['rank2']?></td>
                  </tr>
                <?php endif ?>
                <?php if ($result['act3'] != "" && $result['rank3']): ?>
                  <tr>
                  <td scope="row"><?php echo $result['act3'] ?></td> 
                  <td scope="row"><?php echo $result['rank3']?></td>
                  </tr>
                <?php endif ?>  
                <?php if ($result['act4'] != "" && $result['rank4']): ?>
                  <tr>
                  <td scope="row"><?php echo $result['act4'] ?></td> 
                  <td scope="row"><?php echo $result['rank4']?></td>
                  </tr>
                <?php endif ?>   
           
          </tbody>
        </table>

        <p class="h5 mb-4 mt-4 text-left">B.] Community Involvement</p>

        <div class="row">  
                      
                       <div class="col">      
                        <div class="md-form">
                          <input type="text"  class="form-control" disabled="" value="<?php echo $result['comm1'] ?>">
                        </div>
                      </div>           
        
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['comm2'] ?>">
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['comm3'] ?>">
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['comm4'] ?>">
                        </div>
                      </div>
                      
                    </div> 

         <p class="h5 mb-4 mt-4 text-left">Club Membership</p>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <label>Department</label>
                          <input type="text" disabled="" class="form-control" value="<?php echo $dpname ?>">
                        </div>
                      </div>
                      
                      <?php 

                        $qrydppos = mysqli_query($connection, "select * from departmental_officersandmembers_view where stprofID = ".$_SESSION['stprofID']." ");
                        $resultdp = mysqli_fetch_assoc($qrydppos);
                        $posname = $resultdp['positionNameDP'];
                       ?>

                      <div class="col">      
                        <div class="md-form">
                          <label>Position:</label>
                          <?php if (mysqli_num_rows($qrydppos)>0): ?>
                             <input type="text" name="dpposition" disabled="" required="" class="form-control" value="<?php echo $posname ?>">
                              <?php else: ?> 
                              <input type="text" name="dpposition" disabled="" required="" class="form-control" value="Member">
                                    
                          <?php endif ?>

                         
                        </div>
                      </div>
                      
                    </div>           

         <?php 
    $qrysocialclub = mysqli_query($connection, "select * from student_social_club_view where stprofID = ".$_SESSION['stprofID']." ");

    while ($ressocialclub = mysqli_fetch_assoc($qrysocialclub)) {?>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <label>Social Club</label>
                          <input type="text" required="" name="dpname" disabled="" class="form-control" value="<?php echo $ressocialclub['socialClubName'] ?>">
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
              
                          <?php 

                            $qrysocialpos = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = ".$_SESSION['stprofID']." ");
                            $resultID = mysqli_fetch_assoc($qrysocialpos);

                            $socID = $resultID['socialClubId'];
                            $socpos = $resultID['positionNameSocial'];
                           ?>

                          <label>Position:</label>
                          <?php if ($ressocialclub['socialClubId'] == $socID): ?>

                             <input type="text" name="dpposition" disabled="" required="" class="form-control" value="<?php echo $socpos ?>">
                              <?php else: ?> 
                              <input type="text" name="dpposition" disabled="" required="" class="form-control" value="Member">
                                    
                          <?php endif ?>
         
                        </div>
                      </div>
                      
                    </div>  
                    <?php } ?>

      <p class="h5 mb-4 mt-4 text-left">Seminar attended</p>
               
        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['seminar1'] ?>">
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['seminar2'] ?>">
                        </div>
                      </div>
                      
                    </div>

        <div class="row">                  
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['seminar3'] ?>">
                        </div>
                      </div>
                    
                      <div class="col">      
                        <div class="md-form">
                          <input type="text" class="form-control" disabled="" value="<?php echo $result['seminar4'] ?>">
                        </div>
                      </div>
                      
                    </div> 

        </div>
      </div>
    </div>
  </div>
</div>
        </form>
        <!-- Form -->

    </div>

      </div>
<!-- Material form contact -->

              <?php endif ?>
             
   

        </div>
      </div>


</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<!-- <script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#testrefresh').load('togglerefresh.php');
header("Location: index.php");
}, 500); // refresh every 10000 milliseconds

</script> -->

<style type="text/css">
    
  .card-img{

  background-image: url("logo/download.png");
  background-position: left;
  background-repeat: no-repeat;
  background-size: 10%;
}

</style>

<style type="text/css">

.itogglebutton{
  border-radius: 12px;
}

</style>