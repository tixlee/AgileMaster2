<?php 


session_start();
ob_start();

include_once '../connection/dbconnection.php';
//include_once '../helpers/module.php';
//include_once '../resources/links/require.php';



//
//if(!empty($_POST["proj_id"])){ 
//    // Fetch state data based on the specific country 
//    $query = "SELECT * FROM board WHERE project_id = ".$_POST['proj_id']." ORDER BY state_name ASC"; 
//    $result = $conn->query($query); 
//     
//    // Generate HTML of state options list 
//    if($result->num_rows > 0){ 
//        echo '<option value="">Select State</option>'; 
//        while($row = $result->fetch_assoc()){  
//            echo '<option value="'.$row['board_id'].'">'.$row['board_name'].'</option>'; 
//        } 
//    }else{ 
//        echo '<option value="">State not available</option>'; 
//    } 
//}elseif(!empty($_POST["brd_id"])){ 
//    // Fetch city data based on the specific state 
//    $query = "SELECT * FROM task WHERE board_id = ".$_POST['brd_id']." ORDER BY city_name ASC"; 
//    $result = $conn->query($query); 
//     
//    // Generate HTML of city options list 
//    if($result->num_rows > 0){ 
//        echo '<option value="">Select city</option>'; 
//        while($row = $result->fetch_assoc()){  
//            echo '<option value="'.$row['task_id'].'">'.$row['task_name'].'</option>'; 
//        } 
//    }else{ 
//        echo '<option value="">City not available</option>'; 
//    } 
//}




$request = 0;

if(isset($_POST['request'])){
	$request = $_POST['request'];
}

// Fetch state list by countryid
if($request == 1){
	$countryid = $_POST['countryid'];

	$stmt = $conn->prepare("SELECT * FROM board WHERE project_id=:project_id ORDER BY name");
	$stmt->bindValue(':project_id', (int)$countryid, PDO::PARAM_INT);

	$stmt->execute();
	$statesList = $stmt->fetchAll();

	$response = array();
	foreach($statesList as $state){
		$response[] = array(
				"board_id" => $state['board_id'],
				"board_name" => $state['board_name']
			);
	}

	echo json_encode($response);
	exit;
}

// Fetch city list by stateid
if($request == 2){
	$stateid = $_POST['stateid'];

	$stmt = $conn->prepare("SELECT * FROM task WHERE board_id=:board_id ORDER BY name");
	$stmt->bindValue(':board_id', (int)$stateid, PDO::PARAM_INT);

	$stmt->execute();
	$statesList = $stmt->fetchAll();

	$response = array();
	foreach($statesList as $state){
		$response[] = array(
				"task_id" => $state['task_id'],
				"task_name" => $state['task_name']
			);
	}

	echo json_encode($response);
	exit;




?>