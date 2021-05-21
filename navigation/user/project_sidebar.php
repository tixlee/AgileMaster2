<style type="text/css">
   #sideimg{
   height: 4vh;
   width: 4vh;
   object-fit: cover;
   border-radius: 100% 100%;
   }
   .right{
   margin-left: -15px;           
   }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <div class="sidebar">
      <div class="user-panel mt-3 d-flex">
         <div class="col-auto ">
            <!-- Avatar -->
            <a href="profile.php" class="avatar avatar-xl rounded-circle">
            <?php
               $get_user = get_user($userId);
               $row = mysqli_fetch_array($get_user);
               echo '<img src="../upload/profile/'.$row["photo"].'" id="sideimg" class="img-circle elevation-2" alt="User Image">';
               ?>	
            </a>
         </div>
         <div class="col right ml--1 mb-1">
            <h5 class="mb-0">
               <a href="profile.php" class="text-white"><strong> <?php echo $row["fname"]; ?></strong></a>
            </h5>
            <?php
               if($row["status"] == "Online"){
                   echo'
                       <span class="text-success text-lg">●</span>
                       <small class="text-white">Online</small>';
               }else{
                   echo'
                       <span class="text-light text-lg">●</span>
                       <small class="text-white">Offline</small>';
               
               }
               ?>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
               <a href="../user/dashboard.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     &nbsp;Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="../user/project.php" class="nav-link active">
                  <i class="fas fa-project-diagram"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;Projects
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="../user/board.php" class="nav-link">
                  <i class="fab fa-trello"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Board
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="members.php" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;Members
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="../calendar/index.php" class="nav-link">
                  <i class="far fa-calendar-alt"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Calendar
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="progress.php" class="nav-link">
                  <i class="fas fa-tasks"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Progress
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="../user/upload_files.php" class="nav-link">
                  <i class="fas fa-file-upload"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uploads
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="../user/bug_report.php" class="nav-link">
                  <i class="fas fa-bug"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Bugs
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fab fa-github"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;GitHub
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="gitreposearch.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="fas fa-code-branch"></i>
                        <p>&nbsp;&nbsp;&nbsp;Repository Search</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="gitcommitsearch.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="fas fa-code-branch"></i>
                        <p>&nbsp;&nbsp;&nbsp;Commit Search</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="gitissuesearch.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="fas fa-code-branch"></i>
                        <p>&nbsp;&nbsp;&nbsp;Issue Search</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="../timetracker/timetracker.php" class="nav-link">
                  <i class="far fa-clock"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Time Tracker
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="far fa-file-alt"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document Generator
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="../doc_generator/draft_documents.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;Draft</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../doc_generator/meeting_minutes.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;Meeting Minutes</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../doc_generator/meeting_agenda.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;Meeting Agenda</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../doc_generator/srs_generator.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;SRS Report</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../doc_generator/sdd_generator.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;SDD Report</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../doc_generator/std_generator.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;STD Report</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../doc_generator/custom.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf"></i>
                        <p>&nbsp;&nbsp;&nbsp;Custom</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-pencil-ruler"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Diagram Creator
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="../diagrams/flowchart.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="fas fa-pencil-ruler"></i>
                        <p>&nbsp;&nbsp;&nbsp;Flowchart Diagram</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="../diagrams/pageflow.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp;<i class="fas fa-pencil-ruler"></i>
                        <p>&nbsp;&nbsp;&nbsp;PageFlow Diagram</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="feedback.php" class="nav-link">
                  <i class="fas fa-comment-alt"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;Feedback Survey
                  </p>
               </a>
            </li>
            <br ><br ><br >
         </ul>
      </nav>
   </div>
</aside>