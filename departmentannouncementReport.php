  
<?php include('header.php');
$currentpage = "reports";
if (!isset($_SESSION['adminID'])) {
  header("Location: index.php");
}

 include("admin-header.php");
 ?>



<!--Main Layout-->
<main class=" py-5 mt-5">

  <div class="container">

  <div class="row">
      <div class="col-md-12">

        <h2>Departmental Clubs</h2>
        <h5>Announcement</h5>
        <hr>

      </div>
    </div>


    <div class="row">
      <div class="col-md-12">

    <div class="row mt-5">
      <div class="col-md-12">

        <div class="table-responsive text-nowrap" >

        <table class="table" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">Date Submited</th>
              <th scope="col">Departmental Club Name</th>
              <th scope="col">Time Start</th>
              <th scope="col">Time End</th>
              <th scope="col">Venue</th>
              <th scope="col">to</th>
              <th scope="col">Subject</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $qrycscann = mysqli_query($connection, "select * from departmental_club_announcement_view where isApproved = 'Yes' ");
            while ($rescscann = mysqli_fetch_assoc($qrycscann)) { ?>
               <tr>
              <td scope="row"><?php echo date('F d, Y h:i A', strtotime($rescscann['dateSubmit'])); ?></td>
              <td><?php echo $rescscann['departmentClubName']; ?></td>
              <td><?php echo $rescscann['timeStart']; ?></td>
              <td><?php echo $rescscann['timeEnd']; ?></td>
              <td><?php echo $rescscann['venueName']; ?></td>
              <td><?php echo $rescscann['toWhom']; ?></td>
              <td><?php echo $rescscann['subjectann']; ?></td>

            </tr>

            <?php } ?>
           
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>
  
</main>
<!--Main Layout-->



<?php include('footer.php'); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />


<script type="text/javascript">
  
  $(document).ready(function () {
    $('#dtBasicExample').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csv',
                className: 'btn btn-outline btn-sm',
                text: 'Save to CSV',
                title:"Departmental Clubs posted Announcement"
            },
            {
                extend: 'excel',
                className: 'btn btn-outline btn-sm',
                text: 'Save to Excel',
                ttitle:"Departmental Clubs posted Announcement"
            },
            {
                extend: 'print',
                className: 'btn btn-outline btn-sm',
                text: 'Print Table',
                title:"Departmental Clubs posted Announcement"
            },
            {
                extend: 'pdf',
                className: 'btn btn-outline btn-sm',
                text: 'Save to PDF',
                orientation: 'landscape',
                pageSize: 'A4',
                title:"Departmental Clubs posted Announcement"
            },
            {
                extend: 'copy',
                className: 'btn btn-outline btn-sm',
                text: 'Copy to clipboard',
                title:"Departmental Clubs posted Announcement"
            }
        ]
    });
    $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        $('input').attr("placeholder", "Search");
        $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
</script>