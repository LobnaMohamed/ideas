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
		addVacation();
		// echo "<h1>تم ارسال الاجازة بنجاح !</h1>";
		header('Location: vacationmodel.php');//redirect
	}
	if(isset($_POST['submitPermit'])){
		addPermit();
		echo "<h1>تم ارسال التصريح بنجاح !</h1>";
		header('Location: permitModel.php');//redirect
	}
	if(isset($_POST['submitidea'])){
		addidea();
		// echo "<h1>تم ارسال الاجازة بنجاح !</h1>";
		header('Location: ideamodel.php');//redirect
	}
?>


	