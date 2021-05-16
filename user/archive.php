<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";
//include_once '../resources/links/require.php';



if(isset($_GET['project_id'])){
    $project_id = $_GET['project_id'];
    $newstatus = $_GET['status'];
    $proj_name = $_GET['project_name'];
           $assigns_arr = array();
    
//       $get_not_comment = get_not_comment($project_id);
//       while ($mrRow = mysqli_fetch_array($get_not_comment)){
//           $assigns_arr = array($mrRow['user_id']);
//           $assigns = implode($assigns_arr);
//           $recipient_id = $assigns;
//           insert_notification($recipient_id, "Project Manager archived $proj_name project" );}
    archive_project($project_id, $newstatus);
    
    
    header("location: project.php");
}

//if(isset($_GET['project_id'])){
//    $project_id = $_GET['project_id'];
//    deleteProjectFromUserProject($project_id);
//    header("location: project.php");
//}


//if(isset($_GET['project_id'])){
//    $project_id = $_GET['project_id'];
//    deleteProjectFromUserCreatedProject($project_id);
//    header("location: project.php");
//}





?>