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
      <title>AgileMaster | Dashboard</title>
      <?php include('../navigation/head.php');?>
<style type="text/css">
.v-divider{
 margin-left:5px;
 margin-right:5px;
 width:1px;
 height:100%;
 border-left:1px solid gray;
}
</style>
   </head>
   
   <body class="hold-transition sidebar-mini layout-fixed">
	<div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/user_sidebar.php');?>
         <div class="content-wrapper">
            <br><br>
            <section class="content">
               <div class="container-fluid">
			   
			   
			   <div class="row"> 
					<div class="col-9"> <!-- COL FOR WHOLE DASHBOARD -->

					<div class="row">
                     <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                           <div class="inner">
                              <h3><?php 
                                 $projects = getProjectByUser($userId);
                                 echo mysqli_num_rows($projects); 
                                 ?></h3>
                              <p>Total Projects</p>
                           </div>
                           <div class="icon">
                              <i class="fas fa-project-diagram diagram"></i>
                           </div>
                           <a href="project.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                           <div class="inner">
                              <h3><?php 
                                 $getBoardByProjectAdmins = getBoardByProjectAdmins($userId);
                                 $total_boards = mysqli_num_rows($getBoardByProjectAdmins); 
                                 echo $total_boards;
                                 ?></h3>
                              <p>Total Boards</p>
                           </div>
                           <div class="icon">
                              <i class="fab fa-trello trello"></i>
                           </div>
                           <a href="board.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                           <div class="inner">
                              <h3><?php 
                                 $bug = getAssignedBugByUserId($userId);
                                 echo mysqli_num_rows($bug); 
                                 
                                 ?></h3>
                              <p>Bug To Be Fixed</p>
                           </div>
                           <div class="icon">
                              <i class="fas fa-bug bug"></i>
                           </div>
                           <a href="bug_report.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-6" >
                        <div class="small-box bg-warning">
                           <div class="inner">
                              <h3><?php 
                                 $getDueDate = getDueDate($userId);
                                 echo mysqli_num_rows($getDueDate); 
                                 ?></h3>
                              <p>Total Due Dates</p>
                           </div>
                           <div class="icon">
                              <i class="far fa-calendar-alt diagram"></i>
                           </div>
                           <a href="../calendar/index.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="card card-danger card-outline">
                           <div class="card-header">
                              <h3 class="card-title" style="color: #990021;">
                                 <i class="far fa-chart-bar"></i>
                                 Overall Data
                              </h3>
                              <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                 </button>
                              </div>
                           </div>
                           <div class="card-body">
                              <canvas class="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card card-danger card-outline">
                           <div class="card-header">
                              <h3 class="card-title" style="color: #990021;">
                                 <i class="fas fa-bug"></i>
                                 Bug Chart
                              </h3>
                              <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                                 </button>
                              </div>
                           </div>
                           <div class="card-body">
                              <div id="bar-chart" style="height: 300px;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card shadow mb-4 card-danger card-outline">
                     <div class="card-header py-3">
                         <h3 class="card-title" style="color: #990021;">
                             <i class="fas fa-tasks"></i>
                              Task Assigned To You
                         </h3>
                              <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                                 </button>
                              </div>    
                     </div>
					 
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead style="font-size: 0.8em";>
                                 <tr>
                                    <th >Task Name</th>
                                    <th >Task Description</th>
                                    <th >Board Name</th>
                                    <th >Project Name</th>
                                    <th >Assigned To</th>
                                    <th >Due Date</th>
                                    <th >Start Date</th>
                                    <th >Status</th>
                                    <th >View</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $getAssigneesName = getAssigneesName($userId);
                                    while($asRow = mysqli_fetch_array($getAssigneesName))
                                    {
                                        $task_id = $asRow['task_id'];
                                        $board_id = $asRow['board_id'];
                                        $assignees_arr = array();
                                        $getAssignees = getAssignees($task_id);
                                        while ($nRow = mysqli_fetch_array($getAssignees)){
                                            array_push($assignees_arr, $nRow['fname']);
                                            $assignees = implode($assignees_arr, ", ");
                                        }
                                        
                                        
                                    ?>
                                 <tr >
                                    <td > 
                                       <?php echo $asRow['task_name'];?>
                                    </td>
                                    <td >
                                       <?php echo $asRow['task_desc'];?>
                                    </td>
                                    <td >
                                       <?php echo $asRow['board_name'];?>
                                    </td>
                                    <td >
                                       <?php echo $asRow['project_name'];?>
                                    </td>
                                    <td >
                                       <?php echo $assignees;?>
                                    </td>
                                    <td >
                                       <?php echo $asRow['due_date'];?>
                                    </td>
                                    <td >
                                       <?php echo $asRow['start_date'];?>
                                    </td>
                                    <td >
                                       <?php
                                          $status = $asRow['state'];
                                          
                                          switch ($status) {
                                              case 1:
                                                  echo "Pending";
                                                  break;
                                              case 2:
                                                  echo "TO DO";
                                                  break;
                                              case 3:
                                                  echo "DOING";
                                                  break;
                                              case 4:
                                                  echo "TESTING";
                                                  break;
                                              case 5:
                                                  echo "DONE";
                                                  break;
                                          }
                                          ?>
                                    </td>
                                    <td >
                                       <center>
                                          <a  href="task_details.php?task_id=<?php echo $asRow['task_id']; ?>&board_id=<?php echo $asRow['board_id']; ?>&&tn=<?php echo $asRow['project_task_num']; ?>" class = "btn btn-success " >
                                          View
                                          </a>
                                       </center>
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
                  <div class="card shadow mb-4 card-danger card-outline">
                     <div class="card-header py-3">
                        <h3 class="card-title" style="color: #990021;">
                             <i class="fas fa-bug"></i>
                              Bug To Be Fixed
                         </h3>
                              <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                                 </button>
                              </div>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                              <thead style="font-size: 0.8em";>
                                 <tr>
                                    <th >Bug Name</th>
                                    <th >Bug Description</th>
                                    <th >Created By</th>
                                    <th >Priority</th>
                                    <th >Creation Date</th>
                                    <th >Due Date</th>
                                    <th >Start Date</th>
                                    <th >Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $getAssignedBugByUserId = getAssignedBugByUserId($userId);
                                    while($buugRow = mysqli_fetch_array($getAssignedBugByUserId))
                                    {
                                        $created_by = $buugRow['created_by'];
                                        $getBugByUserId = getBugByUserId($created_by);
                                        $assignedRow = mysqli_fetch_array($getBugByUserId);
                                        
                                    ?>
                                 <tr >
                                    <td > 
                                       <?php echo $buugRow['bug_name'];?>
                                    </td>
                                    <td >
                                       <?php echo $buugRow['bug_desc'];?>
                                    </td>
                                    <td >
                                       <?php echo $assignedRow['fname'];?>
                                    </td>
                                    <td >
                                       <?php echo $buugRow['priority'];?>
                                    </td>
                                    <td >
                                       <?php echo $buugRow['creation_date'];?>
                                    </td>
                                    <td >
                                       <?php echo $buugRow['due_date'];?>
                                    </td>
                                    <td >
                                       <?php echo $buugRow['start_date'];?>
                                    </td>
                                    <td >
                                       <?php echo $buugRow['state'];?>
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
				
				<div class="col-3"> 
                        <div class="card card-danger card-outline"  style="min-height:1325px;">
<!--
                              <h4 class="card-title" style="text-align:center";>
                                 <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                 Announcement
                              </h4>
-->
                            <ul class="nav nav-tabs nav-justified" id="myTabMD" role="tablist">
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link active font-weight-bold" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true"><i class="fa fa-bell"  aria-hidden="true"></i> <br>Notification</a>
                              </li>
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link   font-weight-bold" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false"><i class="fa fa-bullhorn" aria-hidden="true"></i> <br>Announcement</a>
                              </li>
                           </ul>

                         
                            
                            
                           <div class="tab-content card-body" id="myTabContentMD"> 
                            <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
								
                    <div class="col-13">
                           <?php
                                  
                                  $get_notification = get_notification($userId);
                                    if(mysqli_num_rows($get_notification)>0){ 
                                        while($notRow = mysqli_fetch_array($get_notification)){
                            ?>
                        <div class="card card-danger card-outline">
                           <div class="toast-header">
                                <strong><i class="fa fa-bell" aria-hidden="true"></i></strong>
                                &nbsp;
                                <strong>Notification</strong> <div class="col text-right"><strong><?php echo $notRow['date_time']; ?></strong></div>

                                <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                            </div>

                            <div class="toast-body">
                                <?php echo $notRow['activity']; ?>
                            </div>
                        </div>

                            <?php } } ?>
                    </div>
								
                               </div>	
								
                               
                               <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
								
                    <div class="col-13">
                            <?php
                                  
                                  
                              $get_announcement = get_announcement($userId);
                            if(mysqli_num_rows($get_announcement)>0){
                             while($announRow = mysqli_fetch_array($get_announcement)){
                            
                           
                            ?>  
                        <div class="card card-danger card-outline">
                            <div class="toast-header">
                                <strong><i class="fa fa-bullhorn" aria-hidden="true"></i></strong>
                                &nbsp;
                                <strong><?php echo $announRow['title']; ?></strong>
                               
                                

                                <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                            </div>
                            <div class="toast-header">  <strong>Posted on: <?php echo $announRow['date_time']; ?></strong></div>
                            <div class="toast-body">
                               
                                  
                                <div class="row">
                                    
                                    <div class="col"><?php echo $announRow['description']; ?></div>
                                    <div class="col-sm-5 col-md-5 border-left">
                                        Posted by: <strong>Project Manger</strong>
                                        <br>
                                        Project name: <strong><?php echo $announRow['project_name']; ?></strong>
                                        <br>
                                        Posted to: <strong>Everyone</strong>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                            <?php } } ?>
                    </div>
								
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
       

       
      <!-- ./wrapper -->
      <?php
         $bugreported = getCreatedBugByUserId($userId);
         ?>
      <?php
         $bugassigned = getAssignedBugByUserId($userId);
         ?>
      <?php
         $bugresolved = getResolvedBugByUserId($userId);
         ?>
      <script src="../dependencies/navigation/jquery/jquery.min.js"></script>
      <script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
      <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="../dependencies/scripts/datatables-demo.js"></script>  
      <script src="../dependencies/navigation/js/adminlte.js"></script>
      <script src="../dependencies/chart.js/Chart.min.js"></script>
      <script src="../dependencies/flot/flot/jquery.flot.js"></script>
      <script src="../dependencies/flot/flot-old/jquery.flot.resize.min.js"></script>
      <script src="../dependencies/flot/flot-old/jquery.flot.pie.min.js"></script>
	  <script src="../dependencies/scripts/google.js"></script>
	  
	  
      <script>
         $(function () {
         
           //-------------
           //- DONUT CHART -
           //-------------
           // Get context with jQuery - using jQuery's .get() method.
           var donutChartCanvas = $('.donutChart').get(0).getContext('2d')
           var donutData        = {
             labels: [
                 'Projects', 
                 'Boards',
                 'Bugs', 
                 'Due Dates', 
         
             ],
             datasets: [
               {
                 data: [<?php echo mysqli_num_rows($projects); ?>,
         		 <?php echo mysqli_num_rows($getBoardByProjectAdmins); ?>,
         		 <?php echo mysqli_num_rows($bug); ?>,
         		 <?php echo mysqli_num_rows($getDueDate); ?>,
         ],
         		 
                 backgroundColor : ['#00c0ef', '#00a65a', '#f56954', '#FFA500'],
               }
             ]
           }
           var donutOptions     = {
             maintainAspectRatio : false,
             responsive : true,
           }
           //Create pie or douhnut chart
           // You can switch between pie and douhnut using the method below.
           var donutChart = new Chart(donutChartCanvas, {
             type: 'doughnut',
             data: donutData,
             options: donutOptions      
           })
           
         })
         
         
         
         
         
         $(function () {
           
         
           /*
            * BAR CHART
            * ---------
            */
         
           var bar_data = {
             data : [[1,<?php echo mysqli_num_rows($bugreported); ?>], [2,<?php echo mysqli_num_rows($bugassigned); ?>], [3,<?php echo mysqli_num_rows($bugresolved); ?>]],
             bars: { show: true }
           }
           $.plot('#bar-chart', [bar_data], {
             grid  : {
               borderWidth: 1,
               borderColor: '#f3f3f3',
               tickColor  : '#f3f3f3'
             },
             series: {
                bars: {
                 show: true, barWidth: 0.5, align: 'center',
               },
             },
             colors: ['#3c8dbc'],
             xaxis : {
               ticks: [[1,'Bug Reported'], [2,'Bug Assigned'], [3,'Bug Resolved']]
             }
           })
           /* END BAR CHART */
         
          
         
         })
         
         
      </script>
      <script type="text/javascript">
         $(document).ready(function() {
            $('#example').DataTable( {
                buttons: []
            } );
         } );
      </script>
   </body>
   
</html>