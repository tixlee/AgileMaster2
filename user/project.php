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
   
   if(isset($_SESSION['role']))
   {
   	$role = $_SESSION["role"];
   }
   
   if(isset($_POST['create'])){
       
       date_default_timezone_set("Asia/Kuala_Lumpur");
   	$creation_date = date('d-m-Y');
       
       $user_id = $_SESSION['user_id'];
   //    $project_id = $_SESSION['project_id'];
       $role = $_SESSION["role"];
       $project_name = strip_tags($_POST['project_name']);
       $project_description = strip_tags($_POST['project_description']);
       
       $project_name = mysqli_real_escape_string($conn, $project_name);
       $project_description = mysqli_real_escape_string($conn, $project_description);
       
       $proj = mysqli_query($conn, "SELECT project_name FROM `project` WHERE `project_name` = '$project_name'");
       $reslt = mysqli_num_rows($proj);
       
       insert_project($project_name, $project_description);
           insert_user_project($user_id);
           insert_user_created_project($user_id);
           update_role($user_id, $role);
           echo "<script>window.location.href ='../user/project.php'</script>";
   
   }  
   
   
   
   ?>
<?php
   // Create an encryption method to hide the id number in the URL Link
   
   // Create a variable for data
   $data = 50;
   
   // Encrypt the data by randoming the number from 10 to 100000
   $encrypt_1 =  $data*rand(10,10000);
   
   // Using Base64 Encryption method to encrypt the data and show on the URL for id number
   // $link = "../user/project_details.php?project_id=".urlencode(base64_encode($encrypt_1));
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Projects</title>
      <?php include('../navigation/head.php');?>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
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
                        <h2>Project List</h2>
                     </div>
                  </div>
                  <br>
               </div>
               <br>
               <div class="container-fluid">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                  <i class="fas fa-project-diagram"></i> Add Project
                  </button>
                  <button type="button" class="btn btn-secondary" style="float: right;" onclick="location.href='archive_project.php'"><span class="iconify" data-icon="bi-archive" data-inline="false"></span> Archived</button>
                  <br><br>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">New Project</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form method="POST" enctype="multipart/form-data">
                                 <input type="hidden" name="project_id" value="<?php $_SESSION['project_id']; ?>">
                                 <div class="row col-md-12 col-xm-3">
                                    <label for="project_name">Project Name</label>
                                    <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Enter Project Name" required autocomplete="off">
                                 </div>
                                 <br>
                                 <div class="row col-md-12 col-xm-6">
                                    <label for="project_description">Project Description</label>
                                    <textarea class="form-control" name="project_description"  placeholder="Enter Project Description" autocomplete="off" required></textarea>
                                 </div>
                                 <br>
                                 <div class="modal-footer">
                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                    <input type="submit" name="create" value="Create" id="submit-fs" class="btn btn-success" >
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row" id="wrapper">
                     <?php 
                        $getProjectByUser = getProjectByUser($userId);
                        while($row = mysqli_fetch_array($getProjectByUser))
                           {
                               $getAllProjects = getAllActiveProjects($row['project_id']);
                               $rRow = mysqli_fetch_array($getAllProjects);
                               $project_id = $row['project_id'];
                            
                            if(mysqli_num_rows($getAllProjects) > 0) {
                             ?>
                     <div class="box-wrap col-xl-3 col-md-4 mb-4" >
                        <div class="card shadow" style="border-radius: 15px;">
                           <a href="project_details.php?project_id=<?php echo $row['project_id'].urlencode(base64_encode($encrypt_1)); ?>">
                           <img src="../resources/images/5.jpg" height="180" class="" style="filter: brightness(90%); color: #990021; width: 100%; border-top-left-radius: 15px; border-top-right-radius: 15px;" /></a>
                           <?php
                              $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$project_id'") or die(mysqli_error());
                              $u_fetch = $u_query->fetch_array();
                              if($u_fetch['user_id'] == $userId)
                              {
                              
                              ?>
                           <?php 
                              $getProjectInfo = getProjectInfo($row['project_id']);
                              $sRow = mysqli_fetch_array($getProjectInfo);
                              
                              //    $p_query = $conn->query("SELECT * FROM `project` NATURAL JOIN `users` NATURAL JOIN `user_project` WHERE `project_id` = '$sRow[project_id]'") or die(mysqli_error());
                              //                              $p_fetch = $p_query->fetch_array();
                              
                              
                              ?>
                           <div class="item-action dropdown" align="right" style="position: absolute; right: 5px; top: 5px; z-index: 1;" >
                              <a id="board-id" href="#" data-toggle="dropdown" class="text-muted" data-abc="true" >
                                 <svg xmlns="http://www.w3.org/2000/svg"  color="white" width="25" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="16" cy="12" r="1"></circle>
                                    <circle cx="16" cy="5" r="1"></circle>
                                    <circle cx="16" cy="19" r="1"></circle>
                                 </svg>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                 <?php
                                    $confirmation = "Are you sure about archiving the selected project?";
                                    ?>
                                 <a href = "#"  class="dropdown-item trash" data-abc="true" data-toggle="modal" data-target="#xampleModalCenter-<?php echo $row['project_id'];?>" style="color:black;">
                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit</a>
                                 <div class="dropdown-divider"></div>
                                 <a href = "archive.php?project_id=<?php echo $row['project_id']?>&status=Archive&project_name=<?php echo $rRow['project_name']?>" class="dropdown-item trash" data-abc="true"  onclick="return confirm('<?php echo $confirmation; ?>')" style="color:black;">
                                 <span class="iconify" data-icon="bi-archive" data-inline="false"></span>&nbsp; Archive</a>
                              </div>
                           </div>
                           <?php 
                              }
                              ?>
                           <div class="modal fade" id="xampleModalCenter-<?php echo $row['project_id'];?>" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Edit Project</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <form method="POST" action="edit_project.php?project_id=<?php echo $row['project_id']; ?>" enctype="multipart/form-data">
                                          <input type="hidden" name="project_id" value="<?php $_POST['project_id']; ?>">
                                          <div class="row col-md-12 col-xm-3">
                                             <label for="project_name">Project Name</label> <!-- Removed class="sr-only" -->
                                             <input type="text" name="proj_name" id="projectname" class="form-control" value="<?php echo $rRow['project_name']; ?>" placeholder="Project Name" required autocomplete="off">
                                          </div>
                                          <br>
                                          <div class="row col-md-12 col-xm-6">
                                             <label for="project_description">Project Description</label> <!-- Removed class="sr-only" -->
                                             <textarea class="form-control" name="proj_description"  placeholder="Project Description" autocomplete="off" required><?php echo $rRow['project_description']; ?></textarea>
                                          </div>
                                          <br>
                                          <div class="modal-footer">
                                             <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                             <input type="submit" name="update" value="Update" id="submit-fs" class="btn btn-success" >
                                             <input type="hidden" name="project_id" value="<?php $row['project_id']; ?>">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a href="project_details.php?project_id=<?php echo $row['project_id'].urlencode(base64_encode($encrypt_1)); ?>" class="h5 font-weight-bold text-uppercase mb-1">
                              <div class="card-body" style="color:#9a1b25;">
                                 <?php echo $rRow['project_name']; ?>
                              </div>
                           </a>
                        </div>
                     </div>
                     <?php 
                        }
                        } 
                        ?>
                  </div>
               </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
      </div>
      <script>
         const dragArea = document.querySelector("#wrapper");
         new Sortable(dragArea, {
           animation: 350
         });
      </script>
      <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>   <!-- For archive icon -->  
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