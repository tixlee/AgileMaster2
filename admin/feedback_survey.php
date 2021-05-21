<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Feedback Survey</title>
      <?php include('../navigation/head.php');?>
      <style>
         td.details-control {
         background: url('../resources/images/details_open.png') no-repeat center center;
         cursor: pointer;
         }
         tr.shown td.details-control {
         background: url('../resources/images/details_close.png') no-repeat center center;
         }
      </style>
      <style type="text/css">
         #wrapper .card{
         cursor: pointer;
         }
         .bg-custom{
         background-image: url("../resources/images/profile_header.png");
         background-color: #9a1b25;
         border-bottom-left-radius: 20% 50%;
         border-bottom-right-radius: 20% 50%;
         }
         .bg-img {
         max-width: 35%;
         min-height: 100px;
         max-height: auto;
         margin-left:auto;
         margin-right:auto;
         text-align: center;
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         color: white; 
         padding: 40px 0px 0px 0px;
         font-size: 60px;
         font-weight: bold;
         }
      </style>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar_admin.php');?>
         <?php include('../navigation/feedbacksurvey_adminsidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
               <div class="bg-custom">
                  <div class="bg-img" style="text-align: center;">
                     <div class="searchContainer">
                        <h2>Feedback Survey</h2>
                     </div>
                  </div>
                  <br>
               </div>
               <br>
               <div class="container-fluid">
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Major</th>
                                    <th>Creation Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
      </div>
      <script src="../dependencies/navigation/jquery/jquery.min.js"></script>
      <script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
      <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="../dependencies/scripts/datatables-demo.js"></script>
      <script src="../dependencies/navigation/js/adminlte.js"></script>
      <script src="../dependencies/scripts/google.js"></script>
      <script>
         /* Formatting function for row details - modify as you need */
         function format ( d ) {
         	// `d` is the original data object for the row
         	return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
         		'<tr>'+
         			'<td>Understanding:</td>'+
         			'<td>'+d.Understand+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Experience:</td>'+
         			'<td>'+d.Experience+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Like UI:</td>'+
         			'<td>'+d.Like_UI+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Navigation Feature:</td>'+
         			'<td>'+d.Navigation_feature+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Process Flow:</td>'+
         			'<td>'+d.Process_flow+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Tools Provided:</td>'+
         			'<td>'+d.Tools_provided+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Rate:</td>'+
         			'<td>'+d.Rate+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Recommendations:</td>'+
         			'<td>'+d.Recommend+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Like Most:</td>'+
         			'<td>'+d.Like_most+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Like Least:</td>'+
         			'<td>'+d.Like_least+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Bugs Found:</td>'+
         			'<td>'+d.Bugs+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>Improvement:</td>'+
         			'<td>'+d.Improve+'</td>'+
         		'</tr>'+
         		'<tr>'+
         			'<td>New Feature:</td>'+
         			'<td>'+d.New_feature+'</td>'+
         		'</tr>'+
         	'</table>';
         }
         
         $(document).ready(function() {
         	var table = $('#example').DataTable( {
         		"ajax": {
         			"url":"fetchdata.php"
         		},
         		"columns": [
         			{
         				"className":      'details-control',
         				"orderable":      false,
         				"data":           null,
         				"defaultContent": ''
         			},
         			{ "data": "Name" },
         			{ "data": "Email" },
         			{ "data": "Role" },
         			{ "data": "Major" },
         			{ "data": "Creation_date" }
         		]
         	} );
         
         	// Add event listener for opening and closing details
         	$('#example tbody').on('click', 'td.details-control', function () {
         		var tr = $(this).closest('tr');
         		var row = table.row( tr );
         
         		if ( row.child.isShown() ) {
         			// This row is already open - close it
         			row.child.hide();
         			tr.removeClass('shown');
         		}
         		else {
         			// Open this row
         			row.child( format(row.data()) ).show();
         			tr.addClass('shown');
         		}
         	} );
         } );
         
         
         	
      </script>
      <!-- Function for copy, csv, excel and print.
         <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
         <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
         <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
         <script type="text/javascript">
         	$(document).ready(function() {
             $('#example').DataTable( {
                 dom: 'Bfrtip',
                 buttons: [
                     'copy', 'csv', 'excel', 'print'
                 ]
             } );
         	} );
         </script> -->
   </body>
</html>