<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

//Checking Details for reset password
if(isset($_POST['next'])){
    
    $email = strip_tags($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    
        $query=mysqli_query($conn,"select user_id from  users where email='$email'");
        $row=mysqli_num_rows($query);
        if($row>0){

        $_SESSION['email']=$email;
        header('location:../index.php');
        } else {
            echo "<script>alert('Invalid Email Address. Please Try Again!');</script>";
            echo "<script>window.location.href ='forgot-password.php'</script>";
        }    
}

?>

<?php include 'sendmailforgotpassword.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <?php include_once('../head/head.php');?>
	<title>AgileMaster | Reset Password</title>
    <link href="../resources/images/logo_small.png" rel="icon">
    <link href="dependencies/css/style.css" rel="stylesheet">
</head>

<body id="login">
<div class="se-pre-con"></div>   
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0 section-bg">
		<div class="container">
			<div class="card login-card">
				<div class="row no-gutters">
					<div class="col-md-7">
						<img src="../resources/images/forgot.png" alt="login" class="login-card-img">
					</div>
					<div class="col-md-5">
						<div class="card-body">
							<div class="logIn col-md-12 mr-auto">
								<img src="../resources/images/logo.png" alt="logo" class="logo">
							</div>
							<p class="login-card-description">You can now reset your password using the link in your email.</p>
							
							<p class="login-card-footer-text">Return to <a href="../index.php" class="text-reset"><strong>Homepage</strong></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>   
    <script src="../dependencies/scripts/google.js"></script>
</body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
