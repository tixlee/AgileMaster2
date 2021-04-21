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
    $overview = $_POST['overview'];
    $reference_material = $_POST['reference_material'];
	$definitions_acronyms_abbreviations = $_POST['definitions_acronyms_abbreviations'];
	$system_overview = $_POST['system_overview'];
	$system_architecture = $_POST['system_architecture'];
	$data_description = $_POST['data_description'];
	$data_dictionary = $_POST['data_dictionary'];
	$component_design = $_POST['component_design'];
	$overview_of_user_interface = $_POST['overview_of_user_interface'];
	$screen_objects_and_actions = $_POST['screen_objects_and_actions'];
	$requirement_matrix = $_POST['requirement_matrix'];
	
	insert_sdd_draft($userId, $document_name, $project, $team_name, $team_member, $purpose, $scope, $overview, $reference_material, $definitions_acronyms_abbreviations, 
	$system_overview, $system_architecture, $data_description, $data_dictionary, $component_design, $overview_of_user_interface, $screen_objects_and_actions, 
	$requirement_matrix);
        echo "<script>alert('Your SDD had been saved');</script>";
        echo "<script>window.location.href ='sdd_generator.php'</script>";
}

if(isset($_POST['send'])){

$request = array(
'project'=>$_POST['project'],
'team_name'=>$_POST['team_name'],
'team_member'=>$_POST['team_member'],
'purpose'=>$_POST['purpose'],
'scope'=>$_POST['scope'],
'overview'=>$_POST['overview'],
'reference_material'=>$_POST['reference_material'],
'definitions_acronyms_abbreviations'=>$_POST['definitions_acronyms_abbreviations'],
'system_overview'=>$_POST['system_overview'],
'system_architecture'=>$_POST['system_architecture'],
'data_description'=>$_POST['data_description'],
'data_dictionary'=>$_POST['data_dictionary'],
'component_design'=>$_POST['component_design'],
'overview_of_user_interface'=>$_POST['overview_of_user_interface'],
'screen_objects_and_actions'=>$_POST['screen_objects_and_actions'],
'requirement_matrix'=>$_POST['requirement_matrix']
);	

//include template
if(!isset($_POST['purpose'])) dir();
require_once('data_sdd.php');
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
$dompdf->stream('SDD Document');

//write pdf to directory
file_put_contents('pdfs/SDD.pdf', $dompdf->output());
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
    <title>AgileMaster | SDD Document Generator</title>
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

	<?php include('../navigation/topbar_docsgenerator.php');?>
	<?php include('../navigation/user/docgeneratorsdd_sidebar.php');?>

	<div class="content-wrapper">
		<section class="content">
            
            <div class="bg-custom" >
                    <div class="bg-img" style="text-align: center;">
                       
							<h4 class="m-4 font-weight-bold">SDD Document Generator</h4>
							<h6 class="m-4 font-weight-bold">SDD document describes the necessary design information including high level and low level designs. The practice is not limited to specific methodologies for design, configuration management or quality assurance. It can be applied to paper documents, automated database, design description languages or other means of description.</h6>
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
									<label for="overview">Overview</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="overview" name="overview" placeholder="Enter the overview of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="reference_material">Reference Material</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="reference_material" name="reference_material" placeholder="Enter the reference material of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="definitions_acronyms_abbreviations">Definitions, Acronyms and Abbreviations</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="definitions_acronyms_abbreviations" name="definitions_acronyms_abbreviations" placeholder="Enter the Definitions, Acronyms and Abbreviations of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="system_overview">System Overview</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="system_overview" name="system_overview" placeholder="Enter the System Overview of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="system_architecture">System Architecture</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="system_architecture" name="system_architecture" placeholder="Enter the System Architecture of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="data_description">Data Description</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="data_description" name="data_description" placeholder="Enter the Data Description of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="data_dictionary">Data Dictionary</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="data_dictionary" name="data_dictionary" placeholder="Enter the Data Dictionary of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="component_design">Component Design</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="component_design" name="component_design" placeholder="Enter the Component Design of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="overview_of_user_interface">Overview of User Interface</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="overview_of_user_interface" name="overview_of_user_interface" placeholder="Enter the Overview of User Interface of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="screen_objects_and_actions">Screen Objects and Actions</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="screen_objects_and_actions" name="screen_objects_and_actions" placeholder="Enter the Screen Objects and Actions of the project."></textarea>
								</div>
							</div>
							
							<br><hr><br>
							
							<div class="forms-row">
								<div class="name">
									<label for="requirement_matrix">Requirement Matrix</label>
								</div>
								<div class="value">
									<textarea type="text" class="mytextarea" id="requirement_matrix" name="requirement_matrix" placeholder="Enter the Requirement Matrix details."></textarea>
								</div>
							</div>
							
							<br>
							
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

