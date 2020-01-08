<?php
	session_start();
	include 'functions.php';
	$currentURL = $_GET['pageurl'];
	//according to current url the page loads
	// if($currentURL == 'empdata.php'){
	// 		getAllEmp();

	// // confirmed vacations ajax		
	// }else 
	if($currentURL == 'confirmed.php'){
		if($_SESSION['UserGroup']==2){
			getConfirmedVacAsTopManager(); 
		}
		if($_SESSION['UserGroup']==1){
			getConfirmedVacAsManager(); 
		}
		if($_SESSION['UserGroup']==3){
			getConfirmedVacAsAdmin();
		}
	}

	//pending vacations ajax
	// }else if($currentURL == 'pending.php'){
	// 	if($_SESSION['UserGroup']==2){
	// 		getPendingVacAsTopManager();  
	// 	}
	// 	if($_SESSION['UserGroup']==1){
	// 		getPendingVacAsManager();  
	// 	}
	// 	if($_SESSION['UserGroup']==3){
	// 		getPendingVacAsAdmin(); 
	// 	}
	// }
	?>