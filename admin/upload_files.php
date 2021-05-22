<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Uploads</title>
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
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar_admin.php');?>
         <?php include('../navigation/upload_adminsidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
               <div class="bg-custom">
                  <div class="bg-img" style="text-align: center;">
                     <div class="searchContainer">
                        <h2>Upload Files</h2>
                     </div>
                  </div>
                  <br>
               </div>
               <br>
               <div class="container-fluid">
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th >File Name</th>
                                    <th >File</th>
                                    <th >Document Type</th>
                                    <th >Uploaded By</th>
                                    <th >Date Uploaded</th>
                                    <th >Download</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $get_AllStorage = get_AllStorage();
                                    while($asRow = mysqli_fetch_array($get_AllStorage))
                                    {
                                    $u_query = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$asRow[user_id]'") or die(mysqli_error());
                                        $u_fetch = $u_query->fetch_array();
                                    ?>
                                 <tr class='tbl-link' href="../upload/file_storage/">
                                    <td><?php echo $asRow['file_name']?></td>
                                    <td><?php echo $asRow['file']?></td>
                                    <td><?php echo $asRow['document_type']?></td>
                                    <td><?php echo $u_fetch['fname'] . " " . $u_fetch['lname'];?></td>
                                    <td><?php echo $asRow['date_uploaded']?></td>
                                    <?php
                                       echo "
                                           
                                                                            <td> 
                                                                                <center>
                                                                                    <a class='file-link mg btn btn-success' href='../upload/file_storage/".$asRow['file']."' download>Download</a>
                                                                                </center>
                                                                            </td>
                                                                            
                                                                         ";?> 
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
   </body>
</html>