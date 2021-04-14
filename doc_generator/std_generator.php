<?php
use Dompdf\Dompdf;
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

	if(isset($_SESSION['user_id']))
   {
   	$userId = $_SESSION["user_id"];
   }
   
if(isset($_POST['save'])){
    $userId = $_SESSION["user_id"];
    $document_name = $_POST['document_name'];
    $project = $_POST['project'];
    $team_name = $_POST['team_name'];
    $team_member = $_POST['team_member'];
    $purpose = $_POST['purpose'];
    $scope = $_POST['scope'];
    $alpha_testing = $_POST['alpha_testing'];
    $system_and_integration_testing = $_POST['system_and_integration_testing'];
	$performance_and_stress_testing = $_POST['performance_and_stress_testing'];
	$user_acceptance_testing = $_POST['user_acceptance_testing'];
	$batch_testing = $_POST['batch_testing'];
	$automated_regression_testing = $_POST['automated_regression_testing'];
	$beta_testing = $_POST['beta_testing'];
	$hardware_requirement = $_POST['hardware_requirement'];
	$main_frame = $_POST['main_frame'];
	$workstation = $_POST['workstation'];
	$test_schedule = $_POST['test_schedule'];
	$control_procedures = $_POST['control_procedures'];
	$features_to_be_tested = $_POST['features_to_be_tested'];
	$features_not_to_be_tested = $_POST['features_not_to_be_tested'];
	$resources_roles_responsibility = $_POST['resources_roles_responsibility'];
	$schedules = $_POST['schedules'];
	$significantly_impacted_departments = $_POST['significantly_impacted_departments'];
	$dependencies = $_POST['dependencies'];
	$risk_assumptions = $_POST['risk_assumptions'];
	$tools = $_POST['tools'];
	
	insert_std_draft($userId, $document_name, $project, $team_name, $team_member, $purpose, $scope, $alpha_testing, $system_and_integration_testing, $performance_and_stress_testing, 
	$user_acceptance_testing, $batch_testing, $automated_regression_testing, $beta_testing, $hardware_requirement, $main_frame, $workstation, $test_schedule, 
	$control_procedures, $features_to_be_tested, $features_not_to_be_tested, $resources_roles_responsibility, $schedules, $significantly_impacted_departments, $dependencies, 
	$risk_assumptions, $tools);
        echo "<script>alert('Your STD had been saved');</script>";
        echo "<script>window.location.href ='std_generator.php'</script>";
}
        
if(isset($_POST['send'])){

$request = array(
'project'=>$_POST['project'],
'team_name'=>$_POST['team_name'],
'team_member'=>$_POST['team_member'],
'purpose'=>$_POST['purpose'],
'scope'=>$_POST['scope'],
'alpha_testing'=>$_POST['alpha_testing'],
'system_and_integration_testing'=>$_POST['system_and_integration_testing'],
'performance_and_stress_testing'=>$_POST['performance_and_stress_testing'],
'user_acceptance_testing'=>$_POST['user_acceptance_testing'],
'batch_testing'=>$_POST['batch_testing'],
'automated_regression_testing'=>$_POST['automated_regression_testing'],
'beta_testing'=>$_POST['beta_testing'],
'hardware_requirement'=>$_POST['hardware_requirement'],
'main_frame'=>$_POST['main_frame'],
'workstation'=>$_POST['workstation'],
'test_schedule'=>$_POST['test_schedule'],
'control_procedures'=>$_POST['control_procedures'],
'features_to_be_tested'=>$_POST['features_to_be_tested'],
'features_not_to_be_tested'=>$_POST['features_not_to_be_tested'],
'resources_roles_responsibility'=>$_POST['resources_roles_responsibility'],
'schedules'=>$_POST['schedules'],
'significantly_impacted_departments'=>$_POST['significantly_impacted_departments'],
'dependencies'=>$_POST['dependencies'],
'risk_assumptions'=>$_POST['risk_assumptions'],
'tools'=>$_POST['tools']
);

//include template
if(!isset($_POST['purpose'])) dir();
require_once('data_std.php');
$template = ob_get_clean();

//include dompdf library
require_once('dompdf/autoload.inc.php');


//using pdf dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($template);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('STD Document');

//write pdf to directory
file_put_contents('pdfs/STD.pdf', $dompdf->output());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>AgileMaster | STD Document Generator</title>
	<?php include('../navigation/head.php');?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="../dependencies/summernote/summernote-bs4.css">
    <link href="css/style.css" rel="stylesheet" media="all">
     <style type="text/css">
          
           
           .bg-custom{
              background-image: url("../resources/images/profile_header.png");
              background-color: #9a1b25;
              border-bottom-left-radius: 20% 50%;
              border-bottom-right-radius: 20% 50%;
              
          }
          .bg-img {
              max-width: 35%;
              min-height: 220px;
              max-height: auto;
              margin-left:auto;
              margin-right:auto;
              text-align: center;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              color: white; 
              padding: 30px 0px 0px 0px;
              font-size: 60px;
              font-weight: bold;
           }
       </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="se-pre-con"></div>
<div class="wrapper">
	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/docgeneratorstd_sidebar.php');?>
	<div class="content-wrapper">
		<section class="content">
            
             <div class="bg-custom" >
                    <div class="bg-img" style="text-align: center;">
                       
							<h4 class="m-4 font-weight-bold">STD Document Generator</h4>
							<h6 class="m-4 font-weight-bold">STD document describes a set of basic software test information that covers test plan, test specification and test report. Test plan prescribes the scope, approach, resource and schedule of the testing activities. Test specification covers the test cases, test procedures and input/output assumptions. Test report identifies the test items, test log and summary report.</h6>
						</div>
            </div>
            <br>
            
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-body">
					
						<form method="POST" name="createDoc" id="DocCreator"  enctype="multipart/form-data" style="width: 95%; margin: 0 auto;">
							
                            <div class="form-group">
								<div class="name">
									<label for="title">Document Name</label>
								</div>
								<div class="value">
									<input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter the name of your custom document." >
								</div>
							</div>
                            <hr>
							<div class="forms-row">
								<div class="name">
									<label for="project">Project Name</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="project" name="project" placeholder="Enter the project name."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="team_name">Team Name</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="team_name" name="team_name" placeholder="Enter the team name."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="team_member">Team Member</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="team_member" name="team_member" placeholder="Enter the team member."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="purpose">Purpose</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="purpose" name="purpose" placeholder="Enter the purposes of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="scope">Scope</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="scope" name="scope" placeholder="Enter the scope of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="alpha_testing">Alpha Testing(Unit Testing)</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="alpha_testing" name="alpha_testing" placeholder="Enter the Alpha Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="system_and_integration_testing">System and Integration Testing</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="system_and_integration_testing" name="system_and_integration_testing" placeholder="Enter the System and Integration Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="performance_and_stress_testing">Performance and Stress Testing</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="performance_and_stress_testing" name="performance_and_stress_testing" placeholder="Enter the System and Integration Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="user_acceptance_testing">User Acceptance Testing</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="user_acceptance_testing" name="user_acceptance_testing" placeholder="Enter the User Acceptance Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="batch_testing">Batch Testing</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="batch_testing" name="batch_testing" placeholder="Enter the Batch Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="automated_regression_testing">Automated Regression Testing</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="automated_regression_testing" name="automated_regression_testing" placeholder="Enter the Automated Regression Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="beta_testing">Beta Testing</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="beta_testing" name="beta_testing" placeholder="Enter the Beta Testing of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="hardware_requirement">Hardware Requirements</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="hardware_requirement" name="hardware_requirement" placeholder="Enter the Hardware Requirement of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="main_frame">Main Frame</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="main_frame" name="main_frame" placeholder="Enter the Main Frame of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="workstation">Workstation</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="workstation" name="workstation" placeholder="Enter the Workstation of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="test_schedule">Test Schedule</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="test_schedule" name="test_schedule" placeholder="Enter the Test Schedule of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="control_procedures">Control Procedures</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="control_procedures" name="control_procedures" placeholder="Enter the Control Procedures of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="features_to_be_tested">Features to Be Tested</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="features_to_be_tested" name="features_to_be_tested" placeholder="Enter the Features to Be Tested of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="features_not_to_be_tested">Features Not to Be Tested</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="features_not_to_be_tested" name="features_not_to_be_tested" placeholder="Enter the Features Not to Be Tested of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="resources_roles_responsibility">Resources/Roles & Responsibilities</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="resources_roles_responsibility" name="resources_roles_responsibility" placeholder="Enter the Resources, Roles and Responsiblity of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="schedules">Schedules</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="schedules" name="schedules" placeholder="Enter the Schedules of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="significantly_impacted_departments">Significantly Impacted Departments(SIDs)</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="significantly_impacted_departments" name="significantly_impacted_departments" placeholder="Enter the Schedules of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="dependencies">Dependencies</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="dependencies" name="dependencies" placeholder="Enter the Dependencies of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="risk_assumptions">Risks/Assumptions</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="risk_assumptions" name="risk_assumptions" placeholder="Enter the Dependencies of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="tools">Tools</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="tools" name="tools" placeholder="Enter the Tools of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="row">
                                <div class="col text-left">

                                    <button class="btn btn-success" type="submit" name="send">Generate</button>
                                </div>
                                <div class="col text-right">

                                    <button class="btn btn-success" type="submit" name="save">Save As Draft</button>
                                </div>
                            </div>
							
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	<aside class="control-sidebar control-sidebar-dark">
	</aside>
</div>

<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/summernote/summernote-bs4.min.js"></script>

<script src="https://cdn.tiny.cloud/1/zbwxd68unhb04dwmmeg1vag9kxdb9c20ooz4ltujm995ho0r/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: '.mytextarea'
	});
</script>

<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>
<script src="js/global.js"></script>
<script src="../dependencies/scripts/google.js"></script>
</body>
</html>

