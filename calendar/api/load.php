<?php
session_start();
ob_start();
include("../config.php");
if(isset($_SESSION['user_id']))
   {
   	$userId = $_SESSION["user_id"];
   }

//$userId = $_GET["user_id"];
$data = [];
$result = $db->rows("SELECT * FROM `events` WHERE `user_id` = '$userId' ORDER BY id");
foreach($result as $row) {
    $data[] = [
        'id'              => $row->id,
        'userId'         => $row->user_id,
        'title'           => $row->title,
        'start'           => $row->start_event,
        'end'             => $row->end_event,
        'backgroundColor' => $row->color,
        'textColor'       => $row->text_color
    ];
}

echo json_encode($data);
