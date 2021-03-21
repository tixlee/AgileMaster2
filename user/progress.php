<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   include_once '../resources/links/require.php';
   
   if(isset($_SESSION['user_id']))
   {
   	$userId = $_SESSION["user_id"];
   }
   
   
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Board</title>
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
         <?php include('../navigation/user/progress_sidebar.php');?>
         <div class="content-wrapper">
            <br > <br >
            <section class="content">
               <div class="container-fluid">
                  <?php 
                     $getProjectByUser = getProjectByUser($userId);
                     $total_projects = mysqli_num_rows($getProjectByUser);
                     
                     while($row = mysqli_fetch_array($getProjectByUser))
                     {
                         
                       $getAllProjects = getAllProjects($row['project_id']);
                       $rRow = mysqli_fetch_array($getAllProjects);
                       $project = $row['project_id'];
                     ?>
                  <div class="col-md-12">
                     <div class="card">
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
                        <div class="card-body ">
                           <div class="table-responsive">
                              <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                 <thead>
                                    <tr>
                                       <th>Board Name</th>
                                       <th >Backlog Item</th>
                                       <th >To Do</th>
                                       <th >Doing</th>
                                       <th >Testing</th>
                                       <th >Done</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $query = $conn->query("SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                       while($b_query = $query->fetch_array()){
                                       ?>
                                    <tr >
                                       <td> <?php echo $b_query['board_name']; ?></td>
                                       <td>
                                          <?php
                                             $getBacklogitemTask = getBacklogitemTask($b_query['board_id']);
                                             $total_backlog= mysqli_num_rows($getBacklogitemTask);                
                                             echo $total_backlog;
                                             ?>
                                       </td>
                                       <td>
                                          <?php
                                             $getToDoTask = getToDoTask($b_query['board_id']);
                                             $total_to_do = mysqli_num_rows($getToDoTask);                
                                             echo $total_to_do;
                                             ?>
                                       </td>
                                       <td >
                                          <?php
                                             $getDoingTask = getDoingTask($b_query['board_id']);
                                             $total_doing = mysqli_num_rows($getDoingTask);                
                                             echo $total_doing;
                                             ?>
                                       </td>
                                       <td >
                                          <?php
                                             $getTestingTask = getTestingTask($b_query['board_id']);
                                             $total_testing = mysqli_num_rows($getTestingTask);                
                                             echo $total_testing;
                                             ?>
                                       </td>
                                       <td >
                                          <?php
                                             $getDoneTask = getDoneTask($b_query['board_id']);
                                             $total_task_done = mysqli_num_rows($getDoneTask);                
                                             echo $total_task_done;
                                             ?>
                                       </td>
                                    </tr>
                                    <?php
                                       }	
                                       ?>
                                 </tbody>
                              </table>
                              <br>
                              <hr>
                              <br>
                              <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                 <thead>
                                    <tr>
                                       <th >Board Name</th>
                                       <th >Total Tasks</th>
                                       <th >Tasks Left</th>
                                       <th >Completed Tasks</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $query = $conn->query("SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                       while($b_query = $query->fetch_array()){
                                       ?>
                                    <tr >
                                       <td> <?php echo $b_query['board_name']; ?></td>
                                       <td>
                                          <?php
                                             $getTaskByBoard = getTaskByBoard($b_query['board_id']);
                                             $total_tasks = mysqli_num_rows($getTaskByBoard);                
                                             echo $total_tasks;
                                             ?>
                                       </td>
                                       <td>
                                          <?php
                                             $getNotDoneTask = getNotDoneTask($b_query['board_id']);
                                             $total_task_not_done = mysqli_num_rows($getNotDoneTask);                
                                             echo $total_task_not_done;
                                             ?>
                                       </td>
                                       <td >
                                          <?php
                                             $getDoneTask = getDoneTask($b_query['board_id']);
                                             $total_task_done = mysqli_num_rows($getDoneTask);                
                                             echo $total_task_done;
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
                  <?php 
                     } 
                     
                     ?>
               </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
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