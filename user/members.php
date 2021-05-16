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
      <div class="wrapper" >
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/member_sidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
			
			<div class="bg-custom">
				<div class="bg-img" style="text-align: center;">
					<div class="searchContainer">
						<h2>Project Members</h2>
					</div>
                               
				</div>
                <br>
			</div>
			<br>
               <div class="container-fluid">
                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
						<i class="far fa-envelope"></i> Invite
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
                  <br>
                  <br>
                  <?php 
                     $getProjectByUser = getProjectByUser($userId);
                     $total_projects = mysqli_num_rows($getProjectByUser);
                     
                     while($row = mysqli_fetch_array($getProjectByUser))
                     {
                         
                       $getAllProjects = getAllProjects($row['project_id']);
                       $rRow = mysqli_fetch_array($getAllProjects);
                       $project = $row['project_id'];
                     ?>
					
                  <div class="card shadow mb-4 card-danger card-outline">
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
									<th >Profile Picture </th>
                                    <th >Member Name</th>
									<th > Status </th>
                                    <th >Email Address</th>
                                    <th >Role</th>
									<th >Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php
                                    $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$row[project_id]'") or die(mysqli_error());
                                    $u_fetch = $u_query->fetch_array();
                                    
                                    $query = $conn->query("SELECT * FROM `users` NATURAL JOIN `user_project` WHERE NOT `user_id` = '$userId' AND `project_id` = '$row[project_id]'") or die(mysqli_error());
                                    while($b_query = $query->fetch_array()) {
                                   
                                    ?>
                                 <tr>
									<td style="text-align: center;">
										<?php
                                            echo '<img src="../upload/profile/'.$b_query["photo"].'" id="sideimg" class="img-circle elevation-2" alt="User Image">';
                                        ?>	
									</td>
									
                                    <td> 
                                       <?php echo $b_query['fname']?>
                                    </td>
									
									<td>
                                        <?php
                                            if($b_query['status'] =='Online'){
                                                ?>
                                        
                                              <span class="badge badge-success"><?php echo $b_query['status']; ?></span>
                                            <?php
                                            }else{
                                              ?>
                                            <span class="badge badge-dark"><?php echo $b_query['status']; ?></span>
                                        <?php
                                            }
                                        ?>
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
									<td>
                                  
                                        <a  href="chat.php?user_id=<?php echo $b_query['unique_id']; ?>" class = "btn btn-success " >
                                                      <i class='fas fa-comments' style="font-size: 1.5em;"></i>
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
              myVar = setTimeout(showPage, 500);
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
	  <script src="../dependencies/scripts/google.js"></script>
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