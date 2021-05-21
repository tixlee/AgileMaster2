<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="../resources/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">
            <strong>
            <?php
               $get_admin = get_admin();
               $row = mysqli_fetch_array($get_admin);
               echo '
                  <strong> '.$row["name"].' </strong>
                  <span class="carrot"></span>';
               
               ?>	
            </strong>
            </a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
               <a href="dashboard.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     &nbsp;Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="project.php" class="nav-link active">
                  <i class="fas fa-project-diagram"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;Projects
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="board.php" class="nav-link">
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
               <a href="upload_files.php" class="nav-link">
                  <i class="fas fa-file-upload"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uploads
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
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-comment"></i>
                  <p>
                     &nbsp;&nbsp;&nbsp;Feedback
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="feedback_survey.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fas fa-comment"></i>
                        <p>&nbsp;&nbsp;&nbsp;Feedback Survey</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="contactus_feedback.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fas fa-comment"></i>
                        <p>&nbsp;&nbsp;&nbsp;Contact Us</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="report_issue.php" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fas fa-comment"></i>
                        <p>&nbsp;&nbsp;&nbsp;System Issue</p>
                     </a>
                  </li>
               </ul>
            </li>
            <br><br><br>
         </ul>
      </nav>
   </div>
</aside>