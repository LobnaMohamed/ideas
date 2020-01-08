<?php 
	session_start();
	if(isset($_SESSION['Username'])){
		//echo "Welcome" . $_SESSION['Username'];
	}else{
		header('Location: index.php');//redirect
		exit();
	}
	include 'header.php';
	require 'functions.php';      
?>
	<div class="container">
	    <header class="row text-center">
	    	<!-- <img class= "col-lg-2 logo" src="images/amoc2.png"> -->
	  	    <h1 class="col-lg-12">بيانات العاملين</h1>  
	    </header>
	    <div class="table-responsive row">
		    <form class="navbar-form row" role="search" id="searchEmp" method="GET">
		    	<div class="col-md-2">
			    	عدد العاملين:
				    <?php  getEmpCount() ?>
			    </div>
			    <div class="form-group add-on col-md-10">
			    	<label for = "search">رقم القيد / الاسم :</label>
					<input class="form-control" placeholder="ابحث.." name="search" id="search" type="text">
					<!-- <div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div> -->
			    </div>
			    <button id="scroll_down" class="btn btn-lg btn-default form-control" type="button"><i class='fa fa-2x fa-angle-double-down '></i></button>
				<button id="scroll_up" class="btn btn-lg btn-default form-control hide" type="button"><i class='fa fa-2x fa-angle-double-up '></i></button>
    
		    </form>
			<table id="empData" class="table table-striped table-bordered">
			  	<thead >
				    <tr>
				      <th>رقم القيد</th>
				      <th>الاسم</th>
				      <th>نوع العقد</th>
				      <th>الوظيفة</th>
				      <th>الادارة العامة</th>
				      <th>المستوى</th>
				      <th>نهارى/ورادى</th>
				      <th>بالخدمة/خارج الخدمة</th>
				      <th><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEmpModal">إضافة</button></th>
				    </tr>
			  	</thead>
				<tbody id="empDatabody">
					<?php getAllEmp(); ?>
				</tbody>
			</table>
			<div id="endOfEmpData"></div>	
	    </div>	  
		<!-- add Modal -->
		<div id="addEmpModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> إضافة عامل جديد </h4>
					</div>
					<div class="modal-body row">
						<form method="POST" id="addEmpForm" action="insert.php">
							<div class="form-group col-md-4">
					    		<label for= "level">المستوى الوظيفى</label>
					    		<select class="form-control" id="level" name="level">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getLevel();   ?>
								</select>

					    		<label for= "day_n">نهارى/ورادى</label>
					    		<select class="form-control" id="day_n" name="day_n">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getDayN();   ?>
								</select>

					    		<label for= "active">بالخدمة/خارج الخدمة</label>
					    		<select class="form-control" id="active" name="active">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getActive();   ?>
								</select>							
							</div>	
							<div class="form-group col-md-4">
								<label for= "empName">اسم الموظف</label>
					    		<input type="text" class="form-control" id="empName" name="empName">

								<label for= "contractType">نوع العقد</label>
					    		<select class="form-control" id="contractType" name="contractType">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getContract();   ?>
								</select>	
					    		<label for= "job">الوظيفة</label>
					    		<select class="form-control" id="job" name="job">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getJob();   ?>
								</select>
								
								<label for= "userGrp">درجة المستخدم</label>
					    		<select class="form-control" id="userGrp" name="userGrp">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getUserGroup();   ?>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for= "empCode">رقم قيد الموظف</label>
					    		<input type="text" class="form-control" id="empCode" name="empCode">

					    		<label for= "GManagement">الادارة العامة</label>
					    		<select class="form-control" id="GManagement" name="GManagement">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getManagement();   ?>
								</select>

								<label for= "management">قطاع /ادارة</label>
					    		<input type="text" class="form-control" id="management" name="management">

					    		<label for= "desc_job">الوظيفة الحالية</label>
					    		<input type="text" class="form-control" id="desc_job" name="desc_job">
							</div>
							<div class="form-group col-md-3 col-md-offset-4 ">
								<input type="submit" name="insertEmp" class="btn btn-success" value="حفظ">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Modal -->
		<div id="editEmpModal" class="modal fade " role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> تعديل البيانات </h4>
					</div>
					<div class="modal-body">
						<form method="POST" id="editEmpForm" name="editEmpForm" action="insert.php">
							<div class="form-group col-md-4">
					    		<label for= "levelEdit">المستوى الوظيفى</label>
					    		<select class="form-control" id="levelEdit" name="levelEdit" >
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getLevel();   ?>
								</select>

					    		<label for= "day_nEdit">نهارى/ورادى</label>
					    		<select class="form-control" id="day_nEdit" name="day_nEdit">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getDayN();   ?>
								</select>

					    		<label for= "activeEdit">بالخدمة/خارج الخدمة</label>
					    		<select class="form-control" id="activeEdit" name="activeEdit">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getActive();   ?>
								</select>
								<input type="hidden" name="employee_id" id="employee_id"> 
								<label for= "ResetPassword">اعادة ضبط كلمة المرور</label>
								<input type="submit" name="ResetPassword" id="ResetPassword" class="btn btn-warning form-control" value="اعادة ضبط كلمة المرور" onclick ="return confirm('تأكيد اعادة ضبط كلمة المرور؟');">							
							</div>	
							<div class="form-group col-md-4">
								<label for= "empNameEdit">اسم الموظف</label>
					    		<input type="text" class="form-control" id="empNameEdit" name="empNameEdit" >

								<label for= "contractTypeEdit">نوع العقد</label>
					    		<select class="form-control" id="contractTypeEdit" name="contractTypeEdit">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getContract();   ?>
								</select>	
					    		<label for= "jobEdit">الوظيفة</label>
					    		<select class="form-control" id="jobEdit" name="jobEdit">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getJob();   ?>
								</select>
								
								<label for= "userGrpEdit">درجة المستخدم</label>
					    		<select class="form-control" id="userGrpEdit" name="userGrpEdit">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getUserGroup();   ?>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for= "empCodeEdit">رقم قيد الموظف</label>
					    		<input type="text" class="form-control" id="empCodeEdit" name="empCodeEdit">

					    		<label for= "GManagementEdit">الادارة العامة</label>
					    		<select class="form-control" id="GManagementEdit" name="GManagementEdit">
							    	<option selected disabled hidden style='display: none' value=''></option>
						   		    <?php  	getManagement();   ?>
								</select>

								<label for= "managementEdit">قطاع /ادارة</label>
					    		<input type="text" class="form-control" id="managementEdit" name="managementEdit">

					    		<label for= "desc_jobEdit">الوظيفة الحالية</label>
					    		<input type="text" class="form-control" id="desc_jobEdit" name="desc_jobEdit">
							</div>
							<div class="form-group col-md-3 col-md-offset-4 ">
								<input type="submit" name="UpdateEmp" class="btn btn-success" value="حفظ" >
							</div>	
						</form>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>		
	<?php include 'footer.php'; ?>