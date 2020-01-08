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
	    <!-- <div class="table-responsive row"> -->
<!-- 	    <div class="panel">
	    	<form class="navbar-form row" role="search" id="searchEmp" method="GET">
			    <div class="form-group add-on col-sm-11">
			    	<label for = "search">رقم القيد / الاسم :</label>
					<input class="form-control" placeholder="ابحث.." name="search" id="search" type="text">
					<label for = "searchDateFrom">التاريخ من:</label>
					<input class="form-control"  name="searchDateFrom" id="searchDateFrom" type="date">
					<label for = "searchDateTo">التاريخ الى:</label>
					<input class="form-control"  name="searchDateTo" id="searchDateTo" type="date">
					<label for = "month">month</label>
					<input class="form-control"  name="month" id="month" type="month">

			    </div> 
	    	      
		    </form>
		</div> -->
		<header class="row text-center">
	  	    <h2 class="col-sm-4 col-sm-offset-4 ">الاجازات المطلوب تسجيلها</h1>	    
	    </header>
		<table id="confirmedVacReport" class="table table-striped table-bordered table-responsive table-condensed">	
			<thead>
				<tr class='bg-primary'>
					<th >رقم القيد</th>
					<th >الاسم</th>
					<th >التشغيل</th>
					<th>تاريخ تحرير الاجازة </th>
					<th >نوع الاجازة</th>
					<th >من تاريخ</th>
					<th >الى تاريخ</th>
					<th>تاريخ إعتماد الرئيس الاعلى</th>
					<th >المدة</th>
			    </tr>		
			</thead>
			<tbody id="Reportbody">
				<?php
					if($_SESSION['UserGroup']==3 || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){	
							getVacAsAdminReportForPending();
					} 
				?>
			</tbody>
		</table>	
		<!-- </div>	 -->
	</div> 
	<?php	include 'footer.php'; ?>