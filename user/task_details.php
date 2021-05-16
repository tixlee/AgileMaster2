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
     
$getAllProjectsAdmin = getAllProjectsAdmin();
$iRow = mysqli_fetch_array($getAllProjectsAdmin);
$project_id = $iRow['project_id'];
$get_project = get_project($project_id);
$cRow = mysqli_fetch_array($get_project);

$get_not_board = get_not_board($project_id);
$nuRow = mysqli_fetch_array($get_not_board);

$user_not = get_user($userId);
$yRow = mysqli_fetch_array($user_not);
$user_name = $yRow['fname'] . " " . $yRow['lname'];
   
   if(isset($_POST['save'])){
       $board_id = $_GET['board_id'];
       
       $completion_date = $_POST["completion_date"];
       $task_id = $_GET['task_id'];
   
       $tn = $_GET['tn'];
       
       insert_completion_date($tn, $completion_date);
       echo "<script>window.location.href ='../user/task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn'</script>";
      
    
   
   }
   
   
   if(isset($_POST['assign'])){
       $board_id = $_GET['board_id'];
       $task_id = $_GET['task_id'];
       $user_id = $_POST["user_id"];
       $created_by = $_POST["user_id"];
       $task_id = $_GET['task_id'];
   
       $tn = $_GET['tn'];

       
       $query = $conn->query("SELECT * FROM `task` WHERE `task_id` = '$task_id' AND `board_id` = '$board_id'") or die(mysqli_error());
       $b_query = $query->fetch_array();
       
       
       $task_name = $b_query['task_name'];
       $due_date = $b_query['due_date'];
       $start_date = $b_query['start_date'];
       $board_name = $nuRow['board_name'];
       insert_more_task_assignees($user_id, $task_id);
       insert_events($created_by, $task_name, $due_date, $due_date, '#FF0000', '#ffffff');

           $recipient_id = $_POST["user_id"];
           insert_notification($recipient_id, "Project Manger assigned  $task_name task to you in $board_name board" );
       
       
       echo "<script>window.location.href ='../user/task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn'</script>";
      
    
   
   }
   
   
   
   if(isset($_POST['post'])){
       $board_id = $_GET['board_id'];
        date_default_timezone_set("Asia/Kuala_Lumpur");
   	$creation_date = date('d-m-Y');
       $user_id = $_SESSION['user_id'];
       $task_id = $_GET['task_id'];
       $comment = $_POST['comment'];
       $comment_id = $_POST['comment_id'];
       $tn = $_GET['tn'];
       insert_comment_task($user_id, $task_id, $comment);
       
       
       $query = $conn->query("SELECT * FROM `task` WHERE `task_id` = '$task_id' AND `board_id` = '$board_id'") or die(mysqli_error());
       $b_query = $query->fetch_array();
       
       
       $task_name = $b_query['task_name'];
       $board_name = $nuRow['board_name'];

$assigns_arr = array();
       $get_not_comment = get_not_comment($cRow['project_id']);
       while ($mrRow = mysqli_fetch_array($get_not_comment)){
           $assigns_arr = array($mrRow['user_id']);
           $assigns = implode($assigns_arr);
           $recipient_id = $assigns;
           insert_notification($recipient_id, "$user_name added new Comment in $task_name task in $board_name board" );}
       
       
       echo "<script>window.location.href ='../user/task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn'</script>";
      
    
   
   }
   
   
   $board_id = $_GET['board_id'];
   
   ?>
<?php 
   $month = date('m');
   $day = date('d');
   $year = date('Y');
   
   $today = $year . '-' . $month . '-' . $day;
   ?>
   

<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Board</title>
      <?php include('../navigation/head.php');?>
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
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
       <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/project_sidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
			
			<div class="bg-custom">
				<div class="bg-img" style="text-align: center;">
					<div class="searchContainer">
						<h2>Task Details</h2>
					</div>
                               
				</div>
                <br>
			</div>
			
               <div class="container-fluid">
			   
			   <br>
					 
						
                  <?php 
                     $getProjectByUser = getProjectByUser($userId);
                     $iRow = mysqli_fetch_array($getProjectByUser);
                     
                     $board_id = $_GET['board_id'];
                     $sql = "SELECT * FROM `board` NATURAL JOIN `project`  WHERE `board_id` = '$board_id'";
                     $result = $conn->query($sql);
                     $bRow = $result->fetch_assoc();
                     $result->free_result();
                     
                     $taskNum = $_GET['tn'];
                     
                     $sql = "SELECT * FROM `task` WHERE `board_id` = '$board_id' AND `project_task_num` = $taskNum";
                     
                      if($result = $conn->query($sql)){
                         $rowsCount = $result->num_rows;
                         if($rowsCount>0){
                             $row = $result->fetch_assoc();
                             $result->free_result();
                         }
                     }
                   if(isset($row['task_id'])){
                       
                     ?>
                  <div class="col-md-12">
                      <button onclick="location.href='task.php?board_id=<?php echo $board_id ?>'" type="button" class="btn btn-dark">
						<i class="ri-arrow-go-back-line"></i> Back
                     </button>
                     <br>
                     <br>
                     <!-- /.card -->
                     <div class="row">
                        <div class="col-md-6">
                           <div class="card card-danger card-outline" style="min-height: 310px;">
                              <div class="card-header">
                                 <h6 class=" font-weight-bold" style="color: #d6002f;" >TASK DETAILS</h6>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                 <div class="font-weight-bold">
                                    Task Name:  <?php echo $row['task_name'];?>
                                 </div>
                                 <br>
                                 <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group shadow-textarea">
                                       <label for="task_desc">Description</label>
                                       <textarea class="form-control"  name="task_desc" id="task_desc" rows="3" readonly><?php echo $row['task_desc']; ?></textarea>
	
                                    </div>
                                 </form>
                              </div>
                              <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                           <div class="card card-danger card-outline">
                              <div class="card-header">
                                 <h6 class="font-weight-bold" style="color: #d6002f;" >STATUS</h6>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table class="table " id="table" width="100%" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td> <strong> Status:  </strong></td>
                                             <td>
                                                <?php
                                                   $status = $row['state'];
                                                   
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
                                          </tr>
                                          <tr>
                                             <td>
                                                <strong> Start Date:  </strong>
                                             </td>
                                             <td>
                                                <?php
                                                   $start_date = $row['start_date'];
                                                   // Creating timestamp from given date
                                                   $timestamp = strtotime($start_date);
                                                   
                                                   // Creating new date format from that timestamp
                                                   $start_format_date = date("d-m-Y", $timestamp);
                                                   echo $start_format_date;
                                                   ?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <strong> Due Date:  </strong>
                                             </td>
                                             <td>
                                                <?php
                                                   $due_date = $row['due_date'];
                                                   // Creating timestamp from given date
                                                   $timestamp = strtotime($due_date);
                                                   
                                                   // Creating new date format from that timestamp
                                                   $new_format_date = date("d-m-Y", $timestamp);
                                                   echo $new_format_date;
                                                   ?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <strong> Completion Date:  </strong>
                                             </td>
                                             <td>
                                                <?php
                                                   $completion_date = $row['completion_date'];
                                                   // Creating timestamp from given date
                                                   $timestamp = strtotime($completion_date);
												   $ontime = " <span style='color:#00FF00; font-weight: bold;'>(ON TIME)</span>";
												   $late = " <span style='color:red; font-weight: bold;'>(LATE)</span>";
                                                   
                                                   // Creating new date format from that timestamp
                                                   $completion_format_date = date("d-m-Y", $timestamp);
                                                   
                                                   if($row['completion_date'] != NULL){
													   if($completion_date > $due_date){
														   echo $completion_format_date . $late;
													   }
													   else{
														   echo $completion_format_date . $ontime;
													   }
                                                       
                                                   
                                                   }else{
                                                       
                                                   ?>
                                                <form method="POST" enctype="multipart/form-data">
                                                   <input class="form-control col-md-9" type="date" value="<?php echo $today; ?>" name="completion_date" id="completion_date" required="" style="float: left;"/>
                                                   <input type="submit" name="save" value="Save" id="submit-fs" class="btn btn-success" style="float: right;"> 
                                                </form>
                                                <?php
                                                   }
                                                   ?>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="card card-danger card-outline">
                              <div class="card-header">
                                 <h6 class=" font-weight-bold"  style="color: #d6002f;" >ASSIGNEES</h6>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <?php
                                       $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$bRow[project_id]'") or die(mysqli_error());
                                       $u_fetch = $u_query->fetch_array();
                                       if($u_fetch['user_id'] == $userId)
                                       {
                                       ?>
                                  <br>
                                 <form method="POST" enctype="multipart/form-data">
                                    <div class="row col-md-6 col-xm-6 mb-3 ">
                                       <label for="exampleDropdown" ></label>
                                       <select data-live-search="true" title="Assign To....." name="user_id" class="form-control selectpicker col-sm-7">
                                          <?php
                                             $user_id = $_GET['user_id'];
                                             $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` WHERE `project_id` = '$bRow[project_id]'") or die(mysqli_error());
                                             while($f_query = $query->fetch_array())
                                             {
                                             ?>
                                          <option value="<?php echo $f_query['user_id']; ?>" <?php if ($user_id == $f_query['user_id']) {echo "selected";} ?> required><?php echo $f_query['fname']; ?></option>
                                          <?php
                                             }
                                             ?>
                                       </select>
                                       <input type="submit" name="assign" value="Assign" id="submit-fs" class="btn btn-success" >  
                                    </div>
                                 </form>
                                  
                                  
                                 <br>
                                  
                                  <?php } ?>
                                  
                                 <div class="table-responsive">
                                    <table class="table " id="table" width="100%" cellspacing="0">
                                       <tbody>
                                          <?php 
                                             $task_id = $row['task_id'];
                                             $getAssignees = getAssignees($task_id);
                                             //                                        $uRow = mysqli_fetch_array($getAssignees);
                                             while($nRow = mysqli_fetch_array($getAssignees)){
                                                if($u_fetch['user_id'] == $userId)
                                                    {
                                             
                                             ?>
                                          <tr>
                                             <td>
                                                <div class="" value = "<?php echo $nRow['user_id'];?>"><strong><?php echo $nRow['fname'] . " " . $nRow['lname']?></strong> </div>
                                             </td>
                                             <?php
                                                $confirmation = "Are you sure to delete this member?";
                                                 
                                                ?>
                                             <td><a  href = "delete_assignees.php?user_id=<?php echo $nRow['user_id']?>&task_id=<?php echo $row['task_id']?>&board_id=<?php echo $row['board_id']?>&tn=<?php echo $row['project_task_num']?>" class = "btn btn-danger " ><span class = "glyphicon glyphicon-trash"></span> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                          </tr>
                                          <?php
                                             }else{
                                             
                                             ?>
                                          <tr>
                                             <td class="border-top-0">
                                                <div class="" value = "<?php echo $nRow['user_id'];?>"><strong><?php echo $nRow['fname'] . " " . $nRow['lname']?></strong> </div>
                                             </td>
                                              
                                          </tr>
                                          <?php
                                             } }
                                             ?>
                                       </tbody>
                                    </table>
                                 </div>
                                 <br>
                              </div>
                              <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                           <div class="card card-danger card-outline">
                              <div class="card-header">
                                 <h6 class=" font-weight-bold"  style="color: #d6002f;" >COMMENTS</h6>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                 <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group" name="comment">
                                       <textarea name="comment" id="comment" class="form-control" placeholder="Write a Comment..." rows="3"></textarea>
                                    </div>
                                    <div class="form-group text-right" >
                                       <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                       <input type="submit" name="post" value="Post" id="submit-fs" class="btn btn-success"/>
                                    </div>
                                 </form>
                                 <hr>
                                 <?php
                                    $getCommentTask = getCommentTask($task_id);
                                    $total_projects = mysqli_num_rows($getCommentTask);
                                    if ($total_projects > 0){
                                    while($vRow = mysqli_fetch_array($getCommentTask)){
                                    ?>
                                 <div class="card">
                                    <div class="card-header">
                                       <?php echo $vRow['fname'] . " " . $vRow['lname'] ?>
                                    </div>
                                    <div class="card-body">
                                       <?php echo $vRow['comment']; ?>
                                    </div>
                                    <div class="card-footer font-weight-bold text-right">
                                       Posted on <?php echo $vRow['creation_date']; ?>
                                    </div>
                                 </div>
                                 <?php 
                                    }
                                    }else{
                                    echo '<div class="text-center font-weight-bold">No Comment Found!</div>';
                                    }
                                    ?>
                              </div>
                              <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                        </div>
                     </div>
                  </div>
                   <?php 
                       }else{
                       echo "<script>window.location.href ='../user/error_page.php'</script>";
                   }
                   ?>
               </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
      </div>
       
             
      <script src="../dependencies/scripts/custom.js"></script>
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
      <script type="text/javascript">
         $("#completion_date").change(function () {
         var completeDate = "<?php echo $start_date ?>";
         var startDate = document.getElementById("completion_date").value;
         
         if ((Date.parse(completeDate) > Date.parse(startDate))) {
         alert("Completion Date should be greater than start date!");
         document.getElementById("completion_date").value = "";
         }
         });
         
         
         
      </script>
   </body>
</html>
