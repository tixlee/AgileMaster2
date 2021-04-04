<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

?>

<!DOCTYPE html>
<html>
<head>
  
	<title>AgileMaster | Documents</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="se-pre-con"></div>
<div class="wrapper">

	<?php include('../navigation/topbar.php');?>
    <?php include('../navigation/user/docgeneratorminutes_sidebar.php');?>

	<div class="content-wrapper">
		<br><br>
		<section class="content">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header py-3">
						<h5 class="m-0 font-weight-bold " style="color: #990021;">Documents</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th >Document Name</th>
                                        <th >Document Type</th>
                                        <th >Date Modified</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <tr class='tbl-link'>
                                        <td></td>
								        <td></td>
										<td>
                                           
                                        </td>  
                                        
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                <i class="ri-pencil-fill"></i>
                                            </button>
                                            &nbsp;
                                            &nbsp;
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                <i class="ri-delete-bin-2-fill"></i>
                                            </button>

                                        </td>
                                    </tr>
                                    
                                </tbody>
							</table>
						</div>
					</div>
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
<script src="../dependencies/scripts/google.js"></script>

</body>
</html>
