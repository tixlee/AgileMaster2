<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   include_once '../resources/links/require.php';
   
   
       
   if(isset($_POST['report'])){
      
       date_default_timezone_set("Asia/Kuala_Lumpur");
   	$creation_date = date('d-m-Y');
       
       $name = strip_tags($_POST['name']);
       $issue_name = strip_tags($_POST['issue_name']);
       $desc = strip_tags($_POST['desc']);
       
       
       
       $name = mysqli_real_escape_string($conn, $name);
       $issue_name = mysqli_real_escape_string($conn, $issue_name);
       $desc = mysqli_real_escape_string($conn, $desc);
   
       insert_issue($name, $issue_name, $desc);
       echo "<script>alert('Thank you for reporting the issue!');</script>";
       echo "<script>window.location.href ='../user/reportissue.php'</script>";
      
   }
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Report Issue</title>
      <?php include('../navigation/head.php');?>
       <style type="text/css">

           /* Center the loader */
            #loader {
              position: absolute;
              left: 50%;
              top: 50%;
              z-index: 1;
              width: 120px;
              height: 120px;
              margin: -76px 0 0 -76px;
              border: 16px solid #f3f3f3;
              border-radius: 50%;
              border-top: 16px solid #9a1b25;
              -webkit-animation: spin 2s linear infinite;
              animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
              position: relative;
              -webkit-animation-name: animatebottom;
              -webkit-animation-duration: 1s;
              animation-name: animatebottom;
              animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
              from { bottom:-100px; opacity:0 } 
              to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
              from{ bottom:-100px; opacity:0 } 
              to{ bottom:0; opacity:1 }
            }

       </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()" style="margin:0;">
      <div id="loader"></div>
      <div class="wrapper animate-bottom" style="display:none;" id="myDiv" >
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/user_sidebar.php');?>
         <div class="content-wrapper">
            <br><br>
            <section class="content">
               <div class="container-fluid">
                  <div class="card shadow mb-4">
                     <div class="card-header">
                        <h3 class="card-title font-weight-bold" style="color: #990021;">Report Issue</h3>
                     </div>
                     <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="name" >Name </label>
                                 <input type="text" name="name" id="name" placeholder="Full Name"  class="form-control" required/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="issue_name" >Issue </label>
                                 <input type="text" name="issue_name" id="issue_name" placeholder="Issue"  class="form-control" required/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="desc" >Description </label>
                                 <textarea type="text" class="md-textarea form-control"  id="desc" name="desc" rows="4" cols="50"></textarea>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <input type="submit" name="report" value="Report" id="submit-fs" class="btn btn-success" >
                           </div>
                        </form>
                     </div>
                     <div class="card-footer">
                        Thank you for reporting the issue!
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <aside class="control-sidebar control-sidebar-dark">
         </aside>
      </div>
                            <script>
            var myVar;

            function myFunction() {
              myVar = setTimeout(showPage, 1000);
            }

            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
        </script>
      <script src="../dependencies/navigation/jquery/jquery.min.js"></script>
      <script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
      <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="../dependencies/scripts/datatables-demo.js"></script>
      <script src="../dependencies/navigation/js/adminlte.js"></script>
   </body>
</html>