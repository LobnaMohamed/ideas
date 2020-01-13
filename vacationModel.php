<?php
	session_start();
	if(!isset($_SESSION['Username'])){
		header('Location: index.php');//redirect
		exit();
	}
	require 'functions.php';
	include 'header.php';
?>
<div class="container">
    <header class="row text-center">
		<img class= "logo col-sm-1" src="images/amoc2.png">
  	    <h1 class="col-sm-4 col-sm-offset-2 ">نموذج الاجـــــازة</h1>	    
    </header>	  
    <form  method="POST" action="add.php" id="vacForm" onsubmit="return confirm('تأكيد ارسال الاجازة');">
    	<div class="row form-group">
    		<div class="col-sm-3">
    			<label class="col-form-label" for="address" >العنوان</label>
		    	<input type="text" class="form-control" id="address" name="address" value="بالملف">
		    	<label for="topManager">الرئيس الاعلى</label>
			    <select class="form-control" id="topManager" name="topManager" required tabindex="3">
			    	<option selected disabled hidden style='display: none' value=''></option>
		   		    <?php 	getTopManagers();   ?>			    
		   		</select>
			</div>	    
		    <div class="col-sm-3">
		    	<label for="day_n" >نهارى/ورادى</label>
	    		<input type="text" class="form-control" id="day_n" name="day_n" placeholder="نهارى/ورادى.." required readonly>
	    		<label for="manager">المدير المباشر</label>
			    <select class="form-control" id="manager" name="manager" tabindex="2">
			    	<!-- <option selected disabled hidden style='display: none' value=''></option> -->
		   		    <?php  	getManagers();   ?>
				</select>				    	
		   	</div> 	
		    <div class="col-sm-3">
	    		<label for="name" >الاســـــم</label>
	    		<input type="text" class="form-control" id="name" name="name" placeholder="الاســـــم.." required readonly>
	    		<label for="subManagment" >القطاع/الادارة</label>
	    		<input type="text" class="form-control" id="subManagment" name="subManagment" placeholder="القطاع/الادارة.." required readonly>
	
		    </div>					
			<div class="col-sm-3">
				<label for="code">رقم القيد</label>
		    	<input type="number" class="form-control" id="code" name="code" placeholder="رقم القيد.." tabindex="1">
		    	<input hidden type="text" id="emp" name="empID"/>
		    	<!-- <label for="Management" >الادارة العامة:</label>
				<select class="form-control" id="Management" name="Management">
			    	<option selected disabled hidden style='display: none' value=''></option>
		   		    <?php  	getManagement();   ?>
				</select> -->
				<input hidden id="Management" name="Management">
				<label for="ManagementName" >الادارة العامة:</label>
				<input class="form-control" id="ManagementName" name="ManagementName" placeholder="الادارة العامة.." readonly>
			</div>

		</div>
		<div class="row form-group">					
			<div class="col-sm-3">
				<label for="duration " >مدة الاجازة:</label>
				<input type="text" class="form-control" id="duration" name="duration" placeholder="المدة.." readonly>	
			</div>
			<div class="col-sm-3">
				<label for="dateTo" >التاريخ الى</label>
				<input type="date" class="form-control" id="dateTo" name="vacDateTo"  required tabindex="6">
			</div>
			<!-- placeholder="سنة/يوم/شهر" -->
			<div class="col-sm-3">
				<label for="date" >التاريخ من</label>
				<input type="date" class="form-control" id="date" name="vacDate" required tabindex="5">
			</div>
			<div class="col-sm-3">
				<label for="vacType">نوع الاجازة</label>
	   		    <select class="form-control" id="vacType" name="case" required tabindex="4">
	   		    	<option selected disabled hidden style='display: none' value='' ></option>
		   		    <?php getCase();   ?>
			    </select>
			</div>						
		</div>
		<div class = "row form-group">
			<div class="col-sm-6 col-sm-offset-3">
				<input class ="btn btn-primary form-control" type="Submit" value="ارســــــال" name="submitVac">
				<!-- <i class="fa fa-send fa-fw send-icon"></i>			 -->
			</div>	
		</div>
    </form>
</div>
	<?php include 'footer.php'; ?>
