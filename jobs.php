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
		<div class="jobs-container row">
			<?php get_All_jobs(); ?>
		</div>
		<!-- add Modal -->
		<div id="addjobModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body row">
						<form method="POST" id="addjobForm" action="insert.php">	
							<div class="form-group col-md-10 col-md-offset-1">
								<label for= "jobName"> الوظيفة :</label>
								<input type="text" class="form-control" id="jobName" name="jobName">
							</div>
							<div class="form-group col-md-8 col-md-offset-2">
								<input type="submit" name="insertjob" class="btn btn-block btn-lg" value="حفظ">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Modal -->
		<div id="editjobModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body row">
						<form method="POST" id="editjobForm" action="insert.php">	
							<div class="form-group col-md-10 col-md-offset-1">
							<input type="hidden" name="job_id" id="job_id"> 
								<label for= "jobEdit">الوظيفة:</label>
								<input type="text" class="form-control" id="jobEdit" name="jobEdit">
							</div>
							<div class="form-group col-md-8 col-md-offset-2">
								<input type="submit" name="updatejob" class="btn btn-block btn-lg" value="حفظ">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>				
	</div>			
	<?php include 'footer.php'; ?>