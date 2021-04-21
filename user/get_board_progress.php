<?php 
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';




if(!empty($_POST["project_id"])) 
{
     $query = mysqli_query($conn,"SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '" . $_POST["project_id"] . "'");
?>
<option value="" >Select Board</option>
<?php
while($row = mysqli_fetch_array($query))  
{
    $sql = mysqli_query($conn,"SELECT * FROM `board` WHERE `board_id` = '" . $row["board_id"] . "'");
    $xRow = mysqli_fetch_array($sql);
?>
<option value="<?php echo $xRow['board_id']; ?>"  required><?php echo $xRow['board_name']; ?></option>
<?php
}
}

?>