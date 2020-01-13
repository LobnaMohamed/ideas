<?php
	session_start();
	if(isset($_SESSION['Username'])){
	//echo "Welcome" . $_SESSION['Username'];
	}else{
		header('Location: index.php');//redirect
	exit();
	}
	include 'header.php';
	// Include config file
	include 'functions.php';
	if(isset($_POST['submitVac'])){
		ob_start() ;
		addVacation();
		ob_flush();
		header('Location: vacationmodel.php');//redirect
		exit();
	}
	elseif(isset($_POST['submitPermit'])){
		addPermit();
		header('Location: permitModel.php');//redirect
	}
	elseif(isset($_POST['submitidea'])){
		addidea();
		header('Location: ideamodel.php');//redirect
	}
?>


	