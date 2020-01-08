<?php 
    session_start();
    if (isset($_SESSION['Username'])) {
        //echo "Welcome" . $_SESSION['Username'];
    } else {
        header('Location: index.php');//redirect
        exit();
    }
    include 'header.php';
    require 'functions.php';
?>
	<div class="container">
		<div class="managements-container row">
			<?php get_All_Mangements(); ?>
		</div>
		<!-- add Modal -->
		<div id="addManagementModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body row">
						<form method="POST" id="addManagementForm" action="insert.php">	
							<div class="form-group col-md-10 col-md-offset-1">
								<label for= "managementName">الادارة العامة :</label>
								<input type="text" class="form-control" id="managementName" name="managementName">
							</div>
							<div class="form-group col-md-8 col-md-offset-2">
								<input type="submit" name="insertManagement" class="btn btn-block btn-lg" value="حفظ">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Modal -->
		<div id="editManagementModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body row">
						<form method="POST" id="editManagementForm" action="insert.php">	
							<div class="form-group col-md-10 col-md-offset-1">
							<input type="hidden" name="management_id" id="management_id"> 
								<label for= "managementEdit">الادارة العامة :</label>
								<input type="text" class="form-control" id="managementEdit" name="managementEdit">
							</div>
							<div class="form-group col-md-8 col-md-offset-2">
								<input type="submit" name="updateManagement" class="btn btn-block btn-lg" value="حفظ">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>				
	</div>			
	<?php include 'footer.php'; ?>