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


if(!empty($_POST['board_id'])) 
{
    
         $query = mysqli_query($conn,"SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `task_assignees` WHERE `board_id` = '" . $_POST['board_id'] . "' AND `user_id` = '$userId'");
    
     $p = mysqli_fetch_array($query);
    
    $sql = mysqli_query($conn,"SELECT * FROM `project` NATURAL JOIN `board` WHERE `board_id` = '" . $_POST['board_id'] . "'");
    
     $u = mysqli_fetch_array($sql);
    
    
    $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '" . $u['project_id'] . "'") or die(mysqli_error());
    $u_fetch = $u_query->fetch_array();

    if($u_fetch['user_id'] == $userId) 
{

    
        $get_TaskBy_Board = get_TaskBy_Board($_POST["board_id"]);
        $tbRow = mysqli_fetch_array($get_TaskBy_Board);
       
       
       
        $get_Back_log_item_Task = get_Back_log_item_Task($_POST["board_id"]);
        $bllRow = mysqli_fetch_array($get_Back_log_item_Task);
       
       
        
       
        $get_ToDo_Task = get_ToDo_Task($_POST["board_id"]);
        $tdoRow = mysqli_fetch_array($get_ToDo_Task);
       
       
        
       
        $get_Doing_Task = get_Doing_Task($_POST["board_id"]);
        $dtoRow = mysqli_fetch_array($get_ToDo_Task);
       
       
        
       
        $get_Testing_Task = get_Testing_Task($_POST["board_id"]);
        $testRow = mysqli_fetch_array($get_Testing_Task);
       
       
        
       
        $get_Done_Task = get_Done_Task($_POST["board_id"]);
        $doneRow = mysqli_fetch_array($get_Done_Task);
    

        $total_TaskBy_Board =  mysqli_num_rows($get_TaskBy_Board);
        $total_Done_Task = mysqli_num_rows($get_Done_Task);
        
        if($total_TaskBy_Board>0){
            $percent = ( $total_Done_Task / $total_TaskBy_Board) * 100;
        }else{
            $total_TaskBy_Board = 100;
            $total_Done_Task = mysqli_num_rows($get_Done_Task);
            $percent = ( $total_Done_Task / $total_TaskBy_Board) * 100;
        }
    
    
?>


			  <div class="col-md-6">
					<div class="card card-danger card-outline">
					  <div class="card-header">
						<h3 class="card-title">
						  <i class="far fa-chart-bar"></i>
						  Tasks
						</h3>

						<div class="card-tools">
						  <button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						  </button>
						</div>
					  </div>
					  <div class="card-body">
						<div id="bar-chart" style="height: 300px;"></div>
					  </div>
					</div>
				  </div> 

                    <div class="col-md-6">
					<div class="card card-danger card-outline">
					 <div class="card-header">
                        <h3 class="card-title">
                          <i class="far fa-chart-bar"></i>
                          Performance
                        </h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>

                        </div>
                      </div>
					  <div class="card-body">
                 <br><br><br>

                  <div class="text-center">
                    <input type="text" class="knob text-center" value="<?php echo $percent; ?>" data-skin="tron" data-thickness="0.2" 
                           data-fgColor="#f56954">

                    <div class="knob-label"><?php echo $percent; ?>% </div>
                  </div>
                  
              </div>
					</div>
				  </div>


	  <script>
  $(function () {
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [
	  [1,<?php echo mysqli_num_rows($get_Back_log_item_Task); ?>], 	<!-- User Task Backlog Item -->
	  [2,<?php echo mysqli_num_rows($get_ToDo_Task); ?>],	<!-- User Task To Do -->
	  [3,<?php echo mysqli_num_rows($get_Doing_Task); ?>],	<!-- User Task Doing -->
	  [4,<?php echo mysqli_num_rows($get_Testing_Task); ?>],	<!-- User Task Testing -->
	  [5,<?php echo mysqli_num_rows($get_Done_Task); ?>]	<!-- User Task Done -->
	  ],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Backlog'], [2,'To Do'], [3,'Doing'], [4,'Testing'], [5,'Done']]
      }
    })
    /* END BAR CHART */

    
  })
</script>



<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

    

  })

</script>



<?php

 }else{
        
        
        
        $getUserBacklogitemTask = getBacklogitemTask($_POST["board_id"], $userId);
        $blRow = mysqli_fetch_array($getUserBacklogitemTask);
        $getUserToDoTask = getToDoTask($_POST["board_id"], $userId);
        $tdRow = mysqli_fetch_array($getUserToDoTask);
        $getUserDoingTask = getDoingTask($_POST["board_id"], $userId);
        $dtRow = mysqli_fetch_array($getUserDoingTask);
        $getUserTestingTask = getTestingTask($_POST["board_id"], $userId);
        $tesRow = mysqli_fetch_array($getUserTestingTask);
        $getUserDoneTask = getDoneTask($_POST["board_id"], $userId);
//        $donRow = mysqli_fetch_array($getUserDoneTask);
        $getTaskByBoard = getTaskByBoard($_POST['board_id'], $userId);
//$total_tasks = mysqli_num_rows($getTaskByBoard);           
        $totalUserTaskAssigned =  mysqli_num_rows($getTaskByBoard);
        $totalUserTaskDone = mysqli_num_rows($getUserDoneTask);
        
        if($totalUserTaskAssigned>0){
            $percentage = ( $totalUserTaskDone / $totalUserTaskAssigned) * 100;
        }else{
            $totalUserTaskAssigned = 100;
            $totalUserTaskDone = mysqli_num_rows($getUserDoneTask);
            $percentage = ( $totalUserTaskDone / $totalUserTaskAssigned) * 100;
        }
        

?>
			  <div class="col-md-6">
					<div class="card card-danger card-outline">
					  <div class="card-header">
						<h3 class="card-title">
						  <i class="far fa-chart-bar"></i>
						  Tasks
						</h3>

						<div class="card-tools">
						  <button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						  </button>
						</div>
					  </div>
					  <div class="card-body">
						<div id="bar-chart" style="height: 300px;"></div>
					  </div>
					</div>
				  </div> 

                    <div class="col-md-6">
					<div class="card card-danger card-outline">
					 <div class="card-header">
                        <h3 class="card-title">
                          <i class="far fa-chart-bar"></i>
                          Performance
                        </h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>

                        </div>
                      </div>
					  <div class="card-body">
                 <br><br><br>

                  <div class="text-center">
                    <input type="text" class="knob text-center" value="<?php echo $percentage; ?>" data-skin="tron" data-thickness="0.2" 
                           data-fgColor="#f56954">

                    <div class="knob-label"><?php echo $percentage; ?>% </div>
                  </div>
                  
              </div>
					</div>
				  </div>


    	  <script>
  $(function () {
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [
	  [1,<?php echo mysqli_num_rows($getUserBacklogitemTask); ?>], 	<!-- User Task Backlog Item -->
	  [2,<?php echo mysqli_num_rows($getUserToDoTask); ?>],	<!-- User Task To Do -->
	  [3,<?php echo mysqli_num_rows($getUserDoingTask); ?>],	<!-- User Task Doing -->
	  [4,<?php echo mysqli_num_rows($getUserTestingTask); ?>],	<!-- User Task Testing -->
	  [5,<?php echo mysqli_num_rows($getUserDoneTask); ?>]	<!-- User Task Done -->
	  ],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Backlog'], [2,'To Do'], [3,'Doing'], [4,'Testing'], [5,'Done']]
      }
    })
    /* END BAR CHART */

    
  })
</script>


<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

    

  })

</script>

<?php } } ?>

