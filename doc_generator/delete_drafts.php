<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";
//include_once '../resources/links/require.php';

if(isset($_GET['meeting_minutes_draft_id'])){
    $meeting_minutes_draft_id = $_GET['meeting_minutes_draft_id'];
    delete_meeting_minutes_draft($meeting_minutes_draft_id);
    header("location: draft_documents.php");
}

if(isset($_GET['meeting_agenda_draft_id'])){
    $meeting_agenda_draft_id = $_GET['meeting_agenda_draft_id'];
    delete_meeting_agenda_draft($meeting_agenda_draft_id);
    header("location: draft_documents.php");
}

if(isset($_GET['srs_id'])){
    $srs_id = $_GET['srs_id'];
    delete_srs_draft($srs_id);
    header("location: draft_documents.php");
}

if(isset($_GET['sdd_id'])){
    $sdd_id = $_GET['sdd_id'];
    delete_sdd_draft($sdd_id);
    header("location: draft_documents.php");
}


if(isset($_GET['std_id'])){
    $std_id = $_GET['std_id'];
    delete_std_draft($std_id);
    header("location: draft_documents.php");
}


if(isset($_GET['custom_draft_id'])){
    $custom_draft_id = $_GET['custom_draft_id'];
    delete_custom_draft($custom_draft_id);
    header("location: draft_documents.php");
}




?>