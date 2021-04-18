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
$project_id = $_GET['project_id'];
$get_project = get_project($project_id);
$cRow = mysqli_fetch_array($get_project);

$get_not_board = get_not_board($project_id);
$nuRow = mysqli_fetch_array($get_not_board);

$user_not = get_user($userId);
$yRow = mysqli_fetch_array($user_not);

$user_name = $yRow['fname'];
$proj_name = $cRow['project_name'];
// $brd_name = $nuRow['board_name'];
   
   if(isset($_POST['save'])){
//       $recipients = array($nuRow['user_id']);
//       $recipient_id = implode($recipients);
       $project_id = $_GET['project_id'];
       $board_name = strip_tags($_POST['board_name']);
       $board_name = mysqli_real_escape_string($conn, $board_name);
       insert_board($project_id, $board_name);
       
              $assigns_arr = array();
       $get_not_comment = get_not_comment($cRow['project_id']);
       while ($mrRow = mysqli_fetch_array($get_not_comment)){
           $assigns_arr = array($mrRow['user_id']);
           $assigns = implode($assigns_arr);
           $recipient_id = $assigns;
           insert_notification($recipient_id, "Project Manager added new board in $proj_name project" );}
       
//       insert_notification($recipient_id, "$user_name added $board_name board into $proj_name project" );
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }
                            
   
   if(isset($_POST['post'])){
       
       
       
       
       $userId = $_SESSION['user_id'];
       $project_id = $_GET['project_id'];

       $title = strip_tags($_POST['title']);
       $description = strip_tags($_POST['description']);
       
       $title = mysqli_real_escape_string($conn, $title);
       $description = mysqli_real_escape_string($conn, $description);
       
//       $assigns_arr = array();
       $get_not_comment = get_not_comment($cRow['project_id']);
       while ($mrRow = mysqli_fetch_array($get_not_comment)){
//           $assigns_arr = array($mrRow['user_id']);
//           $assigns = implode($assigns_arr);
           $recipient_id = $mrRow['user_id'];
           insert_announcement($userId, $project_id, $recipient_id, $title, $description);}
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }                        
   
   if(isset($_POST['add'])){
       
       
       
       
       $user_id = $_POST['user_id'];
       $recipient_id = $_POST['user_id'];
       $project_id = $_GET['project_id'];
       insert_member_project($user_id, $project_id);
       insert_notification($recipient_id, "Project Manager added you into $proj_name project" );
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }
   
   if(isset($_POST['switch'])){
       $user_id = $_POST['user_id'];
       $recipient_id = $_POST['user_id'];
       $project_id = $_GET['project_id'];
       update_user_created_project($project_id, $user_id);
       insert_notification($recipient_id, "$user_name swithed role with you in $proj_name project" );
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }
   
   //$user_id = $_GET['user_id'];
   
   
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
   
<?php include 'sendemail.php'; ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Project Details</title>
      <?php include('../navigation/head.php');?>
       <style type="text/css">
          .nav-tabs{
          border:1px solid rgba(0,0,0,.125);
		  border-top-left-radius: 0rem;
          border-top-right-radius: 0rem;
          }
          .nav-tabs .nav-link{
	      border-left:1px solid rgba(0,0,0,.125);  
          padding: 15px 30px;
          border-top-left-radius: 0rem;
          border-top-right-radius: 0rem;
          }
          .nav-tabs .nav-link.active{
          background-color: #2a384c;
          border-color: #2a384c;
          color: #fff;
          }
          .nav-tabs .nav-item a{
          color: #000;
          }
		  
		  
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
						<h2>Project Details</h2>
					</div>
                               
				</div>
                <br>
			</div>
			
               <div class="container-fluid">
                  <?php 
                     
                     
                     
                     ?>
					 <!-- Back Button -->
					<!-- Back Button -->
					 <br>
					 
					 
				  <div class="col-md-12">
                      
                      <button onclick="location.href='project.php'" type="button" class="btn btn-dark">
						<i class="ri-arrow-go-back-line"></i> Back
                     </button>
					 <br><br>
                      
                     <div class="card">
                        <div class="card-header">
                           <h1 class="card-title font-weight-bold">Project: <?php echo $cRow['project_name']; ?></h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <ul class="nav nav-tabs nav-justified" id="myTabMD" role="tablist" style="font-weight: bold;">
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Project Description</a>
                              </li>
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link " id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md" aria-selected="false">Team Members</a>
                              </li>
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Boards</a>
                              </li>
                           </ul>
                           <div class="tab-content card pt-3" id="myTabContentMD" style="min-height: 330px;">
                              <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md" style="font-weight: bold;">
                                 <p style="padding: 0 15px 0 15px;"><?php echo $cRow['project_description']; ?></p>
                              </div>
                              <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                                 <div class="col-md-6 pb-3" align="left">
                                    <?php
                                       $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$project_id'") or die(mysqli_error());
                                       $u_fetch = $u_query->fetch_array();
                                       if($u_fetch['user_id'] == $userId)
                                       {
                                       ?>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-plus"></i> Add Board
                                    </button>
                                    <?php
                                       }
                                       ?>
                                    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Board</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                   <div class="form-group">
                                                      <label for="board_name">Board Name</label>
                                                      <input type="text" name="board_name" id="board_name" class="form-control" placeholder="Board Name" required autocomplete="off">
                                                      <input type = "hidden" id = "project_id" value = "<?php echo $a_fetch['project_id'];?>" />
                                                   </div>
                                                   <br>
                                                   <div class="modal-footer">
                                                      <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                      <input type="submit" name="save" value="Create" id="submit-fs" class="btn btn-success" >
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    $a_query = $conn->query("SELECT * FROM `project` WHERE `project_id` = '$project_id'") or die(mysqli_error());
                                    $a_fetch = $a_query->fetch_array();
                                    $project = $a_fetch['project_id'];
                                    
                                    
                                        
                                    ?>
                                 <div class="card-body">
                                    <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                             <tr>
                                                <th >Board Name</th>
                                                <th >
                                                   <center>View Board</center>
                                                </th>
                                                <?php            
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                                   
                                                   ?>
                                                <th >
                                                   <center>Action</center>
                                                </th>
                                                <?php } ?>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $query = $conn->query("SELECT * FROM `board` WHERE `project_id` = '$a_fetch[project_id]'") or die(mysqli_error());
                                                
                                                while($b_query = $query->fetch_array()){
                                                    
                                                ?>
                                             <tr>
                                                <td > 
                                                   <?php echo $b_query['board_name']?>
                                                </td>
                                                <td >
                                                   <center>
                                                      <a  href="task.php?board_id=<?php echo $b_query['board_id'].urlencode(base64_encode($encrypt_1)); ?>" class = "btn btn-success " >
                                                      View
                                                      </a>
                                                   </center>
                                                </td>
                                                <?php
                                                   $confirmation = "Are you sure about deleting member?";
                                                   
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                       
                                                   ?>
                                                <td >
                                                   <center>
                                                      <a  href = "delete_board.php?board_id=<?php echo $b_query['board_id']?>&project_id=<?php echo $b_query['project_id']?>" class = "btn btn-danger " onclick="return confirm('<?php echo $confirmation; ?>')">
                                                      <span class = "glyphicon glyphicon-trash"></span> <i class="fa fa-trash" aria-hidden="true"></i>
                                                      </a>
                                                   </center>
                                                </td>
                                                <?php
                                                   }	
                                                   ?>
                                             </tr>
                                             <?php
                                                }	
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
                                 <div class="col-md-6 pb-3" align="left">
                                    <!-- Button to Open the Modal -->
                                    <?php
                                       if($u_fetch['user_id'] == $userId)
                                       {
                                       ?>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myAnnounModal">
                                    <i class="fa fa-bullhorn" aria-hidden="true"></i>  Add Announcement
                                    </button>
                                    
                                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                    <i class="fas fa-users"></i>  Add Member
                                    </button>
                                    <?php
                                       }
                                       ?>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#mySecondModal">
                                    <i class="far fa-envelope"></i> Invite
                                    </button>
                                    <?php echo $alert; ?>
                                    <div class="modal fade" id="mySecondModal" role="dialog">
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
                                      <!-- The Modal -->
                                    <div class="modal fade" id="myAnnounModal"  role="dialog" aria-labelledby="myAnnounModal" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <!-- Modal Header -->
                                             <div class="modal-header">
                                                <h4 class="modal-title">Add Announcement</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             </div>
                                             <!-- Modal body -->
                                             <div class="modal-body">
                                              <form method="POST" enctype="multipart/form-data">
                                                 <div class="row col-md-12 col-xm-3">
                                                    <label for="project_name">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Announcement Title" required autocomplete="off">
                                                 </div>
                                                 <br>
                                                 <div class="row col-md-12 col-xm-6">
                                                    <label for="project_description">Description</label>
                                                    <textarea class="form-control" id="description" name="description"  placeholder="Announcement Description" autocomplete="off" required></textarea>
                                                 </div>
                                                 <br>
                                                 <div class="modal-footer">
                                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                    <input type="submit" name="post" value="Post" id="submit-fs" class="btn btn-success" >
                                                 </div>
                                              </form>
                                           </div>
                                          </div>
                                       </div>
                                    </div>
                                     
                                     
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <!-- Modal Header -->
                                             <div class="modal-header">
                                                <h4 class="modal-title">Add Member</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             </div>
                                             <!-- Modal body -->
                                             <div class="modal-body">
                                                <form method="POST"enctype="multipart/form-data">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="exampleDropdown">Select your team member: </label>
                                                         <select data-live-search="true" title="Please select member" name="user_id" class="form-control selectpicker col-sm-6">
                                                            <?php
//                                                               $users = getAllUser();
                                                             $users = mysqli_query($conn,"SELECT * FROM `users` WHERE NOT `user_id` = '" . $userId . "'");
                                                               $user_id = $_GET['user_id'];
                                                               
                                                               while ($p = mysqli_fetch_array($users))
                                                               {
                                                               ?>
                                                            <option value="<?php echo $p['user_id']; ?>" <?php if ($user_id == $p['user_id']) {echo "selected";} ?> required><?php echo $p['fname']. ' ' .$p['lname']; ?> <em style="font-style: italic;"> (<?php echo $p['email']; ?>)</em></option>
                                                            <?php
                                                               }
                                                               ?>
                                                         </select>
                                                         <input type = "hidden" id = "project_id" value = "<?php echo $c_fetch['project_id'];?>" />
                                                      </div>
                                                   </div>
                                                   <!-- Modal footer -->
                                                   <div class="modal-footer">
                                                      <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                      <input type="submit" name="add" value="Add" id="submit-fs" class="btn btn-success" >
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <div class="table-responsive">
                                       <?php
                                          $c_query = $conn->query("SELECT * FROM `project` WHERE `project_id` = '$project_id'") or die(mysqli_error());
                                          $c_fetch = $c_query->fetch_array();
                                          $project = $c_fetch['project_id'];
                                          
                                          
                                          ?>
                                       <table class="table " id="table" width="100%" cellspacing="0">
                                          <thead>
                                             <tr>
                                                <th>Team Member</th>
                                                <?php 
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                   ?>
                                                <th >
                                                   <center>Switch Role</center>
                                                </th>
                                                <th >
                                                   <center>Action</center>
                                                </th>
                                                <?php 
                                                   }
                                                   ?>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` WHERE `project_id` = '$c_fetch[project_id]' order by `fname` ASC") or die(mysqli_error());
                                                
                                                
                                                
                                                while($f_query = $query->fetch_array()){
                                                    
                                                ?>
                                             <tr>
                                                <td class="no-bottom-border "  style="border: 0px;" value = "<?php echo $f_query['user_id'];?>"><?php echo $f_query['fname']?>
                                                   <?php 
                                                      if($u_fetch['user_id'] == $f_query['user_id'])
                                                      {
                                                          echo ' <strong>(Project Manager)</strong>'; }
                                                      ?>
                                                </td>
                                                <?php
                                                   $confirmation = "Are you sure about deleting member?";
                                                   
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                   ?>
                                                <?php 
                                                   if($u_fetch['user_id'] != $f_query['user_id'])
                                                   {
                                                   ?>
												<td style="border: 0px;">
                                                   <center>
                                                      <form method="POST"enctype="multipart/form-data">
                                                         <input type = "hidden" id = "user_id" name = "user_id" value = "<?php echo $f_query['user_id'];?>" />
                                                         <input type="submit" name="switch" value="Switch" id="submit-fs" class="btn btn-success" >
                                                      </form>
                                                   </center>
                                                </td>
                                                <td style="border: 0px;">
                                                   <center>
                                                      <a  href = "#" class = "btn btn-danger "  data-toggle="modal" data-target="#MYModal">
                                                          
                                                      <span class = "glyphicon glyphicon-trash"></span> <i class="fa fa-trash" aria-hidden="true"></i>
                                                      </a>
                                                       <!-- The Modal -->
                                                        <div class="modal" id="MYModal">
                                                          <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                              <!-- Modal Header -->
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              <!-- Modal body -->
                                                              <div class="modal-body text-center mb-5">
                                                                <img src="../resources/images/right1.png" class="img-responsive" style="width: 15%;">
                                                                <h1>Are You Sure?</h1>
                                                                <p>Do you sure to remove this user? This action could not be undone.</p>
                                                                <div class="btn-group">
                                                                  <button type="button" class="btn btn-secondary mr-2 rounded-lg" data-dismiss="modal">Cancel</button>
<!--                                                                  <button type="button" class="btn btn-danger btn-lg rounded-lg">Delete</button>-->
                                                                    <a  href = "delete.php?user_id=<?php echo $f_query['user_id']?>&project_id=<?php echo $f_query['project_id']?>" class = "btn btn-danger rounded-lg" onload="myFunction()">Delete</a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                   </center>
                                                </td>
                                                
                                                <?php } ?>
                                             </tr>
                                             <?php
                                                }
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
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