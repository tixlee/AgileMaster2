<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Members</title>
      <?php include('../navigation/head.php');?>
      <style type="text/css">
         #sideimg{
         height: 4vh;
         width: 4vh;
         object-fit: cover;
         border-radius: 100% 100%;
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
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar_admin.php');?>
         <?php include('../navigation/member_adminsidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
               <div class="bg-custom">
                  <div class="bg-img" style="text-align: center;">
                     <div class="searchContainer">
                        <h2> Members</h2>
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
                                    <th >Profile Picture </th>
                                    <th >Member Name</th>
                                    <th > Email Address </th>
                                    <th >Age</th>
                                    <th >Occupation</th>
                                    <th >City</th>
                                    <th >Country</th>
                                    <th > Status </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $getAllUser = getAllUser();
                                    while($asRow = mysqli_fetch_array($getAllUser))
                                    {
                                    ?>
                                 <tr>
                                    <td style="text-align: center;">
                                       <?php
                                          echo '<img src="../upload/profile/'.$asRow["photo"].'" id="sideimg" class="img-circle elevation-2" alt="User Image">';
                                          ?>
                                    </td>
                                    <td> 
                                       <?php echo $asRow['fname'] . " " .$asRow['lname'];?>
                                    </td>
                                    <td >
                                       <?php echo $asRow['email']?>
                                    </td>
                                    <td> 
                                       <?php echo $asRow['age'];?>
                                    </td>
                                    <td> 
                                       <?php echo $asRow['occupation'];?>
                                    </td>
                                    <td> 
                                       <?php echo $asRow['city'];?>
                                    </td>
                                    <td> 
                                       <?php echo $asRow['country'];?>
                                    </td>
                                    <td>
                                       <?php
                                          if($asRow['status'] =='Online'){
                                              ?>
                                       <span class="badge badge-success"><?php echo $asRow['status']; ?></span>
                                       <?php
                                          }else{
                                            ?>
                                       <span class="badge badge-dark"><?php echo $asRow['status']; ?></span>
                                       <?php
                                          }
                                          ?>
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