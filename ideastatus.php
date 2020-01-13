<?php 
	session_start();
	if(isset($_SESSION['Username'])){
		//echo "Welcome" . $_SESSION['Username'];
	}else{
		header('Location: index.php');//redirect
		exit();
	}
	include 'header.php';
	include 'functions.php';
?>
<div class="container">
	<header class="row text-center">
		<!-- <img class= "col-lg-2 logo" src="images/amoc2.png"> -->
		<h1 class="col-lg-12">الافكار</h1>  
	</header>
	<div class="table-responsive row">
		<form class="navbar-form row" role="search" id="searchEmp" method="GET">
			<div class="form-group add-on ">
				
				<label for = "searchDateFrom">التاريخ من:</label>
				<input class="form-control"  name="searchDateFrom" id="searchDateFrom" type="date">
				<label for = "searchDateTo">التاريخ الى:</label>
				<input class="form-control"  name="searchDateTo" id="searchDateTo" type="date"> 
			</div>   
		</form>
		<table id="myVacStatus" class="table table-striped table-bordered table-responsive">	
			<thead>
				<tr>
					<th>تاريخ الفكرة</th>
					<th>التقييم</th>
				</tr>		
			</thead>
			<tbody id="VacStatusbody">
				<?php
				//check if the logged in manager or top manager or admin then 
				//run the corresponding function 
					//getIdeasStatusAsEmp(); 
				?>
				
			</tbody>
		</table>
	</div>
<!-- Edit vacation Modal -->
	<div id="editVacationModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"> تعديل الاجازة </h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="editVacForm" name="editVacForm" action="insert.php">	    
						<div class="col-sm-4">
							<input type="hidden" name="vac_id" id="vac_id"> 
							<label for="topManagerEdit">الرئيس الاعلى</label>
							<select class="form-control" id="topManagerEdit" name="topManagerEdit" required tabindex="3">
								<option selected disabled hidden style='display: none' value=''></option>
								<?php 	getTopManagers();   ?>			    
							</select>
							<label for="durationEdit" >مدة الاجازة:</label>
							<input type="text" class="form-control" id="durationEdit" name="durationEdit" placeholder="المدة.." readonly>	
						</div> 	
						<div class="col-sm-4">
							<label for="managerEdit">المدير المباشر</label>
							<select class="form-control" id="managerEdit" name="managerEdit" tabindex="2">
								<!-- <option selected disabled hidden style='display: none' value=''></option> -->
								<?php  	getManagers();   ?>
							</select>
							<label for="dateToEdit" >التاريخ الى</label>
							<input type="date" class="form-control" id="dateToEdit" name="dateToEdit"  required tabindex="6">
						</div>
						<div class="col-sm-4">
							<label for="vacTypeEdit">نوع الاجازة</label>
							<select class="form-control" id="vacTypeEdit" name="vacTypeEdit" required tabindex="4">
								<option selected disabled hidden style='display: none' value='' ></option>
								<?php getCase();   ?>
							</select>
							<label for="dateEdit" >التاريخ من</label>
							<input type="date" class="form-control" id="dateEdit" name="dateEdit" required tabindex="5">
						</div>
						<div class="form-group col-md-3 col-md-offset-4 ">
							<input type="submit" name="UpdateVac" class="btn btn-success" value="حفظ التعديل" >
						</div>	
					</form>
				</div>
				<div class="modal-footer">	
				</div>
			</div>
		</div>
	</div>		
</div> 
	<?php	include 'footer.php'; ?>