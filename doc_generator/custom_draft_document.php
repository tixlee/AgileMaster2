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
       $userId = $_SESSION["user_id"];
       $document_name = $_POST['document_name'];
       $custom = $_POST['custom'];
       $custom_draft_id = $_GET['custom_draft_id'];
   	update_custom_draft($custom_draft_id, $document_name, $custom);
           echo "<script>alert('Your Customized Document had been saved');</script>";
           echo "<script>window.location.href ='custom_draft_document.php?custom_draft_id=$custom_draft_id'</script>";
   }
   
   if(isset($_POST['send'])){
   
   $request = array(
   'custom'=>$_POST['custom']
   );		
   
   //include template
   if(!isset($_POST['custom'])) dir();
   require_once('data_custom.php');
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
   $dompdf->stream('Customized Document');
   
   //write pdf to directory
   file_put_contents('pdfs/Customized Document.pdf', $dompdf->output());
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
      <title>AgileMaster | Customized Document Generator</title>
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
         min-height: 180px;
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
         <?php include('../navigation/user/docgeneratorcustom_sidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
               <div class="bg-custom" >
                  <div class="bg-img" style="text-align: center;">
                     <h4 class="m-4 font-weight-bold">Self-Customized Draft Document</h4>
                     <h6 class="m-4 font-weight-bold">A Documents that allowed user to customized their own document based on their preferences.</h6>
                  </div>
               </div>
               <br>
               <div class="container-fluid">
                  <button onclick="location.href='draft_documents.php'" type="button" class="btn btn-dark">
                  <i class="ri-arrow-go-back-line"></i> Back
                  </button>
                  <br><br>
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <form method="POST" name="createDoc" id="DocCreator"  enctype="multipart/form-data">
                           <?php
                              $custom_draft_id = $_GET['custom_draft_id'];
                              $get_Custom_Draft_Document = get_Custom_Draft_Document($custom_draft_id);
                              while($cRow = mysqli_fetch_array($get_Custom_Draft_Document)){
                              
                              
                              ?>
                           <div class="form-group">
                              <div class="name">
                                 <label for="title">Document Name</label>
                              </div>
                              <div class="value">
                                 <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter the name of your custom document." value="<?php echo $cRow['document_name']; ?>">
                              </div>
                           </div>
                           <hr>
                           <div class="forms-row">
                              <div class="value">
                                 <textarea type="text" class="mytextarea" id="custom" name="custom" placeholder="Enter your own document." rows="25"><?php echo $cRow['custom']; ?></textarea>
                              </div>
                           </div>
                           <br>
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