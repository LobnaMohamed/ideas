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
	  	    <h1 class="col-sm-12">اسناد الافكار المطلوب تقييمها</h1>  
	    </header>
	    <!-- search for emp code -->
<!-- 		<form class="navbar-form" role="search" id="searchEmp" method="GET">
			<div class="form-group add-on">
				<label for = "search">رقم القيد / الاسم :</label>
				<input class="form-control" placeholder="ابحث.." name="search" id="search" type="text">
			</div>
		</form> -->
		<form class="navbar-form row" role="search" id="searchEmp" method="GET" action="adminreport_forpending.php">
			<div class="form-group add-on ">
				<label for = "search">رقم القيد:</label>
				<input class="form-control" placeholder=" ابحث رقم قيد" name="search" id="search" type="text"> 
				<?php
				if($_SESSION['UserGroup']==7){?>
					<label for = "searchTo"> إلى:</label>
					<input class="form-control" placeholder="الى رقم قيد" name="searchTo" id="searchTo" type="text">	
					<input  type="submit" class= "form-control btn btn-primary" value="تقرير">
				<?php }	?>
			</div> 			
		</form>

		<!-- form to show pending vacations and confirm them -->
	    <form class="form-horizontal row" method="POST" action="done.php"> 
	    <!-- action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" -->
	    	<table id="pendingVac" class="table table-striped table-bordered table-responsive">		
				<thead>
					<tr>
						<th>الفكرة</th>

				    </tr>		
				</thead>
				<tbody id="pendingideabody">
					<?php
					//check if the logged in manager or top manager or admin then 
					//run the corresponding function 
						// if($_SESSION['UserGroup']==7) { //top manager
							assignideas();
						// }

					?>
				</tbody>
			</table>
			<div>
				<input type="submit" name="updateRating" value="إعتمــــاد" id="ideaAgree" class="btn btn-success col-sm-2 col-sm-offset-5">
			</div>			
		 </form>		
	</div> 
	<?php	include 'footer.php'; ?>