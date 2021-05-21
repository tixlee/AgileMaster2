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
      <title>AgileMaster | Dashboard</title>
      <style type="text/css">
         /* Chat Area CSS Start */
         .chat-area{
         padding: 25px 30px;
         background: #fff;
         max-width: 850px;
         width: 100%;
         margin-left: auto;
         margin-right: auto;
         margin-top: 50px;;
         border-radius: 16px;
         box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
         0 32px 64px -48px rgba(0,0,0,0.5);
         }
         .chat-area header{
         display: flex;
         align-items: center;
         padding: 18px 30px;
         }
         .chat-area header .back-icon{
         color: #333;
         font-size: 18px;
         }
         .chat-area header img{
         height: 45px;
         width: 45px;
         margin: 0 15px;
         object-fit: cover;
         border-radius: 50%;
         }
         .chat-area header .details span{
         font-size: 17px;
         font-weight: 500;
         }
         .chat-box{
         position: relative;
         min-height: 500px;
         max-height: 500px;
         max-width: 850px;
         width: 100%;
         margin-left: auto;
         margin-right: auto;
         overflow-y: auto;
         padding: 10px 30px 20px 30px;
         background: #fafafa;
         box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
         inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
         }
         .chat-box .text{
         position: absolute;
         top: 45%;
         left: 50%;
         width: calc(100% - 50px);
         text-align: center;
         transform: translate(-50%, -50%);
         }
         .chat-box .chat{
         margin: 15px 0;
         }
         .chat-box .chat p{
         word-wrap: break-word;
         padding: 8px 16px;
         box-shadow: 0 0 32px rgb(0 0 0 / 8%),
         0rem 16px 16px -16px rgb(0 0 0 / 10%);
         }
         .chat-box .outgoing{
         display: flex;
         }
         .chat-box .outgoing .details{
         margin-left: auto;
         max-width: calc(100% - 130px);
         }
         .outgoing .details p{
         background: #333;
         color: #fff;
         border-radius: 18px 18px 0 18px;
         }
         .chat-box .incoming{
         display: flex;
         align-items: flex-end;
         }
         .chat-box .incoming img{
         height: 35px;
         width: 35px;
         object-fit: cover;
         border-radius: 50%;
         }
         .chat-box .incoming .details{
         margin-right: auto;
         margin-left: 10px;
         max-width: calc(100% - 130px);
         }
         .incoming .details p{
         background: #fff;
         color: #333;
         border-radius: 18px 18px 18px 0;
         }
         .typing-area{
         padding: 18px 30px;
         display: flex;
         justify-content: space-between;
         }
         .typing-area input{
         height: 45px;
         width: calc(100% - 58px);
         font-size: 16px;
         padding: 0 13px;
         border: 1px solid #e6e6e6;
         outline: none;
         border-radius: 5px 0 0 5px;
         }
         .typing-area button{
         color: #fff;
         width: 55px;
         border: none;
         outline: none;
         background: #333;
         font-size: 19px;
         cursor: pointer;
         opacity: 0.7;
         pointer-events: none;
         border-radius: 0 5px 5px 0;
         transition: all 0.3s ease;
         }
         .typing-area button.active{
         opacity: 1;
         pointer-events: auto;
         }
         .bg-custom{
         background-image: url("../resources/images/profile_header.png");
         background-color: #9a1b25;
         border-bottom-left-radius: 20% 50%;
         border-bottom-right-radius: 20% 50%;
         }
         .bg-img {
         max-width: 35%;
         min-height: 150px;
         max-height: auto;
         margin-left:auto;
         margin-right:auto;
         text-align: center;
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         color: white; 
         padding: 60px 0px 0px 0px;
         font-size: 60px;
         font-weight: bold;
         }
      </style>
      <?php include('../navigation/head.php');?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/user_sidebar.php');?>
         <div class="content-wrapper">
            <div class="bg-custom" >
               <div class="bg-img" style="text-align: center;">
                  <h2>Live Chat</h2>
                  <p class="lead">Chat with your team member!</p>
               </div>
               <br>
            </div>
            <section class="chat-area">
               <header>
                  <?php 
                     $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                     $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                     if(mysqli_num_rows($sql) > 0){
                       $row = mysqli_fetch_assoc($sql);
                     }else{
                       header("location: users.php");
                     }
                     ?>
                  <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                  <img src="../upload/profile/<?php echo $row['photo']; ?>" alt="">
                  <div class="details">
                     <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
                     <p><?php echo $row['status']; ?></p>
                  </div>
               </header>
               <div class="chat-box">
               </div>
               <form action="#" class="typing-area">
                  <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                  <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                  <button><i class="fab fa-telegram-plane"></i></button>
               </form>
            </section>
         </div>
      </div>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
      <script src="scripts/chat.js"></script>
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