<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   include_once '../resources/links/require.php';
   
   if(isset($_SESSION['user_id']))
   {
   	$userId = $_SESSION["user_id"];
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | GitHub Repo Search</title>
      <?php include('../navigation/head.php');?>
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
              padding: 40px 0px 0px 0px;
              font-size: 60px;
              font-weight: bold;
           }
       </style>
      <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="./github/style.css">
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/githubrepo_sidebar.php');?>
          <div class="content-wrapper"  style="background-color: #ffffff;">
         <section class="content">
             <div class="bg-custom" >
                            <div class="bg-img" style="text-align: center;">
                               
                                  <div class="searchContainer">
                     <h2>Search Github Users</h2>
                     <p class="lead">Enter a username to fetch a users profile info and repos</p>
                     <input type="text" id="searchUser" class="form-control" placeholder="GitHub Username">
                  </div>
                               
                            </div>
                 <br>
                        </div>
            <div class="container-fluid">
               <div class="container">
                  
                  <br>
                  <div id="profile"></div>
               </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </section>
      </div>
       </div>
       
            
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
      <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
      <script src="./github/reposearch.js"></script>
      <script src="../dependencies/navigation/jquery/jquery.min.js"></script>
      <script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
      <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="../dependencies/scripts/datatables-demo.js"></script>   
      <script src="../dependencies/navigation/js/adminlte.js"></script>
	  <script src="../dependencies/scripts/google.js"></script>
   </body>
</html>