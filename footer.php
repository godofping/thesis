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

  <!-- <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="https://rawgit.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>

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
               var subjectann = obj.subjectann;

                display(toWhom,message,subjectann);

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
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );

    $.get("check2.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

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
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );

    $.get("check4.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );

    $.get("checkcscreject.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );

     $.get("checkcouncilreject.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );

      $.get("checkdepartmentreject.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );

      $.get("checksocialreject.php",
        function(data, status){

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
                var subjectann = obj.subjectann;
                var timeStart = obj.timeStart;
                var timeEnd = obj.timeEnd;
                

                display(toWhom, message, subjectann);

            }

            console.log(data);
        
        }
  );


}, 5000);
    
    
function display(toWhom, message, subjectann)
{
    Push.create(toWhom, {
  
        // body: dateAnnounced + " - " + message ,
        body:  subjectann + " - " + message ,
        icon: 'logo/download.png',
        timeout: 8000,                  // Timeout before notification closes automatically.
        vibrate: [100, 100, 100],       // An array of vibration pulses for mobile devices.
        onClick: function() {
           http://localhost:8080/thesis/students-dashboard.php
            console.log(this);
        }  
    });

}


  </script>



  <?php endif ?>
 
  <?php if (isset($_SESSION['adminID'])): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <script type="text/javascript">
    
    Push.Permission.request();

  setInterval(function(){ 
    
    $.get("adminchechcouncil.php",
        function(data, status){

            

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
               var subjectann = obj.subjectann;

                display(toWhom,message,subjectann);

            }

            console.log(data);
        
        }
  );

  $.get("admincheckcsc.php",
        function(data, status){

            

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
               var subjectann = obj.subjectann;

                display(toWhom,message,subjectann);

            }

            console.log(data);
        
        }
  );

  $.get("admincheckdepartment.php",
        function(data, status){

            

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
               var subjectann = obj.subjectann;

                display(toWhom,message,subjectann);

            }

            console.log(data);
        
        }
  );

   $.get("adminchechsocial.php",
        function(data, status){

            

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;
               var subjectann = obj.subjectann;

                display(toWhom,message,subjectann);

            }

            console.log(data);
        
        }
  );


}, 5000);
    
    
function display(toWhom, message, subjectann)
{
    Push.create(toWhom, {
  
        // body: dateAnnounced + " - " + message ,
        body:  subjectann + " - " + message ,
        icon: 'logo/download.png',
        timeout: 8000,                  // Timeout before notification closes automatically.
        vibrate: [100, 100, 100],       // An array of vibration pulses for mobile devices.
        onClick: function() {
           http://localhost:8080/thesis/admin-dashboard.php
            console.log(this);
        }  
    });

}


  </script>



  <?php endif ?> 

  <script type="text/javascript">
      // Tooltips Initialization
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
  </script>



</body>

</html>
