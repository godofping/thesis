
<?php include('header.php'); 

?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <form class="text-center border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <p class="h4 mb-4">Choose Course</p>
          
          <div class="row">
            <div class="col-12">
                <div class="form-group">
        
                <select class="form-control" name="CourseID" required="">
                  <option selected="" disabled="">Select Course</option>
                  <?php $qry = mysqli_query($connection, "select * from course_table");
                  while ($res = mysqli_fetch_assoc($qry)) { ?>
                    <option value="<?php echo $res['CourseID']; ?>"><?php echo $res['CourseName']; ?></option>
                  <?php } ?>
                </select>

                </div>
          </div>
          </div>

  
          <button class="btn btn-info btn-block my-4" type="submit">Next</button>

          <input type="text" name="from" value="choose-course" hidden>




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>

<?php include('footer.php'); ?>
