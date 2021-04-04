<?php

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
}
?>  

	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item mr-auto" style="text-align: center; margin-top: 5px;" >
				<a href="../user/dashboard.php"><img src="../resources/images/logo.png" alt="" style="max-width: 12%;margin-left: 20%;" ></a>
			</li>
		</ul>
		<div id="google_translate_element" style="margin-top:1.25%;"></div>
		<ul class="navbar-nav ml-auto">
		
<!--
			<a class="nav-link"  href="#" style="margin-left: 10%; margin-top:-5%;">
					<i class="ri-notification-2-fill" style='font-size:1.5em'></i>
					<span class="badge badge-warning navbar-badge"></span>
			</a>
-->
			
            <li class="nav-item dropdown" id="noti_count">
            <a class="nav-link" href="http://example.com" id="dropdown01" style="margin-left: 10%; margin-top:-5%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
               
                <i class="ri-notification-2-fill" style='font-size:1.5em'></i>
                <?php  
                    $get_notification = get_notification($userId);
                    $row = mysqli_fetch_array($get_notification);
                    
//                    $n_query = $conn->query("SELECT * FROM `notification` WHERE `recipient_id` = '$userId'") or die(mysqli_error());
//                    $n_fetch = $n_query->fetch_array();
                    if(mysqli_num_rows($get_notification)>0){
                ?>
					<span class="counter badge badge-danger  navbar-badge"><?php echo mysqli_num_rows($get_notification); ?></span>
                <?php
                    }
                ?>
             
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
               <div>
              <?php 
//                $select_status = $conn->select_order_limit('notification', 'not_id', 10);
//                $n_query = $conn->query("SELECT * FROM `notification` WHERE `recipient_id` = '$userId' ORDER BY `date_time` DESC") or die(mysqli_error());
//                $n_fetch = $n_query->fetch_array();
                if(mysqli_num_rows($get_notification)>0){ foreach($get_notification as $se_noti){ ?>
    
        <h6 class="dropdown-item font-weight-bold" ><?php echo $se_noti['activity']; ?> 
            <br><small><i><?php echo $se_noti['date_time']; ?></i></small></h6>
                
<!--        <hr class="mt-1 mb-1">-->

                 <div class="dropdown-divider"></div>
    <?php }}else{
                     echo '<h6 class="dropdown-item font-weight-bold" >No Records Yet!</h6>';
                 } ?>
             
                </div>
            </div>
          </li>
            
			
			<a class="nav-link"  href="users.php">
					<i class='fas fa-comments' style='font-size:1.5em'></i>
					<span class="badge badge-warning navbar-badge"></span>
			</a>
			
		
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="fas fa-user-tie" style="font-size: 1.5em;"></i>
					<span class="badge badge-warning navbar-badge"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<a href="profile.php" class="dropdown-item">
						<i class="fas fa-user-tie"></i> &nbsp;&nbsp;&nbsp;My Profile
					</a>
					<div class="dropdown-divider"></div>
					<a href="reportissue.php" class="dropdown-item">
						<i class="far fa-flag"></i> &nbsp;&nbsp;&nbsp;Report
					</a>
					<div class="dropdown-divider"></div>
                    <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
                        if(mysqli_num_rows($sql) > 0){
                          $row = mysqli_fetch_assoc($sql);
                        }
                      ?>
					<a href="../main/logout.php?logout_id=<?php echo $row['user_id']; ?>" class="dropdown-item">
						<i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;&nbsp;Logout
					</a>
				</div>
			</li>
		</ul>
	</nav>
	
<style>
	.translated-ltr{margin-top:-40px;}
	.translated-ltr{margin-top:-40px;}
	.goog-te-banner-frame {display: none;margin-top:-20px;}

	.goog-logo-link {
	display:none !important;
	} 

	.goog-te-gadget{
	color: transparent !important;
	}
</style>

<script type="text/javascript">
    $(document).ready(function (){
        
        
    $('#noti_count').on('click',function (){
            counter = 0;
            $('.counter').text('0').hide();
        });
});
</script>