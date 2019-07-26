
<?php include('header.php');
$currentpage = "club";
if (!isset($_SESSION['accID'])) {
  header("Location: index.php");
}
// if ((time() - $_SESSION['last_time']) > 300) {
//       header("Location: controller.php?from=logout");
  
// }else{
//    $_SESSION['last_time'] = time(); 
// }


 include("student-header.php");
 ?>

<div class="container-fluid">

  <div class="row">

<div class="col-md-4">

    <div class="mt-5">
     
          <p class="h4 mb-4 text-center pt-4">Department Council</p>
          
          <?php 

            $qry = mysqli_query($connection, "select * from list_student_view where accID = '".$_SESSION['accID']."'");

            $res = mysqli_fetch_assoc($qry);

            $dpname = $res['departmentClubName'];
            $ccname = $res['CounName'];
           ?>


         <div class="row">
          <div class="col-12">
            <div class="form-group">
           <input type="text" readonly="" class="form-control md-4" value="<?php echo $ccname;?>">
           </div>
          </div>
         </div>

         <p class="h4 mb-4 text-center pt-4">Departmental Club</p>

        <div class="row">
          <div class="col-12">
          <div class="form-group">
          <input type="text" readonly="" class="form-control md-4" value="<?php echo $dpname;?>">
          </div>
          </div>
         </div>

          <p class="h4 mb-4 text-center pt-4">Social Club/s</p>
          

            <?php 

              $qry1 = mysqli_query($connection, "select * from student_social_club_view where stprofID = '".$res['stprofID']."'");
              while($res1 = mysqli_fetch_assoc($qry1)){ ?>
              
         
                <div class="form-group">
               <input type="text" name="fname" disabled="" class="form-control md-4" readonly="" value="<?php echo $res1['socialClubName']; ?>">
               </div>
         
        
             <?php }

             ?>

          
  </div>
  </div>


</div>


<?php include('footer.php'); ?>


 