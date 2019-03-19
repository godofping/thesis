
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
    
Push.Permission.request();

setInterval(function(){ 
    
    $.get("check.php",
        function(data, status){

            console.log(data);

            var obj = JSON.parse(data);
            var toDisplay = obj.toDisplay;

            if (toDisplay == 'Yes') {
                var obj = JSON.parse(data);

                var toWhom = obj.toWhom;
                var message = obj.message;

                display(toWhom, message);

                

            }
        
        }
  );



}, 5000);
    
    
function display(toWhom, message)
{
    Push.create(toWhom, {
  
        body: message,
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



<?php include('footer.php'); ?>



