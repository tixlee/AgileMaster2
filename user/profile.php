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

    if(isset($_POST['upload'])){
       
       $user_id = $_SESSION['user_id'];
       $fileCount = count($_FILES['photo']['name']);
        
	   for($i=0; $i<$fileCount; $i++){
		
            $photo = $_FILES['photo']['name'][$i];
            $target_dir = "../upload/profile/";

            update_profile($userId, $photo);
            move_uploaded_file($_FILES['photo']['tmp_name'][$i],$target_dir.$photo);
            echo "<script>window.location.href ='../user/profile.php'</script>";
	   }	   
   }

   if(isset($_POST['update'])){
       
//       $user_id = $_SESSION['user_id'];
       $fname = strip_tags($_POST['fname']);
       $lname = strip_tags($_POST['lname']);
       $age = strip_tags($_POST['age']);
       $occupation = strip_tags($_POST['occupation']);
       $city = strip_tags($_POST['city']);
       $country = strip_tags($_POST['country']);
       $email = strip_tags($_POST['email']);
       $password = strip_tags($_POST['password']);

       $fname = mysqli_real_escape_string($conn, $fname);
       $lname = mysqli_real_escape_string($conn, $lname);
       $age = mysqli_real_escape_string($conn, $age);
       $occupation = mysqli_real_escape_string($conn, $occupation);
       $city = mysqli_real_escape_string($conn, $city);
       $country = mysqli_real_escape_string($conn, $country);
       $email = mysqli_real_escape_string($conn, $email);
       $password = mysqli_real_escape_string($conn, $password);
       
       if($password == ""){
           update_user_info($userId, $fname, $lname, $age, $occupation, $city, $country, $email);
           echo "<script>window.location.href ='../user/profile.php'</script>";
           
       }else{
           $password = md5($password);
           update_user_password($userId, $fname, $lname, $age, $occupation, $city, $country, $email, $password);
           echo "<script>window.location.href ='../user/profile.php'</script>";
       }
   }

   
?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Profile</title>
      <?php include('../navigation/head.php');?>

       <style type="text/css">
           
          
           
          .bg-custom{
              background-image: url("../resources/images/profile_header.png");
              background-color: #9a1b25;
              border-radius: .375rem;
              border-bottom-left-radius: 20% 50%;
              border-bottom-right-radius: 20% 50%;
              
          }
          .bg-img {
              max-width: 35%;
              min-height: 320px;
              max-height: auto;
              margin-left:auto;
              margin-right:auto;
              text-align: center;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              color: white; 
              padding: 120px 0px 0px 0px;
              font-size: 50px;
              font-weight: bold;
           }
           
           
           .card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #fff;
  background-clip: border-box;
}
           .card>hr {
  margin-right: 0;
  margin-left: 0;
}

.card-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card-header {
  margin-bottom: 0;
  padding: 1.25rem 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, .05);
  background-color: #fff;
}

.card-header:first-child {
  border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}
           .shadow,
.card-profile-image img {
  box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}
.card-profile-image {
position: relative;
z-index: 1;

}

.card-profile-image img {
  position: absolute;
  left: 50%;
  max-width: 180px;
  transition: all .15s ease;
  transform: translate(-50%, -30%);
  border-radius: .375rem;
    
}
           .card-profile-stats {
  padding: 1rem 0;
}

.card-profile-stats>div {
  margin-right: 1rem;
  padding: .875rem;
  text-align: center;
}

.card-profile-stats>div:last-child {
  margin-right: 0;
}

.card-profile-stats>div .heading {
  font-size: 1.1rem;
  font-weight: bold;
  display: block;
}

.card-profile-stats>div .description {
  font-size: .875rem;
  color: #adb5bd;
}
           .btn{
               font-size: 1rem;
  font-weight: bold;
  line-height: 1.5;
  display: inline-block;
  padding: .625rem 1.25rem;
           }
           .btn-info {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}
           .btn-info:hover {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
}

.btn-info:focus {
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(17, 205, 239, .5);
}
           
           .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

/*
.card-profile-image:hover .image {
  opacity: 0.8;
}

.card-profile-image:hover .inner {
  opacity: 1;
    
}
*/

.inner {
  background-color: #3b3b3b;
  width: 50px;
  height: 50px;
  border-radius: 100%;
  position: absolute;
  bottom: 0;
  right: 0;
  top: 100%;  
  left: 60%; 
  margin-top: 30%;
}

.inner:hover {
  background-color: #e82534;
  transition: all .15s ease;
  transform: translate(0%, -10%);
}
.inputfile {
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: 1;
    width: 50px;
    height: 50px;
    transition: all .15s ease;
  transform: translate(-50%, -30%);
}
.inputfile + label {
    font-size: 1.25rem;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    overflow: hidden;
    width: 50px;
    height: 50px;
    pointer-events: none;
    cursor: pointer;
    line-height: 50px;
    text-align: center;
}
           
img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
           
     </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
       <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/user_sidebar.php');?>
         <div class="content-wrapper">
            <section class="content ">
                <?php 
                     $get_user = get_user($userId);
                     $uRow = mysqli_fetch_array($get_user);
                     ?>
                
                <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Profile Picture</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form method="POST" enctype="multipart/form-data">
                                 <div class=" col-lg-12">
                                    <input type="file" class="custom-file-input rounded-circle" name="photo[]" id="photo" accept=".jpg, .jpeg, .png" name="img" onchange="displayImg(this,$(this))">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                 </div>
                                  <br>
                                  <div class="form-group d-flex justify-content-center">
                                      <img src="<?php echo isset($uRow['photo']) ? '../upload/profile/'.$uRow['photo'] :'' ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                                  </div>
                                  
                                 <br>
                                 <div class="modal-footer">
                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                    <input type="submit" name="upload" value="Update" id="submit-fs" class="btn btn-success third" >
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
<!--               <div class="container-fluid">-->
                  <?php 
                     $get_user = get_user($userId);
                     $uRow = mysqli_fetch_array($get_user);
                     ?>
                      <div class="bg-custom" >
                            <div class="bg-img" style="text-align: center;">
<!--                                <img src="../resources/images/profile_header.png" class="img-circle elevation-2" alt="User Image" style="text-align: center; max-width: 50%;">-->
                               
                                    Welcome <?php echo $uRow['fname']; ?>!
                               
                            </div>
                        </div>
                <div class="container-fluid">
               <div class="container">
                      <div class="card card-profile shadow-lg rounded">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2 shadow-lg p-0 mb-0 rounded">
                <div class="card-profile-image shadow-lg rounded">
                  
                    <img src="<?php echo isset($uRow['photo']) ? '../upload/profile/'.$uRow['photo'] :'' ?>" id="cimg" class="image rounded-circle">
                     <div class="inner">
                         <a class="inputfile" data-toggle="modal" data-target="#exampleModalCenter"></a>
                         <label><i class="fa fa-camera" aria-hidden="true" style="color: white;"></i></label>
                         <!-- Modal -->
                  
                    </div>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between float-right">
<!--                <a href="#" class="btn btn-sm btn-info mr-4">U</a>-->
                <a href="#" class="btn btn-sm btn-dark float-right" data-toggle="modal" data-target="#myLargeModalLabel">Edit Profile</a>
                  
                  <div class="modal fade text-center mb-5 bd-example-modal-lg" id="myLargeModalLabel" role="dialog" aria-labelledby="myLargeModalLabelTitle" aria-hidden="true">
                     <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLongTitle">Personal Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form method="POST" enctype="multipart/form-data">
                                
                                 <div class="form-group text-left">
                                    <div  class="row">
                                        <div class="col">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control" Value="<?php echo $uRow['fname']; ?>" placeholder="First Name" required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control" Value="<?php echo $uRow['lname']; ?>" placeholder="Last Name" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <div  class="row">
                                        <div class="col">
                                            <label for="age">Age</label>
                                            <input type="number" name="age" id="age" class="form-control" Value="<?php echo $uRow['age']; ?>" placeholder="Age" required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" name="occupation" id="occupation" class="form-control" Value="<?php echo $uRow['occupation']; ?>" placeholder="Occupation" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <div  class="row">
                                        <div class="col">
                                            <label for="city">City</label>
                                            <input type="text" name="city" id="city" class="form-control" Value="<?php echo $uRow['city']; ?>" placeholder="City" required autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <label for="country">Country</label>
                                            <input type="text" name="country" id="country" class="form-control" Value="<?php echo $uRow['country']; ?>" placeholder="Country" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
								<div class="form-group text-left">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control" Value="<?php echo $uRow['email']; ?>" placeholder="Email address" required autocomplete="off">
								</div>
                                <div class="form-group text-left">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                                    <small><i>Leave this blank if you dont want to change the password.</i></small>
                                </div>
                                 <div class="modal-footer">
                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                    <input type="submit" name="update" value="Update" id="submit-fs" class="btn btn-success" >
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>                  
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-1">
                    <div>
                        
                      <span class="heading"><?php 
                                 $friends = getFriends($userId);
                                 echo mysqli_num_rows($friends); 
                                 ?></span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading"><?php 
                                 $projects = getProjectByUser($userId);
                                 echo mysqli_num_rows($projects); 
                                 ?></span>
                      <span class="description">Projects</span>
                    </div>
                    <div>
                      <span class="heading"><?php 
                                 $getBoardByProjectAdmins = getBoardByProjectAdmins($userId);
                                 $total_boards = mysqli_num_rows($getBoardByProjectAdmins); 
                                 echo $total_boards;
                                 ?></span>
                      <span class="description">Boards</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $uRow['fname']. ' '. $uRow['lname']; ?><span class="font-weight-light">, <?php echo $uRow['age']; ?></span>
                </h3>
                <div class="h5 mt-3 font-weight-300">
                    <i class="ni location_pin mr-2"></i><?php echo $uRow['email']; ?>
                </div>  
                <div class="h6 mt-3 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $uRow['city']; ?>, <?php echo $uRow['country']; ?>
                </div>
                <div class="h6 mt-3 font-weight-300">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $uRow['occupation']; ?>
                </div>
                <hr class="my-4">
              </div>
            </div>
          </div>
          </div>
          </div>
<!--               </div>-->
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
      </div>
       
       <script>
            
           
           function displayImg(input,_this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
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
	  <script src="../dependencies/scripts/google.js"></script>
   </body>
</html>