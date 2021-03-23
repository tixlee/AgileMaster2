<?php
   session_start();
   ob_start();
   
   include_once '../connection/dbconnection.php';
   include_once '../helpers/module.php';
   include_once '../resources/links/require.php';
   
 
   
    $project_id = mysqli_real_escape_string($conn, $_GET['project_id']);
   
    $p_query = $conn->query("SELECT * FROM `project` NATURAL JOIN `user_project` WHERE `project_id` = '$project_id'") or die(mysqli_error());
                              $p_fetch = $p_query->fetch_array();
                            if($p_fetch['project_id'] == $project_id)
                              {
                            
                            ?>
                            <div class="modal fade" id="xampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                           <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">New Project</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                           </div>
                                           <div class="modal-body">
                                              <form method="POST" enctype="multipart/form-data">
                                                 <input type="hidden" name="project_id" value="<?php $p_fetch['project_id']; ?>">
                                                 <div class="row col-md-12 col-xm-3">
                                                    <label for="project_name" class="sr-only">Project Name</label>
                                                    <input type="text" name="project_name" id="project_name" class="form-control" value="<?php echo $p_fetch['project_name']; ?>" placeholder="Project Name" required autocomplete="off">
                                                 </div>
                                                 <br>
                                                 <div class="row col-md-12 col-xm-6">
                                                    <label for="project_description" class="sr-only">Project Description</label>
                                                    <textarea class="form-control" name="project_description"  placeholder="Project Description" autocomplete="off" required><?php echo $p_fetch['project_description']; ?></textarea>
                                                 </div>
                                                 <br>
                                                 <div class="modal-footer">
                                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                    <input type="submit" name="create" value="Create" id="submit-fs" class="btn btn-success" >
                                                 </div>
                                              </form>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                            
                           <?php 
                            }
   
   ?>
