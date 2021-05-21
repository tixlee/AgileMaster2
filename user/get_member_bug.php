<?php 
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';




if(!empty($_POST["member_id"])) 
{
     $query = mysqli_query($conn,"SELECT * FROM `user_project` NATURAL JOIN `project` WHERE `project_id` = '" . $_POST["member_id"] . "'");
?>
<option value="" >Select Member</option>
<?php
while($row = mysqli_fetch_array($query))  
{
    $sql = mysqli_query($conn,"SELECT * FROM `user_project` NATURAL JOIN `users` WHERE `user_id` = '" . $row["user_id"] . "'");
    $xRow = mysqli_fetch_array($sql);
?>
<option value="<?php echo $xRow['user_id']; ?>"  required><?php echo $xRow['fname'] . " " . $xRow['lname']; ?></option>
<?php
}
}

?>