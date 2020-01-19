<?php
	session_start();
	if(isset($_SESSION['Username'])){
		//echo "Welcome" . $_SESSION['Username'];
	}else{
		header('Location: index.php');//redirect
		exit();
	}
	//include 'header.php';
	include 'functions.php';
	//SUBMIT AGREE	ON VACATION
	if (isset($_POST['update']))
	{
	    // Form has been submitted
		saveVacationAgree();
		header("Location:pending.php");
	}

	elseif (isset($_POST['updateRating']))
	{
	    // Form has been submitted
		insertRatings();
		header("Location:pendingideas.php");
	}
	elseif (isset($_POST['jury1'])|| isset($_POST['jury2'])||isset($_POST['jury3']))
	{
	    // Form has been submitted
		saveAssignedIdeas();

		// header("Location:assignideas.php");
		
	}
	//SUBMIT AGREE ON PERMITS
	elseif (isset($_POST['updatePermit']))
	{
	    // Form has been submitted

		//saveVacationAgree();
		header("Location:pendingPermit.php");
	}
	// delete vacation
	elseif (isset($_POST['vac_id'])){
		deleteVacationAsEmp();
		//header("Location:myvacationstatus.php");
	}
	elseif (isset($_POST['permit_id'])){
		deletePermitAsEmp();
		//header("Location:myvacationstatus.php");
	}
	else
	{
	    // Form has not been submitted
		echo "nothing";
		//print_r($_POST);
	}
