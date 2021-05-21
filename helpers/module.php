<?php
   function getAllDueDate()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `events` ");
   
   	return $result;
   }
   
   function getAllUpload($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `file_storage` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   
   //Admin
   function get_admin()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `admin`");
   
   	return $result;
   }
   
   //USERS
   function get_user($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '".$userId."'");
   
   	return $result;
   }
   
   function getAllUser()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` order by `fname` ASC");
   
   	return $result;
   }
   
   function getUserRole($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT role FROM `users`  WHERE `user_id` = '".$userId."'");
   
   	return $result;
   }
   
   function insert_user($fname, $lname, $age, $occupation, $city, $country, $email, $password, $photo, $ran_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `users` (`fname`, `lname`, `age`, `occupation`, `city`, `country`, `email`, `password`, `photo`, `unique_id`) VALUES ('$fname', '$lname', '$age', '$occupation', '$city', '$country', '$email', '$password', '$photo', '$ran_id')");
   
   	return $result;
   }
   
   function getAllRegistered()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` != 'admin'");
   
   	return $result;
   }
   
   function getAllProjectManagerAccounts()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` = 'project manager'");
   
   	return $result;
   }
   
   function getAllProjectMemberAccounts()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` = 'project member'");
   
   	return $result;
   }
   
   
   function delete_all_members($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `users` WHERE `user_id` = '".$user_id."'");
   }
   
   
   function update_user_info($userId, $fname, $lname, $age, $occupation, $city, $country, $email)
   {
       global $conn;
       $result = mysqli_query($conn, "UPDATE `users` SET `fname` = '".$fname."', `lname` = '".$lname."', `age` = '".$age."', `occupation` = '".$occupation."', `city` = '".$city."', `country` = '".$country."', `email` = '".$email."' WHERE `user_id` = '".$userId."'");
       
       return $result;
   }
   function update_user_password($userId, $fname, $lname, $age, $occupation, $city, $country, $email, $password)
   {
       global $conn;
       $result = mysqli_query($conn, "UPDATE `users` SET `fname` = '".$fname."', `lname` = '".$lname."', `age` = '".$age."', `occupation` = '".$occupation."', `city` = '".$city."', `country` = '".$country."', `email` = '".$email."', `password` = '".$password."' WHERE `user_id` = '".$userId."'");
       
       return $result;
   }
   
   function update_role($userId, $role)
   {
       global $conn;
       $result = mysqli_query($conn, "UPDATE `users` SET `role` = 'project manager' WHERE `user_id` = '".$userId."'");
       
       return $result;
   }
   
   function update_profile($userId, $photo)
   {
       global $conn;
       $result = mysqli_query($conn, "UPDATE `users` SET `photo` = '".$photo."' WHERE `user_id` = '".$userId."'");
       
       return $result;
   }
   
   function update_user_status_online($userId, $status)
   {
       global $conn;
       $result = mysqli_query($conn, "UPDATE `users` SET `status` = 'Online' WHERE `user_id` = '".$userId."'");
       
       return $result;
   }
   
   
   //Contact Us Form
   
   
   function insert_contactus($name, $email, $subject, $comment)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `contactusform` (`name`, `email`, `subject`, `comment`) VALUES ('$name', '$email', '$subject', '$comment')");
   
   	return $result;
   }
   
   function getAllContactUsFeedbackForm()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `contactusform` ");
   
   	return $result;
   }
   
   function getAllSystemIssue()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `report_issue` ");
   
   	return $result;
   }
   
   
   // Upload Files
   
   function get_AllStorage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM file_storage order by 'file_name' ASC ");    
   
   	return $result;
   }
   
   
   function insert_storage($date_uploaded, $file_name, $fileName, $document_type, $project_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `file_storage` (`date_uploaded`, `file_name`, `file`, `document_type`, `project_id`, `user_id`) VALUES ('$date_uploaded', '$file_name', '$fileName', '$document_type', '$project_id', '$userId')");
        
   	return $result;	
   }
   
   function check_storagename($fileName)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `file_storage` WHERE `file` = '".$fileName."'");
   
   	return $result;		
   }
   
   function getStorageInfo()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `file_storage`");
   
   	return $result;		
   }
   
   function getStorageInfoProject($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `file_storage` NATURAL JOIN `project`  WHERE `user_id` = '".$userId."'");
   
   	return $result;		
   }
   
   
   function delete_storage($storageid)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `file_storage` WHERE `storage_id` = '".$storageid."'");
   }
   
   
   
   // Project
   function insert_project($project_name, $project_description)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `project` (`project_name`, `project_description`) VALUES ('$project_name', '$project_description')");
   
   	return $result;
   }
   
   
   function update_project($prjct_id, $proj_name, $proj_description)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `project` SET `project_name` = '".$proj_name."', `project_description` = '".$proj_description."' WHERE `project_id` = '".$prjct_id."'");
       
       return $result;
   }
   
   
   function archive_project($project_id, $newstatus)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `project` SET `status` = '".$newstatus."' WHERE `project_id` = '".$project_id."'");
       
       return $result;
   }
   
   
   
   
   // user_project
   function insert_user_project($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `user_project` (`user_id`, `project_id`) VALUES ('$user_id', LAST_INSERT_ID())");
   
   	return $result;
   }
   
   
   
   function insert_member_project($user_id, $project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `user_project` (`user_id`, `project_id`) VALUES ('$user_id', '$project_id')");
   
   	return $result;
   }
   
   function getMembersProjectInAdmin($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project` NATURAL JOIN `users` WHERE `project_id` = '".$project_id."'");
   	return $result;
   }
   
   function getBoardsProjectInAdmin($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `users` WHERE `project_id` = '".$project_id."'");
   	return $result;
   }
   
   
   function get_project($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `project` WHERE `project_id` = '".$project_id."'");
   	return $result;
   }
   
   function getProject()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `project`");
   	return $result;
   }
   
   
   
   
   function getAllProjectsAdmin()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `project`");
   
   	return $result;
   }
   
   
   function getAllProjects($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."' order by 'project_name' ASC");
   
   	return $result;
   }
   
   function getAllActiveProjects($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."' AND `status` = 'Active' order by 'project_name' ASC");
   
   	return $result;
   }
   
   function getAllArchiveProjects($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."' AND `status` = 'Archive' order by 'project_name' ASC");
   
   	return $result;
   }
   
   function getProjectByUser($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project` WHERE `user_id` = '".$userId."'");
   
   	return $result;
   }
   function getFriends($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project` WHERE user_id = '".$userId."'");
   
   	return $result;
   }
   
   function getProjects()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project`");
   
   	return $result;
   }
   
   function getProjectUser($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project` NATURAL JOIN `project` WHERE `user_id` = '".$user_id."'");
   
   	return $result;
   }
   function getProjectInfo($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project` NATURAL JOIN `project` WHERE `project_id` = '".$project_id."'");
   
   	return $result;
   }
   
   
   
   
   // User_Created_Project
   
   function insert_user_created_project($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `user_created_project` (`user_id`, `project_id`) VALUES ('$user_id', LAST_INSERT_ID())");
   
   	return $result;
   }
   
   function update_user_created_project($project_id, $user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `user_created_project` SET `user_id` = '".$user_id."' WHERE `created_proj_id` = '".$project_id."'");
   }
   
   
   
   function getUserCreatedProject($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_created_project` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   
   
   function getManagerByUser($prjt_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_created_project` NATURAL JOIN `user_project` WHERE `project_id` = '$prjt_id'");
   
   	return $result;
   }
   
   
   
   function getProjectManagerByUser($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_created_project` NATURAL JOIN `user_project` WHERE `user_id` = '$user_id'");
   
   	return $result;
   }
   
   function getProjectManagerUser($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$user_id'");
   
   	return $result;
   }
   
   function delete_member($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `user_created_project` WHERE `user_id` = '".$user_id."'");
   }
   
   function deleteMemberFromUserProject($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `user_project` WHERE `user_id` = '".$user_id."'");
   }
   
   
   
   
   // Board
   function insert_board($project_id, $board_name)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `board` (`project_id`, `board_name`) VALUES ('$project_id', '$board_name')");
   
   	return $result;
   }
   
   
   function getBoardByProject($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '$project_id'");
   
   	return $result;
   }
   
   function getBoardByProjectAdmin($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `board_id` = '$board_id'");
   
   	return $result;
   }
   
   function getBoardByProjectAdmins($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `project` NATURAL JOIN `user_project` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   
   function getAllBoardsAdmin()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `project`");
   
   	return $result;
   }
   
   
   function get_board($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board` WHERE `board_id` = '$board_id'");
   
   	return $result;
   }
   
   function getBoard()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board`");
   
   	return $result;
   }
   
   
   function delete_board($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `board` WHERE `board_id` = '$board_id'");
   }
   
   function delete_board_task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `task` WHERE `board_id` = '$board_id'");
   }
   
   
   
   // Task
   function insert_task($task_name, $task_desc, $project_task_num, $board_id, $due_date, $start_date, $state, $created_by)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `task` (`task_name`, `task_desc`, `project_task_num`, `board_id`, `due_date`, `start_date`, `state`, `created_by`) VALUES ('$task_name', '$task_desc', '$project_task_num', '$board_id', '$due_date', '$start_date', 1, '$created_by')");
   
   	return $result;
   }
   
   //Calendar
   function insert_events($userId, $title, $start_event, $end_event, $color, $text_color)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `events` (`user_id`, `title`, `start_event`, `end_event`, `color`, `text_color`) VALUES ('$userId', '$title', '$start_event', '$end_event', '$color', '$text_color')");
   	
   	return $result;
   }
   function insert_completion_date($tn, $completion_date)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `task` SET `completion_date` = '$completion_date' WHERE `project_task_num` = '$tn'");
   
   	return $result;
   }
   
   
   function getTask($tn)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `project_task_num` = '$tn'");
   
   	return $result;
   }
   
   function getTaskDashBoard($task_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `task_id` = '$task_id'");
   
   	return $result;
   }
   
   
   function getTaskByBoard($board_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '$board_id' AND `user_id` = '$userId'");
   
   	return $result;
   }
   function get_TaskBy_Board($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id'");
   
   	return $result;
   }
   
   function getTaskProgress($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id'  AND `state` > 0");
   
   	return $result;
   }
   
   function getBacklogitemTask($board_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '$board_id' AND `user_id` = '$userId' AND `state` = 1");
   
   	return $result;
   }
   
   function get_Back_log_item_Task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 1");
   
   	return $result;
   }
   
   function getToDoTask($board_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '$board_id' AND `user_id` = '$userId' AND `state` = 2");
   
   	return $result;
   }
   
   function get_ToDo_Task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 2");
   
   	return $result;
   }
   
   function getDoingTask($board_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '$board_id' AND `user_id` = '$userId' AND `state` = 3");
   
   	return $result;
   }
   
   
   function get_Doing_Task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 3");
   
   	return $result;
   }
   
   function getTestingTask($board_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '$board_id' AND `user_id` = '$userId' AND `state` = 4");
   
   	return $result;
   }
   
   function get_Testing_Task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 4");
   
   	return $result; 
   }
   
   function getDoneTask($board_id, $userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '$board_id' AND `user_id` = '$userId' AND `state` = 5");
   
   	return $result;
   }
   
   function get_Done_Task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 5");
   
   	return $result;
   }
   
   function getNotDoneTask($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` != 5");
   
   	return $result;
   }
   
   function delete_task($task_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `task` WHERE `task_id` = '".$task_id."'");
   }
   
   function delete_task_assignees($task_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `task_assignees`  WHERE `task_id` = '".$task_id."'");
   }
   
   function deleteTaskAssignees($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `task_assignees`  WHERE `user_id` = '".$user_id."'");
   }
   
   
   // Task Assignees
   function insert_task_assignees($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `task_assignees` (`user_id`, `task_id`) VALUES ('$user_id', LAST_INSERT_ID())");
   
   	return $result;
   }
   
   function insert_more_task_assignees($user_id, $task_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `task_assignees` (`user_id`, `task_id`) VALUES ('$user_id', '$task_id')");
   
   	return $result;
   }
   
   function get_task($board_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `board_id` = '$board_id'");
   
   	return $result;
   }
   
   function getAssignees($task_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task_assignees` NATURAL JOIN `users` NATURAL JOIN `task` WHERE `task_id` = '$task_id'");
   
   	return $result;
   }
   
   function getAssigneesName($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task_assignees` NATURAL JOIN `task` NATURAL JOIN `board` NATURAL JOIN `project`  WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   
   
   function getAllDetailsAdmin()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `project`");
   
   	return $result;
   }
   
   function getDueDate($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT due_date FROM `task` NATURAL JOIN `task_assignees` NATURAL JOIN `board` NATURAL JOIN `project`  WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   
   
   //Comment Section in Task Details Page
   
   
   function insert_comment_task($user_id, $task_id, $comment)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `comment_task` (`user_id`, `task_id`, `comment`) VALUES ('$user_id', '$task_id', '$comment')");
   
   	return $result;
   }
   
   
   
   function getCommentTask($task_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `comment_task` NATURAL JOIN `task` NATURAL JOIN `users` WHERE `task_id` = '$task_id'");
   
   	return $result;
   }
   
   function getAllUploads()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `file_storage`");
   
   	return $result;
   }
   
   
   
   // Bug Report
   
   function insert_bug_report($bug_name, $bug_desc, $created_by, $project_id, $assignee, $priority, $state, $due_date, $start_date)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `bug_report` (`bug_name`, `bug_desc`, `created_by`, `project_id`, `assignee`, `priority`, `state`, `due_date`, `start_date`) VALUES ('$bug_name', '$bug_desc', '$created_by', '$project_id', '$assignee', '$priority', '$state', '$due_date', '$start_date')");
   
   	return $result;
   }
   
   function getBug()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `bug_report`");
   
   	return $result;
   }
   
   function getCreatedBugByUserId($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `bug_report` WHERE `created_by` = '$userId'");
   
   	return $result;
   }
   
   function getAssignedBugByUserId($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `bug_report` WHERE `assignee` = '$userId'");
   
   	return $result;
   }
   
   function getProjectBugByUserId($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `project` WHERE `project_id` = '$project_id'");
   
   	return $result;
   }
   
   function getResolvedBugByUserId($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `bug_report` WHERE `assignee` = '$userId' AND `state` = 'Closed'");
   
   	return $result;
   }
   
   function getAssignedBugAdmin()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `bug_report`");
   
   	return $result;
   }
   
   function getAssigneeBugByUserId($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` NATURAL JOIN `bug_report` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   
   function getBugByUserId($created_by)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$created_by'");
   
   	return $result;
   }
   
   function update_status_bug($bug_id, $state)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `bug_report` SET `state` = '$state' WHERE `bug_id` = '$bug_id'");
   
   	return $result;
   }
   
   
   // Feedback Survey
   
   function insert_feedback($name, $email, $role, $major, $understanding, $experience, $like_ui, $navigation_feature, $process_flow, $tools_provided, $linkage, $rate, $recommend, $like_most, $like_least, $improve, $new_feature, $bugs)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `feedback_survey` (`name`, `email`, `role`, `major`, `understanding`, `experience`,  `like_ui`,  `navigation_feature`,  `process_flow`,  `tools_provided`,  `linkage`, `rate`, `recommend`, `like_most`, `like_least`, `improve`, `new_feature`, `bugs`) VALUES ('$name', '$email', '$role', '$major', '$understanding', '$experience', '$like_ui', '$navigation_feature',  '$process_flow',  '$tools_provided',  '$linkage', '$rate',  '$recommend',  '$like_most', '$like_least', '$improve', '$new_feature', '$bugs')");
   
   	return $result;
   }
   
   function getAllFeedbackForm()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey`");
   
   	return $result;
   }
   
   
   function getHappyUsers()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` = 'Very Good' OR `rate` = 'Excellent'");
   
   	return $result;
   }
   
   // System Rating
   function getRatePoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` = 'Poor'");
   
   	return $result;
   }
   
   function getRateAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` = 'Average'");
   
   	return $result;
   }
   
   function getRateGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` = 'Good'");
   
   	return $result;
   }
   
   function getRateVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` = 'Very Good'");
   
   	return $result;
   }
   
   function getRateExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` = 'Excellent'");
   
   	return $result;
   }
   
   
   function getExperiencePoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `experience` = 'Poor'");
   	
   	return $result;
   }
   
   function getExperienceAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `experience` = 'Average'");
   
   	return $result;
   }
   
   function getExperienceGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `experience` = 'Good'");
   	
   	return $result;
   }
   
   function getExperienceVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `experience` = 'Very Good'");
   	
   	return $result;
   }
   
   function getExperienceExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `experience` = 'Excellent'");
   	
   	return $result;
   }
   
   
   
   function getLikeUiPoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `like_ui` = 'Poor'");
   	
   	return $result;
   }
   
   function getLikeUiAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `like_ui` = 'Average'");
   	
   	return $result;
   }
   
   function getLikeUiGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `like_ui` = 'Good'");
   	
   	return $result;
   }
   
   function getLikeUiVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `like_ui` = 'Very Good'");
   	
   	return $result;
   }
   
   function getLikeUiExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `like_ui` = 'Excellent'");
   	
   	return $result;
   }
   
   
   
   
   function getNavigationPoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `navigation_feature` = 'Poor'");
   	
   	return $result;
   }
   
   function getNavigationAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `navigation_feature` = 'Average'");
   	
   	return $result;
   }
   
   function getNavigationGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `navigation_feature` = 'Good'");
   	
   	return $result;
   }
   
   function getNavigationVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `navigation_feature` = 'Very Good'");
   	
   	return $result;
   }
   
   function getNavigationExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `navigation_feature` = 'Excellent'");
   	
   	return $result;
   }
   
   
   
   
   function getProcessFlowPoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `process_flow` = 'Poor'");
   	
   	return $result;
   }
   
   function getProcessFlowAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `process_flow` = 'Average'");
   	
   	return $result;
   }
   
   function getProcessFlowGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `process_flow` = 'Good'");
   	
   	return $result;
   }
   
   function getProcessFlowVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `process_flow` = 'Very Good'");
   	
   	return $result;
   }
   
   function getProcessFlowExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `process_flow` = 'Excellent'");
   	
   	return $result;
   }
   
   
   
   
   function getToolsPoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `tools_provided` = 'Poor'");
   	
   	return $result;
   }
   
   function getToolsAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `tools_provided` = 'Average'");
   	
   	return $result;
   }
   
   function getToolsGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `tools_provided` = 'Good'");
   	
   	return $result;
   }
   
   function getToolsVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `tools_provided` = 'Very Good'");
   	
   	return $result;
   }
   
   function getToolsExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `tools_provided` = 'Excellent'");
   	
   	return $result;
   }
   
   
   
   
   function getLinkagePoor()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `linkage` = 'Poor'");
   	
   	return $result;
   }
   
   function getLinkageAverage()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `linkage` = 'Average'");
   	
   	return $result;
   }
   
   function getLinkageGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `linkage` = 'Good'");
   	
   	return $result;
   }
   
   function getLinkageVeryGood()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `linkage` = 'Very Good'");
   	
   	return $result;
   }
   
   function getLinkageExcellent()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `linkage` = 'Excellent'");
   	
   	return $result;
   }
   
   
   
   // Report Issue
   
   function insert_issue($name, $issue_name, $desc)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `report_issue` (`name`, `issue_name`, `desc`) VALUES ('$name', '$issue_name', '$desc')");
   
   	return $result;
   }
   
   function getAllReportIssue()
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `report_issue`");
   
   	return $result;
   }
   
   
   
   // Chat
   
   function insert_chat($incoming_msg_id, $outgoing_msg_id, $message)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `messages` (`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$incoming_id', '$outgoing_id', '$message')");
   
   	return $result;
   }
   
   
   // Meeting Minutes Draft
   
   function insert_meeting_minutes_draft($userId, $document_name, $title, $objective, $date, $time, $location, $called_by, $note_taker, $time_keeper, 
   	$attendees, $agenda_items, $decisions, $new_action_items, $notes_info)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `meeting_minutes_draft` (`user_id`, `document_name`, `title`, `objective`, `date`, `time`, `location`, `called_by`, `note_taker`, `time_keeper`, `attendees`, `agenda_items`, `decisions`, `new_action_items`, `notes_info`) VALUES ('$userId', '$document_name', '$title', '$objective', '$date', '$time', '$location', '$called_by', '$note_taker', '$time_keeper', '$attendees', '$agenda_items', '$decisions', '$new_action_items', '$notes_info')");
   
   	return $result;
   }
   function update_meeting_minutes_draft($meeting_minutes_draft_id, $document_name, $title, $objective, $date, $time, $location, $called_by, $note_taker, $time_keeper, 
   	$attendees, $agenda_items, $decisions, $new_action_items, $notes_info)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `meeting_minutes_draft` SET `document_name` = '$document_name', `title` = '$title', `objective` = '$objective', `date` = '$date', `time` = '$time', `location` = '$location', `called_by` = '$called_by', `note_taker` = '$note_taker', `time_keeper` = '$time_keeper', `attendees` = '$attendees', `agenda_items` = '$agenda_items', `decisions` = '$decisions', `new_action_items` = '$new_action_items', `notes_info` = '$notes_info' WHERE `meeting_minutes_draft_id` = '$meeting_minutes_draft_id'");
   
   	return $result;
   }
   
   function get_All_Meeting_Minutes_Draft_Document($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `meeting_minutes_draft` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   function get_Meeting_Minutes_Draft_Document($meeting_minutes_draft_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `meeting_minutes_draft` WHERE `meeting_minutes_draft_id` = '$meeting_minutes_draft_id'");
   
   	return $result;
   }
   
   function delete_meeting_minutes_draft($meeting_minutes_draft_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `meeting_minutes_draft` WHERE `meeting_minutes_draft_id` = '".$meeting_minutes_draft_id."'");
   }
   
   
   // Meeting Agenda Draft
   
   function insert_meeting_agenda_draft($userId, $document_name, $title, $objective, $date, $time, $location, $called_by, $note_taker, $time_keeper, 
   	$attendees, $agenda_items, $action_items_from_previous_meeting, $new_action_items, $notes_info)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `meeting_agenda_draft` (`user_id`, `document_name`, `title`, `objective`, `date`, `time`, `location`, `called_by`, `note_taker`, `time_keeper`, `attendees`, `agenda_items`, `action_items_from_previous_meeting`, `new_action_items`, `notes_info`) VALUES ('$userId', '$document_name', '$title', '$objective', '$date', '$time', '$location', '$called_by', '$note_taker', '$time_keeper', '$attendees', '$agenda_items', '$action_items_from_previous_meeting', '$new_action_items', '$notes_info')");
   
   	return $result;
   }
   
   function update_meeting_agenda_draft($meeting_agenda_draft_id, $document_name, $title, $objective, $date, $time, $location, $called_by, $note_taker, $time_keeper, 
   	$attendees, $agenda_items, $action_items_from_previous_meeting, $new_action_items, $notes_info)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `meeting_agenda_draft` SET `document_name` = '$document_name', `title` = '$title', `objective` = '$objective', `date` = '$date', `time` = '$time', `location` = '$location', `called_by` = '$called_by', `note_taker` = '$note_taker', `time_keeper` = '$time_keeper', `attendees` = '$attendees', `agenda_items` = '$agenda_items', `action_items_from_previous_meeting` = '$action_items_from_previous_meeting', `new_action_items` = '$new_action_items', `notes_info` = '$notes_info' WHERE `meeting_agenda_draft_id` = '$meeting_agenda_draft_id'");
   
   	return $result;
   }
   
   function get_All_Meeting_Agenda_Draft_Document($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `meeting_agenda_draft` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   function get_Meeting_Agenda_Draft_Document($meeting_agenda_draft_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `meeting_agenda_draft` WHERE `meeting_agenda_draft_id` = '$meeting_agenda_draft_id'");
   
   	return $result;
   }
   
   function delete_meeting_agenda_draft($meeting_agenda_draft_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `meeting_agenda_draft` WHERE `meeting_agenda_draft_id` = '".$meeting_agenda_draft_id."'");
   }
   
   
   // SRS Draft
   
   function insert_srs_draft($userId, $document_name, $project_name, $team_name, $team_member, $purpose, $scope, $definitions_acronyms_abbreviations, $business_rules, $system_specification, $system_features, $user_classes_characteristics, $design_implementation_constraints, $assumptions, $operating_environment, $use_case, $external_interface_requirements_user_interfaces, $external_interface_requirements_software_interface, $external_interface_requirements_communication_interface, $non_functional_requirements_usability, $non_functional_requirements_reliability, $non_functional_requirements_security, $non_functional_requirements_portability, $non_functional_requirements_maintainability, $non_functional_requirements_availability, $management_process)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `srs_draft` (`user_id`, `document_name`, `project_name`, `team_name`, `team_member`, `purpose`, `scope`, `definitions_acronyms_abbreviations`, `business_rules`, `system_specification`, `system_features`, `user_classes_characteristics`, `design_implementation_constraints`, `assumptions`, `operating_environment`, `use_case`, `external_interface_requirements_user_interfaces`, `external_interface_requirements_software_interface`, `external_interface_requirements_communication_interface`, `non_functional_requirements_usability`, `non_functional_requirements_reliability`, `non_functional_requirements_security`, `non_functional_requirements_portability`, `non_functional_requirements_maintainability`, `non_functional_requirements_availability`, `management_process`) VALUES ('$userId', '$document_name', '$project_name', '$team_name', '$team_member', '$purpose', '$scope', '$definitions_acronyms_abbreviations', '$business_rules', '$system_specification', '$system_features', '$user_classes_characteristics', '$design_implementation_constraints', '$assumptions', '$operating_environment', '$use_case', '$external_interface_requirements_user_interfaces', '$external_interface_requirements_software_interface', '$external_interface_requirements_communication_interface', '$non_functional_requirements_usability', '$non_functional_requirements_reliability', '$non_functional_requirements_security', '$non_functional_requirements_portability', '$non_functional_requirements_maintainability', '$non_functional_requirements_availability', '$management_process')");
   
   	return $result;
   }
   function update_srs_draft($srs_id, $document_name, $project_name, $team_name, $team_member, $purpose, $scope, $definitions_acronyms_abbreviations, $business_rules, $system_specification, $system_features, $user_classes_characteristics, $design_implementation_constraints, $assumptions, $operating_environment, $use_case, $external_interface_requirements_user_interfaces, $external_interface_requirements_software_interface, $external_interface_requirements_communication_interface, $non_functional_requirements_usability, $non_functional_requirements_reliability, $non_functional_requirements_security, $non_functional_requirements_portability, $non_functional_requirements_maintainability, $non_functional_requirements_availability, $management_process)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `srs_draft` SET `document_name` = '$document_name', `project_name` = '$project_name', `team_name` = '$team_name', `team_member` = '$team_member', `purpose` = '$purpose', `scope` = '$scope', `definitions_acronyms_abbreviations` = '$definitions_acronyms_abbreviations', `business_rules` = '$business_rules', `system_specification` = '$system_specification', `system_features` = '$system_features', `user_classes_characteristics` = '$user_classes_characteristics', `design_implementation_constraints` = '$design_implementation_constraints', `assumptions` = '$assumptions', `operating_environment` = '$operating_environment', `use_case` = '$use_case', `external_interface_requirements_user_interfaces` = '$external_interface_requirements_user_interfaces', `external_interface_requirements_software_interface` = '$external_interface_requirements_software_interface', `external_interface_requirements_communication_interface` = '$external_interface_requirements_communication_interface', `non_functional_requirements_usability` = '$non_functional_requirements_usability', `non_functional_requirements_reliability` = '$non_functional_requirements_reliability', `non_functional_requirements_security` = '$non_functional_requirements_security', `non_functional_requirements_portability` = '$non_functional_requirements_portability', `non_functional_requirements_maintainability` = '$non_functional_requirements_maintainability', `non_functional_requirements_availability` = '$non_functional_requirements_availability', `management_process` = '$management_process' WHERE `srs_id` = '$srs_id'");
   
   	return $result;
   }
   
   function get_All_Srs_Draft_Document($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `srs_draft` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   function get_Srs_Draft_Document($srs_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `srs_draft` WHERE `srs_id` = '$srs_id'");
   
   	return $result;
   }
   
   function delete_srs_draft($srs_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `srs_draft` WHERE `srs_id` = '".$srs_id."'");
   }
   
   
   // SDD Draft
   
   function insert_sdd_draft($userId, $document_name, $project, $team_name, $team_member, $purpose, $scope, $overview, $reference_material, $definitions_acronyms_abbreviations, $system_overview, $system_architecture, $data_description, $data_dictionary, $component_design, $overview_of_user_interface, $screen_objects_and_actions, $requirement_matrix)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `sdd_draft` (`user_id`, `document_name`, `project`, `team_name`, `team_member`, `purpose`, `scope`, `overview`, `reference_material`, `definitions_acronyms_abbreviations`, `system_overview`, `system_architecture`, `data_description`, `data_dictionary`, `component_design`, `overview_of_user_interface`, `screen_objects_and_actions`, `requirement_matrix`) VALUES ('$userId', '$document_name', '$project', '$team_name', '$team_member', '$purpose', '$scope', '$overview', '$reference_material', '$definitions_acronyms_abbreviations', '$system_overview', '$system_architecture', '$data_description', '$data_dictionary', '$component_design', '$overview_of_user_interface', '$screen_objects_and_actions', '$requirement_matrix')");
   
   	return $result;
   }
   function update_sdd_draft($sdd_id, $document_name, $project, $team_name, $team_member, $purpose, $scope, $overview, $reference_material, $definitions_acronyms_abbreviations, $system_overview, $system_architecture, $data_description, $data_dictionary, $component_design, $overview_of_user_interface, $screen_objects_and_actions, $requirement_matrix)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `sdd_draft` SET `document_name` = '$document_name', `project` = '$project', `team_name` = '$team_name', `team_member` = '$team_member', `purpose` = '$purpose', `scope` = '$scope', `overview` = '$overview', `reference_material` = '$reference_material', `definitions_acronyms_abbreviations` = '$definitions_acronyms_abbreviations', `system_overview` = '$system_overview', `system_architecture` = '$system_architecture', `data_description` = '$data_description', `data_dictionary` = '$data_dictionary', `component_design` = '$component_design', `overview_of_user_interface` = '$overview_of_user_interface', `screen_objects_and_actions` = '$screen_objects_and_actions', `requirement_matrix` = '$requirement_matrix' WHERE `sdd_id` = '$sdd_id'");
   
   	return $result;
   }
   
   function get_All_SDD_Draft_Document($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `sdd_draft` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   function get_SDD_Draft_Document($sdd_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `sdd_draft` WHERE `sdd_id` = '$sdd_id'");
   
   	return $result;
   }
   
   function delete_sdd_draft($sdd_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `sdd_draft` WHERE `sdd_id` = '".$sdd_id."'");
   }
   
   
   // STD Draft
   
   
   function insert_std_draft($userId, $document_name, $project, $team_name, $team_member, $purpose, $scope, $alpha_testing, $system_and_integration_testing, $performance_and_stress_testing, 
   	$user_acceptance_testing, $batch_testing, $automated_regression_testing, $beta_testing, $hardware_requirement, $main_frame, $workstation, $test_schedule, 
   	$control_procedures, $features_to_be_tested, $features_not_to_be_tested, $resources_roles_responsibility, $schedules, $significantly_impacted_departments, $dependencies, 
   	$risk_assumptions, $tools)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `std_draft` (`user_id`, `document_name`, `project`, `team_name`, `team_member`, `purpose`, `scope`, `alpha_testing`, `system_and_integration_testing`, `performance_and_stress_testing`, `user_acceptance_testing`, `batch_testing`, `automated_regression_testing`, `beta_testing`, `hardware_requirement`, `main_frame`, `workstation`, `test_schedule`, `control_procedures`, `features_to_be_tested`, `features_not_to_be_tested`, `resources_roles_responsibility`, `schedules`, `significantly_impacted_departments`, `dependencies`, `risk_assumptions`, `tools`) VALUES ('$userId', '$document_name', '$project', '$team_name', '$team_member', '$purpose', '$scope', '$alpha_testing', '$system_and_integration_testing', '$performance_and_stress_testing', '$user_acceptance_testing', '$batch_testing', '$automated_regression_testing', '$beta_testing', '$hardware_requirement', '$main_frame', '$workstation', '$test_schedule', '$control_procedures', '$features_to_be_tested', '$features_not_to_be_tested', '$resources_roles_responsibility', '$schedules', '$significantly_impacted_departments', '$dependencies', '$risk_assumptions', '$tools')");
   
   	return $result;
   }
   function update_std_draft($std_id, $document_name, $project, $team_name, $team_member, $purpose, $scope, $alpha_testing, $system_and_integration_testing, $performance_and_stress_testing, 
   	$user_acceptance_testing, $batch_testing, $automated_regression_testing, $beta_testing, $hardware_requirement, $main_frame, $workstation, $test_schedule, 
   	$control_procedures, $features_to_be_tested, $features_not_to_be_tested, $resources_roles_responsibility, $schedules, $significantly_impacted_departments, $dependencies, 
   	$risk_assumptions, $tools)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `std_draft` SET `document_name` = '$document_name', `project` = '$project', `team_name` = '$team_name', `team_member` = '$team_member', `purpose` = '$purpose', `scope` = '$scope', `alpha_testing` = '$alpha_testing', `system_and_integration_testing` = '$system_and_integration_testing', `performance_and_stress_testing` = '$performance_and_stress_testing', `user_acceptance_testing` = '$user_acceptance_testing', `batch_testing` = '$batch_testing', `automated_regression_testing` = '$automated_regression_testing', `beta_testing` = '$beta_testing', `hardware_requirement` = '$hardware_requirement', `main_frame` = '$main_frame', `workstation` = '$workstation', `test_schedule` = '$test_schedule', `control_procedures` = '$control_procedures', `features_to_be_tested` = '$features_to_be_tested', `features_not_to_be_tested` = '$features_not_to_be_tested', `resources_roles_responsibility` = '$resources_roles_responsibility', `schedules` = '$schedules', `significantly_impacted_departments` = '$significantly_impacted_departments', `dependencies` = '$dependencies', `risk_assumptions` = '$risk_assumptions', `tools` = '$tools' WHERE `std_id` = '$std_id'");
   
   	return $result;
   }
   
   function get_All_STD_Draft_Document($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `std_draft` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   function get_STD_Draft_Document($std_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `std_draft` WHERE `std_id` = '$std_id'");
   
   	return $result;
   }
   
   function delete_std_draft($std_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `std_draft` WHERE `std_id` = '".$std_id."'");
   }
   
   
   // Cutom Draft
   
   function insert_custom_draft($userId, $document_name, $custom)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `custom_draft` (`user_id`, `document_name`, `custom`) VALUES ('$userId', '$document_name', '$custom')");
   
   	return $result;
   }
   function update_custom_draft($custom_draft_id, $document_name, $custom)
   {
   	global $conn;
   	$result = mysqli_query($conn, "UPDATE `custom_draft` SET `document_name` = '$document_name', `custom` = '$custom' WHERE `custom_draft_id` = '$custom_draft_id'");
   
   	return $result;
   }
   
   function get_All_Custom_Draft_Document($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `custom_draft` WHERE `user_id` = '$userId'");
   
   	return $result;
   }
   function get_Custom_Draft_Document($custom_draft_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `custom_draft` WHERE `custom_draft_id` = '$custom_draft_id'");
   
   	return $result;
   }
   
   function delete_custom_draft($custom_draft_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `custom_draft` WHERE `custom_draft_id` = '".$custom_draft_id."'");
   }
   
   
   
   
   // Announcement 
   
   function insert_announcement($userId, $project_id, $recipient_id, $title, $description)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `announcement` (`user_id`, `project_id`, `recipient_id`, `title`, `description`) VALUES ('$userId', '$project_id', '$recipient_id', '$title', '$description')");
   
   	return $result;
   }
   
   
   
   function get_announcement($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `announcement` NATURAL JOIN `project` WHERE `recipient_id` = '$userId' ORDER BY `date_time` DESC");
   
   	return $result;
   }
   
   
   function deleteMemberFromAnnouncement($user_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "DELETE FROM `announcement` WHERE `recipient_id` = '".$user_id."'");
   }
   
   
   
   // Notification 
   
   function insert_notification($recipient_id, $activity)
   {
   	global $conn;
   	$result = mysqli_query($conn, "INSERT INTO `notification` (`recipient_id`, `activity`) VALUES ('$recipient_id', '$activity')");
   
   	return $result;
   }
   
   
   function get_notification($userId)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `notification` WHERE `recipient_id` = '$userId' ORDER BY `date_time` DESC");
   
   	return $result;
   }
   
   function get_not_board($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `user_project` WHERE `project_id` = '$project_id'");
   
   	return $result;
   }
   
   
   function get_not_comment($project_id)
   {
   	global $conn;
   	$result = mysqli_query($conn, "SELECT * FROM `user_project`  WHERE `project_id` = '$project_id'");
   
   	return $result;
   }
   
   
   
   ?>