
<?php include('header.php');


 ?>



<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

    <!-- Default form contact -->
<form class="text-center border border-light p-5">

 

    <!-- Copy -->
    <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
        <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
    </div>

    <!-- Send button -->
    <button id="demo-btn">Show notification</button>

</form>
<!-- Default form contact -->

    <div class="row">
      <div class="col-md-12">

        
      </div>
    </div>
  
  </div>
  
</main>
<!--Main Layout-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
<script type="text/javascript">
    

  
function test(){
    Push.Permission.request();
   <?php
$qry1 = mysqli_query($connection, "select * from testingTbl where isSend = '0'");
$res1 = mysqli_fetch_assoc($qry1);
$aw = $res1['name'];
$updateThis = $res1['testID'];

if ($aw != "") {
 ?>
    Push.create('<?php echo $aw; ?>', {
        body: 'This is a notification.',
        icon: 'icon.png',
        timeout: 8000,                  // Timeout before notification closes automatically.
        vibrate: [100, 100, 100],       // An array of vibration pulses for mobile devices.
        onClick: function() {
            // Callback for when the notification is clicked. 
            console.log(this);
        }  
    });
    <?php mysqli_query($connection, "update testingTbl set isSend = '1' where testID = '". $updateThis ."'");} ?>
}



setInterval(function(){ 
    test();

}, 5000);
    
    


</script>

<?php include('footer.php'); ?>

