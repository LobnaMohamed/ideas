<?php
	require 'functions.php';  

	//get data for edit management

	if(isset($_POST["managementID"]))  
	 {  
		$con = connect();
		$sql= '';
		$sql = "SELECT * FROM managements WHERE ID = '".$_POST["managementID"]."'";  
		$stmt = $con->prepare($sql);
		$stmt->execute(array($_POST["managementID"]));
		$result = $stmt->fetch(); //PDO::FETCH_ASSOC
		//print_r($result) ;
		echo json_encode($result); 
	 }  else {
	 	echo "management id is not set";
	 }
 ?>
 