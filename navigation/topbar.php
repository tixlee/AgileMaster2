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
				<a href="../user/dashboard.php"><img src="../resources/images/logo.png" alt="" style="max-width: 12%;" ></a>
			</li>
		</ul>
		
		<ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3"><a href="users.php" class="dropdown-item"> <i class='fas fa-comments' style='font-size:30px'></i></a></li>
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