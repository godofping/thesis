<?php include('header.php');

?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <form class="text-center border border-light p-3 needs-validation" novalidate method="POST" action="controller.php" autocomplete="false">

          <p class="h4 mb-4">Choose Course</p>
          
          <div class="row">
            <div class="col-12">
                <div class="form-group">
                 <label>Select Course</label>
                <select class="form-control" name="CourseID" required="">
                  <option selected="" disabled=""></option>
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

<script type="text/javascript">
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>
