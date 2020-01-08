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
    	<img class= "col-sm-2" src="images/amoc2.png">
  	    <h1 class="col-sm-4 col-sm-offset-2 ">تصريــــــح خروج فرد</h1>	    
    </header>	  
    <form  method="POST" action="add.php" id="permitForm" onsubmit="return confirm('تأكيد ارسال التصريح');">
    	<div class="row form-group">
    		<div class="col-sm-3">
				<label for="subManagment" >القطاع/الادارة</label>
	    		<input type="text" class="form-control" id="subManagment" name="subManagment" placeholder="القطاع/الادارة.." required readonly>		

				<label for="permitDate" >التاريخ</label>
				<input type="date" class="form-control" id="permitDate" name="permitDate" required tabindex="5">

			</div>	    
		    <div class="col-sm-3">
				<label for="job" >الوظيفة</label>
				<input type="text" class="form-control" id="job" name="job" placeholder="الوظيفة.." required >
				<label for="topManager">الرئيس الاعلى</label>
			    <select class="form-control" id="topManager" name="topManager" required tabindex="3">
			    	<option selected disabled hidden style='display: none' value=''></option>
		   		    <?php 	getTopManagers();   ?>			    
		   		</select>   	
		   	</div> 	
			<div class="col-sm-3">
				<label for="name" >الاســـــم</label>
	    		<input type="text" class="form-control" id="name" name="name" placeholder="الاســـــم.." required readonly>
				<label for="manager">المدير المباشر</label>
			    <select class="form-control" id="manager" name="manager" tabindex="2">
			    	<!-- <option selected disabled hidden style='display: none' value=''></option> -->
		   		    <?php  	getManagers();   ?>
				</select>
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
			<!-- <div class="col-sm-1">
			
			</div>	 -->
			<div class="col-sm-1">
				<!-- <label for="returnTime" >ساعة العودة</label>
				<input type="time" class="form-control" id="returnTime" name="returnTime" value="11:30"> -->
			</div>
			<div class="col-sm-2">
				<label for="departTime" >ساعة الخروج</label>
				<input type="time" class="form-control" id="departTime" name="departTime" value="11:30">
			</div>
				
			<div class="col-sm-1">
				<label for="returnCheckbox" >بعودة</label>
				<input type="checkbox" class="form-control" id="returnCheckbox" name="returnCheckbox" value ="1" checked  >
			</div>

			<div class="col-sm-5">
				<label for="permitReasonDetails" >سبب الخروج بالتفصيل</label>
				<textarea type="text" class="form-control" id="permitReasonDetails" name="permitReasonDetails" 
				placeholder="سبب الخروج بالتفصيل.."  tabindex="7">
				</textarea>
			</div>	
			<div class="col-sm-3">
				<label for="permitReason" >سبب الخروج </label>
				<select class="form-control" id="permitReason" name="permitReason" tabindex="6" required>
			    	<option selected disabled hidden style='display: none' value=''></option>
		   		    <?php  	getPermitReason();   ?>
				</select>
			</div>			
		</div>
		<div class = "row form-group">
			<div class="col-sm-6 col-sm-offset-3">
				<input class ="btn btn-primary form-control" type="Submit" value="ارســــــال" name="submitPermit">
				<!-- <i class="fa fa-send fa-fw send-icon"></i>			 -->
			</div>	
		</div>
    </form>
</div>
	<?php include 'footer.php'; ?>
