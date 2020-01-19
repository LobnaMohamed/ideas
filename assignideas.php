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
	    <form class="form-horizontal row" id="assignideasform" name="assignideasform" method="POST"> 
	   
	    	<table id="pendingVac" class="table table-striped table-bordered table-responsive">		
				<thead>
					<tr>
						<th class="col-xs-1"> التاريخ</th>
						<th class="col-xs-4"> الفكرة</th>
						<th class="col-xs-2">jury1</th>
						<th class="col-xs-2">jury2</th>
						<th class="col-xs-2">jury3</th>

				    </tr>		
				</thead>
				<tbody id="pendingideabody">
					<?php
					//check if the logged in manager or top manager or admin then 
					//run the corresponding function 
						if($_SESSION['UserID']==2129 || $_SESSION['UserID'] == 2114) { //top manager
							assignideas();
						}

					?>
				</tbody>
			</table>
			<div>
				<input type="submit" name="saveassignedideas" value="إعتمــــاد" id="saveassignedideas" class="btn btn-success col-sm-2 col-sm-offset-5">
			</div>			
		 </form>		
	</div> 
	<?php	include 'footer.php'; ?>