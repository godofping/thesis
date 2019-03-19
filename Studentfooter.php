  
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

</script>


  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
</body>

</html>
