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
    $project_name = $_POST['project_name'];
    $team_name = $_POST['team_name'];
    $team_member = $_POST['team_member'];
    $purpose = $_POST['purpose'];
    $scope = $_POST['scope'];
    $definitions_acronyms_abbreviations = $_POST['definitions_acronyms_abbreviations'];
    $business_rules = $_POST['business_rules'];
	$system_specification = $_POST['system_specification'];
	$system_features = $_POST['system_features'];
	$user_classes_characteristics = $_POST['user_classes_characteristics'];
	$design_implementation_constraints = $_POST['design_implementation_constraints'];
	$assumptions = $_POST['assumptions'];
	$operating_environment = $_POST['operating_environment'];
//	$use_case_file = $_POST['use_case_file'];
	$use_case = $_POST['use_case'];
	$external_interface_requirements_user_interfaces = $_POST['external_interface_requirements_user_interfaces'];
	$external_interface_requirements_software_interface = $_POST['external_interface_requirements_software_interface'];
	$external_interface_requirements_communication_interface = $_POST['external_interface_requirements_communication_interface'];
	$non_functional_requirements_usability = $_POST['non_functional_requirements_usability'];
	$non_functional_requirements_reliability = $_POST['non_functional_requirements_reliability'];
	$non_functional_requirements_security = $_POST['non_functional_requirements_security'];
	$non_functional_requirements_portability = $_POST['non_functional_requirements_portability'];
	$non_functional_requirements_maintainability = $_POST['non_functional_requirements_maintainability'];
	$non_functional_requirements_availability = $_POST['non_functional_requirements_availability'];
	$management_process = $_POST['management_process'];

    
    insert_srs_draft($userId, $project_name, $team_name, $team_member, $purpose, $scope, $definitions_acronyms_abbreviations, $business_rules, $system_specification, $system_features, $user_classes_characteristics, $design_implementation_constraints, $assumptions, $operating_environment, $use_case, $external_interface_requirements_user_interfaces, $external_interface_requirements_software_interface, $external_interface_requirements_communication_interface, $non_functional_requirements_usability, $non_functional_requirements_reliability, $non_functional_requirements_security, $non_functional_requirements_portability, $non_functional_requirements_maintainability, $non_functional_requirements_availability, $management_process);
        echo "<script>alert('Your SRS had been saved');</script>";
        echo "<script>window.location.href ='srs_generator.php'</script>";
        

    
}

if(isset($_POST['send'])){

$request = array(
'project_name'=>$_POST['project_name'],
'team_name'=>$_POST['team_name'],
'team_member'=>$_POST['team_member'],
'purpose'=>$_POST['purpose'],
'scope'=>$_POST['scope'],
'definitions_acronyms_abbreviations'=>$_POST['definitions_acronyms_abbreviations'],
'business_rules'=>$_POST['business_rules'],
'system_specification'=>$_POST['system_specification'],
'system_features'=>$_POST['system_features'],
'user_classes_characteristics'=>$_POST['user_classes_characteristics'],
'design_implementation_constraints'=>$_POST['design_implementation_constraints'],
'assumptions'=>$_POST['assumptions'],
'operating_environment'=>$_POST['operating_environment'],
'use_case'=>$_POST['use_case'],
'external_interface_requirements_user_interfaces'=>$_POST['external_interface_requirements_user_interfaces'],
'external_interface_requirements_software_interface'=>$_POST['external_interface_requirements_software_interface'],
'external_interface_requirements_communication_interface'=>$_POST['external_interface_requirements_communication_interface'],
'non_functional_requirements_usability'=>$_POST['non_functional_requirements_usability'],
'non_functional_requirements_reliability'=>$_POST['non_functional_requirements_reliability'],
'non_functional_requirements_security'=>$_POST['non_functional_requirements_security'],
'non_functional_requirements_portability'=>$_POST['non_functional_requirements_portability'],
'non_functional_requirements_maintainability'=>$_POST['non_functional_requirements_maintainability'],
'non_functional_requirements_availability'=>$_POST['non_functional_requirements_availability'],
'management_process'=>$_POST['management_process']
);

//include template
if(!isset($_POST['purpose'])) dir();
require_once('data_srs.php');
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
$dompdf->stream('SRS Document');

//write pdf to directory
file_put_contents('pdfs/SRS.pdf', $dompdf->output());
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

    <title>AgileMaster | SRS Document Generator</title>
	<?php include('../navigation/head.php');?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="../dependencies/summernote/summernote-bs4.css">
    <link href="css/style.css" rel="stylesheet" media="all">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="se-pre-con"></div>
<div class="wrapper">

	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/docgeneratorsrs_sidebar.php');?>

	<div class="content-wrapper">
		<br><br>
		<section class="content">
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-header py-3">
							<h4 class="m-4 font-weight-bold">SRS Document Generator</h4>
							<h6 class="m-4 font-weight-bold">SRS document describes recommended approaches for the software requirements. The purpose is to explain the scope of the project, references made to other standards, definitions of specific terms used, background information and essential parts of the system.</h6>
						</div>
					
						<form method="POST" name="createDoc" id="DocCreator"  enctype="multipart/form-data">
							
							
							
							<div class="form-row">
								<div class="name">
									<label for="project_name">Project Name</label>
								</div>
								<div class="value">
									<div class="form-group">
										<textarea type="text" class="" id="project_name" name="project_name" placeholder="Enter the project name."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="team_name">Team Name</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea type="text" class="textarea--style-6" id="team_name" name="team_name" placeholder="Enter the team name."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="team_member">Team Member</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="team_member" name="team_member" placeholder="Enter the team member."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="purpose">Purpose</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="purpose" name="purpose" placeholder="Enter the purposes of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="scope">Scope</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="scope" name="scope" placeholder="Enter the scope of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="definitions_acronyms_abbreviations">Definitions, Acronyms and Abbreviations</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="definitions_acronyms_abbreviations" name="definitions_acronyms_abbreviations" placeholder="Enter the Definitions, Acronyms and Abbreviations of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="business_rules">Business Rules</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="business_rules" name="business_rules" placeholder="Enter the Business Rules of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="system_specification">System Perspective</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="system_specification" name="system_specification" placeholder="Enter the System Specification of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="system_features">System Features</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="system_features" name="system_features" placeholder="Enter the System Features of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="user_classes_characteristics">User Classes and Characteristics</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="user_classes_characteristics" name="user_classes_characteristics" placeholder="Enter the User Classes Characteristics of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="design_implementation_constraints">Design and implementation Constraints</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="design_implementation_constraints" name="design_implementation_constraints" placeholder="Enter the Design and Implementation Constraints of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="assumptions">Assumptions</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="assumptions" name="assumptions" placeholder="Enter the Assumptions of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="operating_environment">Operating Environment</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="operating_environment" name="operating_environment" placeholder="Enter the Operating Environment of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="use_case">Use Cases</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="use_case" name="use_case" placeholder="Enter the use case details."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="external_interface_requirements_user_interfaces">External Interface Requirements - User Interfaces</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="external_interface_requirements_user_interfaces" name="external_interface_requirements_user_interfaces" placeholder="Enter the User Interface of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="external_interface_requirements_software_interface">External Interface Requirements - Software Interface</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="external_interface_requirements_software_interface" name="external_interface_requirements_software_interface" placeholder="Enter the Software Interface of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="external_interface_requirements_communication_interface">External Interface Requirements - Communication Interface</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="external_interface_requirements_communication_interface" name="external_interface_requirements_communication_interface" placeholder="Enter the Communication Interface of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="non_functional_requirements_usability">Non-functional Requirements - Usability</label>
									</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="non_functional_requirements_usability" name="non_functional_requirements_usability" placeholder="Enter the Non Functional Requirements - usability of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="non_functional_requirements_reliability">Non-functional Requirements - Reliability</label>
									</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="non_functional_requirements_reliability" name="non_functional_requirements_reliability" placeholder="Enter the Non Functional Requirements - reliability of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="non_functional_requirements_security">Non-functional Requirements - Security</label>
									</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="non_functional_requirements_security" name="non_functional_requirements_security" placeholder="Enter the Non Functional Requirements - security of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="non_functional_requirements_portability">Non-functional Requirements - Portability</label>
									</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="non_functional_requirements_portability" name="non_functional_requirements_portability" placeholder="Enter the Non Functional Requirements - portability of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="non_functional_requirements_maintainability">Non-functional Requirements - Maintainability</label>
									</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="non_functional_requirements_maintainability" name="non_functional_requirements_maintainability" placeholder="Enter the Non Functional Requirements - maintainability of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="non_functional_requirements_availability">Non-functional Requirements - Availability</label>
									</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="non_functional_requirements_availability" name="non_functional_requirements_availability" placeholder="Enter the Non Functional Requirements - availability of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="management_process">Management Process</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="management_process" name="management_process" placeholder="Enter the Management Process of the project."></textarea>
									</div>
								</div>
							</div>
							
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
<script>
  $(function () {
    $('.textarea--style-6').summernote()
  })
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

