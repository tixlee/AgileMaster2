<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>

<!DOCTYPE html>
<html>
<head>
  
	<title>AgileMaster | Time Tracker</title>
	<link href="css/timer.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/timer.js" type="text/javascript"></script>
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
       <script>
$(document).ready(function(){
    $('#project').on('change', function(){
        var projectID = $(this).val();
        if(projectID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'project_id='+projectID,
                success:function(html){
                    $('#board').html(html);
                }
            });
        }else{
            $('#board').html('<option value="">Select project first</option>');
            $('#task').html('<option value="">Select board first</option>');
        }
    });

    $('#board').on('change', function(){
        var boardID = $(this).val();
        if(boardID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'board_id='+boardID,
                success:function(html){
                    $('#task').html(html);
                }
            });
        }else{
            $('#task').html('<option value="">Select board first</option>');
        }
    });
});

</script>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
	  <div class="se-pre-con"></div>
      <div class="wrapper">

	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/timetracker_sidebar.php');?>

	<div class="content-wrapper">
  <br/>

<?php

      

?>

<!-- Country dropdown -->
<form action="" method="post" style="margin-left: 50px;">
<select id="project" name="project">
<option value="">Select Project</option>
<?php
    
    // Include the database config file
include_once 'dbConfig.php';

// Fetch all the country data
    $getProjectByUser = getProjectByUser($userId);
    while($rRow = mysqli_fetch_array($getProjectByUser)){
//    $getAllProjects = getAllProjects($row['project_id']);
//    $pRow = mysqli_fetch_array($getAllProjects);
    $project_id = $rRow['project_id'];
$query = "SELECT * FROM `project`  WHERE `project_id` = '".$project_id."' ORDER BY project_name ASC";
$result = $db->query($query);
    
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<option value="'.$row['project_id'].'">'.$row['project_name'].'</option>';
    }
}else{
    echo '<option value="">Project not available</option>';
} }
?>
</select>

<!-- State dropdown -->
<select id="board" name="board">
<option value="">Select Project first</option>
</select>

<!-- City dropdown -->
<select id="task" name="task">
<option value="">Select Task first</option>
</select>
<input type="submit" id="submit" name="submit" class="btn btn-success" value="Submit"/>
</form>

		<br><br>
		<section class="content">
			<div class="container-fluid">
	  
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h5 class="m-0 font-weight-bold text-black" style="color: #990021;">Time Tracker</h5>
					</div>
              
					<div class="card-body">
						<button type="button" class="btn btn-success" id="add-project-button" disabled="disabled">Add Project/Task</button>
						<br><br>
						
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
								<thead id="project-table">
									<tr>
										<th style="text-align: center;">Task</th>
										<th style="text-align: center;">Time</th>
										<th style="text-align: center;">Actions</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>


				</div>
			</div>
		</section>
	</div>
	<aside class="control-sidebar control-sidebar-dark">
	</aside>
</div>

<?php
if(isset($_POST['submit'])){
$sql1 = "SELECT * FROM project WHERE project_id = '".$_POST['project']."'";
$sql2 = "SELECT * FROM board WHERE board_id = '".$_POST['board']."'";
$sql3 = "SELECT * FROM task WHERE task_id = '".$_POST['task']."'";
$result1 = $db->query($sql1);
$result2 = $db->query($sql2);
$result3 = $db->query($sql3);
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();
$row3 = $result3->fetch_assoc();
$pro = $row3['task_name'];
}

?>
<script type="text/javascript">
          var prob = '<?= $pro;?>';
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
<script src="../dependencies/scripts/google.js"></script>




</body>
</html>
