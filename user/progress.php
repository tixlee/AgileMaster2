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
   
   $totalUserTaskAssigned = 100;
   $totalUserTaskDone = 0;
   $percentage = ( $totalUserTaskDone / $totalUserTaskAssigned) * 100;
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Board</title>
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
              padding: 30px 0px 0px 0px;
              font-size: 60px;
              font-weight: bold;
           }
       </style>
       
             <script>
         function getproject(val) {
         	$.ajax({
         	type: "POST",
         	url: "get_board_progress.php",
         	data:'project_id='+val,
         	success: function(data){
         		$("#board-list").html(data);
         	}
         	});
         }
                 
         function gettask(val) {
//      var select=$("#board-list").val();
      $.ajax({
        type:'post',
        url:'searchbyboard.php',
        data:'board_id='+val,
        success:function(data){
          $("#alltasks").html(data);
        }
      });
    }         
                 
      </script>
       
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
     <div class="se-pre-con"></div>
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/progress_sidebar.php');?>
         <div class="content-wrapper">
            <section class="content">
                
                
                <div class="bg-custom" >
                    <div class="bg-img" style="text-align: center;">
                            <h2 class="mb-3">Progress</h2>


                            <div class="form-group">
                                <div  class="row">
                                    <div class="col">
                                        <select onChange="getproject(this.value);" data-live-search="true" title="Please select project" name="project_id" id="project_id" class="form-control  col-sm-12 col-md-12" required="required">
                                            <option value="" >Select Project</option>
                                          <?php
                                             $getProjectByUser = getProjectByUser($userId);
                                             while($row = mysqli_fetch_array($getProjectByUser))
                                             {
                                             
                                                 $getAllProjects = getAllProjects($row['project_id']);
                                                 $rRow = mysqli_fetch_array($getAllProjects);
                                                 $project_id = $row['project_id'];
                                             ?>
                                          <option value="<?php echo $row['project_id']; ?>"  required><?php echo $rRow['project_name']; ?> </option>
                                          <?php
                                             }
                                             ?>
                                       </select>
                                    </div>
                                    <div class="col">
                                        <select data-live-search="true" name="board_id" id="board-list" class="form-control  col-sm-12" required="required" onchange="gettask(this.value);">
                                          <option value="" >Select Board</option>
                                       </select>
                                    </div>
                                 </div>
<!--                                <button id = 'btnIssues' class="btn btn-success">Search</button>-->
                             </div>
                        
                  </div>
                </div>
                
                <br>
                <br>
                
               <div class="container-fluid">
			   
			   
			   <div class="row" id="alltasks">

				  
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
				  
<!--
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
						<div id="g2" class="gauge" style="height: 300px;"></div>
					  </div>
					</div>
				  </div>
-->

                   
                   
                   
				</div>
			   
			   
			   
               </div>
			   
			   
			   
			   
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
         </div>
      </div>
       

       
               
      <script src="../dependencies/navigation/jquery/jquery.min.js"></script>
      <script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
      <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="../dependencies/scripts/datatables-demo.js"></script>
      <script src="../dependencies/navigation/js/adminlte.js"></script>
	  <script src="../dependencies/flot/flot/jquery.flot.js"></script>
	    <script src="../dependencies/scripts/raphael.min.js"></script>
  <script src="../dependencies/scripts/justgage.js"></script>
	  <script src="../dependencies/scripts/google.js"></script>
	   <script src="../dependencies/scripts/jquery.knob.min.js"></script>
      <script>
         $(document).ready(function() {
             $('table#dataTables').DataTable( {
                 fixedHeader: {
                     header: true,
                     footer: true
                 }
             } );
         } );
      </script>
	  <script>
  $(function () {
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [
	  [1,0], 	<!-- User Task Backlog Item -->
	  [2,0],	<!-- User Task To Do -->
	  [3,0],	<!-- User Task Doing -->
	  [4,0],	<!-- User Task Testing -->
	  [5,0]	<!-- User Task Done -->
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
    window.onload = function(){
        window.document.body.onload = event; // note removed parentheses
    };
    
    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    
    function event(){

      var g2 = new JustGage({
        id: 'g2',
        value: <?php echo $percentage; ?>,
        min: 0,
        max: 100,
        symbol: '%',
        pointer: true,
        pointerOptions: {
          toplength: -15,
          bottomlength: 10,
          bottomwidth: 12,
          color: '#8e8e93',
          stroke: '#ffffff',
          stroke_width: 3,
          stroke_linecap: 'round'
        },
        gaugeWidthScale: 0.6,
        counter: true
      });

     }
    
    document.addEventListener("DOMContentLoaded", event);

     

     

     

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
   </body>
</html>