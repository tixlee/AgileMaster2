<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   ?>
<?php include 'sendemail.php'; ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Members</title>
      <?php include('../navigation/head.php');?>
       <style type="text/css">

           /* Center the loader */
            #loader {
              position: absolute;
              left: 50%;
              top: 50%;
              z-index: 1;
              width: 120px;
              height: 120px;
              margin: -76px 0 0 -76px;
              border: 16px solid #f3f3f3;
              border-radius: 50%;
              border-top: 16px solid #9a1b25;
              -webkit-animation: spin 2s linear infinite;
              animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
              position: relative;
              -webkit-animation-name: animatebottom;
              -webkit-animation-duration: 1s;
              animation-name: animatebottom;
              animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
              from { bottom:-100px; opacity:0 } 
              to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
              from{ bottom:-100px; opacity:0 } 
              to{ bottom:0; opacity:1 }
            }

       </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()" style="margin:0;">
      <div id="loader"></div>
      <div class="wrapper animate-bottom" style="display:none;" id="myDiv" >
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/member_sidebar.php');?>
         <div class="content-wrapper">
            <br><br>
            <section class="content">
               <div class="container-fluid">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                  <i class="far fa-envelope"></i> INVITE MEMBER
                  </button>
                  <?php echo $alert; ?>
                  <div class="modal fade" id="myModal" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3>Send Invitation</h3>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <form class="contact" action="" method="post">
                              <div class="modal-body">
                                 <label class="col-md-12 col-xm-3" for="email">Email Address: 
                                 <input text="email" id="email" name="email" class="form-control col-md-12" placeholder="mail@mail.com">
                                 </label>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 <button type="submit" name="submit" class="btn btn-success" id="basic-addon2">Send</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <br >
                  <br >
                  <?php 
                     $getProjectByUser = getProjectByUser($userId);
                     $total_projects = mysqli_num_rows($getProjectByUser);
                     
                     while($row = mysqli_fetch_array($getProjectByUser))
                     {
                         
                       $getAllProjects = getAllProjects($row['project_id']);
                       $rRow = mysqli_fetch_array($getAllProjects);
                       $project = $row['project_id'];
                     ?>
                  <div class="card shadow mb-4">
                     <div class="card-header">
                        <h1 class="card-title font-weight-bold"  style="color: #990021;">Project Name: <?php echo $rRow['project_name']; ?></h1>
                        <input type = "hidden" id = "project_id" value = "<?php echo $a_fetch['project_id'];?>" />
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                           </button>
                        </div>
                        <!-- /.card-tools -->
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th >Member Name</th>
                                    <th >Email Address</th>
                                    <th >Role</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$row[project_id]'") or die(mysqli_error());
                                    $u_fetch = $u_query->fetch_array();
                                    
                                    $query = $conn->query("SELECT * FROM `users` NATURAL JOIN `user_project` NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                    while($b_query = $query->fetch_array())
                                    {
                                        
                                    ?>
                                 <tr>
                                    <td> 
                                       <?php echo $b_query['fname']?>
                                    </td>
                                    <td >
                                       <?php echo $b_query['email']?>
                                    </td>
                                    <td >
                                       <?php 
                                          if($u_fetch['user_id'] == $b_query['user_id'])
                                          {
                                              echo'Project Manager';
                                          }else{
                                              echo'Project Member';
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
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <?php 
                     }
                     ?>
               </div>
            </section>
         </div>
         <aside class="control-sidebar control-sidebar-dark">
         </aside>
      </div>
       
                            <script>
            var myVar;

            function myFunction() {
              myVar = setTimeout(showPage, 1000);
            }

            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
        </script>
      <script src="../dependencies/navigation/jquery/jquery.min.js"></script>
      <script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
      <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="../dependencies/scripts/datatables-demo.js"></script>  
      <script src="../dependencies/navigation/js/adminlte.js"></script>
      <script>
         $(document).ready(function() {
             $('table#dataTables').DataTable( {
                 fixedHeader: {
                     header: true,
                     footer: true
                 }
             } );
         } );
      </script>
   </body>
</html>