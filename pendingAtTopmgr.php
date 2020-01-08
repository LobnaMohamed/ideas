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
	  	    <h1 class="col-lg-12">الاجازات المعلقة عند المدير</h1>  
	    </header>
	    <div class="table-responsive row">
	    	<form class="navbar-form row" role="search" id="searchEmp" method="GET" >
	    		
			    <div class="form-group add-on ">
			    	<label for = "search">رقم القيد:</label>
					<input class="form-control" placeholder=" ابحث من رقم قيد.." name="search" id="search" type="text">
					<?php
					if($_SESSION['UserGroup']!=3 && $_SESSION['UserGroup']!=5 && $_SESSION['UserGroup']!=6){?>
					<label for = "searchDateFrom">التاريخ من:</label>
					<input class="form-control"  name="searchDateFrom" id="searchDateFrom" type="date">
					<label for = "searchDateTo">التاريخ الى:</label>
					<input class="form-control"  name="searchDateTo" id="searchDateTo" type="date"> 
					<?php
					}
					if($_SESSION['UserGroup']==3 || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){?>
						<label for = "searchTo"> إلى:</label>
						<input class="form-control" placeholder="الى رقم قيد" name="searchTo" id="searchTo" type="text">
						<label for = "month">الشهر:</label>
						<select name="month" class="form-control" id="month">
							<option value='0'></option>"
							<?php 

								for($m = 1;$m <= 12; $m++){ 
								    $month =  date("F", mktime(0, 0, 0, $m,1)); //prob with february so we must specify the day or it will be taken as 30th which is an overflow for feb
								    echo "<option value='$m'>$month</option>"; 
								} 

							?>
						</select> 
						<label for = "year">السنة:</label>
						<input class="form-control"  name="year" id="year" value="<?php echo date('Y'); ?>">	
						<input  type="submit" class= "form-control btn btn-primary" value="تقرير">
					<?php }	?>

			    </div> 
		    </form>
			<table id="pendingVacAtTopmgr" class="table table-striped table-bordered table-responsive">	
				<thead>
					<tr>
						<th>رقم القيد</th>
						<th>الاسم</th>
						<th>الادارة</th>
						<th>تاريخ تحرير الاجازة </th>
						<th>نوع الاجازة</th>
						<th>من تاريخ</th>
						<th>الى تاريخ</th>
						<th>المدة</th>
						<?php 
							if($_SESSION['UserGroup']==3 ||$_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){ //admin
								echo"
									<th>الرئيس المباشر</th>
									<th>إعتماد الرئيس المباشر</th>
									<th>الرئيس الاعلى</th>
									<th>إعتماد الرئيس الاعلى</th>";
							}
						?>

				    </tr>		
				</thead>
				<tbody id="pendingVacAtTopmgrbody">
					<?php
					//check if the logged in manager or top manager or admin then 
					//run the corresponding function 
						if($_SESSION['UserGroup']==3 || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){
							getPendingAtTopmgrVacAsAdmin(); 
						} 
					?>
				</tbody>
			</table>	
		</div>	
	</div> 
	<?php	include 'footer.php'; ?>