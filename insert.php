<?php
	include 'header.php';
	// Include config file
	include 'functions.php';

	//echo $_POST['UpdateEmp'];
	if(isset($_POST['insertEmp'])){ // insert new employee
		 addEmp();
		 header("Location:empData.php");
		
	}elseif(isset($_POST['UpdateEmp'])){ //update existing employee
		editEmp();
		header("Location:empData.php");
		
	}elseif(isset($_POST['ResetPassword'])){ //reset password
		resetPassword();
		header("Location:empData.php");

	}elseif(isset($_POST['insertManagement'])){ // insert new management
		addManagement();
		header("Location:managements.php");

    }elseif(isset($_POST['updateManagement'])){ // edit management
		editManagement();
		header("Location:managements.php");

	}elseif(isset($_POST['UpdateVac'])){ // edit existing vacation
	editVacation();
	header("Location:myvacationstatus.php");
	}
	elseif(isset($_POST['insertjob'])){ // insert new management
		addJob();
		header("Location:jobs.php");

    }elseif(isset($_POST['updatejob'])){ // edit management
		editJob();
		header("Location:jobs.php");

	}elseif(isset($_POST['submitOvertime'])){ // edit management
		insertOvertime();
		header("Location:overtimemodel.php");

	}
	
		
	include 'footer.php';
?>
