
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
        <h2><img src="http://localhost:8080/thesis/logo/download.png" width="50" height="50" class="rounded-circle img-responsive"> List of Members of Departmental Councils</h2>
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
              <th scope="col">Student ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Departmental Council</th>
              <th scope="col">Position</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($connection, "select * from list_student_view");
            while ($res = mysqli_fetch_assoc($qry)) { ?>
               <tr>
              <td scope="row"><?php echo $res['StudentID']; ?></td> 
              <td scope="row"><?php echo $res['lname'] ." ". $res['fname'] ." ". $res['mname']; ?></td>
              <td scope="row"><?php echo $res['CounName']; ?></td>
               <td scope="row">
                <ul>
                <?php 

                  $qrydppos = mysqli_query($connection, "select * from council_view where stprofID = ".$res['stprofID']." ");
                        $resultdp = mysqli_fetch_assoc($qrydppos);
                        $posname = $resultdp['positionName'];
                        ?>

                   <li>
                    <?php 

                           ?>
                      <?php if (mysqli_num_rows($qrydppos)>0){
                              echo $posname;
                              }else{
                                echo "Member";
                              } ?>
                  </li>

                </ul>
              </td>

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
                title:"LIST OF MEMBERS OF DEPARTMENTAL COUNCIL"
            },
            {
                extend: 'excel',
                className: 'btn btn-outline btn-sm',
                text: 'Save to Excel',
                title:"LIST OF MEMBERS OF DEPARTMENTAL COUNCIL"
            },
            {
                extend: 'print',
                className: 'btn btn-outline btn-sm',
                text: 'Print Table',
                title:"LIST OF MEMBERS OF DEPARTMENTAL COUNCIL"
            },
            {
                extend: 'pdf',
                className: 'btn btn-outline btn-sm',
                text: 'Save to PDF',
                orientation: 'landscape',
                pageSize: 'A4',
                title:"LIST OF MEMBERS OF DEPARTMENTAL COUNCIL"
            },
            {
                extend: 'copy',
                className: 'btn btn-outline btn-sm',
                text: 'Copy to clipboard',
                title:"LIST OF MEMBERS OF DEPARTMENTAL COUNCIL"
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