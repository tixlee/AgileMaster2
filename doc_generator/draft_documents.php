<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Documents</title>
      <?php include('../navigation/head.php');?>
      <style type="text/css">
         .bg-custom{
         background-image: url("../resources/images/profile_header.png");
         background-color: #9a1b25;
         border-bottom-left-radius: 20% 50%;
         border-bottom-right-radius: 20% 50%;
         }
         .bg-img {
         max-width: 35%;
         min-height: 150px;
         max-height: auto;
         margin-left:auto;
         margin-right:auto;
         text-align: center;
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         color: white; 
         padding: 30px 0px 0px 0px;
         font-size: 60px;
         font-weight: bold;
         }
         .nav-tabs{
         border:0px solid;
         }
         .nav-tabs .nav-link{
         padding: 15px 30px;
         border-top-left-radius: 0rem;
         border-top-right-radius: 0rem;
         }
         .nav-tabs .nav-link.active{
         background-color: #2a384c;
         border-color: #2a384c;
         color: #fff;
         }
         .nav-tabs .nav-item a{
         color: #000;
         }
      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar_docsgenerator.php');?>
         <?php include('../navigation/user/docgeneratordraft_sidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
               <div class="bg-custom" >
                  <div class="bg-img" style="text-align: center;">
                     <h2 class="mt-3">Draft Documents</h2>
                     <h6 class="mt-3">Meeting Minutes/Meeting Agenda/SRS Report/SDD Report/STD Report/Custom</h6>
                  </div>
               </div>
               <br>
               <div class="container-fluid">
                  <div class="card">
                     <ul class="nav nav-tabs nav-justified" id="myTabMD" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                           <a class="nav-link active font-weight-bold" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Meeting Minutes</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                           <a class="nav-link   font-weight-bold" id="meetingagenda-tab-md" data-toggle="tab" href="#meetingagenda-md" role="tab" aria-controls="meetingagenda-md" aria-selected="false">Meeting Agenda</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                           <a class="nav-link   font-weight-bold" id="srs-tab-md" data-toggle="tab" href="#srs-md" role="tab" aria-controls="srs-md" aria-selected="false">SRS Report</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                           <a class="nav-link   font-weight-bold" id="sdd-tab-md" data-toggle="tab" href="#sdd-md" role="tab" aria-controls="sdd-md" aria-selected="false">SDD Report</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                           <a class="nav-link   font-weight-bold" id="std-tab-md" data-toggle="tab" href="#std-md" role="tab" aria-controls="std-md" aria-selected="false">STD Report</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                           <a class="nav-link   font-weight-bold" id="custom-tab-md" data-toggle="tab" href="#custom-md" role="tab" aria-controls="custom-md" aria-selected="false">Custom</a>
                        </li>
                     </ul>
                     <div class="tab-content card pt-3" id="myTabContentMD">
                        <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th >Document Name</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $get_All_Meeting_Minutes_Draft_Document = get_All_Meeting_Minutes_Draft_Document($userId);
                                          while($mRow = mysqli_fetch_array($get_All_Meeting_Minutes_Draft_Document))
                                          {
                                               $get_Meeting_Minutes_Draft_Document = get_Meeting_Minutes_Draft_Document($mRow['meeting_minutes_draft_id']);
                                               $mmRow = mysqli_fetch_array($get_Meeting_Minutes_Draft_Document);
                                               $confirmation = "Are you sure about deleting document?";
                                          ?>
                                       <tr >
                                          <td ><?php echo $mmRow['document_name'];?></td>
                                          <td >
                                             <a href="meeting_minutes_draft_document.php?meeting_minutes_draft_id=<?php echo $mmRow['meeting_minutes_draft_id']; ?>" class="btn btn-success">
                                             <i class="fas fa-edit"></i>
                                             </a>
                                             &nbsp;
                                             &nbsp;
                                             <a href='delete_drafts.php?meeting_minutes_draft_id=<?php echo $mmRow['meeting_minutes_draft_id'];?>"'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php 
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="meetingagenda-md" role="tabpanel" aria-labelledby="meetingagenda-tab-md">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th >Document Name</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $get_All_Meeting_Agenda_Draft_Document = get_All_Meeting_Agenda_Draft_Document($userId);
                                          while($maRow = mysqli_fetch_array($get_All_Meeting_Agenda_Draft_Document))
                                          {
                                               $get_Meeting_Agenda_Draft_Document = get_Meeting_Agenda_Draft_Document($maRow['meeting_agenda_draft_id']);
                                               $maaRow = mysqli_fetch_array($get_Meeting_Agenda_Draft_Document);
                                               $confirmation = "Are you sure about deleting document?";
                                          ?>
                                       <tr >
                                          <td ><?php echo $maaRow['document_name'];?></td>
                                          <td >
                                             <a href="meeting_agenda_draft_document.php?meeting_agenda_draft_id=<?php echo $maaRow['meeting_agenda_draft_id']; ?>" class="btn btn-success">
                                             <i class="fas fa-edit"></i>
                                             </a>
                                             &nbsp;
                                             &nbsp;
                                             <a href='delete_drafts.php?meeting_agenda_draft_id=<?php echo $maaRow['meeting_agenda_draft_id'];?>"'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php 
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="srs-md" role="tabpanel" aria-labelledby="srs-tab-md">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th >Document Name</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $get_All_Srs_Draft_Document = get_All_Srs_Draft_Document($userId);
                                          while($row = mysqli_fetch_array($get_All_Srs_Draft_Document))
                                          {
                                               $get_SRS_Draft_Document = get_SRS_Draft_Document($row['srs_id']);
                                               $rRow = mysqli_fetch_array($get_SRS_Draft_Document);
                                               $confirmation = "Are you sure about deleting document?";
                                          ?>
                                       <tr >
                                          <td ><?php echo $rRow['document_name'];?></td>
                                          <td >
                                             <a href="srs_draft_document.php?srs_id=<?php echo $rRow['srs_id']; ?>" class="btn btn-success">
                                             <i class="fas fa-edit"></i>
                                             </a>
                                             &nbsp;
                                             &nbsp;
                                             <a href='delete_drafts.php?srs_id=<?php echo $rRow['srs_id']?>"'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php 
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="sdd-md" role="tabpanel" aria-labelledby="sdd-tab-md">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th >Document Name</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $get_All_SDD_Draft_Document = get_All_SDD_Draft_Document($userId);
                                          while($sdRow = mysqli_fetch_array($get_All_SDD_Draft_Document))
                                          {
                                               $get_SDD_Draft_Document = get_SDD_Draft_Document($sdRow['sdd_id']);
                                               $sddRow = mysqli_fetch_array($get_SDD_Draft_Document);
                                               $confirmation = "Are you sure about deleting document?";
                                          ?>
                                       <tr >
                                          <td ><?php echo $sddRow['document_name'];?></td>
                                          <td >
                                             <a href="sdd_draft_document.php?sdd_id=<?php echo $sddRow['sdd_id']; ?>" class="btn btn-success">
                                             <i class="fas fa-edit"></i>
                                             </a>
                                             &nbsp;
                                             &nbsp;
                                             <a href='delete_drafts.php?sdd_id=<?php echo $sddRow['sdd_id']?>"'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php 
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="std-md" role="tabpanel" aria-labelledby="std-tab-md">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th >Document Name</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $get_All_STD_Draft_Document = get_All_STD_Draft_Document($userId);
                                          while($stRow = mysqli_fetch_array($get_All_STD_Draft_Document))
                                          {
                                               $get_STD_Draft_Document = get_STD_Draft_Document($stRow['std_id']);
                                               $stdRow = mysqli_fetch_array($get_STD_Draft_Document);
                                               $confirmation = "Are you sure about deleting document?";
                                          ?>
                                       <tr >
                                          <td ><?php echo $stdRow['document_name'];?></td>
                                          <td >
                                             <a href="std_draft_document.php?std_id=<?php echo $stdRow['std_id']; ?>" class="btn btn-success">
                                             <i class="fas fa-edit"></i>
                                             </a>
                                             &nbsp;
                                             &nbsp;
                                             <a href='delete_drafts.php?std_id=<?php echo $stdRow['std_id']?>"'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php 
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="custom-md" role="tabpanel" aria-labelledby="custom-tab-md">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th >Document Name</th>
                                          <th >Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $get_All_Custom_Draft_Document = get_All_Custom_Draft_Document($userId);
                                          while($cRow = mysqli_fetch_array($get_All_Custom_Draft_Document))
                                          {
                                               $get_Custom_Draft_Document = get_Custom_Draft_Document($cRow['custom_draft_id']);
                                               $ccRow = mysqli_fetch_array($get_Custom_Draft_Document);
                                               $confirmation = "Are you sure about deleting document?";
                                          ?>
                                       <tr >
                                          <td ><?php echo $ccRow['document_name'];?></td>
                                          <td >
                                             <a href="custom_draft_document.php?custom_draft_id=<?php echo $ccRow['custom_draft_id']; ?>" class="btn btn-success">
                                             <i class="fas fa-edit"></i>
                                             </a>
                                             &nbsp;
                                             &nbsp;
                                             <a href='delete_drafts.php?custom_draft_id=<?php echo $ccRow['custom_draft_id']?>"'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php 
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
      </div>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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
         $(document).ready(function() {
             
             $('table#dataTables').DataTable( {
                 fixedHeader: {
                     header: true,
                     footer: true,
                     "targets": 0
                 }
             } );
         } );
      </script>
   </body>
</html>