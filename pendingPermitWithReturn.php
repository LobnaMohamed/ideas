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
	  	    <h1 class="col-sm-12">التصاريح المطلوب تسجيلها بعودة</h1>  
	    </header>
	    <!-- search for emp code -->
<!-- 		<form class="navbar-form" role="search" id="searchEmp" method="GET">
			<div class="form-group add-on">
				<label for = "search">رقم القيد / الاسم :</label>
				<input class="form-control" placeholder="ابحث.." name="search" id="search" type="text">
			</div>
		</form> -->
		<form class="navbar-form row" role="search" id="searchEmp" method="GET" >
			<div class="form-group add-on ">
				<label for = "search">رقم القيد / الاسم :</label>
				<input class="form-control" placeholder=" ابحث رقم قيد" name="search" id="search" type="text"> 
				<?php
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

		<!-- form to show pending vacations and confirm them -->
	    <form class="form-horizontal row" method="POST" action="done.php"> 
	    <!-- action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" -->
	    	<table id="pendingPermit" class="table table-striped table-bordered table-responsive">		
				<thead>
					<tr>
						<th>رقم القيد</th>
						<th>الاسم</th>
						<th>الادارة</th>
						<th>تاريخ تحرير التصريح </th>
						<th>سبب الخروج</th>
						<th>تاريخ التصريح</th>
						<!-- <th>عودة</th> -->
						<th>ساعة الخروج</th>
						<!-- <th>ساعة العودة</th> -->
						<?php
							if($_SESSION['UserGroup']==2) { //top manager
								 echo"<th>الرئيس المباشر</th>";
								 echo"<th>إعتماد الرئيس المباشر</th>";
								 echo"<th>الرئيس الاعلى</th>";
								 echo"<th>إعتماد الرئيس الاعلى</th>";
							
							}elseif($_SESSION['UserGroup']==1){//direct manager
								 echo"<th>إعتماد الرئيس المباشر</th>";
								 echo"<th>الرئيس الاعلى</th>";
								 echo"<th>إعتماد الرئيس الاعلى</th>";
							}  
							if($_SESSION['UserGroup']==3  ){ //est72a2at
								echo"<th>الرئيس المباشر</th>";
								echo"<th>إعتماد الرئيس المباشر</th>";
								echo"<th>الرئيس الاعلى</th>";
								echo"<th>إعتماد الرئيس الاعلى</th>";
								echo"<th>تاريخ إعتماد الرئيس الاعلى</th>";
								echo"<th>ختم الخروج</th>";
								echo"<th>ختم العودة</th>";
							}
							if($_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){ //est72a2at manager or top manager
								echo"<th>الرئيس المباشر</th>";
								echo"<th>إعتماد الرئيس المباشر</th>";
								echo"<th>الرئيس الاعلى</th>";
								echo"<th>إعتماد الرئيس الاعلى</th>";
								echo"<th>تاريخ إعتماد الرئيس الاعلى</th>";
								echo"<th>ختم الخروج </th>";
								echo"<th>ختم العودة</th>";
							}
						?>
				    </tr>		
				</thead>
				<tbody id="pendingPermitbody">
					<?php
					//check if the logged in manager or top manager or admin then 
					//run the corresponding function 
						if($_SESSION['UserGroup']==2) { //top manager
							getPendingPermitAsTopManager(); 	
						}elseif($_SESSION['UserGroup']==1 ){//direct manager
							getPendingPermitAsManager(); 
						}
						elseif($_SESSION['UserGroup']==3 ){ //est72a2at
							getPendingPermitAsAdmin(); 
						}  
						elseif( $_SESSION['UserGroup']==5){ //est72a2at and direct manager
							getPendingPermitAsAdminandManager(); 
						}elseif( $_SESSION['UserGroup']==6){ //est72a2at and top manager
							getPendingPermitAsAdminandTopManager(); 
						} 
					?>
				</tbody>
			</table>
			<div>
				<input type="submit" name="updatePermit" value="إعتماد" id="permitAgree" class="btn btn-success col-sm-2 col-sm-offset-5">
			</div>			
		 </form>		
	</div> 
	<?php	include 'footer.php'; ?>