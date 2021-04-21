<?php
session_start();
ob_start();

include_once 'connection/dbconnection.php';
include_once 'helpers/module.php';

if(isset($_POST['send'])){
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



?>