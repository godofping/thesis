
<?php include('header.php');
$currentpage = "announcement";
if (!isset($_SESSION['stprofID'])) {
  header("Location: index.php");
}
if ((time() - $_SESSION['last_time']) > 300) {
      header("Location: controller.php?from=logout");
  
}else{
   $_SESSION['last_time'] = time(); 
}


 include("student-header.php");
 ?>

<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2>Announcement</h2>
        <hr>

      </div>
    </div>

         <?php 

                       $qrystID1 = mysqli_query($connection, "select * from list_student_view where accID = ".$_SESSION['accID']." ");
                       $resstID1 = mysqli_fetch_assoc($qrystID1 );

                     ?>

        <div class="row">
      <div class="col-md-12">
        <?php 
        $qryposition = mysqli_query($connection, "select * from council_view where stprofID = '" .$_SESSION['stprofID']. "' and perpost = 'Yes' ");

        $qryrejctbadge = mysqli_query($connection,"select count(*) as cnt from council_announcement_table where isApproved = 'Reject' and CounID = '".$resstID1['CounID']."' ");
        $resultreject = mysqli_fetch_assoc($qryrejctbadge);

        if (mysqli_num_rows($qryposition)>0): ?>
              
        <?php endif ?>

      </div>
    </div>

   </div>      
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>


<script type="text/javascript">
  $("#sendButton").click(function(){

    to = $("input[name=to]").val();
    subject =  $("input[name=subject]").val();
    timestart =  $("#timestart").val();
    timeend =  $("#timeend").val();
    venue = $("#venue").val();




  $.post("check-council-announcement.php",
  {
    to: to,
    subject: subject,
    timestart: timestart,
    timeend: timeend,
    venue: venue,
 
  },

  function(data){
    
 
  //  var obj = data;

  // $.each( obj, function( key, value ) {
  //     alert( key + ": " + value );
  // });

if (data == "") {
  $( "#formdforsend" ).submit();
}
else
{
  $("#errors").html(data);
}


  });


});
</script>
