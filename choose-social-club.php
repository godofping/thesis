
<?php include('header.php'); 

?>

<div class="container-fluid">
<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">
    <div class="mt-5">
      
      <!-- Default form login -->
      <form class="border border-light p-3" method="POST" action="controller.php" autocomplete="false">

          <p class="h4 mb-4 text-center">Choose Social Club</p>
          
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

  
          <button class="btn btn-info btn-block my-4" type="submit">Next</button>

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
