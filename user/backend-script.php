<?php

session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

// Fetching state data
$country_id=!empty($_POST['project_id'])?$_POST['project_id']:'';
if(!empty($country_id))
  {
  
  $query="SELECT project_id, project_name from project WHERE project_id=?";
  $countryData = $conn->prepare($query);
  $countryData->bind_param('s',$country_id); 
  $countryData->execute();
  $result=$query->get_result();
        
  if($result->num_rows>0)
  {
     echo "<option value=''>Select State</option>";
     while($arr= $result->fetch_assoc())
     {
        echo "<option value='".$arr['project_id']."'>".$arr['project_name']."</option><br>";
        
      }
   }  
 }


   // Fetching city data
$state_id=!empty($_POST['board_id'])?$_POST['board_id']:'';
if(!empty($state_id))
  {
  $query="SELECT task_id, task_name from task WHERE board_id=?";
  $countryData = $conn->prepare($query);
  $countryData->bind_param('i',$state_id); 
  $countryData->execute();
  $result=$query->get_result();

  if($result->num_rows>0)
  {
     echo "<option value=''>Select City</option>";
     while($arr= $result->fetch_assoc())
     {
            echo "<option value='".$arr['task_id']."'>".$arr['task_name']."</option><br>";
        
     }
  }  
}
?>