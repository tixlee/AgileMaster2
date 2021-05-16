<?php 
    session_start();
    date_default_timezone_set("Asia/Kuala_Lumpur");
    if(isset($_SESSION['unique_id'])){
   include_once '../../connection/dbconnection.php';
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        
        $created_at = date('d-m-Y H:i:s');
        
        if(!empty($message)){
            
             $created_at = date('d-m-Y H:i:s');
            
            $sql = mysqli_query($conn, "INSERT INTO `messages` (`incoming_msg_id`, `outgoing_msg_id`, `msg`,`read_status`) VALUES ('$incoming_id', '$outgoing_id', '$message',0)") or die();
        }
    }else{
        header("location: ../../main/login.php");
    }


    
?>