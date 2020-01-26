
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

        <h2><b>Central Student Council</b></h2>
        <h5>Officers</h5>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

        <button class="btn blue-gradient" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> ADD CSC Officers</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Officers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class=" p-2" method="POST" id="formsendforaddd" action="controller.php" autocomplete="false">
           
                  <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                      <small>Student Name</small>
                      <select class="form-control" id="allstudent" name="stprofID" required="" onselect="rex();" onkeypress="rex();" onkeyup="rex();" onchange="rex();" >
                        <?php $qry = mysqli_query($connection, "select * from studentprofile_table order by (lname +0) asc, lname asc");
                        while ($res = mysqli_fetch_assoc($qry)) { ?>
                          <!-- <option value="<?php echo $res['stprofID']; ?>"><?php  echo $res['stprofID'] ?><?php echo $res['lname'] ." ". $res['mname'] ." ". $res['fname'];  ?></option> -->
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
                      <select class="form-control" name="positionIDcsc" id="cscposition" required="" onselect="rex();" onkeypress="rex();" onkeyup="rex();" onchange="rex();">
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
                        <option selected="" disabled=""></option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
               
                      </div>
                    </div>
                  </div>

                  <input type="text" name="from" value="add-csc-member" hidden>
                  <p id="errors" class="text-danger"></p>
              <div class="modal-footer">
                <button type="submit" class="btn aqua-gradient">Add</button>
           
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  
    <div class="row mt-5 indigo lighten-5 z-depth-2">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Position</th>
              <th scope="col">Student Name</th>
              <th scope="col">Permission</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
           <?php 
            $qry = mysqli_query($connection, "select * from csc_mem_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <th scope="row"><?php echo $res['positionNamecsc']; ?></th> 
              <th scope="row"><?php echo $res['lname'] ." ". $res['mname'] ." ". $res['fname']; ?></th>
              <th scope="row"><?php echo $res['perpost']; ?></th>
              <td><a href="csc-member-edit.php?from=checkIDforeditmemcsc&cscmemID=<?php echo $res['cscmemID'] ?>"><button class="btn aqua-gradient"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['cscmemID'] ?>"><i class="far fa-trash-alt"></i></button></td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $res['cscmemID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Officers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" id="formsend<?php echo $res['cscmemID'] ?>" method="POST"action="controller.php" autocomplete="false">  

                      <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <small>Student Name</small>
                            <input class="form-control" type="text" required="" id="editstudent" name="stprofID" required="" list="studentnames" value="<?php echo $res['lname'] ." ". $res['fname'] ." ". $res['mname']; ?>" />
                            <datalist id="studentnames">
                                   <?php $qry1 = mysqli_query($connection, "select * from list_student_view order by (lname +0) asc, lname asc");
                                  while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                    <?php echo '<option value="'.$res1['lname'] ." ". $res1['fname'] ." ". $res1['mname'].'">'; ?>
                              <?php } ?>
                            </datalist>
                            </div>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                          <small>Position</small>
                          <input class="form-control" required="" type="text" name="positionIDcsc" list="studentpositions" value="<?php echo $res['positionNamecsc']; ?>" />
                          <datalist id="studentpositions">
                             <?php $qryedi = mysqli_query($connection, "select * from csc_position_table order by (positionNamecsc +0) asc, positionNamecsc asc");
                          while ($resedi = mysqli_fetch_assoc($qryedi)) { ?>
                              <?php echo '<option value="'.$resedi['positionNamecsc'] .'">'; ?>
                        <?php } ?>
                          </datalist>

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

                      <b><p id="test" class="text-danger"></p></b>

                    <input type="text" name="cscmemID" value="<?php echo $res['cscmemID'] ?>" hidden>
                    <input type="text" name="from" value="edit-csc-position" hidden>
                    <div class="modal-footer">
                      <button id="buttonsendawawawa" type="button" class="btn aqua-gradient" ><i class="far fa-edit"></i> Update</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $res['cscmemID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <h5 align="Center">Do you want to remove <?php echo "<br>". $res['lname'] ." ". $res['fname'] ." ". $res['mname'];  ?><br> from being <?php echo $res['positionNamecsc'] ?> ?</h5>
                      </div>
                    </div>

                    <input type="text" name="cscmemID" value="<?php echo $res['cscmemID'] ?>" hidden>
                    <input type="text" name="from" value="delete-csc-position-members" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes</button>
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

<!-- <script type="text/javascript">
  
 
  $("#buttonsendawawawa").click(function(){

    studentname = $("#editstudent").val();

    $.post("check-student-name.php",
    {
      studentname: studentname,
    },

    function(data){

      if (data == "") {
        alert("Congrats");
      }
      else{
        $("#test").html(data);
      }

    });

});

</script> -->