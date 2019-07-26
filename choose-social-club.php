
<?php include('header.php');

?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <!-- <form class="border border-light p-3 needs-validation" novalidate method="POST" action="controller.php" autocomplete="false"> -->
      <form class="border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <p class="h4 mb-4 text-center">Choose Social Club</p>

          <?php if (isset($_GET['status']) and $_GET['status'] == 'choose-failed'): ?>
            <div class="alert alert-danger" role="alert">
            Choose atleast 1 Social Club
          </div>
          <?php endif ?>

          <div class="row">
            <div class="col-12">
                <div class="form-group">
        
                <!-- Material checked -->
                <div class="form-check">
                  <?php 
                    $qry = mysqli_query($connection,"select * from social_club_table order by socialClubName asc");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                    <br>
                      <input type="checkbox" name="socialClubName[]" class="form-check-input" value="<?php echo  $res['socialClubId']; ?>" id="c<?php echo $res['socialClubId']; ?>">
                      <label class="form-check-label" for="c<?php echo $res['socialClubId']; ?>"><?php echo $res['socialClubName']; ?></label>
                    <?php }
                   ?>
                  
                </div>

                </div>
          </div>
          </div>

  
          <button class="btn btn-info btn-block my-4" type="submit" >Next</button>

          <input type="text" name="from" value="choose-social-club" hidden>




      </form>
      <!-- Default form login -->

    </div>
  </div>
</div>

<div class="col-md-4"></div>


</div>


<?php include('footer.php'); ?>

<script type="text/javascript">



var limit = 3;
$('.form-check-input').on('change', function(evt) {
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
});


</script>

<!-- <script type="text/javascript">

  // $(document).ready(function(){
//   $('input.form-check-input').click(function(){
//     $('input.form-check-input').removeAttr('required');
//   });
// });

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
</script> -->
