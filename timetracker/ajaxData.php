<?php 
// Include the database config file 
include_once 'dbConfig.php'; 
 


if(!empty($_POST["project_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM board WHERE project_id = ".$_POST['project_id']." ORDER BY board_name ASC"; 
    $result = $db->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Board</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['board_id'].'">'.$row['board_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Board not available</option>'; 
    } 
}elseif(!empty($_POST["board_id"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM task WHERE board_id = ".$_POST['board_id']." ORDER BY task_name ASC"; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select task</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['task_id'].'">'.$row['task_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Task not available</option>'; 
    } 
} 
?>