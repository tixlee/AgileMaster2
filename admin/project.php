<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>AgileMaster | Projects</title>
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

  <?php include('../navigation/topbar_admin.php');?>

  <?php include('../navigation/project_adminsidebar.php');?>

	<div class="content-wrapper">
		<section class="content">
			
			
			<div class="bg-custom">
				<div class="bg-img" style="text-align: center;">
					<div class="searchContainer">
						<h2>Boards</h2>
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
                                        <th >Project Name</th>
                                        <th >Project Description</th>
                                        <th >Project Manager</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAllProjectsAdmin = getAllProjectsAdmin();
                                        while($asRow = mysqli_fetch_array($getAllProjectsAdmin))
                                        {
                                            $project_id = $asRow['project_id'];
                                            
                                            $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$asRow[project_id]'") or die(mysqli_error());
                                            $u_fetch = $u_query->fetch_array();
                                            
//                                           
                                            $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` WHERE `user_id` = '$u_fetch[user_id]'") or die(mysqli_error());
                                                $b_query = $query->fetch_array();
                                            
                                    ?>
                                    <tr>
										<td> 
											<?php echo $asRow['project_name'];?>
										</td>

										<td> 
											<?php echo $asRow['project_description'];?>
										</td>
                                        
										<td>
											<?php echo $b_query['fname'] . " " . $b_query['lname'];?>
										</td>
										
										<td>
                                        <?php
                                            if($asRow['status'] =='Active'){
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
