
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

        <?php 

          if (isset($_GET['from']) and $_GET['from'] == 'checkIDforeditmemcsc') {

          $qryid = mysqli_query($connection, "select * from csc_mem_view where cscmemID = '".$_GET['cscmemID']."' ");
          $resid = mysqli_fetch_assoc($qryid);

          $cssstudenID = $resid['cscmemID'];

          }         

         ?>

        <h2><b>Central Student Council</b></h2>
        <h5>Edit Officer</h5>
        <hr>

      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">
    <div class="card form-border">

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

          <!-- To Whom -->
             <div class="md-form mt-5" style="text-align: center;">
              <b><p style="color: black">Edit Central Student Council Officer</p></b>
            </div>

            <div class="row">
                <div class="col-md-12">
                   <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <small>Student Name</small>
                      <select class="form-control" id="allstudent" name="stprofID" required="" onselect="rex();" onkeypress="rex();" onkeyup="rex();" onchange="rex();" value="<?php echo $resid['lname'] ." ". $resid['fname'] ." ". $resid['mname']; ?>">
                        <?php $qry = mysqli_query($connection, "select * from studentprofile_table order by (lname +0) asc, lname asc");
                        while ($res = mysqli_fetch_assoc($qry)) { ?>
                          <?php echo '<option value="'.$res['stprofID'].'">'.$res['lname'] ." ". $res['fname'] ." ". $res['mname'].'</option>'; ?>
                        <?php } ?>
                      </select>

                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Position</small>
                      <select class="form-control" name="positionIDcsc" id="cscposition" required="" onselect="rex();" onkeypress="rex();" onkeyup="rex();" onchange="rex();" value="<?php echo $resid['positionNamecsc']; ?>">
                        <?php 

                          $qry = mysqli_query($connection, "select * from csc_position_table order by (positionNamecsc +0) asc, positionNamecsc asc");

                          while ($res = mysqli_fetch_assoc($qry)) { ?>
                            <option value="<?php echo $res['positionIDcsc']; ?>"><?php echo $res['positionNamecsc']; ?></option>
                         <?php }

                         ?>
                      </select>

                      </div>
                </div>
                </div>

                <small>Can Create Announcement</small>
                    <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                          <select class="form-control" name="perpost" required="">
                            <option>Yes</option>
                            <option>No</option>
                          </select>
                   
                          </div>
                        </div>
                      </div>

                  <input type="text" name="cscmemID" value="<?php echo $cssstudenID ?>" hidden>
                  <input type="text" name="from" value="edit-csc-position" hidden>

                  <button type="submit" class="btn aqua-gradient itogglebutton">Save Changes</button>
                  <a href="csc-new.php"><button type="button" class="btn btn-danger itogglebutton">Cancel</button></a>
                    
                    </form>
                </div>
              </div>


    </div>

      </div>
<!-- Material form contact -->
   </div>
      </div>


  </div>

</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<script type="text/javascript">

  //gets all the options of the select tags
  var allstudents = $.map($('#allstudent option'), function(e) { return e.text; });
  var cscpositions = $.map($('#cscposition option'), function(e) { return e.text; });

//call rex function
rex();


  function rex()
{

  //create a variable for the elements
  var allstudent = document.getElementById("allstudent");
  var cscposition = document.getElementById("cscposition");

  //gets the value of the elements
  var allstudentval = $('#allstudent').val();
  var cscpositionval = $('#cscposition').val();

  //condition if the value on the editable is not existing or it is empty
  if (allstudents.indexOf(allstudentval) < 0 || !allstudentval.trim()) {
    //sets the error
    allstudent.setCustomValidity('Please select a registered student.');
  }
  else
  {
    //removes the error
    allstudent.setCustomValidity('');
  }
  //same as through on the above
  if (cscpositions.indexOf(cscpositionval) < 0 || !cscpositionval.trim()) {
    cscposition.setCustomValidity('Please select a valid position.');
  }
  else
  {
    cscposition.setCustomValidity('');
  }

}
  
$('#allstudent').editableSelect();
$('#cscposition').editableSelect();

</script>

<style type="text/css">

  .form-border{
  border-radius: 12px;
  }

  .itogglebutton{
  border-radius: 12px;
  }

</style>