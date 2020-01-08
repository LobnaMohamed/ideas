<?php
	session_start();
	include 'functions.php';
	$currentURL = $_GET['pageurl'];
	//according to current url the page loads
	if($currentURL == 'empdata.php'){
			getAllEmp();

	// confirmed vacations ajax		
	}
	else if($currentURL == 'confirmed.php'){
		if($_SESSION['UserGroup']==2){
			getConfirmedVacAsTopManager(); 
		}
		if($_SESSION['UserGroup']==1){
			getConfirmedVacAsManager(); 
		}
		if($_SESSION['UserGroup']==3 || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){
			getConfirmedVacAsAdmin();
		}
	}
	//pending vacations ajax
	else if($currentURL == 'pending.php'){
		if($_SESSION['UserGroup']==2){
			getPendingVacAsTopManager();  
		}
		if($_SESSION['UserGroup']==1){
			getPendingVacAsManager();  
		}
		if($_SESSION['UserGroup']==3){
			getPendingVacAsAdmin(); 
		}
		if($_SESSION['UserGroup']==5){
			getPendingVacAsAdminandManager(); 
		}
		if($_SESSION['UserGroup']==6){
			getPendingVacAsAdminandTopManager(); 
		}
	}
	else if($currentURL == 'myvacationstatus.php'){
		getVacationStatusAsEmp();
	}

	else if($currentURL == 'pendingAtTopmgr.php'){
		getPendingAtTopmgrVacAsAdmin();
	}

	else if($currentURL == 'pendingPermit.php'){
		if($_SESSION['UserGroup']==2) { //top manager
			getPendingPermitAsTopManager(); 	
		}
		if($_SESSION['UserGroup']==1 ){//direct manager
			getPendingPermitAsManager(); 
		}
		if($_SESSION['UserGroup']==3 ){ //est72a2at
			getPendingPermitAsAdmin(); 
		}  
		if( $_SESSION['UserGroup']==5){ //est72a2at and direct manager
			getPendingPermitAsAdminandManager(); 
		}
		if( $_SESSION['UserGroup']==6){ //est72a2at and top manager
			getPendingPermitAsAdminandTopManager(); 
		} 
	}
	else if($currentURL == 'confirmedPermit.php'){
		if($_SESSION['UserGroup']==2) {
			getConfirmedPermitAsTopManager(); 
		}
		if($_SESSION['UserGroup']==1){
			getConfirmedPermitAsManager(); 
		}
		if($_SESSION['UserGroup']==3 || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){
			getConfirmedPermitAsAdmin(); 
		} 
	}
	else if($currentURL == 'confirmedPermitWithReturn.php'){
		if($_SESSION['UserGroup']==3 || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){
			getConfirmedPermitWithReturnAsAdmin();
		} 
	}


	?>