<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   include_once '../resources/links/require.php';
   
 
   
    $project_id = $_GET['project_id'];
   
    if(isset($_POST['update'])){
       
       
//       $project_id = $row['project_id'];
       $proj_name = strip_tags($_POST['proj_name']);
       $proj_description = strip_tags($_POST['proj_description']);
       
       $proj_name = mysqli_real_escape_string($conn, $proj_name);
       $proj_description = mysqli_real_escape_string($conn, $proj_description);
       
       
       update_project($project_id, $proj_name, $proj_description);
          
           echo "<script>window.location.href ='../user/project.php'</script>";
   
   }
   
   ?>
