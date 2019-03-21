  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>

  <?php if (isset($_SESSION['stprofID'])): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <script type="text/javascript">
    
    Push.Permission.request();

  setInterval(function(){ 
    
    $.get("check.php",
        function(data, status){

            

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var dateAnnounced = obj.dateAnnounced;

                display(toWhom, message,dateAnnounced);

            }

            console.log(data);
        
        }
  );

    $.get("check1.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var dateAnnounced = obj.dateAnnounced;

                display(toWhom, message,dateAnnounced);

            }

            console.log(data);
        
        }
  );

     $.get("check3.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var dateAnnounced = obj.dateAnnounced;

                display(toWhom, message,dateAnnounced);

            }

            console.log(data);
        
        }
  );




}, 5000);
    
    
function display(toWhom, message,dateAnnounced)
{
    Push.create(toWhom, {
  
        body: dateAnnounced + " - " + message,
        icon: 'img/icon.jpg',
        timeout: 8000,                  // Timeout before notification closes automatically.
        vibrate: [100, 100, 100],       // An array of vibration pulses for mobile devices.
        onClick: function() {
            // Callback for when the notification is clicked. 
            console.log(this);
        }  
    });

}


  </script>



  <?php endif ?>

</body>

</html>
