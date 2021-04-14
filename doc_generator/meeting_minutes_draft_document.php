<?php
use Dompdf\Dompdf;
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

	if(isset($_SESSION['user_id']))
   {
   	$userId = $_SESSION["user_id"];
   }

if(isset($_POST['save'])){
//    $userId = $_SESSION["user_id"];
    $document_name = $_POST['document_name'];
    $title = $_POST['title'];
    $objective = $_POST['objective'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $called_by = $_POST['called_by'];
    $note_taker = $_POST['note_taker'];
	$time_keeper = $_POST['time_keeper'];
	$attendees = $_POST['attendees'];
	$agenda_items = $_POST['agenda_items'];
	$decisions = $_POST['decisions'];
	$new_action_items = $_POST['new_action_items'];
	$notes_info = $_POST['notes_info'];
	
    $meeting_minutes_draft_id = $_GET['meeting_minutes_draft_id'];
    
	update_meeting_minutes_draft($meeting_minutes_draft_id, $document_name, $title, $objective, $date, $time, $location, $called_by, $note_taker, $time_keeper, 
	$attendees, $agenda_items, $decisions, $new_action_items, $notes_info);
        echo "<script>alert('Your Meeting Minutes had been saved');</script>";
        echo "<script>window.location.href ='meeting_minutes_draft_document.php?meeting_minutes_draft_id=$meeting_minutes_draft_id'</script>";
}
		
if(isset($_POST['send'])){

$request = array(
'title'=>$_POST['title'],
'objective'=>$_POST['objective'],
'date'=>$_POST['date'],
'time'=>$_POST['time'],
'location'=>$_POST['location'],
'called_by'=>$_POST['called_by'],
'note_taker'=>$_POST['note_taker'],
'time_keeper'=>$_POST['time_keeper'],
'attendees'=>$_POST['attendees'],
'agenda_items'=>$_POST['agenda_items'],
'decisions'=>$_POST['decisions'],
'new_action_items'=>$_POST['new_action_items'],
'notes_info'=>$_POST['notes_info']
);		
		
//include template
if(!isset($_POST['objective'])) dir();
require_once('data_meetminutes.php');
$template = ob_get_clean();

//include dompdf library
require_once('dompdf/autoload.inc.php');


//using pdf dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($template);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Meeting Minutes Document');

//write pdf to directory
file_put_contents('pdfs/Meeting Minutes Document.pdf', $dompdf->output());
}
		
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>AgileMaster | Meeting Minutes Generator</title>
	<?php include('../navigation/head.php');?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="../dependencies/summernote/summernote-bs4.css">
    <link href="css/style.css" rel="stylesheet" media="all">
    <style type="text/css">
          
           
           .bg-custom{
              background-image: url("../resources/images/profile_header.png");
              background-color: #9a1b25;
              border-bottom-left-radius: 20% 50%;
              border-bottom-right-radius: 20% 50%;
              
          }
          .bg-img {
              max-width: 35%;
              min-height: 220px;
              max-height: auto;
              margin-left:auto;
              margin-right:auto;
              text-align: center;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              color: white; 
              padding: 30px 0px 0px 0px;
              font-size: 60px;
              font-weight: bold;
           }
       </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="se-pre-con"></div>
<div class="wrapper">

	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/docgeneratorminutes_sidebar.php');?>

	<div class="content-wrapper">
			<section class="content">
                
                <div class="bg-custom" >
                    <div class="bg-img" style="text-align: center;">
                       
							<h4 class="m-4 font-weight-bold">Meeting Minutes Draft Document</h4>
								<h6 class="m-4 font-weight-bold">Meeting minutes serve as a record of what was discussed and decided in a meeting, what actions must be taken, who must take them and when.</h6>
						</div>
            </div>
            <br>
                
				<div class="container-fluid">
					<div class="card shadow mb-4">
						<div class="card-body">
					
							<form method="POST" name="createDoc" id="DocCreator"  enctype="multipart/form-data" style="width: 95%; margin: 0 auto;">
								
                                <?php
                            $meeting_minutes_draft_id = $_GET['meeting_minutes_draft_id'];
                              $get_Meeting_Minutes_Draft_Document = get_Meeting_Minutes_Draft_Document($meeting_minutes_draft_id);
                             while($mRow = mysqli_fetch_array($get_Meeting_Minutes_Draft_Document)){
                            
                           
                            ?>
                                
								<div class="form-group">
								<div class="name">
									<label for="title">Document Name</label>
								</div>
								<div class="value">
									<input type="text" class="form-control" id="document_name" name="document_name" value="<?php echo $mRow['document_name']; ?>" placeholder="Enter the name of your custom document." >
								</div>
							</div>
                            <hr>
								<div class="forms-row">
									<div class="name">
										<label for="title">Title</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="title" name="title" placeholder="Enter the title of meeting minutes."><?php echo $mRow['title']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="objective">Objective</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="objective" name="objective" placeholder="Enter the objective of meeting minutes."><?php echo $mRow['objective']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="date">Date</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="date" name="date" placeholder="Enter the date."><?php echo $mRow['date']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="time">Time</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="time" name="time" placeholder="Enter the time."><?php echo $mRow['time']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="location">Location</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="location" name="location" placeholder="Enter the location of the meeting."><?php echo $mRow['location']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="called_by">Called By</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="called_by" name="called_by" placeholder="Enter the name of person who call the meeting."><?php echo $mRow['called_by']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="note_taker">Note Taker</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="note_taker" name="note_taker" placeholder="Enter the note taker name of the meeting."><?php echo $mRow['note_taker']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="time_keeper">Time Keeper</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="time_keeper" name="time_keeper" placeholder="Enter the timer keeper name of the meeting."><?php echo $mRow['time_keeper']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="attendees">Attendees</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="attendees" name="attendees" placeholder="Enter the attendees name of the meeting."><?php echo $mRow['attendees']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="agenda_items">Agenda Items</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="agenda_items" name="agenda_items" placeholder="Enter the agenda items in the meeting."><?php echo $mRow['agenda_items']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="decisions">Decisions</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="decisions" name="decisions" placeholder="Enter the decisions made in the meeting."><?php echo $mRow['decisions']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="new_action_items">New Action Items</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="new_action_items" name="new_action_items" placeholder="Enter the new action items in the meeting."><?php echo $mRow['new_action_items']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>
								
								<div class="forms-row">
									<div class="name">
										<label for="notes_info">Other Notes & Informations</label>
									</div>
									<div class="value">
										<textarea type="text" class="mytextarea" id="notes_info" name="notes_info" placeholder="Enter the other notes and informations in the meeting."><?php echo $mRow['notes_info']; ?></textarea>
									</div>
								</div>
								
								<br><hr><br>

								<div class="row">
                                <div class="col text-left">

                                    <button class="btn btn-success" type="submit" name="send">Generate</button>
                                </div>
                                <div class="col text-right">

                                    <button class="btn btn-success" type="submit" name="save">Save As Draft</button>
                                </div>
                            </div>
                                <?php } ?>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	<aside class="control-sidebar control-sidebar-dark">
	</aside>
</div>

<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/summernote/summernote-bs4.min.js"></script>

<script src="https://cdn.tiny.cloud/1/zbwxd68unhb04dwmmeg1vag9kxdb9c20ooz4ltujm995ho0r/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: '.mytextarea'
	});
</script>

<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>
<script src="js/global.js"></script>
<script src="../dependencies/scripts/google.js"></script>
</body>
</html>

